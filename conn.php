<?php
$servername = "localhost"; // your database server
$username = "u481187344_db_fikes";        // your database username
$password = "DB_fikes12345";            // your database password
$dbname = "u481187344_db_fikes"; // your database name


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// url localhost
$base_url = "https://fikes.bhamada.id/";
