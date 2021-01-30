<?php
namespace App\Http;

class BloodyCors
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     *
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        // pred('s');    
        $request->headers->set('Access-Control-Allow-Origin', '*');
        $request->headers->set('Access-Control-Allow-Methods', '*');
        $request->headers->set('Access-Control-Allow-Headers', '*');
        $request->headers->set('Cache-Control', 'max-age=0');
        // header("Access-Control-Allow-Origin: *");
        // header('Access-Control-Allow-Methods: *');
        // header("Access-Control-Allow-Headers: *");
        // header('Cache-Control: max-age=0');

        return $next($request);
    }
}
