<?php

class loginController extends \BaseController {

	function getIndex()
	{
		return View::make('login/login');
	}


	function postSignin()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		   return Redirect::to('/');
		} else {
		   return Redirect::to('users/login')
		      ->with('errors', 'Your username/password combination was incorrect')
		      ->withInput();
		}
	}


	public function getLogout() {
   		Auth::logout();
   		return Redirect::to('login')->with('message', 'Your are now logged out!');

	}
}