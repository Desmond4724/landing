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
        $data = [
            "access_token" => $token->accessToken,
            "expires_at" => Carbon::parse(
                $token->token->expires_at
            )->toDateTimeString()
        ];
        dd($data);

    }
}
