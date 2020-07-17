<?php

use Illuminate\Support\Facades\Auth;
use Laracasts\Flash\Flash;

if (! function_exists('hasRole')) {
    function hasRole($roleSlug) {

        if (Auth::user()->role->slug == 'platform_admin'){
            return true;
        }

        return (Auth::user()->role->slug == $roleSlug);
    }
}
