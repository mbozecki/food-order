<?php include('partials-front/menu.php') ?>

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Wszystkie kategorie</h2>

            <?php
                $sql = "SELECT * from category";
                $res = mysqli_query($conn, $sql);
                $count= mysqli_num_rows($res);
                if ($count >0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id= $row['category_id'];
                        $name = $row['name'];
                        $image_url=$row['image_url'];
                    
                    ?>
                        <a href="category-foods.html?id=<?php echo $id?>">
                        <div class="box-3 float-container">
                        <img src="<?php echo $image_url?>" alt="<?php echo $name?>" class="img-responsive img-curve">

                        <h3 class="float-text text-white"><?php echo $name?></h3>
                        </div>
                        </a>
                        <?php
                    }
                }
                else
                {
                    echo "<div> W bazie nie ma żadnych polecanych kategorii</div>";
                }
                ?>
            

            <div class="clearfix"></div>
        </div>
    </section>

    <?php include('partials-front/footer.php') ?>