<?php

$config = require 'config.php';
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $targetDir = "images/";

    // Get the uploaded file name
    $fileName = basename($_FILES['img']['name']); 
    $targetPath = $targetDir . $fileName;

    // Optional: Move uploaded file to images/ directory
    if (isset($_FILES['img']['tmp_name']) && $_FILES['img']['tmp_name'] != '') {
        move_uploaded_file($_FILES['img']['tmp_name'], $targetPath);
    }
    
    // Grab data
    $title = $_POST['title'];
    $catagory = $_POST['catagory'];
    $header = $_POST['header'];
    $read_time = $_POST['read_time'];
    $writer_id = $_POST['writer_id'];
    $date = date('Y-m-d'); // Getting auto time

    // Execute SQL using the original 'img' column name
    $db->query('
        INSERT INTO articles (title, catagory, header, img, read_time, writer_id, date) 
        VALUES (:title, :catagory, :header, :img, :read_time, :writer_id, :date)
    ', [
        'title'     => $title,
        'catagory'  => $catagory,
        'header'    => $header,
        'img'       => $fileName, // Insert file name into 'img' column
        'read_time' => $read_time,
        'writer_id' => $writer_id,
        'date'      => $date
    ]);

    // Redirect to the articles listing page after saving
    header('Location: /articles');
    exit();
}

require 'views/article-create.view.php';