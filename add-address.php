<?php include('partials-front/menu.php');
    include('user-login-check.php'); ?>


    <div class="main-content">
    <div class="wrapper">
    <h1> Dodaj adres</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Kod pocztowy :</td>
                <td>
                    <input type="text" name="postal_code" placeholder="np 52-300">
                </td>
            </tr>
            <tr>
                <td>Miasto: </td>
                <td>
                    <input type="text" name="city" placeholder="np Wrocław">
                </td>
            </tr>
            <tr>
                <td>Ulica: </td>
                <td>
                    <input type="text" name="street" placeholder="np Świdnicka 100">
                </td>
                <td>Nr mieszkania </td>
                <td>
                    <input type="text" name="flat_num" placeholder="np 10">
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

<?php include('partials-front/footer.php'); ?>

<?php

    //sprawdz czy przycisk klikniety
    if(isset($_POST['submit']))
    {
        $postal_code = $_POST['postal_code'];
        $city= $_POST['city'];
        $street= $_POST['street'];
        $flat_num=$_POST['flat_num'];
        

        //stworz zapytanie do bazy
        $sql= "INSERT INTO address SET
        postal_code= '$postal_code',
        city= '$city',
        street= '$street',
        flat_num=$flat_num";
        
        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo
        if ($res==TRUE)
        {
            
            echo "true";
            //wez id nowo utworzonego adresu
            $sql2= "SELECT address_id from address where postal_code= '$postal_code' and
            city= '$city' and
            street= '$street' and
            flat_num=$flat_num";
            $res2=mysqli_query($conn, $sql2) or die(mysqli_error($conn)); 
            if ($res2==TRUE)
            {
                
                $row2= mysqli_fetch_assoc($res2);
                $id2= $row2['address_id'];
 
            
                //i dodaj to d do usera z sesji
                $user_id= $_SESSION['user'];
                $sql3= "UPDATE users set a_id=$id2 where user_id=$user_id";
                $res3=mysqli_query($conn, $sql3) or die(mysqli_error($conn));
                if($res3== TRUE)
                {
                    
                    header("location:".SITEURL);
                }
                
            }
            
            
           
            
            
        }
         else {
            //header("location:".SITEURL);
        }
    }
    else{

    }

?>