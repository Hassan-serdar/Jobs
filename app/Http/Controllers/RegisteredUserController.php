<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    public function create(){
      return  view('auth/register');
    }

    public function store(){
      $attributes=request()->validate([
        'first_name'=>['required'],
        'last_name'=>['required'],
        'email'=>['required','email','max:55'],
        'password'=>['required','min:10','confirmed',Password::min(5)->numbers()->letters()->max(20)]
      ]);    

      $user=User::create($attributes);
      
      Auth::login($user);
    return redirect('/jobs');
    }
}
