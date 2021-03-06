<?php include('partials/menu.php'); ?>

        <div class="main-content">
            <div class="wrapper">
            <h1>Zarzadzaj uzytkownikami</h1>

            <?php 
                //do wyswietlania wiadomosci po usunieciu
                if (isset($_SESSION['delete']))
                {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']); 
                }
            ?>
            <a href="add-user.php" class="btn-primary">Dodaj uzytkownika</a>

            
                <table class="width100">
                    <tr>
                        <td> ID</th>
                        <th>Imię</th>
                        <th>E-mail</th>
                        <th>Admin?</th>
                        <th>Akcje</th>
                    </tr>

                    <?php
                        $sql= "SELECT * FROM users";
                        $res= mysqli_query($conn, $sql);

                        if($res==TRUE)
                        {
                            $count= mysqli_num_rows($res);
                            
                            if ($count > 0)
                            {
                                while($rows=mysqli_fetch_assoc($res))
                                {
                                    $id= $rows['user_id'];
                                    $fname=$rows['fname'];
                                    $email= $rows['email'];
                                    $isAdmin= $rows['isAdmin'];
                               

                                ?>

                                <tr>
                                    <td><?php echo $id; ?></td>
                                    <td><?php echo $fname; ?></td>
                                    <td><?php echo $email; ?></td>
                                    <td><?php echo ($isAdmin==1 ? "TAK" : "NIE"); ?>
                                    <td><a href="<?php echo SITEURL;?>/admin/update-user.php?id=<?php echo $id;?>" class="btn-add">Zaktualizuj</a> 
                                    <a href="<?php echo SITEURL;?>/admin/delete-user.php?id=<?php echo $id;?>" class="btn-delete">Usun</a></td>
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
