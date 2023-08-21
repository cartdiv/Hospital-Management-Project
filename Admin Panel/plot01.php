<?php

    header('Content-Type: application/json');

    define('DB_HOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'hospital');

    $mysqli = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if(!$mysqli){
        die("connection faild: " . $mysqli->error);
    }

    $query = "SELECT count(bed_booking.hid) as no_bed, hospital.name FROM bed_booking,hospital WHERE hospital.id = bed_booking.hid GROUP BY hospital.name ORDER BY count(bed_booking.hid) DESC LIMIT 5";

    $result = $mysqli->query($query);
    $data = array();
    foreach($result as $row){
        $data[] = $row;
    }

    $result->close();
    $mysqli->close();

    print json_encode($data);


?>