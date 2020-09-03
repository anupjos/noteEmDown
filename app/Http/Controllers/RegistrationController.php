<?php

namespace App\Http\Controllers;

use Redirect;
use Illuminate\Http\Request;
use App\User;


class RegistrationController extends Controller
{
    public function getRegister()
    {
        return view('registration.register');
    }

    public function postRegister()
    {
        $this->validate(request(), [
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        $user = User::create(request(['name', 'email', 'password']));
        
        auth()->login($user);
        
        return Redirect::to('/dashboard');
    }
}
