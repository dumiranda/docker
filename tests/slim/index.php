<?php
require 'vendor/autoload.php';

$app = new \Slim\Slim();
$app->get('/hello/world', function () {
    echo "Hello Slim";
});
$app->run();
