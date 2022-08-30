<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

// Routes system
$routes = new RouteCollection();
$routes->add('home', new Route(constant('URL_SUBFOLDER') . '/', array('controller' => 'PageController', 'method'=>'indexAction'), array()));

$routes->add('user', new Route(constant('URL_SUBFOLDER') . '/user/{id}', array('controller' => 'UserController', 'method'=>'showAction'), array('id' => '[0-9]+')));
$routes->add('deleteAll', new Route(constant('URL_SUBFOLDER') . '/users/delete', array('controller' => 'UserController', 'method'=>'deleteAll'), array('id' => '[0-9]+')));
$routes->add('users', new Route(constant('URL_SUBFOLDER') . '/users', array('controller' => 'UserController', 'method'=>'showAll')));

$routes->add('upload', new Route(constant('URL_SUBFOLDER') . '/upload', array('controller' => 'ImportController', 'method'=>'uploadAction'), array()));

?>