<?php

$config = require 'config.php';
$db = new Database($config['database']);

// 1. If loaded via GET request, display the form
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    require 'views/article-create.view.php';
    exit();
}

// 2. If submitted via POST, store the data into the database
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Grab submitted inputs securely
    $title = $_POST['title'];
    $catagory = $_POST['catagory'];
    $header = $_POST['header'];
    $img = $_POST['img'];
    $read_time = $_POST['read_time'];
    $writer_id = $_POST['writer_id'];
    $date = date('M d, Y'); // Generates current date e.g., "Jul 22, 2026"

    // Execute SQL insertion using prepared statements
    $db->query('
        INSERT INTO articles (title, catagory, header, img, read_time, writer_id, date) 
        VALUES (:title, :catagory, :header, :img, :read_time, :writer_id, :date)
    ', [
        'title'     => $title,
        'catagory'  => $catagory,
        'header'    => $header,
        'img'       => $img,
        'read_time' => $read_time,
        'writer_id' => $writer_id,
        'date'      => $date
    ]);

    // Redirect to the articles listing page after saving
    header('Location: /articles');
    exit();
}