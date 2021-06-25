<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
            <h1>Zarzadzaj daniami</h1>

            <?php 
                //do wyswietlania wiadomosci po usunieciu
                if (isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']); 
                }
                if (isset($_SESSION['add']))
                {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']); 
                }
            ?>
            <a href="add-food.php" class="btn-primary">Dodaj danie</a>

            
                <table class="width100">
                    <tr>
                        <td> ID</th>
                        <th>Nazwa</th>
                        <th>Opis</th>
                        <th>Url obrazka</th>
                        <th>Cena (zł)</th>
                        <th>Kategoria</th>
                        <th>Akcje</th>
                    </tr>

                    <?php
                        $sql= "SELECT * FROM food";
                        $res= mysqli_query($conn, $sql);


                        if($res==TRUE)
                        {
                            $count= mysqli_num_rows($res);
                            
                            if ($count > 0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id= $rows['food_id'];
                                    $name=$rows['name'];
                                    $image_url= $rows['image_url'];
                                    $description= $rows['description'];
                                    $price =$rows['price'];
                                    $category=$rows['c_id']; //do zmiany
                               

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $description; ?></td>
                                    <td><img class="img-url" src="<?php echo $image_url; ?>"></td>
                                    <td><?php echo $price; ?></td>

                                    <?php
                                        $sql2= "SELECT category.name FROM category WHERE category_id=$category;";
                                        $res2= mysqli_query($conn, $sql2);
                                        echo $category= mysqli_fetch_assoc($res2)['name'];
                                        ?>
                                    <td><?php echo $category; ?>
                                    <td><a href="<?php echo SITEURL;?>/admin/update-food.php?id=<?php echo $id;?>" class="btn-add">Zaktualizuj</a> 
                                    <a href="<?php echo SITEURL;?>/admin/delete-food.php?id=<?php echo $id;?>" class="btn-delete">Usun</a></td>
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