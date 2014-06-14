<?php

use \Phalcon\Tag as Tag;

class LoginController extends \Phalcon\Mvc\Controller
{

		/*
		 ** Simple login check, not the best way, should use ACL
		 */
		public function beforeExecuteRoute($dispatcher)
		{
			//actions outside access
			$restricted = array('profile', 'users', 'logout', 'update', 'delete');
			$auth = $this->session->get('auth');

			if (in_array($dispatcher->getActionName(), $restricted) && !$auth) {

				$this->flash->error("You don't have access to this area");
				return $this->response->redirect("login");
			}
		}
    
		/*
		 ** loads form or displays dashboard
		 */

    public function indexAction()
    {
    	$verified = false;
        $sessionUser = $this->session->get('auth');

    	//if not logged in
    	if(!$sessionUser['id']){

    		//if it's a postback
    		if($this->request->isPost()) {

		    	$users = new Users();
		    	$email = $this->request->getPost('email');

		    	$user = Users::findFirst("email='$email'");

		    	if($user){
			    	$password = $this->request->getPost('password');
			    	$password_check = $this->security->checkHash($password, $user->password);

			    	if($password_check){
		    			$verified = true;

		    			$this->_registerSession($user);
		    			$this->flash->success('Nice seeing you again, ' . $user->username . '!');

		    			return $this->response->redirect("login/profile");
			    	}
		    	}

		    	if(!$verified){
		    		$this->flash->error("The login infomation is not valid");
		    	}

		    }

    	}
    	else{
    		return $this->response->redirect("login/profile");
    	}
	    	
    }

    /**
     * Register authenticated user into session data
     *
     */
    private function _registerSession($user)
    {
        $this->session->set('auth', array(
            'id' => $user->id,
            'name' => $user->username,
            'email' => $user->email
        ));
    }

    /** 
    	* Logout the user and remove session
    	*
    	*/
    public function logoutAction(){
				$this->session->remove('auth');
				$this->flash->success('See you next time!');

				return $this->response->redirect("login");
    }

    /**
     * Profile (dashboard) load
     */
    public function profileAction(){
    	$currentUser = $this->session->get('auth');
    	$id = $currentUser['id'];
    	$user = Users::findFirst("id='$id'");

    	Tag::displayTo("email", $user->email);
    	Tag::displayTo("username", $user->username);
    }

    /**
     * Profile update
     */
    public function updateAction(){
    	if($this->request->isPost()) {
    		$currentUser = $this->session->get('auth');
    		$id = $currentUser['id'];

	    	$email = $this->request->getPost('email');
	    	$username = $this->request->getPost('username');
	    	
	    	//model validation strikes again
	    	
	    	$users = Users::findFirst("id='$id'");
	    	$users ->username = $username;
	    	$users ->email = $email;

	    	if(!$users->update()) {
				    foreach ($users->getMessages() as $message) {
				        $this->flash->error((string) $message);
				    }
				} else {
				    $this->flash->success("The profile was updated.");
				}
	    }

	    return $this->dispatcher->forward(array(
	        "controller" => "login",
	        "action" => "profile"
	    ));
    }

    /**
     * Delete user
     */

    public function deleteAction(){
    	if($this->request->isPost()) {
    		$currentUser = $this->session->get('auth');
    		$id = $currentUser['id'];

    		$users = Users::findFirst("id='$id'");
	    	if(!$users->delete()) {
				    foreach ($users->getMessages() as $message) {
				        $this->flash->error((string) $message);
				    }
				} else {
					  $this->session->remove('auth');
				    $this->flash->success("The profile was deleted.");
				}
	    }

	    return $this->response->redirect("login");
    }

    /**
    	* View users
    	*/
    public function usersAction(){
    	$users = Users::find();
    	$userNumber = count($users);
    	//lazy

    	if($userNumber == 1){
    		echo "<h3>Only 1 user is registered:</h3><br/>";
    	}
    	else{
    		echo "<h3>At the moment ", count($users), " users are registered.</h3><br/><br/><h4>List of users: </h4><br/>";
    	}
    	
    	foreach ($users as $user){
    		echo "<li>Username: <strong>",$user->username, "</strong> with Email: <strong>", $user->email, "</strong></li><hr/>";
    	}
    }
}

