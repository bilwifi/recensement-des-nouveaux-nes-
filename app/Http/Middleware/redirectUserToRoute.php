<?php

namespace App\Http\Middleware;

use Closure;
class redirectUserToRoute
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
        $response =  $next($request);
        if (auth($guard = 'users_etablissement')->check()) {
            $slug = \App\Models\Etablissement::find(auth()->user()->idetablissement)->slug;
            // $prefixe = trim(\Route::current()->action['prefix'],'/');
            // dd($request->server()['PATH_INFO']);

            if (!empty($request->server()['PATH_INFO'])) {
                $path_info = $request->server()['PATH_INFO'];
                $path_info =trim($path_info,'/');
                $prefixe = explode('/',$path_info)[0];

                if($slug != $prefixe){
                    return redirect()->route('etablissement.accueil',$slug);
                }
               
            }
        }
        return $response;
    }
}
