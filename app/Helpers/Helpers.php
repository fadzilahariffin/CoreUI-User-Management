<?php

// namespace App\Helpers;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Support\Facades\Hash;


if (! function_exists('home_route')) {

    /**
     * Return the route to the "home" page depending on authentication/authorization status.
     *
     * @return string
     */
    function home_route()
    {
        if (auth()->check()) {
            // if (auth()->user()->can('view backend')) {
            //     return 'admin.dashboard';
            // } else {
            //     return 'frontend.user.dashboard';
            // }
            return 'dashboard';
        }

        return 'login.main';
    }

    
}


if (! function_exists('setPasswordEncryption')) {


 function setPasswordEncryption($password)
    {
        // If password was accidentally passed in already hashed, try not to double hash it
        if (
            (\strlen($password) === 60 && preg_match('/^\$2y\$/', $password)) ||
            (\strlen($password) === 95 && preg_match('/^\$argon2i\$/', $password))
        ) {
            $hash = $password;
        } else {
            $hash = Hash::make($password);
        }

        // Note: Password Histories are logged from the \App\Observer\User\UserObserver class
        return $hash;
    }

}