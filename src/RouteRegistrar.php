<?php

namespace Alive2212\LaravelEchargeService;

use Illuminate\Contracts\Routing\Registrar as Router;
use Illuminate\Routing\Route;

class RouteRegistrar
{
    /**
     * base CRUD full prefix
     *
     * @var string
     */
    protected $BASE_RESTFUL_PREFIX = '/v1/alive/';

    /**
     * base custom prefix
     *
     * @var string
     */
    protected $BASE_CUSTOM_PREFIX = '/v1/custom/alive/';

    /**
     * package prefix
     *
     * @var string
     */
    protected $PACKAGE_PREFIX = '/echarge';

    /**
     * The router implementation.
     *
     * @var \Illuminate\Contracts\Routing\Registrar
     */
    protected $router;

    /**
     * Create a new route registrar instance.
     *
     * @param  \Illuminate\Contracts\Routing\Registrar $router
     */
    public function __construct(Router $router)
    {
        $this->router = $router;
    }

    /**
     * Register routes for transient tokens, clients, and personal access tokens.
     *
     * @return void
     */
    public function all()
    {
        $this->forRestfulPayment();
        $this->forCustomPayment();
    }

    /**
     * Register the routes needed for authorization.
     *
     * @return void
     */
    public function forRestfulPayment()
    {
        $this->router->group([
            'prefix' => $this->BASE_RESTFUL_PREFIX,
        ], function (Router $router) {
            $router->group([
                'prefix' => $this->PACKAGE_PREFIX,
            ], function (Router $router) {
                // place your route here

//                $router->resource('model', 'Alive{PACKAGE_NAME}{MODEL_NAME}Controller');
            });
        });
    }

    /**
     * Register custom route of this package
     */
    public function forCustomPayment()
    {
        $this->router->group(
            [
                'prefix' => $this->BASE_CUSTOM_PREFIX,
            ],
            function (Router $router) {
                $router->group(
                    [
                        'middleware' => 'auth:api',
                    ],
                    function (Router $router) {
                        $router->group(
                            [
                                'prefix' => $this->PACKAGE_PREFIX,
                            ],
                            function (Router $router
                            ) {
                                // place your route here

                                $router->post(
                                    '/top_up/',
                                    'CustomEchargeController@storeTopUp'
                                );
                            });
                    });

            });
    }
}
