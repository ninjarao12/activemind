<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

public function index()
    {
        return view('auth.index');
    }
    
  public function login(Request $request)
{
    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
        // Authentication passed...
        return redirect()->route('home');
    }

    return redirect()->back()->withErrors(['message' => 'Invalid credentials. Please try again.']);
}
}
