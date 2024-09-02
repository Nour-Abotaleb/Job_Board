<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;

class CandidateAuthController extends Controller
{
    public function showRegisterForm()
    {
        return view('auth.candidate_register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:candidates',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $candidate = Candidate::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($candidate);

        return redirect()->route('candidate.dashboard');
    }

    public function showLoginForm()
    {
        return view('auth.candidate_login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (auth()->attempt($request->only('email', 'password'))) {
            return redirect()->route('candidate.dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials']);
    }
}
