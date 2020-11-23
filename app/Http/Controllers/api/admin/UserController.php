<?php

namespace App\Http\Controllers\api\admin;


use App\Http\Controllers\Controller;
use App\Http\Requests\admin\UserLoginRequest;
use App\Http\Requests\admin\UserRegisterRequest;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private function getResponse($user)
    {
        $token = $user->createToken('access token');
        $expires_at = Carbon::parse(
            $token->token->expires_at
        )->timestamp;
        $expires_at = $expires_at - Carbon::now()->timestamp;

        return response()->json([
            "data" => $user,
            "access_token" => $token->accessToken,
            "expires_at" => $expires_at
        ]);
    }

    public function register(UserRegisterRequest $request)
    {

        $user = new User($request->all());
        $user['role_id'] = 1;
        $user->password = Hash::make($user->password);
        if ($user->save()) {
            return $this->getResponse($user);
        }
    }

    public function login(UserLoginRequest $request)
    {
        $user = User::query()->where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                return $this->getResponse($user);
            } else {
                return response()->json([
                    "message" => "Email or password not valid",
                    "errors" => [
                        "email" => ["Email or password not valid"]
                    ]

                ], 422);
            }
        } else {
            return response()->json([
                "message" => "User not found",
                "errors" => ["email" => "User not found"]
            ], 404);
        }

    }


    public function me()
    {
        $user = Auth::user();
        return response([
            "data" => $user
        ]);
    }
}
