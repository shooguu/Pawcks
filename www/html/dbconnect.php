<?php
    require $_SERVER['DOCUMENT_ROOT'].'/../dbconfig.php';
    $host = DB_HOST;
    $root = DB_USER;
    $password = DB_PASSWORD;
    $dbname = DB_DATABASE;
    try 
    {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $root, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo ("DB should be connected.");
    } 
    catch (PDOException $e) 
    {
        die("Cannot connect to Database: " . $e->getMessage());
    } 
?>
