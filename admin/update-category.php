<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Zaktualizuj dane kategorii!</h1>

        <?php

            $id=$_GET['id'];
            $sql="SELECT * FROM category WHERE category_id=$id";

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
                    <td>Polecana? TAK/NIE</td>
                    <td>
                        <input type="text" name="featured" value="<?php  echo ($row['featured']==1 ? "TAK" : "NIE");?>">
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
        $featured = $_POST['featured'];
        $featured=="TAK" ? $featured=1 : $featured=0;

        //stworz zapytanie do bazy
        $sql= "UPDATE category SET
        image_url= '$image_url',
        featured= '$featured',
        name= '$name' WHERE id=$id  ";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        
        header("location:".SITEURL.'/admin/manage-category.php');
        
    }
    else
    {

    }
?>
<?php include('partials/footer.php');?>