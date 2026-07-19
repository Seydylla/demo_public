<?php

$config = require 'config.php';
require 'Database.php';
$db = new Database($config['database']);

$id = $_GET['id'] ?? null;

if (!$id) {
    // Redirect or abort if no ID is provided
    abort(404);
}


$article = $db->query('select * from articles where id = :id', ['id' => $_GET['id']])->fetch();
require 'views/article.view.php';