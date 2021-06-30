<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRegisterRequest;
use App\Http\Validation\loginValidators;
use App\Http\Validation\registerValidators;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserController extends BaseController
{
    public function getall()
    {
        return User::all();
    }

    public function user(Request $request)
    {
        return $request->user();
    }

    public function register(UserRegisterRequest $request, registerValidators $validation)
    {

        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());
        if ($validator->fails()) {
            return response()->json(
                [
                    'errors' => $validator->errors()
                ],
                401
            );
        }
        $user = User::create([
            'email' => $request->email,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'adresse' => $request->adresse,
            'password' => bcrypt($request->password)
        ]);
        return response()->json($user);
    }

    public function login(request $request, loginValidators $validation)
    {
        $http = new \GuzzleHttp\Client();
        $validator = Validator::make($request->all(), $validation->rules(), $validation->messages());

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 401);
        }

        // if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
        //     $user = User::where('email', $request->email)->firstOrFail();
        //     $response = $http->post('http://127.0.0.1:8000/oauth/token', [
        //         'form_params' => [
        //             'grant_type' => 'client_credentials',
        //             'client_id' => '2',
        //             'client_secret' => 'VcqVGmk1esCYs0VhgLfPfOHyWYFDccj7yiELSjoz',
        //             'email'=>$request->email,
        //             'password'=>$request->email,
        //             'scope' => '*',
        //         ],
        //     ]);

        //     return json_decode((string) $response->getBody(), true);

        // } else {
        //     return response()->json(['errors' => 'Unauthorised'], 401);
        // }
        if (Auth::attempt(['email' => request('email'), 'password' => request('password')])) {
            $user = Auth::user();
            $success['token'] = $user->createToken('appToken')->accessToken;
            //After successfull authentication, notice how I return json parameters
            return response()->json([
                'success' => true,
                'token' => $success['token']
            ]);
        } else {
            //if authentication is unsuccessfull, notice how I return json parameters
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], 401);
        }
    }

    public function deleteadmin(Request $request)
    {
        $id = $request->id;
        $administrateur = User::find($id);
        $administrateur->delete();

        return $administrateur;
    }
    public function getoneadmin(int $id)
    {
        // $bool = false;
        // $bool = is_int($id);

        if (is_int($id))
            return User::find($id);
        // else
        //     return 'gggg';
    }
}
