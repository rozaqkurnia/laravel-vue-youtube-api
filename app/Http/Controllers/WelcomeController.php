<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function verify($token)
    {
        $user = User::where('activation_token', $token)->first();
        if (!$user) {
            abort(404);
        }

        $user->activation_token = null;
        $user->is_active = 1;
        $user->save();
        \Auth::login($user);

        return redirect()->route('home');
    }
}
