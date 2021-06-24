<?php include('partials/menu.php'); ?>

        <div class="main-content">
        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
        <h1>Panel administratora</h1>
                <div class="col-4 text-center">
                    <h1>5</h1>
                    <br />
                    Kategoriee
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    </br>
                    Kategoriee
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    </br>
                    Kategoriee
                </div>

                <div class="col-4 text-center">
                    <h1>5</h1>
                    </br>
                    Kategoriee
                </div>

                <div class="clearfix"></div>
            
        </div>
<?php include('partials/footer.php'); ?>