<?php 

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql= "DELETE FROM category WHERE category_id=$id";


    $res= mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete']= "Usunieto kategorie!";
        header('location:'.SITEURL.'/admin/manage-category.php');

    }
    else {
       
        $_SESSION['delete']= "Blad w usuwaniu kategorii... możliwe że tej kategorii używa któreś z dań!";
        header('location:'.SITEURL.'/admin/manage-category.php');
    }
?>