<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1>Zaktualizuj dane użytkownika!</h1>

        <?php

            $id=$_GET['id'];
            $sql="SELECT * FROM users WHERE user_id=$id";

            $res=mysqli_query($conn, $sql);
            $row= mysqli_fetch_assoc($res);

        ?>
        <form action="" method="POST">
            <table>
                <tr>
                    <td>Imię: </td>
                    <td>
                        <input type="text" name="name" value="<?php echo $row['fname'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>
                        <input type="text" name="email" value="<?php echo $row['email'];?>">
                    </td>
                </tr>
                <tr>
                    <td>Hasło </td>
                    <td>
                        <input type="password" name="password" value="<?php echo $row['password'];?>">
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
        $email = $_POST['email'];
        $password= $_POST['password'];
        $name= $_POST['name'];
        

        //stworz zapytanie do bazy
        $sql= "UPDATE users SET
        email= '$email',
        password= '$password',
        fname= '$name'   ";

        //polacz sie z baza
        $res = mysqli_query($conn, $sql) or die(mysqli_error($conn));

        
        header("location:".SITEURL.'/admin/manage-user.php');
        
    }
    else
    {

    }
?>
<?php include('partials/footer.php');?>