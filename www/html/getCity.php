<?php

    require_once "dbconnect.php";

    $stmt = $conn->query("SELECT * FROM zipcode");

    $data = array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
    {
        $data[] = $row;
    }

    echo json_encode($data);
?>