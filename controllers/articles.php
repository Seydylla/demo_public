<?php

$config = require 'config.php';
require 'Database.php';
$db = new Database($config['database']);

$articles = [];

$articles = $db->query('select * from articles')->fetchAll();
$authorsData = $db->query('select * from writer')->fetchAll();
$authors = [];
foreach ($authorsData as $author) {
    $authors[$author['id']] = $author;
}

require 'views/articles.view.php';