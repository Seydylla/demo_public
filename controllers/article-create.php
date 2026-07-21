<?php

$config = require 'config.php';
$db = new Database($config['database']);

require 'views/article-create.view.php';