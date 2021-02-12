<?php

namespace App\Services;

use App\Mail\AccountActivationMail;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

class AccountActivationService
{
    private function generateToken()
    {
        return mt_rand() . time();
    }

    public function handle($registeredUser)
    {
        //logger($registeredUser->user);
        $user = User::find($registeredUser->user->id);
        $user->activation_token = $this->generateToken();
        $user->save();

        Mail::to($user)->queue(new AccountActivationMail($user));
    }
}