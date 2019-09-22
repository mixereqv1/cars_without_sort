<?php
    include_once('connect.php');
    $car_id = $_POST['car__id'];
    $sql = "DELETE FROM cars WHERE id = $car_id";
    mysqli_query($mysqli,$sql);
    header('location:login.php');
?>