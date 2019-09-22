<?php
    include_once('connect.php');

    $user_name = $_POST['user__name'];
    $user_password = $_POST['user__password'];

    $privilege_add = '0';
    $privilege_modify = '0';
    $privilege_delete = '0';
    
    if(isset($_POST['add'])) {
        $privilege_add = '1';
    }
    if(isset($_POST['modify'])) {
        $privilege_modify = '1';
    }
    if(isset($_POST['delete'])) {
        $privilege_delete = '1';
    }

    $sql_user = "INSERT INTO users VALUES(null,'$user_name','$user_password')";
    $sql_privileges = "INSERT INTO privileges VALUES('$user_name','$privilege_add','$privilege_modify','$privilege_delete')";
    mysqli_query($mysqli,$sql_user);
    mysqli_query($mysqli,$sql_privileges);
    header('location:login.php');
?>