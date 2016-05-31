<?php
/**
 * Created by PhpStorm.
 * User: Gideao
 * Date: 23/05/2016
 * Time: 20:47
 */

namespace CodeProject\OAuth;

use Auth;

class Verifier
{

    public function verify($username, $password)
    {
        $credentials = [
            'email'    => $username,
            'password' => $password,
        ];

        if (Auth::once($credentials)) {
            return Auth::user()->id;
        }
        return false;
    }

}