<?php
    session_start();
    include_once('connect.php');
    include_once('functions.php');

    if(checkPrivileges($mysqli,2) == true) {
        $car_id_to_edit = $_POST['car_id_to_edit'];
        $new_description = $_POST['new_description'];
        $sql = "UPDATE cars SET description = '$new_description' WHERE id = $car_id_to_edit" ;
        mysqli_query($mysqli,$sql);
        header('location:login.php');
    } else {
        header('location:login.php?action=no_permission');
    }
    
?>