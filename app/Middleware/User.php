<?php


namespace App\Middleware;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use App\Services\Auth\User as AuthUser;

class User
{
    use Helper;

    /**
     * @param ServerRequestInterface $request
     * @param ResponseInterface $response
     * @param $next
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $next)
    {
        $user = $this->getUserFromReq($request);
        AuthUser::setUser($user);
        $response = $next($request, $response);
        return $response;
    }


}