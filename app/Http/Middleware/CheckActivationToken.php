<?php

namespace App\Http\Middleware;

use App\Giftlist;
use Closure;

class CheckActivationToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $currentList = Giftlist::where('list', urldecode($request->listName))->first();

        if ($currentList->activation == $request->activationCode)
        {
            return $next($request);
        }

        return false;




    }
}
