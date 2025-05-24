<?php
    define("HOSTNAME", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "");
    define("DATABASE", "db_pos");

    // define("HOSTNAME", "localhost");
    // define("USERNAME", "u998327346_user");
    // define("PASSWORD", "noobCoder1234");
    // define("DATABASE", "u998327346_db");

    try{
        $conn = new Mysqli(HOSTNAME, USERNAME, PASSWORD, DATABASE);
        if(!$conn){
            die('Connection failure!'. mysqli_connect_error()); 
        }
    }
    catch(Exception $e){
        die($e->getMessage());
    }

    date_default_timezone_set("Asia/Manila");
    
?>
