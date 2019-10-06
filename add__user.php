<?php
    session_start();
    include_once('connect.php');
    include_once('functions.php');

    // if(checkPrivileges($mysqli,4) == true) {
        $user_name = $_POST['user__name'];
        $user_password = $_POST['user__password'];
        $user_role = $_POST['user__role'];
        $sql_user = "INSERT INTO users VALUES(null,'$user_name','$user_password',$user_role)";
        mysqli_query($mysqli,$sql_user);
        header('location:login.php');
    // } else {
        // header('location:login.php?action=no_permission');
    // }
    
?>