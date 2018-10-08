<?php

/**
 * Created by PhpStorm.
 * User: alive
 * Date: 10/7/18
 * Time: 5:22 PM
 */

namespace Alive2212\LaravelEchargeService\Http\Controllers;

use Alive2212\LaravelEchargeService\LaravelEchargeService;
use Alive2212\LaravelEchargeService\Models\Response\TopUpResponse;
use Alive2212\LaravelSmartResponse\ResponseModel;
use Alive2212\LaravelSmartResponse\SmartResponse\SmartResponse;
use Alive2212\LaravelSmartRestful\BaseController;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CustomEchargeController extends BaseController
{
    /**
     * echarge object
     *
     * @var
     */
    protected $echargeService;

    /**
     * paths for onion design pattern
     *
     * @var array
     */
    protected $paths = [
        'storeTopUp' => [
            [
                'Alive2212\LaravelEchargeService\Http\Controllers\CustomEchargeController',
                'getTopUpResponse',
            ],
            [
                'Alive2212\LaravelEchargeService\Http\Controllers\CustomEchargeController',
                'responseSuccessful',
            ],
        ],
    ];

    /**
     * @return mixed
     */
    public function initController()
    {
        $this->middleware([
            'auth:api',
        ]);
    }

    public function storeTopUp(Request $request)
    {
        return $this->handler($this->paths[__FUNCTION__], $request);
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse
     */
    public function getTopUpResponse(Request $request, Closure $next):JsonResponse
    {
//        dd($request['reference_id'],
//            $request['mobile_number'],
//            $request['amount'],
//            $request['product_id']);
        $topUpResponse = $this->getEchargeService()->registerTopUp(
            $request['reference_id'],
            $request['mobile_number'],
            $request['amount'],
            $request['product_id']);
//        dd('meshe man nabasham ta ke to bashi');
//        dd($topUpResponse);
//        if ($topUpResponse->getResultCode() != 0) {
//            return $this->responseFailed($request);
//        }
//        dd([
//            'response_data' => $topUpResponse->toArray(),
//        ]);
        $request->request->add([
            'response_data' => $topUpResponse->toArray(),
        ]);

//        dd(($request));
        return $next($request);
    }

    public function registerVoucher(Request $request)
    {
        //
    }

    public function isProductAvailable(Request $request)
    {
        //    
    }

    public function getStatus(Request $request)
    {
        //
    }

    public function getBalance(Request $request)
    {
        //
    }

    public function revealVoucher(Request $request)
    {
        //
    }

    public function getInternetPackage(Request $request)
    {
        //
    }

    /**
     * get echarge service
     *
     * @return LaravelEchargeService
     */
    public function getEchargeService(): LaravelEchargeService
    {
        if (is_null($this->echargeService)) {
            $this->echargeService = new LaravelEchargeService();
        }
        return $this->echargeService;
    }

    /**
     * response successful
     *
     * @param Request $request
     * @param Closure $next
     * @return JsonResponse
     */
    public function responseSuccessful(Request $request,Closure $next)
    {
        $response = new ResponseModel();
        $response->setData(collect($request['response_data']));
        $response->setMessage($this->getTrans(__FUNCTION__, 'successful'));
        return SmartResponse::response($response);
    }

    /**
     * response failed
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function responseFailed(Request $request): JsonResponse
    {
        $response = new ResponseModel();
        $response->setData($request['response_data']);
        $response->setMessage($this->getTrans(__FUNCTION__, 'failed'));
        return SmartResponse::response($response);
    }

    /**
     * @param LaravelEchargeService $echargeService
     * @return $this
     */
    public function setEchargeService(LaravelEchargeService $echargeService)
    {
        $this->echargeService = $echargeService;
        return $this;
    }
}