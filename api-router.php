<?php

require_once './libs/Router.php';
require_once './app/controllers/peliculas.controller.php';
require_once './app/controllers/generos.controller.php';
require_once './app/controllers/review.controller.php';

$router = new Router();

$router->addRoute('peliculas', 'GET', 'peliculasController', 'getPeliculas');
$router->addRoute('peliculas/:ID', 'GET', 'peliculasController', 'getPelicula');
$router->addRoute('peliculas/:ID', 'PUT', 'peliculasController', 'editarPelicula');
$router->addRoute('peliculas', 'POST', 'peliculasController', 'addPelicula');

$router->addRoute('generos', 'GET', 'generosController', 'getGeneros');
$router->addRoute('generos/:ID', 'GET', 'generosController', 'getgenero');
$router->addRoute('generos/:ID', 'PUT', 'generosController', 'editarGenero');
$router->addRoute('generos', 'POST', 'generosController', 'addGenero');

$router->addRoute('comentarios', 'GET', 'reviewController', 'getComentarios');
$router->addRoute('comentarios/:ID', 'GET', 'reviewController', 'getComentario');
$router->addRoute('comentarios/:ID', 'PUT', 'reviewController', 'editarComentario');
$router->addRoute('comentarios', 'POST', 'reviewController', 'addComentario');


$router->route($_GET["resource"], $_SERVER['REQUEST_METHOD']);
