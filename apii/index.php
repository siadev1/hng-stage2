<?php
include __DIR__ . '/vendor/autoload.php';


use Phroute\Phroute\Dispatcher;
use Phroute\Phroute\RouteCollector;



$collector = new RouteCollector();


$collector->delete('/api', function(){
    require_once'api1.php';
});


$collector->post('/api', function(){
    require_once'api1.php';
});

$collector->get('/api', function(){
    require_once'api1.php';
});


$collector->put('/api', function(){
    require_once'api1.php';
});


$dispatcher =  new Dispatcher($collector->getData());
try {
    $response = $dispatcher->dispatch($_SERVER['REQUEST_METHOD'], parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
    echo $response;
} catch (\Phroute\Phroute\Exception\HttpRouteNotFoundException $e) {
    header('HTTP/1.0 404 Not Found');
    echo '404 Page Not Found';
} catch (\Phroute\Phroute\Exception\HttpMethodNotAllowedException $e) {
    header('HTTP/1.0 405 Method Not Allowed');
    echo '405 Method Not Allowed';
}





























?>
