<?php include('partials/menu.php'); ?>

    <div class="main-content">
    <div class="wrapper">
    <h1> Dodaj uzytkownika</h1>
    <form action="" method="POST">
        <table>
            <tr>
                <td>Email: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Wprowadz swoj email">
                </td>
            </tr>
            <tr>
                <td>Hasło: </td>
                <td>
                    <input type="password" name="full_name" placeholder="Wprowadz swoje hasło">
                </td>
            </tr>
            <tr>
                <td>Imię: </td>
                <td>
                    <input type="text" name="full_name" placeholder="Wprowadz swoje imięl">
                </td>
            </tr>

            <tr>
            <td colspan="2"></td>
                <td>
                    <input type="submit" name="submit" value="Users" placeholder="btn">
                </td>
            </tr>
        </table>
    
    </form>
    </div></div>

<?php include('partials/footer.php'); ?>