<?php

$config = require 'config.php';
$db = new Database($config['database']);

$articles = [];

$articles = $db->query('select * from articles')->fetchAll();

require 'views/articles.view.php';