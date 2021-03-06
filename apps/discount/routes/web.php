<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
 */

$router->get('/', function () use ($router) {
    return "discount microservice: " . $router->app->version();
});

$router->post('campaigns/', 'CampaignsController@store');
$router->post('campaigns/demand', 'CampaignsController@demand');
$router->get('users-campaigns', 'UsersCampaignsController@getUsers');
