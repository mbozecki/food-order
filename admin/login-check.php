<?php

    if(!isset($_SESSION['admin']))
    {
        $_SESSION['no-login-message']= "<div> Musisz byc zalogowany aby to przejrzeć";
        header('Location:'.SITEURL.'/login.php');
    }
?>