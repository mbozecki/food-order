<?php include('partials/menu.php'); ?>

<div class="main-content">
            <div class="wrapper">
            <h1>Zarzadzaj zamówieniami</h1>

            <?php 
                //do wyswietlania wiadomosci po zupdatowaniu statusu zamówienia
                if (isset($_SESSION['update']))
                {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']); 
                }
            ?>

            
                <table class="width100">
                    <tr>
                        <th>Danie</th>
                        <th>Ilość</th>
                        <th>Cena łącznie</th>
                        <th>Data zamówienia</th>
                        <th>Adres</th>
                        <th>Status</th>
                        <th>Akcje</th>
                    </tr>

                    <?php
                        $sql= "SELECT * FROM orders";
                        $res= mysqli_query($conn, $sql);


                        if($res==TRUE)
                        {
                            $count= mysqli_num_rows($res);
                            
                            if ($count > 0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id= $rows['order_id'];
                                    $price=$rows['price'];
                                    $quantity= $rows['quantity'];
                                    $order_date= $rows['order_date'];
                                    $status =$rows['status'];

                                    //foodId tu chyba cos z tym id
                                    $sql3= "SELECT food.name FROM food 
                                    INNER JOIN orders ON food.food_id=orders.order_id WHERE orders.f_id=$id;";
                                    $res3= mysqli_query($conn, $sql3);
                                    $rows3=mysqli_fetch_assoc($res3);
                                    $foodname=$rows3['name'];

                                    //ADRES
                                    $sql4="SELECT * FROM address
                                     INNER JOIN users on address.address_id=users.a_id WHERE users.o_id=$id;";

                                    $res4= mysqli_query($conn, $sql4);
                                    $rows4=mysqli_fetch_assoc($res4);
                                    $postal_code = $rows4['postal_code'] ?? "-";
                                    $city= $rows4['city'] ?? "-";
                                    $street= $rows4['street'] ?? "-";
                                    $flat_num=$rows4['flat_num'] ?? "-";

                                ?>

                                <tr>
                                <td><?php echo $foodname; ?>
                                    
                                    <td><?php echo $quantity; ?></td>
                                    <td><?php echo $price; ?></td>
                                    <td><?php echo $status; ?></td>
                                    <td><?php echo $order_date; ?></td>
                                    
                                    
                                    <td><?php echo $city.', '.$street.', '.$flat_num.'. '.$postal_code ?></td>
                                    <td><a href="<?php echo SITEURL;?>/admin/update-food.php?id=<?php echo $id;?>" class="btn-add">Zaktualizuj</a> 
                                    
                                </tr>
                                <?php
                                }
                            }
                        }
                    ?>

                </table>
            </div>
            
        </div>
<?php include('partials/footer.php'); ?>