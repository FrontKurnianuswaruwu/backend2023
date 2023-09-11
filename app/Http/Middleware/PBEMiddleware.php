<?php

namespace App\Http\Middleware;
use App\Models\UserToken;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PBEMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if($request->header('pbe_token') === null){
            return \response()->json([
                'message' => 'Silahkan Login Terlebih Dahulu'
            ], 401);
        }else{
            $token = $request->header('pbe_token');
            $user_Token = UserToken::where('token', $token)
                ->where('expired','>',date('Y-m-d H:i:s'))->first();
            if($user_Token === null){
                return \response()->json([
                    'message' => 'Silahkan Login Terlebih '
                ], 401);
            }
        }
        return $next($request);
    }
}
