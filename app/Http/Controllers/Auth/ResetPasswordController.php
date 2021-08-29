<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;


class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    public function process(Request $request)
    {
        return $this->getPasswordResetTableRow($request)->count() > 0 ? $this->changePassword($request) : $this->tokenNotFoundResponse();
    }

    private function getPasswordResetTableRow($request)
    {
        return DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->_token]);
    }

    private function tokenNotFoundResponse()
    {
        return response()->json(
            ['error' => 'Token or Email is incorrect'],
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }

    private function changePassword($request)
    {
        $user = User::whereEmail($request->email)->first();
        $user->update(['password' => bcrypt($request->password)]);
        $this->getPasswordResetTableRow($request)->delete();
        return response()->json(
            ['data' => 'Password Successfully Changed'],
            Response::HTTP_CREATED
        );
    }
}
