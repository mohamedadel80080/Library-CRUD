<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
public function register()
    {
        return view('auth.register');
    }

public function handleRegister(Request $request)
    
    {

        $request->validate([

           ' name'=>' string| max:100',
           ' email'=>'email |max:100 ',
           ' pass'=>' string |max:50| min:8'
        ]);

       $user = User::create([

            'name'=> $request->name,
            'email'=> $request->email,
            'pass'=>Hash::make ($request->pass),

        ]);

        Auth::login($user);
        return redirect (route('books.index'));

    }
}
