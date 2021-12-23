<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validate the fields
        $this->validate($request, [
            'email'     => 'required',
            'password'  => 'required',
        ]);

        // Log the user in
        if(!auth()->attempt($request->only('email', 'password'), $request->remember)){
            return back()->with('status', 'Invalid login credentials');
        }

        // Redirect the user
        return redirect()->route('dashboard');

    }
}
