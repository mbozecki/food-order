<?php include('partials-front/menu.php') ?>


<?php 
    if (isset($_GET['id']))
    {
        $category_id= $_GET['id']; // tu przekazuje id ze strony głównej do wyswietlania dan w podanej kategorii
        $sql= "SELECT name FROM food WHERE food_id=$category_id";
        $res= mysqli_query($conn, $sql);
        $row= mysqli_fetch_assoc($res);
        $category_title=$row['name'];

    }
    else{
        header('Location:'.SITEURL);
    }

    ?>
    <section class="food-search text-center">
        <div class="container">
            
            <h2>Kategoria: <a href="#" class="text-white"><?php echo $category_title?></a></h2>

        </div>
    </section>
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Dania z kategorii</h2>

            <?php
                $sql = "SELECT * from food where c_id=$category_id";
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

                                <a href="order.html?id=<?php echo $id?>" class="btn btn-primary">Zamów</a>
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