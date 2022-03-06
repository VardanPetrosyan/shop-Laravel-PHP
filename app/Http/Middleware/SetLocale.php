<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\App;

use Storage;
class SetLocale
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

        session_start();
        if($_SESSION !== []){
            $langPrefix = $_SESSION['lang'];
        }else{
            $langPrefix = 'US';
        }
        if ($langPrefix){
            App::setLocale($langPrefix);
        }

        return $next($request);
    }
}
