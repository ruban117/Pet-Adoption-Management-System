<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class DonorAuthenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('donor-login');
    }

    protected function authenticate($request, array $guards)
    {
        if ($this->auth->guard('donor')->check()) {
            return $this->auth->shouldUse('donor');
        }

        $this->unauthenticated($request, ['donor']);
    }
}
