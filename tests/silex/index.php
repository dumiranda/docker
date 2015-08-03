<?php
// web/index.php
require_once __DIR__. '/vendor/autoload.php';

use Symfony\Component\HttpFoundation\Response;

$app = new Silex\Application();

$app->register(new Silex\Provider\DoctrineServiceProvider(), array(
    'db.options' => array (
            'driver'    => 'pdo_mysql',
            'host'      => '127.0.0.1',
            'dbname'    => 'world',
            'user'      => 'root',
            'password'  => 'root',
            'charset'   => 'utf8mb4',
    )
));

$app->error(function (\Exception $e, $code) {
    return new Response($e);
});

$app->get('/hello/world', function (Silex\Application $app) {
	return 'Hello Silex';
});

$app->get('/country/list', function (Silex\Application $app) {
	$result = $app['db']->fetchAll('SELECT * FROM Country LIMIT 10');
	return $app->json($result);
});

$app->run();
