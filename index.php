<?php include('partials-front/menu.php') ?>
    <section class="food-search text-center">
        <div class="container">

        </div>
    </section>


    <section class="categories">
        <div class="container">
            <h2 class="text-center">Polecane kategorie</h2>

            <?php
                $sql = "SELECT * from category WHERE featured=1";
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
                        <a href="category-foods.html">
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

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Dania</h2>

            <?php
                $sql = "SELECT * from food";
                $res = mysqli_query($conn, $sql);
                $count= mysqli_num_rows($res);
                if ($count >0)
                {
                    while($row=mysqli_fetch_assoc($res))
                    {
                        $id= $row['food_id'];
                        $name = $row['name'];
                        $image_url=$row['image_url'];
                        $description=$row['description'];
                        $price= $row['price'];
                    
                    ?>
                        <div class="food-menu-box">
                            <div class="food-menu-img">
                                <img src="<?php echo $image_url ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            </div>

                            <div class="food-menu-desc">
                                <h4><?php echo $name ?></h4>
                                <p class="food-price"><?php echo $price ?>zł</p>
                                <p class="food-detail">
                                <?php echo $description ?>
                                </p>
                                <br>

                                <a href="order.html" class="btn btn-primary">Zamów</a>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                {
                    echo "<div> W bazie nie ma żadnych dań</div>";
                }
                ?>

            <div class="clearfix"></div>
        </div>

    </section>
    <?php include('partials-front/footer.php') ?>