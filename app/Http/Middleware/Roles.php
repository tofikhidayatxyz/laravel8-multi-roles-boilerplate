<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Roles
{
    /**
     * Check user roles
     * @param array|string $roles
     * @param closure $user
     */
    private function checkRoles($user, $roles) {
        if(is_array($roles)) {
            return $user->hasAnyRole($roles);
        } else {
            return $user->hasRole($roles);
        }
    }  
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if(!$this->checkRoles($request->user(), $roles)) {
            return abort(403, 'This action is unauthorize');
        }
        return $next($request);
    }
}
