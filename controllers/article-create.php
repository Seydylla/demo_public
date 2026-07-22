<?php

$config = require 'config.php';
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Grab data
    $title = $_POST['title'];
    $catagory = $_POST['catagory'];
    $header = $_POST['header'];
    $img = $_POST['img'];
    $read_time = $_POST['read_time'];
    $writer_id = $_POST['writer_id'];
    $date = date('Y-m-d'); // Getting auto time

    // Execute SQL
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

require 'views/article-create.view.php';