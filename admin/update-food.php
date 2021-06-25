<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Zaktualizuj dane dania!</h1>

        <?php

            $id=$_GET['id'];
            $sql="SELECT * FROM food WHERE food_id=$id";

            $res=mysqli_query($conn, $sql);
            $row= mysqli_fetch_assoc($res);

        ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Nazwa </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $row['name'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Url obrazka</td>
                    <td>
                        <input type="text" name="image_url" value="<?php echo $row['image_url'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Opis</td>
                    <td>
                        <input type="text" name="description" value="<?php  echo $row['description'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Cena</td>
                    <td>
                        <input type="text" name="price" value="<?php  echo $row['price'];?>">
                    </td>
                </tr>
                <tr>
                <td>Kategoria:</td>
                <td>
                <select name="category">
                    <?php
                        $sql2 = "SELECT * FROM category";
                        $res2= mysqli_query($conn, $sql2);

                        $count= mysqli_num_rows($res2);
                        if ($count >0)
                        {
                            while($row2= mysqli_fetch_assoc($res2))
                            {
                                $id2= $row2['category_id'];
                                $title= $row2['name'];
                                ?>
                                <option value="<?php echo $id2; ?>"> <?php echo $title; ?></option>
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
                    <input type="submit" name="submit" value="Zaktualizuj!" placeholder="btn">
                </td>
            </tr>
            </table>
        </form>
    </div>
</div>

<?php
    if(isset($_POST['submit']))
    {
        $image_url= $_POST['image_url'];
        $name= $_POST['name'];
        $description = $_POST['description'];
        $price=$_POST['price'];
        $category=$_POST['category'];
        
        //stworz zapytanie do bazy
        $sql= "UPDATE food SET
        image_url= '$image_url',
        description='$description',
        price=$price,
        c_id=$category,
        name= '$name' WHERE food_id=$id";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        
        header("location:".SITEURL.'/admin/manage-food.php');
        
    }
    else
    {

    }
?>
<?php include('partials/footer.php');?>