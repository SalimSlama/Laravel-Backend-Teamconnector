<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class ForgotPasswordController extends Controller
{
    public function forgot(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email'
        ]);
        $email = $request->email;
        if (User::where('email', $email)->doesntExist()) {
            return response(['message' => 'Email n\'existe pas'], 200);
        }
        $token = Str::random(10);

        DB::table('password_resets')->insert([
            'email' => $email,
            'token' => $token,
            'created_at' => now()->addHours(6)
        ]);
        //sendmail
        Mail::send('mail.password_reset', ['token' => $token], function ($message) use ($email) {
            $message->to($email);
            $message->subject('Subject');
        });
        return response(['message' => 'Veuillez vérifier votre e-mail'], 200);
    }

    use SendsPasswordResetEmails;
}
