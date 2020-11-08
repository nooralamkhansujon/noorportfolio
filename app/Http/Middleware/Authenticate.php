<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Auth\AuthenticationException;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('login');
        }
    }

    protected function unauthenticated($request, array $guards)
    {
        if(!auth()->guard('admin')->check() && in_array('admin',$guards)){
            throw new AuthenticationException('Unauthenticated.', $guards,route('admin.login'));
        }
        throw new AuthenticationException('Unauthenticated.', $guards,$this->redirectTo($request));


    }
}
