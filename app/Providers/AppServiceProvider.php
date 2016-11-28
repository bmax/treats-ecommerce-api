<?php

namespace Treats\Providers;

use Illuminate\Http\Request;
use Illuminate\Support\ServiceProvider;
use Treats\Http\Kernel;
use Treats\Http\Middleware\Cors;

class AppServiceProvider extends ServiceProvider {

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot( Request $request, Kernel $kernel ) {

        \Braintree_Configuration::environment( config( 'services.braintree.environment' ) );
        \Braintree_Configuration::merchantId(  config( 'services.braintree.merchant_id' ) );
        \Braintree_Configuration::publicKey(   config( 'services.braintree.public_key'  ) );
        \Braintree_Configuration::privateKey(  config( 'services.braintree.private_key' ) );

    } // boot

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {

    } // register

} // AppServiceProvider
