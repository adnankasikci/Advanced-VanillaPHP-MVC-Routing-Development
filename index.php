<?php

require 'app/config/Autoload.php';

$router->get(base_url('/'), 'HomeController@index');
$router->get(base_url('/user'), 'UserController@index');

$router->get(base_url('/user/add'), 'UserController@add');
$router->get(base_url('/user/delete'), 'UserController@delete');
$router->get(base_url('/user/update'), 'UserController@update');

$route = $router->route($_SERVER['REQUEST_URI'], $_SERVER['REQUEST_METHOD']);

echo $route;

























// Object Make Method Get

// $router = new Router();
// $router->index();


// Static Method
// Router::index();










// Route::run('/uyeler', 'uyeler@post', 'post');
// Route::run('/uye/{url}', 'uye@index');
// Route::run('/profil/sifre-degistir', 'profile/changepassword@index');



// echo base_path('/');
// echo "<br>";
// echo base_url('/about');

// echo "<pre>";
// var_dump($router);
// echo "</pre>";
