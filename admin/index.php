<?php include('partials/menu.php'); ?>

       
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <h1>Panel administratora</h1>

        </div>
<?php include('partials/footer.php'); ?>