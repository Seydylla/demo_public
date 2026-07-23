<?php

require 'Vaildator.php';

$config = require 'config.php';
$db = new Database($config['database']);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $errors = [];

    $validator = new Validator();

    if(! $validator->string($_POST['title'], 1, 20)) {
        $errors['title'] = 'The title willl 20 be required';
    }

    if(! $validator->string($_POST['header'], 1, 100)) {
        $errors['header'] = 'The header wont be more than 100';
    }

    if(! $validator->string($_POST['article_description'], 1, 1000)) {
        $errors['article'] = 'The article wont be more than 1000';
    }

    if(empty($errors)) {

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
    $article_description = $_POST['article_description']; // HTML form uses name="content"
    $date = date('Y-m-d'); // Getting auto time

    // Execute SQL using all 8 placeholders
    $db->query('
        INSERT INTO articles (title, catagory, header, img, article_description, read_time, writer_id, date) 
        VALUES (:title, :catagory, :header, :img, :article_description, :read_time, :writer_id, :date)
    ', [
        'title'               => $title,
        'catagory'            => $catagory,
        'header'              => $header,
        'img'                 => $fileName,
        'article_description' => $article_description,
        'read_time'           => $read_time,
        'writer_id'           => $writer_id,
        'date'                => $date
    ]);

    // Redirect to the articles listing page after saving
    header('Location: /articles');
    exit();
    }
}

require 'views/article-create.view.php';