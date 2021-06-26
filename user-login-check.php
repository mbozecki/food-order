<?php

    if(!isset($_SESSION['user']))
    {
        $_SESSION['no-login-message']= "<div> Musisz byc zalogowany aby to przejrzeć";
        header('Location:'.SITEURL.'/login.php');
    }
?>