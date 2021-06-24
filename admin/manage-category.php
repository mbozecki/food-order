<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
            <h1>Zarzadzaj kategoriami</h1>

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
            <a href="add-category.php" class="btn-primary">Dodaj kategorię</a>

            
                <table class="width100">
                    <tr>
                        <td> ID</th>
                        <th>Nazwa</th>
                        <th>Url obrazka</th>
                        <th>Polecana?</th>
                        <th>Akcje</th>
                    </tr>

                    <?php
                        $sql= "SELECT * FROM category";
                        $res= mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count= mysqli_num_rows($res);
                            
                            if ($count > 0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id= $rows['category_id'];
                                    $name=$rows['name'];
                                    $image_url= $rows['image_url'];
                                    $featured= $rows['featured'];
                               

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $name; ?></td>
                                    <td><?php echo $image_url; ?></td>
                                    <td><?php echo ($featured==1 ? "TAK" : "NIE"); ?>
                                    <td><a href="<?php echo SITEURL;?>/admin/update-category.php?id=<?php echo $id;?>" class="btn-add">Zaktualizuj</a> 
                                    <a href="<?php echo SITEURL;?>/admin/delete-category.php?id=<?php echo $id;?>" class="btn-delete">Usun</a></td>
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