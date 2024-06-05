<?php
    #START SESSION, DON'T DISPLAY ERROR, SET TIME ZONE TO MANILA
    session_start();
    ini_set('display_errors', 0);
    date_default_timezone_set("Asia/Manila");

    #REMEMBER LOGIN
    $isLoggedIn = $_SESSION['login'];

    #REMEMBER ROLE
    $role = $_SESSION['role'];

    if(isset($_COOKIE['isLoggedIn'])){
        $isLoggedIn = isset($_COOKIE['isLoggedIn']);
    }

    #DATABASE CONNECTION
    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "pawsvet_db");

    $connection = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);

    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
      }
?>