<?php
    session_start();

    include_once('card.php');
    include_once('connect.php');
    include('functions.php');

    // $_SESSION['logged_in'] = 'false';
    // $_SESSION['wrong_data'] = 'false';

    $sql = "SELECT id FROM cars ORDER BY id DESC LIMIT 1";
    $result = $mysqli -> query($sql);
    $amount_of_cars = $result -> fetch_assoc()['id'];

    if(isset($_GET['action']) && $_GET['action'] == 'logout') {
        $_SESSION['logged_in'] = 'false';
        unset($_SESSION['login']);
        unset($_SESSION['password']);
        unset($_SESSION['user']);
        // unset($_SESSION['logged_in']);
    }

    if(isset($_POST['sign_in'])) {
        // if($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
        //     $_SESSION['logged_in'] = 'true';
        //     $_SESSION['wrong_data'] = 'false';
        // } else {
        //     $_SESSION['logged_in'] = 'false';
        //     $_SESSION['wrong_data'] = 'true';
        // }

        $login = $_POST['login'];
        $password = $_POST['password'];
        $query = "SELECT * FROM users WHERE login = '$login' AND password = '$password'";
        $result = mysqli_query($mysqli,$query);
        if(mysqli_num_rows($result) == 1) {
            $_SESSION['user'] = $login;
            $_SESSION['logged_in'] = 'true';
            $_SESSION['wrong_data'] = 'false';
        } else {
            // $_SESSION['logged_in'] = 'false';
            $_SESSION['wrong_data'] = 'true';
        }
    }
    
    // $sql = "SELECT * FROM cars";
    // if($result = $mysqli -> query($sql)) {
    //     echo ('<table>');
    //     while($row = $result -> fetch_assoc()) {
    //         echo('<tr>');
    //         echo('<td>'.$row['id'].'</td><td>'.$row['photo'].'</td><td>'.$row['description'].'</td><td>'.$row['price'].'</td><td>'.$row['promo'].'</td>');
    //         echo('</tr>');
    //     }
    //     echo ('</table>');
    // }

?>

<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Grid template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" media="screen" href="main.min.css" />
        <link href="https://fonts.googleapis.com/css?family=Livvic|Rubik:700&display=swap" rel="stylesheet">
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(a => {
                $('.description__content').dblclick(function() {
                    $old_text = $(this).text();
                    $(this).html('<input placeholder="'+$old_text+'" type="text"><input type="submit" value="Update">');
                })
            })
        </script> -->
    </head>

    <body>

        <div class="container">
            <header class="header">
                <h1>Salon samochodowy</h1>
                <!-- <a class="login__link" href="login.php">Sign in</a> -->
                <a href="index.php" class="home__page">Home page</a>
            </header>
            <div class="sidebar">
                <?php
                    if(isset($_GET['action']) && $_GET['action'] == 'logout') {
                        echo('<span class="logged__out">Logged out correctly</span>');
                    }

                    if($_SESSION['wrong_data'] == 'true') {
                        echo('<span class="wrong__data">Incorrect login/password</span>');
                    }

                    if($_SESSION['logged_in'] == 'false') {
                 ?>
                    <form action="login.php" method="POST">
                        <label for="login">Login:</label>
                        <input type="text" name="login" id="login" required>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                        <input type="submit" value="Sign in" name="sign_in">
                    </form>
                <?php } else { ?>

                    <a class="logout__button" href="login.php?action=logout">Logout</a>
                    <span class="logged__user">You are logged in as: <?php echo '<b>'. $_SESSION['user'] .'</b>' ?></span>
                    <form class="add__car" action="add__car.php" method="POST" enctype="multipart/form-data">
                        <input type="file" id="car__photo" name="car__photo" accept="image/*" required>
                        <input type="text" name="car__description" placeholder="Opis" required>
                        <input type="number" name="car__price" placeholder="Cena" required>
                        <input type="number" name="car__promo" placeholder="Promocja w %" required>
                        <input type="submit" value="Dodaj">
                    </form>

                    <form class="add__user" action="add__user.php" method="POST">
                        <h3>Add user</h3>
                        <input type="text" name="user__name" placeholder="Nazwa" required>
                        <input type="password" name="user__password" placeholder="Hasło" required>
                        <div class="add__user__privileges">
                            <input type="checkbox" name="add" id="add">
                            <label for="add">Add cars</label>
                        </div>
                        <div class="add__user__privileges">
                            <input type="checkbox" name="modify" id="modify">
                            <label for="add">Modify cars</label>
                        </div>
                        <div class="add__user__privileges">
                            <input type="checkbox" name="delete" id="delete">
                            <label for="add">Delete cars</label>
                        </div>
                        <input type="submit" value="Dodaj użytkownika">
                    </form>

                <?php } ?>
            </div>
            <main class="main">
                <?php
                    for($i=0; $i<$amount_of_cars; $i++) {
                        createTab($i,$photo,$description,$price,$promo,$car__id);
                    }
                ?>
            </main>
            <footer class="footer">
                 
            </footer>
        </div>
        <script src="script.js"></script>
    </body>
</html>