<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Artisan;

class SessionHelper
{
    public static function resetCookie()
    {
        // get cookie name from config
        $cookieName = config('session.cookie');

        switch ($cookieName) {
            case 'laravel_session':
                copy(base_path() . '/config/session.laravel_sessions.php', base_path() . '/config/session.php');
                break;

            case 'laravel_sessions':
                copy(base_path() . '/config/session.laravel_session.php', base_path() . '/config/session.php');
                break;

            default:
                break;
        }

        Artisan::call('config:clear');

        return true;
    }
}
