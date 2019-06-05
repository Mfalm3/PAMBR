<?php

require __DIR__.'/../vendor/autoload.php';


use Mfalm3\Router\Router;
use Mfalm3\Router\Request;
use Mfalm3\View\Html;
use Mfalm3\Files\{Handler, Parser};

$router = new Router(new Request);
$render = new Html();
$parser = new Parser();

$router->get('/', function() use ($render) {
    return $render->view('index');
});

$router->post('/uploads', function($request) use ($render, $parser) {

    Handler::upload();
   return $render->redirect('/');
});


$router->get('/profile', function($request) {
    return <<<HTML
  <h1>Profile</h1>
HTML;
});


$router->post('/data', function($request) {
    return json_encode($request->getBody());
});