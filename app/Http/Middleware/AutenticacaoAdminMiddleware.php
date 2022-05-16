<?php

namespace App\Http\Middleware;

use Closure;

class AutenticacaoAdminMiddleware
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
        $tipo = $_SESSION['type'];

        if($tipo == 1){
            return $next($request);
        }else{
            return redirect()->route('app.paginainicial');
        }
    }
}
