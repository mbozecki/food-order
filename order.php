<?php include('partials-front/menu.php');
    include('user-login-check.php')  ?>

    <?php
            $food_id=$_GET['id'];
            //$food_id=2;
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
        ?>
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Zamów</h2>

            <form action="#" method="POST" class="order">
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
                <?php
                if(isset($_SESSION['user']))
                {
                    $user_id=$_SESSION['user'];
                    $sql= "SELECT * FROM users WHERE user_id=$user_id";
                    $res= mysqli_query($conn, $sql);
                    $count= mysqli_num_rows($res);
                    if ($count==1)
                    {
                        $row= mysqli_fetch_assoc($res);
                        $name=$row['fname'];
                        $email =$row['email'];
                        //jezeli aid to null to trzeba dodac
                        if(!isset($row['a_id']))
                        {
                            
                            header('Location:'.SITEURL.'/add-address.php');
                            $_SESSION['address']="Najpierw musisz dodać adres do swojego konta!";
                        }
                        else
                        {
                            $aid=$row['a_id'];
                            $sql2="SELECT * from address where address_id=$aid";
                            $res2=mysqli_query($conn, $sql2);
                            $row2=mysqli_fetch_assoc($res2);

                            $postal_code = $row2['postal_code'];
                            $city= $row2['city'];
                            $street= $row2['street'];
                            $flat_num=$row2['flat_num'];
                        }
        
                    }
        
                }
                else
                {
                    header('Location:'.SITEURL.">?S33");
                }
                ?>
                <fieldset>
                    <legend>Szczegóły zamówienia</legend>
                    <div class="order-label">Imię</div>
                    <input type="text" name="name" value="<?php echo $name?>" class="input-responsive"   required>

                    <div class="order-label">Email</div>
                    <input type="text" name="email" value="<?php echo $name?>" class="input-responsive"  required>

                    <div class="order-label">Adres</div>
                    <input type="text" name="address" rows="6" value="<?php echo $city.', '.$street.', '.$flat_num.'. '.$postal_code ?>" class="input-responsive" required></input>

                    <input type="submit" name="submit" value="Potwierdz zamowienie" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <?php include('partials-front/footer.php') ?> 
   <?php
   
    if(isset($_POST['submit']))
    {
        
        $qty= $_POST['qty'];
        $data= date("Y-m-d H:i:s");
        $finalprice=floatval($qty)*floatval($price);
        echo $status="ordered";
        //stworz zapytanie do bazy
        $sql3= "INSERT INTO orders SET
        quantity= $qty,
        order_date= '$data',
        price= $finalprice,
        f_id= $food_id,
        status= '$status'"
        ;

        //polacz sie z baza
        $res3 = mysqli_query($conn, $sql3) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo
        if ($res3==TRUE)
        {
            $i=$conn->insert_id;
            //echo "Zapytanie udalo sie";
            $sql4="UPDATE users SET o_id=$i WHERE user_id=$user_id";
            $res4= mysqli_query($conn, $sql4);
            //przekieruj
            $_SESSION['order']= "ZAMOWIENIE ZLOZONE!";
            header("location:".SITEURL);

            
        }
         else {
           // echo "Zapytanie nie udalo sie";
           $_SESSION['order']= "ZAMOWIENIE nie udalo się";
            //przekieruj
            header("location:".SITEURL);
        }
    }
    else{

    }
    ?>
