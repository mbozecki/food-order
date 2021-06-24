<?php

    session_start();
        //polacz sie z baza
    define('SITEURL', 'http://localhost/food-order');
    
    $conn= mysqli_connect('localhost','root','') or die("couldnt connect");
    $db_select= mysqli_select_db($conn, 'shop_table') or die("couldt connect do database");

?>