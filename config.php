<?php
    $mysqlDatabaseName = "phonebook";
    $servername = "localhost";
    $username = "root";
    $password = "pC020889";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $mysqlDatabaseName);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>