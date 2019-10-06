<?php
    session_start();
    include_once('connect.php');
    include_once('functions.php');

    // $login = $_SESSION['user'];
    // $user_sql = "SELECT id_role FROM users WHERE username = '$login'";
    // $user_result =  mysqli_query($mysqli,$user_sql);
    // $user_row = mysqli_fetch_assoc($user_result);
    // $id_role = $user_row['id_role'];

    // $role_sql = "SELECT role FROM roles WHERE id_role = $id_role";
    // $role_result =  mysqli_query($mysqli,$role_sql);
    // $role_row = mysqli_fetch_assoc($role_result);

    // $privilege_sql = "SELECT privilege FROM privileges WHERE id_privilege = 1";
    // $privilege_result = mysqli_query($mysqli,$privilege_sql);
    // $privilege_row = mysqli_fetch_assoc($privilege_result);

    // $GLOBAL_SQL = "SELECT roles.role,privileges.privilege FROM users,roles,privileges,roles_privileges 
    // WHERE users.id_role = roles.id_role 
    // AND roles.id_role = roles_privileges.id_role 
    // AND privileges.id_privilege = roles_privileges.id_privilege";

    // $global = mysqli_query($mysqli,$GLOBAL_SQL);
    // $global_row = mysqli_fetch_assoc($global);

    if(checkPrivileges($mysqli) == true) {
        $user_name = $_POST['user__name'];
        $user_password = $_POST['user__password'];
        $user_role = $_POST['user__role'];
        $sql_user = "INSERT INTO users VALUES(null,'$user_name','$user_password',$user_role)";
        mysqli_query($mysqli,$sql_user);
    }
    
    header('location:login.php');
    
?>