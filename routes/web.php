<?php

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'products', 'namespace' => 'V1'], function () use ($router) {
    $router->get('', 'ProductController@index');
    $router->post('', 'ProductController@store');
    $router->get('{id}', 'ProductController@show');
    $router->put('{id}', 'ProductController@update');
    $router->delete('{id}', 'ProductController@destroy');
});

$router->group(['prefix' => 'requests',  'namespace' => 'V1'], function () use ($router) {
    $router->get('', 'RequestController@index');
    $router->post('', 'RequestController@store');
    $router->get('{id}', 'RequestController@show');
    $router->put('{id}', 'RequestController@update');
    $router->delete('{id}', 'RequestController@destroy');
});

$router->group(['prefix' => 'customers',  'namespace' => 'V1'], function () use ($router) {
    $router->get('', 'CustomerController@index');
    $router->post('', 'CustomerController@store');
    $router->get('{id}', 'CustomerController@show');
    $router->put('{id}', 'CustomerController@update');
    $router->delete('{id}', 'CustomerController@destroy');
});