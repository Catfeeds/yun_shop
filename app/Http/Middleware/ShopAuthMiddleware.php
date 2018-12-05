<?php

namespace App\Http\Middleware;

use Closure;

class ShopAuthMiddleware
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
        if(empty(now_shop_id())){
            if(admin()->shop_type){
            return redirect($prefix.'/zcjy/storeShops');
            }
            else{
                return redirect($prefix.'/zcjy/selectShopRedirect/'.admin()->shops()->first()->id);
            }
        }
        return $next($request);
    }
}
