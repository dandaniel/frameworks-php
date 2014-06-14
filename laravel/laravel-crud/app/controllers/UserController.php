<?php

class UserController extends BaseController {

	public function getIndex()
	{
		return View::make('home');
	}

	public function getLogin(){
		return View::make('login');
	}

	public function postLogin(){
		$input = Input::all();
		$rules = array('email' => 'required|email', 'password' => 'required');

		$validator = Validator::make($input, $rules);

		if($validator->passes()){
			$credentials = array('email'=>$input['email'], 'password'=>$input["password"]);

			if(Auth::attempt($credentials)){
				return Redirect::to('profile');
			}
			else{
				return Redirect::to('login')->withInput()->withErrors("Your username and password don't match");
			}
		}
		else{
			return Redirect::to('login')->withInput()->withErrors($validator);
		}
	}

	public function getProfile(){
		if(Auth::check()){;
			$useremail = Auth::user()->email;
			$username = Auth::user()->username;

			return View::make('profile')->with(array('email' => $useremail, 'username' =>$username));
		}
		else{
			return Redirect::to('login');
		}

	}

	public function postProfile(){
		$profileChanged = false;
		$input = Input::all();
		$usernamerules = array('username' => 'required|unique:users');
		$emailrules = array('email' => 'required|unique:users|email');

		$usernamevalidator = Validator::make($input, $usernamerules);
		$emailvalidator = Validator::make($input, $emailrules);

		$user = Auth::user();

		if($usernamevalidator->passes()){
			$user -> username = $input['username'];
			$profileChanged = true;
		}

		if($emailvalidator->passes()){
			$user -> email = $input['email'];
			$profileChanged = true;
		}

		$user -> save();

		if($profileChanged){
			Session::flash('message', 'Profile edited succesfully!');
		}

		return Redirect::to('profile');
	}

	public function getLogout(){
		Auth::logout();
		return Redirect::to('login');
	}

	public function getRegister(){
		return View::make('register');
	}

	public function postRegister(){
		$input = Input::all();
		$rules = array('username' => 'required|unique:users', 'email' => 'required|unique:users|email', 'password' => 'required');

		$validator = Validator::make($input, $rules);

		if($validator->passes()){
			$password = Hash::make($input['password']);

			$user = new User();
			$user->username = $input['username'];
			$user->email = $input['email'];
			$user->password = $password;

			$user -> save();
			return Redirect::to('login');
		}
		else{
			return Redirect::to('register')->withInput()->withErrors($validator);
		}
	}

	public function getDelete(){
		$user = Auth::user();
		$user->delete();

		Session::flash('message', 'Profile deleted!');
		return Redirect::to('/');
	}
}