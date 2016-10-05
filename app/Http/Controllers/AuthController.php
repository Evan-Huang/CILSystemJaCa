<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AuthController extends Controller
{
    //

	public function login() {


        return view('auth.login');
    }

    public function postLogin(Request $request) {

        $inputs = $request->all();

        if( \Auth::attempt(array('name' => $inputs['username'], 'password' => $inputs['password'])) )
        {
            return \Redirect::action('HomeController@index');
        }else{
            return \Redirect::action('AuthController@login')->with('error', true);
        }

    }

    public function logout() {

        \Auth::logout();

        return \Redirect::action('AuthController@login');
    }

}
