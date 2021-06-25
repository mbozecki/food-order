<?php 

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql= "DELETE FROM food WHERE food_id=$id";


    $res= mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete']= "Usunieto danie!";
        header('location:'.SITEURL.'/admin/manage-food.php');

    }
    else {
       
        $_SESSION['delete']= "Blad w usuwaniu dania... możliwe że to danie zamówił ktoryś użytkownik!";
        header('location:'.SITEURL.'/admin/manage-food.php');
    }
?>