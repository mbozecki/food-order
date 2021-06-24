<?php
    include('../config/constants.php');
    ?>

    <div class="main-content">
    <div class="wrapper">
    <h1> Zaloguj się</h1>

    <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }

        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>
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

            <tr>
            <td colspan="2"></td>
                <td>
                    <input type="submit" name="submit" value="Zaloguj!" placeholder="btn">
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
        
        //stworz zapytanie do bazy
        $sql= "SELECT * FROM users WHERE
        email= '$email' AND password= '$password'";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        //sprawdz czy zapytanie sie powiodlo, jak tak to powinno dac tylko jeden wynik
        $count = mysqli_num_rows($res);

        $row= mysqli_fetch_assoc($res);
        if ($count==1)
        {
            //udalo sie zalogowac
            if ($row['isAdmin']==1)
            {
                echo ("TO ADMIN!");
            }
            $_SESSION['login']= '<div> Zalogowano pomyślnie. </div>';
            $_SESSION['user']= $email; //do sprawdzania stanu zalogowoania uzytkownika
            header('location:'.SITEURL.'/admin/');//przekierowuje na strone główną docelowo
            //TODO cos innego dla uzytkownika i admina
        }
        else
        {
            //nie udalo sie zalogowac
            echo "OK";
            $_SESSION['login']= '<div> Nie udalo sie zalogowac </div>';
            header('location'.SITEURL.'/admin/login.php');
        }
    }
    else{

    }

?>