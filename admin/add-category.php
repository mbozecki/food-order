<?php include('partials/menu.php'); ?>


    <div class="main-content">
    <div class="wrapper">
    <h1>Dodaj kategorię</h1>
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
                <td>Polecana? </td>
                <td>
                    <input type="text" name="featured" placeholder="TAK/NIE">
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
        $featured = $_POST['featured'];
        $featured=="TAK" ? $featured=1 : $featured=0;

        //stworz zapytanie do bazy
        $sql= "INSERT INTO category SET
        name= '$name',
        image_url= '$image_url',
        featured='$featured'  ";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo
        if ($res==TRUE)
        {
            //echo "Zapytanie udalo sie";
            $_SESSION['add']= "Dodano kategorie";
            //przekieruj
            header("location:".SITEURL.'/admin/manage-category.php');

            
        }
         else {
           // echo "Zapytanie nie udalo sie";
           $_SESSION['add']= "Nie udalo sie dodac kategorii";
            //przekieruj
            header("location:".SITEURL.'/admin/manage-category.php');
        }
    }
    else{

    }

?>