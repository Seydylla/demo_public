<?php

require "functions.php";
// require 'router.php';

// Creating new pdo class and connect database
$dsn = "mysql:host=localhost;port=3306;dbname=mydemo;user=root;charset=utf8mb4";
$pdo = new PDO($dsn);

$statement = $pdo->prepare("select * from posts");
$statement->execute();

$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>" . $post['title'] . "</li>";
}