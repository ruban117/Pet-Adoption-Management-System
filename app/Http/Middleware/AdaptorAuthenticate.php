<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class AdaptorAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('adaptor-login');
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('adaptor')->check()) {
            return $this->auth->shouldUse('adaptor');
        }

        $this->unauthenticated($request, ['adaptor']);
    }
}
