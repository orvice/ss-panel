<?php


namespace App\Controllers\Api;

use Slim\Http\Request;
use Slim\Http\Response;
use App\Controllers\BaseController;
use App\Utils\Ss as SsUtil;
use App\Contracts\Codes\Cfg;

class ConfigController extends BaseController implements Cfg
{

    /**
     * @SWG\Definition(definition="Configs", type="object", required={""})
     */

    /**
     * @SWG\Get(
     *     path="/config",
     *     summary="Get Config",
     *     tags={"config"},
     *     description="Get config of site",
     *     produces={ "application/json"},
     *     @SWG\Response(
     *         response=200,
     *         description="successful operation",
     *         @SWG\Schema(
     *             type="array",
     *             @SWG\Items(ref="#/definitions/Configs")
     *         ),
     *     ),
     *     @SWG\Response(
     *         response="400",
     *         description="Invalid tag value",
     *     ),
     * )
     */

    public function index(Request $request, Response $response, $args)
    {
        // @todo
        $data = [
            'app' => db_config(self::AppName,'ss-panel4'),
            'index_message' => db_config(self::HomeMessage,'Like a butterfly...'),
            'analyticsId' => db_config(self::GoogleAnalyticsId,''),
            'version' => get_version(),
        ];
        return $this->echoJsonWithData($response, $data);
    }

    public function ss(Request $request, Response $response, $args)
    {
        return $this->echoJsonWithData($response, [
            "methods" => SsUtil::getCipher(),
            "protocol" => SsUtil::getProtocol(),
            "obfs" => SsUtil::getObfs(),
        ]);
    }
}