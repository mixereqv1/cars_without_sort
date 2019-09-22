<?php
    include_once('connect.php');
    $car_id_to_edit = $_POST['car_id_to_edit'];
    $new_description = $_POST['new_description'];
    $sql = "UPDATE cars SET description = '$new_description' WHERE id = $car_id_to_edit" ;
    mysqli_query($mysqli,$sql);
    header('location:login.php');
?>