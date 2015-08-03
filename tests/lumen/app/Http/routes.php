<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

$app->get('/lumen/hello/world', function() {
	return 'Hello Lumen';
});

$app->get('/lumen/country/list', function() {
        $result = app('db')->select("SELECT * FROM Country LIMIT 10");
	return response()->json($result);
});
