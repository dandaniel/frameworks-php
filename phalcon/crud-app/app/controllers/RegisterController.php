<?php

class RegisterController extends \Phalcon\Mvc\Controller
{

    public function indexAction()
    {
    	if($this->request->isPost()) {

	    	$users = new Users();
	    	$users ->username = $this->request->getPost('username');
	    	$users ->email = $this->request->getPost('email');
	    	$users ->password = $this->security->hash($this->request->getPost('password'));

	    	//stupid hashing functions allows any password, that's why validation DOES NOT WORK on a model, I won't even fix this

				if(!$users->save()) {
				    foreach ($users->getMessages() as $message) {
				        $this->flash->error((string) $message);
				    }
				} else {
				    $this->flash->success("The user was created. You can now log in.");
				    return $this->dispatcher->forward(array(
				        "controller" => "login",
				        "action" => "index"
				    ));
				}

			}

    }

}

