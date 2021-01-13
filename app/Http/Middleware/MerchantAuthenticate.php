<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class MerchantAuthenticate extends Middleware
{

    protected function authenticate($request, array $guards)
    {

        if ($this->auth->guard('merchant')->check()) {
            return $this->auth->shouldUse('merchant');
        }

        $this->unauthenticated($request, ['merchant']);
    }


    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */

    
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('merchant.login');
        }
    }
}
