<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class AdminAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user(); // đảm bảo hoạt động trong mọi context

        if (!$user || !$user->is_admin) {
            return redirect('/')->with('error', 'Bạn không có quyền truy cập.');
        }

        return $next($request);
    }
  // with mess ấy phải khai báo mới hiện nhé !! 


    // test lỗi xem có nhận authentication không 
//     public function handle(Request $request, Closure $next): Response
// {
//     dd('Middleware chạy'); // test thử
//     // ...
// }

}
