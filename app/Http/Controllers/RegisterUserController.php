<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;



use Illuminate\Http\Request;

class RegisterUserController extends Controller
{
    public function create(){
       return view('auth.register');
      
    } 
    
    public function store(){
        //validate
        $attributes= request()->validate([
         'first_name'=>['required'],
         'last_name'=>['required'],
         'email'=>['required', 'email'],
         'password'=>['required', 'confirmed']
      ]);
      // dd($attributes);
      //store in the database
     $user = User::create($attributes);
      
      // //   //login
        Auth::login($user);  
        
      //   //redirect
        return redirect('/jobs')->with('success', 'Registration successful!');

      }

}
