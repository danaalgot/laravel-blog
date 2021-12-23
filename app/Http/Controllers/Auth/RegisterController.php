<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // Validate the fields
        $this->validate($request, [
            'name'      => 'required|max:35',
            'username'  => 'required|max:35',
            'email'     => 'required|max:50',
            'password'  => 'required|confirmed',
        ]);

        // Create the user
        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // Log the user in
        auth()->attempt($request->only('email', 'password'));

        // Redirect the user
        return redirect()->route('dashboard');
        
    }
}
