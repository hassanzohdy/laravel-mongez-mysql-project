<?php

namespace App\Modules\Users\Middleware;

use Closure;
use Auth as BaseAuth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class Auth
{
    /**
     * Application key
     * 
     * @var string
     */
    protected $apiKey;

    /**
     * Application type
     * 
     * @var string
     */
    protected $appType;

    /**
     * List of ignored routes that should not have any auth which is not RECOMMENDED for senstive data
     * 
     * @var array
     */
    protected $ignoredRoutes = [
    ];

    /**
     * Routes that does not have permissions in admin app
     * 
     * @var array
     */
    protected $ignoredAdminRoutes = ["/api/admin/login"];

    /**
     * Routes that does not have permissions in site app
     * 
     * @var array
     */
    protected $ignoredSiteRoutes = ['/api/login', '/api/register'];

    /**
     * {@inheritDoc}
     */
    public function handle(Request $request, Closure $next)
    {
        $this->apiKey = env('API_KEY');

        // set default auth
        $guardInfo = config('auth.guards.admin');
        config([
            'auth.defaults.guard' => 'admin',
            'app.type' =>'admin',
            'app.users-repo' => $guardInfo['repository'],
            'app.user-type' => $guardInfo['repository'],
        ]);
        return $this->middleware($request, $next); 
    }

    /**
     * {@inheritDoc}
     */
    protected function middleware(Request $request, Closure $next)
    {
        $ignoredRoutes = $this->appType == 'admin' ? $this->ignoredAdminRoutes : $this->ignoredSiteRoutes;
        
        if (in_array($request->uri(), $ignoredRoutes)) {
            if ($request->authorizationValue() !== $this->apiKey) {
                return response([
                    'error' => 'Invalid Request I',
                ], Response::HTTP_UNAUTHORIZED);
            }

            return $next($request);
        } else {
            // validate if and only if the authorization access token is sent
            list($tokenType, $accessToken) = $request->authorization();

            if ($tokenType == 'Bearer') {
                $user = repo(config('app.users-repo'))->getByAccessToken($accessToken);
                if ($user) {
                    BaseAuth::login($user);

                    return $next($request);
                } else {
                    return response([
                        'error' => 'Invalid Request II',
                    ], Response::HTTP_UNAUTHORIZED);
                }
            } else {
                if ($accessToken != $this->apiKey) {
                    return response([
                        'error' => 'Invalid Request III',
                    ], Response::HTTP_UNAUTHORIZED);
                }
                return $next($request);
            }
        }
    }
}
