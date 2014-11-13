<?php

class loginController extends \BaseController {

	function getIndex()
	{
		return View::make('tienda.sesion');
	}


	function postSignin()
	{
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
		   return Redirect::to('/');
		} else {
		   return Redirect::back()
		      ->withErrors('Your username/password combination was incorrect')
		      ->withInput();
		}
	}


	public function getLogout() {
   		Auth::logout();
   		return Redirect::to('/');//->with('message', 'Your are now logged out!');

	}
}