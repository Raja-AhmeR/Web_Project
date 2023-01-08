<?php
    
    $servername = "localhost";
    $dbname = "LibraryManagementSystem";
    $username = "root";
    $password = "";     // For this project we did not create the password for database.

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection error: " . $conn->connect_error);
    }
    // echo "Connection Successfully created..!";

    
?>