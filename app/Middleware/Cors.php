<?php


namespace App\Middleware;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Utils\Http;
use App\Contracts\Codes\Cfg;

class Cors implements Cfg
{
    use Helper;

    public function __invoke(Request $request, Response $response, $next)
    {
        $origin = $request->getHeaderLine('Referer');
        $response = $next($request, $response);
        return $response
            ->withHeader('Access-Control-Allow-Origin', $this->getACAL($origin))
            ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
            ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, OPTIONS');
    }

    /**
     * @param $origin
     * @return string
     */
    public function getACAL($origin)
    {
        $host = Http::getHostFromOrigin($origin);
        if (in_array($host, $this->getAllowDomainsList())) {
            return $origin;
        }
        return '';
    }

    /**
     * @return array
     */
    public function getAllowDomainsList()
    {
        $hosts = db_config(self::CorsHosts);
        return explode(',', $hosts, -1);
    }
}