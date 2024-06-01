<?php
    session_start();
    ini_set('display_errors', 0);
    date_default_timezone_set("Asia/Manila");

    define("DBHOST", "localhost");
    define("DBUSER", "root");
    define("DBPASSWORD", "");
    define("DBNAME", "pawsvet_db");

    //$connection = new mysqli(DBHOST, DBUSER, DBPASSWORD, DBNAME);
?>