<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Laravel\Passport\Passport;


class TestController extends Controller
{
    public function test()
    {
        $user = User::first();
        $token = $user->createToken('personal access token');
        $expires_at = Carbon::parse(
            $token->token->expires_at
        )->timestamp;

        $now = Carbon::now()->timestamp;
        $expires_at = $expires_at - $now;

        $expires_at = $expires_at/(1000*60*60);
        $data = [
            "access_token" => $token->accessToken,
            "expires_at" => $expires_at
        ];
        dd($data);
    }
}
