<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function create(){
        return view('auth.login');
    }
    
    public function store(){
        //validate
      $attributes =  request()->validate([
            'email'=>['required', 'email'],
            'password'=>['required'],
        ]);
        //attempt to log in user
        if (! Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email'=>'Sorry, those credentials do not match.'
            ]);
        };
        
        //if it fails, regenerate the sessio token
        request()->session()->regenerate();

        //redirect
        return redirect('/jobs');

        
     }

     public function destroy(){
    Auth::logout();
    
    //redirect
    return redirect('/');
     }
}
