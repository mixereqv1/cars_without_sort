<?php
    include_once('connect.php');

    $user_name = $_POST['user__name'];
    $user_password = $_POST['user__password'];

    $privilege_add_car = '0';
    $privilege_modify = '0';
    $privilege_delete = '0';
    $privilege_add_user = '0';
    
    if(isset($_POST['add_car'])) {
        $privilege_add_car = '1';
    }
    if(isset($_POST['modify'])) {
        $privilege_modify = '1';
    }
    if(isset($_POST['delete'])) {
        $privilege_delete = '1';
    }
    if(isset($_POST['add_user'])) {
        $privilege_add_user = '1';
    }

    $sql_user = "INSERT INTO users VALUES(null,'$user_name','$user_password')";
    $sql_privileges = "INSERT INTO privileges VALUES(null,'$user_name',$privilege_add_car,$privilege_modify,$privilege_delete,$privilege_add_user)";
    mysqli_query($mysqli,$sql_user);
    mysqli_query($mysqli,$sql_privileges);
    header('location:login.php');
?>