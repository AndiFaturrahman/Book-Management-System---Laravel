<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function store(Request $request){
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'min:3'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        User::create([
            'email'=> $request -> email,
            'password'=> $request -> password,
            'role'=> 1,
        ]);
        return redirect('/login');
    }
}