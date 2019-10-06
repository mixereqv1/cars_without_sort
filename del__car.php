<?php
    session_start();
    include_once('connect.php');
    include_once('functions.php');

    if(checkPrivileges($mysqli,3) == true) {
        $car_id = $_POST['car__id'];
        $sql = "DELETE FROM cars WHERE id = $car_id";
        mysqli_query($mysqli,$sql);
        header('location:login.php');
    } else {
        header('location:login.php?action=no_permission');
    }
?>