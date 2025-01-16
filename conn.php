<?php
$servername = "localhost"; // your database server
$username = "root";        // your database username
$password = "";            // your database password
$dbname = "dbfikes"; // your database name


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// url localhost
$base_url = "https://fikes.bhamada.id/";
