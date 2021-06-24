<?php 

    include('../config/constants.php');

    $id = $_GET['id'];

    $sql= "DELETE FROM users WHERE user_id=$id";


    $res= mysqli_query($conn, $sql);

    if($res==true)
    {
        $_SESSION['delete']= "Usunieto uzytkownika!";
        header('location:'.SITEURL.'/admin/manage-user.php');

    }
    else {
       
        $_SESSION['delete']= "Blad w usuwaniu...";
        header('location:'.SITEURL.'/admin/manage-user.php');
    }
?>