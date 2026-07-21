<?php

$config = require 'config.php';
$db = new Database($config['database']);


$id = $_GET['id'] ?? null;
$currentUser = 1;


$article = $db->query('select * from articles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($currentUser === $article['writer_id']);
require 'views/article.view.php';