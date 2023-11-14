<?php

require '../vendor/autoload.php';

use M2i\Mvc\App;

$app = new App();
// Ligne utile que si on ne fait pas "php -S ..."
// $app->setBasePath('/poo/06-mvc/public');

// Toutes les routes du site
$app->addRoutes([
    ['GET', '/', 'HomeController@index'],
    ['GET', '/books', 'BookController@list'],
    ['GET', '/books/[i:id]', 'BookController@show'],
    ['GET|POST', '/books/creer', 'BookController@create'], //l'url doit être en post et get car pour l'afficher, on a besoin de get et lors de la requête du create, on utilise un post
    ['GET|POST', '/book/[i:id]/delete', 'BookController@delete'], //l'url doit être en post et get car pour l'afficher, on a besoin de get et lors de la requête du delete, on utilise un post

]);

// Lancer l'application
$app->run();
