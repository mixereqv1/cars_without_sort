<?php
    session_start();
    // $_SESSION['logged_in'] = 'false';
    // $_SESSION['wrong_data'] = 'false';

    include_once('card.php');
    include_once('connect.php');
    include('functions.php');

    $sql = "SELECT id FROM cars ORDER BY id DESC LIMIT 1";
    $result = $mysqli -> query($sql);
    $amount_of_cars = $result -> fetch_assoc()['id'];

    // if(isset($_GET['action']) && $_GET['action'] == 'logout') {
    //     $_SESSION['logged_in'] == 'false';
    //     unset($_SESSION['login']);
    //     unset($_SESSION['password']);
    // }

    // if(isset($_POST['sign_in'])) {
    //     if($_POST['login'] == 'admin' && $_POST['password'] == 'admin') {
    //         $_SESSION['logged_in'] = 'true';
    //         $_SESSION['wrong_data'] = 'false';
    //     } else {
    //         $_SESSION['logged_in'] = 'false';
    //         $_SESSION['wrong_data'] = 'true';
    //     }
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
    </head>

    <body>

        <div class="container">
            <header class="header">
                <h1>Salon samochodowy</h1>
                <a class="login__link" href="login.php">Sign in</a>
            </header>
            <div class="sidebar">
                <?php 
                    // if($_SESSION['logged_in'] == 'true') {
                ?>

                <!-- <form class="add__car" action="add__car.php" method="POST">
                    <input type="file" name="car__photo" required>
                    <input type="text" name="car__description" placeholder="Opis" required>
                    <input type="number" name="car__price" placeholder="Cena" required>
                    <input type="number" name="car__promo" placeholder="Promocja w %" required>
                    <input type="submit" value="Dodaj">
                </form> -->

                <?php //} ?>
            </div>
            <main class="main">
                <?php
                    for($i=0; $i<$amount_of_cars; $i++) {
                        createTab($i,$photo,$description,$price,$promo,$car__id,$mysqli);
                    }
                ?>
            </main>
            <footer class="footer">
                 <?php
                    // if(isset($_GET['action']) && $_GET['action'] == 'logout') {
                    //     echo('<span class="logged__out">Logged out correctly</span>');
                    // }

                    // if($_SESSION['wrong_data'] == 'true') {
                    //     echo('<span class="wrong__data">Incorrect login/password</span>');
                    // }

                    // if($_SESSION['logged_in'] == 'false') {
                 ?>
                    <!-- <form action="index.php" method="POST">
                        <label for="login">Login:</label>
                        <input type="text" name="login" id="login" required>
                        <label for="password">Password:</label>
                        <input type="password" name="password" id="password" required>
                        <input type="submit" value="Sign in" name="sign_in">
                    </form> -->
                <?php //} else { ?>

                    <!-- <a class="logout__button" href="index.php?action=logout">Logout</a> -->

                <?php //} ?>
            </footer>
        </div>
    </body>
</html>