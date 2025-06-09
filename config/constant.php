<?php 

    ob_start();

    session_start();

    define('SITEURL', 'http://localhost/projectuas/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'bike-rental');

    $conn = mysqli_connect(hostname: LOCALHOST, username: DB_USERNAME, password: DB_PASSWORD, database: DB_NAME, port: 3306);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }