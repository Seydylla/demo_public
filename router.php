<?php

$uri = parse_url($_SERVER['REQUEST_URI']) ['path'];

$routes = [
    '/' => 'controllers/index.php',
    '/articles' => 'controllers/articles.php',
    '/article' => 'controllers/article.php',
    '/article/create' => 'controllers/article-create.php',
    '/about' => 'controllers/about.php',
];


function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
        require $routes[$uri];
    } else {
        abort(404);
    }
}


function abort($code = 404) {
    http_response_code(404);

    require "views/{$code}.php";

    die();
}

routeToController($uri, $routes);