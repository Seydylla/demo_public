<?php

$config = require 'config.php';
$db = new Database($config['database']);

$id = $_GET['id'] ?? null;


$article = $db->query('select * from articles where id = :id', [
    'id' => $_GET['id']
])->findOrFail();
require 'views/article.view.php';