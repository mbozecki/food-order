<?php include('partials/menu.php'); ?>


    <div class="main-content">
    <div class="wrapper">
    <h1> Zarejestruj sie</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Email: </td>
                <td>
                    <input type="text" name="email" placeholder="Wprowadz swoj email">
                </td>
            </tr>
            <tr>
                <td>Hasło: </td>
                <td>
                    <input type="password" name="password" placeholder="Wprowadz swoje hasło">
                </td>
            </tr>
            <tr>
                <td>Imię: </td>
                <td>
                    <input type="text" name="name" placeholder="Wprowadz swoje imięl">
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
        $email = $_POST['email'];
        $password= $_POST['password'];
        $name= $_POST['name'];
        

        //stworz zapytanie do bazy
        $sql= "INSERT INTO users SET
        email= '$email',
        password= '$password',
        fname= '$name'   ";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo
        if ($res==TRUE)
        {
            //echo "Zapytanie udalo sie";
            $_SESSION['add']= "Dodano uzytkownika";
            //przekieruj
            header("location:".SITEURL.'admin/manage-user.php');

            
        }
         else {
           // echo "Zapytanie nie udalo sie";
           $_SESSION['add']= "Nie udalo sie dodac uzytkownika";
            //przekieruj
            header("location:".SITEURL.'admin/manage-user.php');
        }
    }
    else{

    }

?>