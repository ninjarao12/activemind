<?php
// app/Http/Controllers/SignupController.php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;

class SignupController extends Controller
{
public function showSignupForm()
{
    return view('auth.register');
}
    public function register(Request $request)
    {
        // Validate the input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|string|min:8',
        ]);
	
	
        // Create a new user in the database
        User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);

        // Redirect or return a response as needed
        return redirect()->back()->with('success', 'Account created successfully!');
    }
}

