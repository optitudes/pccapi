<?php
// MySQL database parameters
 $database = "pcc_db";
 $user = "root";
 $password = "test";
 $host = "db";

// Attempt to connect to the database
 $mysqli= new mysqli($host, $user , $password , $database );

// Check if the connection was successful
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL:  ". $mysqli->connect_error;
} else {
    echo "Connected to MySQL successfully!";
}

// Close the database connection
$mysqli->close();
?>

