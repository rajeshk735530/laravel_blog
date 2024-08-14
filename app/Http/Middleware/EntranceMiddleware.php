<?php

// namespace App\Http\Middleware;

// use Closure;
// use Illuminate\Http\Request;

// class EntranceMiddleware
// {
//     /**
//      * Handle an incoming request.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
//      * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
//      */
//     public function handle(Request $request, Closure $next)
//     {
//         $input = $request->data;
//         if($input>=100)
//             return $next($request);
//         else
//             echo "Your request can not be processed";
//         die;
//     }
// }
