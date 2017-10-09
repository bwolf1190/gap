<?php namespace App\Http\Middleware;

use Closure;

class MustBeAdmin
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
        // if nobody is logged in, return redirect to the homepage
        if(is_null($request->user())){
            return redirect('/');
        }

        $user = $request->user();

        if($user->role === 'admin'){
            return $next($request);
        }
        elseif($user->role === 'broker'){
            return $next($request);
        }
        else{
            abort(404, 'Forbidden');
        }

    }
}
