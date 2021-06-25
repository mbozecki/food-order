<?php include('partials-front/menu.php') ?>

    <?php
        if(isset($_GET['id']))
        {
            $food_id=$_GET['id'];
            $sql= "SELECT * FROM food WHERE food_id=$food_id";
            $res= mysqli_query($conn, $sql);
            $count= mysqli_num_rows($res);
            if ($count==1)
            {
                $row= mysqli_fetch_assoc($res);
                $name=$row['name'];
                $price=$row['price'];
                $image_url=$row['image_url'];

            }

        }
        else
        {
            header('Location:'.SITEURL);
        }

        ?>
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Zamów</h2>

            <form action="#" class="order">
                <fieldset>
                    <legend>Wybrane danie</legend>

                    <div class="food-menu-img">
                        <img src="<?php echo $image_url?>" alt="a" class="img-responsive img-curve">
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $name?></h3>
                        <p class="food-price"><?php echo $price?>zł</p>

                        <div class="order-label">Ilość</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Szczegóły zamówienia</legend>
                    <div class="order-label">Imię</div>
                    <input type="text" name="full-name" placeholder="E.g. Vijay Thapa" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@vijaythapa.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>

    <?php include('partials-front/footer.php') ?>