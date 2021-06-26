<?php include('config/constants.php');
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <link rel="stylesheet" href="css/style.css">
</head>

<body>

<section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/logo.png" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo SITEURL;?>">Strona główna</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>/categories.php">Kategorie</a>
                    </li>
                    <li>
                        <a href="<?php echo SITEURL;?>/foods.php">Dania</a>
                    </li>
                    <li>
                        <?php
                                if(isset($_SESSION['user']))
                                {
                                    ?><a href="<?php echo SITEURL;?>/admin/logout.php">Wyloguj się</a>
                                    <?php
                                }
                                else
                                {
                                   ?> <a href="<?php echo SITEURL;?>/login.php">Zaloguj się</a>
                                   <?php
                                }
                                ?>
                                
                        
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
