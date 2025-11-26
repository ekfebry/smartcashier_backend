<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class WebAuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $member = Member::where('email', $request->email)->first();

        if (!$member || !Hash::check($request->password, $member->password)) {
            return back()->withErrors(['login' => 'Invalid credentials']);
        }

        $token = $member->createToken('Web Token')->plainTextToken;
        session(['api_token' => $token, 'member' => $member->toArray()]);
        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->forget(['api_token', 'member']);
        return redirect('/login');
    }
}
