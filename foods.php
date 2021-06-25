<?php include('partials-front/menu.php') ?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
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