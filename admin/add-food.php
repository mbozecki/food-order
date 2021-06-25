<?php include('partials/menu.php'); ?>


    <div class="main-content">
    <div class="wrapper">
    <h1>Dodaj danie</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Nazwa </td>
                <td>
                    <input type="text" name="name" placeholder="">
                </td>
            </tr>
            <tr>
                <td>Url obrazu </td>
                <td>
                    <input type="text" name="image_url" placeholder="np https://upload.wikimedia.org/1.jpg">
                </td>
            </tr>
            <tr>
                <td>Opis </td>
                <td>
                    <input type="text" name="description" placeholder="">
                </td>
            </tr>
            
            <tr>
                <td>Cena (w zł)</td>
                <td>
                    <input type="text" name="price" placeholder="np 39.99">
                </td>
            </tr>

            <tr>
                <td>Kategoria:</td>
                <td>
                <select name="category">
                    <?php
                        $sql = "SELECT * FROM category";
                        $res= mysqli_query($conn, $sql);

                        $count= mysqli_num_rows($res);
                        if ($count >0)
                        {
                            while($row= mysqli_fetch_assoc($res))
                            {
                                $id= $row['category_id'];
                                $title= $row['name'];
                                ?>
                                <option value="<?php echo $id; ?>"> <?php echo $title; ?></option>
                                <?php
                            }
                        }
                        else
                        {
                            ?>
                            <option value="0">Nie znaleziono żadnych kategorii</option>
                            <?php
                        }
                        ?>
                </select>
                </td>
            </tr>

            <tr>
            <td colspan="2"></td>
                <td>
                    <input type="submit" name="submit" value="Dodaj!" placeholder="btn">
                </td>
            </tr>
        </table>
    
    </form>
    </div></div>

<?php include('partials/footer.php'); ?>

<?php

    //sprawdz czy przycisk klikniety
    if(isset($_POST['submit']))
    {
        
        $image_url= $_POST['image_url'];
        $name= $_POST['name'];
        $description = $_POST['description'];
        $price= $_POST['price'];
        $category=$_POST['category'];

        //stworz zapytanie do bazy
        $sql2= "INSERT INTO food SET
        name= '$name',
        image_url= '$image_url',
        description='$description',
        price='$price',
        c_id='$category'";

        //polacz sie z baza
        $res2 = mysqli_query($conn, $sql2) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo
        if ($res2==TRUE)
        {
            //echo "Zapytanie udalo sie";
            $_SESSION['add']= "Dodano danie";
            //przekieruj
            header("location:".SITEURL.'/admin/manage-food.php');

            
        }
         else {
           // echo "Zapytanie nie udalo sie";
           $_SESSION['add']= "Nie udalo sie dodac dania";
            //przekieruj
            header("location:".SITEURL.'/admin/manage-food.php');
        }
    }
    else{

    }

?>