<?php

function connect()
{
    // Create connection
    $conn = new mysqli(SERVERNAME, USERNAME, PASSWORD, DBNAME);
    mysqli_set_charset($conn, "utf8");
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

function select($conn){
    $sql = "SELECT * FROM info";
    $result = mysqli_query($conn, $sql);
    
    $a = array();
    
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            $a[] = $row;
        }
    
    } else {
        echo "0 results";
    }

    return $a;
}

function close($conn) {
    mysqli_close($conn);
}