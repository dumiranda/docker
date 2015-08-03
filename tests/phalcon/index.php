<?php
use Phalcon\Mvc\Micro;
use Phalcon\Db\Adapter\Pdo\Mysql;

$app = new Micro();
$app->get('/hello/world', function() use($app) {
	echo 'Hello Phalcon';
});

$app->get('/country/list', function() use($app) {
	$connection = new Mysql(array(
        "host" => "127.0.0.1",
        'port' => 3306,
        "username" => "root",
        "password" => "root",
        "dbname" => "world"
    ));

    $result = $connection->fetchAll("SELECT * FROM Country LIMIT 10");

    $response = new \Phalcon\Http\Response();
	$response->setContentType('application/json', 'utf-8');
	$response->setContent(json_encode($result));

	return $response;
});

$app->handle();
