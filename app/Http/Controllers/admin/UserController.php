<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserLoginRequest;
use App\Http\Requests\admin\UserRegisterRequest;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {

        $user = new User($request->all());

        $user->password = Hash::make($user->password);
        if ($user->save()) {
            $token = $user->createToken($user->email)->accessToken;
            return response()->json([
                "data" => $user,
                "access_token" => $token
            ]);
        }
    }

    public function login(UserLoginRequest $request)
    {

        $user = User::query()->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken($user->email)->accessToken;
                return response()->json([
                    "data" => $user,
                    "access_token" => $token
                ]);
            }
        }
        return response()->json('fail', 500);
    }


    public function me () {
        return \response([
            "data" => Auth::user()
        ]);
    }
}
