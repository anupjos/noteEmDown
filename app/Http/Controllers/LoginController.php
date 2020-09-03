<?php

namespace App\Http\Controllers;

use Request;
use Session;
use Redirect;
use Validator;
use Illuminate\Support\Str;

use App\User;

class LoginController extends Controller
{
    //Method to display login page
    public function getLogin()
    {
        return view('registration.login');
    }
    
    //Method to authenticate the user from login page
    public function postLogin()
    {   
        if (auth()->attempt(request(['email', 'password'])) == false) {
            Session::flash('error_message', 'Incorrect Email/Password.');
            return Redirect::back()->withInput(Request::except('password'));
        }
        
        return Redirect::to('/dashboard');
    }
    
    //Logout Method
    public function getLogout()
    {
        auth()->logout();
        
        return Redirect::to('/login');
    }

    // Method executes when user enters new password - Used in Login Page and Account settings page
    public function postResetPassword(){
        $input = Request::all();
        if(!isset($input['resetEmail'])) {
            Session::flash('error_message', 'Whoops, something went wrong. Please try again.');
            return Redirect::back();
        }

        $user = User::where('email', '=', $input['resetEmail'])->first();
        //Check if the user exists
        if (!$user) {
            Session::flash('error_message', 'User does not exist.');
            return Redirect::back();
        }

        //generate a random string and insert it into the password column
        $password = Str::random(8);
        $user->password = $password;
        $user->save();

        // Showing the new password in the alert for now. 
        Session::flash('success_message', 'Your new password is '.$password.'. You can change this in your account settings.');
        return Redirect::back();
    }
}
