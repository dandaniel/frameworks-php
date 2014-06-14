<?php

/**
	* Building UI element here
	*
	*/

class Elements extends Phalcon\Mvc\User\Component
{
	public function getMenu()
  {
		$auth = $this->session->get('auth');

		if(!$auth['id']){
			echo "<li>";
			echo Phalcon\Tag::linkTo('login', 'Login');
			echo "</li>";
			echo "<li>";
			echo Phalcon\Tag::linkTo('register', 'Register');
			echo "</li>";
		} else {
			echo "<li>";
			echo Phalcon\Tag::linkTo('login/profile', 'Dashboard');
			echo "</li>";
			echo "<li>";
			echo Phalcon\Tag::linkTo('login/users', 'View users');
			echo "</li>";
			echo "<li class='active'>";
			echo Phalcon\Tag::linkTo('login/logout', 'Logout');
			echo "</li>";
		}
  }
}