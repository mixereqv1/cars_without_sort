<?php
    function checkPrivileges($mysqli,$number) {
        $login = $_SESSION['user'];
        $user_sql = "SELECT id_role FROM users WHERE username = '$login'";
        $user_result =  mysqli_query($mysqli,$user_sql);
        $user_row = mysqli_fetch_assoc($user_result);
        $id_role = $user_row['id_role'];

        $role_sql = "SELECT role FROM roles WHERE id_role = $id_role";
        $role_result =  mysqli_query($mysqli,$role_sql);
        $role_row = mysqli_fetch_assoc($role_result);

        $privilege_sql = "SELECT privilege FROM privileges WHERE id_privilege = $number";
        $privilege_result = mysqli_query($mysqli,$privilege_sql);
        $privilege_row = mysqli_fetch_assoc($privilege_result);

        $GLOBAL_SQL = "SELECT roles.role,privileges.privilege FROM users,roles,privileges,roles_privileges 
        WHERE users.id_role = roles.id_role 
        AND roles.id_role = roles_privileges.id_role 
        AND privileges.id_privilege = roles_privileges.id_privilege
        AND roles.id_role = $id_role
        AND roles_privileges.id_privilege = $number";

        $global = mysqli_query($mysqli,$GLOBAL_SQL);
        $global_row = mysqli_fetch_assoc($global);

        $privilege = false;

        if($role_row['role'] == $global_row['role'] && $privilege_row['privilege'] == $global_row['privilege']) {
            $privilege = true;
        }

        return $privilege;
    }



    function createTab($i,$photo,$description,$price,$promo,$car__id,$mysqli) {
        echo('
            <div class="item card" id='.$car__id[$i].'>
                <div class="image">
                    <img src="img/'.$photo[$i].'" alt="'.$photo[$i].'" class="image__img">
                </div>
                <div class="description">
                    <span class="description__content">'.$description[$i].'</span>
                    ');
                    // if(isset($_SESSION['user']) && $_SESSION['user'] == 'admin' && $_SESSION['logged_in'] == 'true') {
                    //     echo '<input type="submit" value="Update title" class="edit__title">';
                    // }
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        echo '<input type="submit" value="Update title" class="edit__title">';
                    }
                    echo('
                    <div class="colors">
                        <ul class="colors__list">
                            Dostępne kolory:
                            <li>Biały</li>
                            <li>Niebieski</li>
                            <li>Czerwony</li>
                        </ul>
                    </div>
                    <div class="price">
                        <span class="price__value">Cena: <span>'.$price[$i].'zł</span></span>
                        <span class="price__promo">Promocja <span>-'.$promo[$i].'%</span></span>
                    </div>
                    <div class="buy">
                        <a class="buy__link" href="#">Kup teraz!</a>
                    </div>
                    <div class="more">
                        <a class="more__link" href="#">Zobacz więcej!</a>
                    </div>
        ');
                    // if(isset($_SESSION['user']) && $_SESSION['user'] == 'admin' && $_SESSION['logged_in'] == 'true') {
                    //     echo('
                    //         <form action="del__car.php" method="POST">
                    //             <input type="hidden" name="car__id" value='.$car__id[$i].'>
                    //             <input class="delete__link" type="submit" value="Delete">
                    //         </form>'
                    //     );
                    // }
                    if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] == true) {
                        echo('
                            <form action="del__car.php" method="POST">
                                <input type="hidden" name="car__id" value='.$car__id[$i].'>
                                <input class="delete__link" type="submit" value="Delete">
                            </form>'
                        );
                    }
                    echo('
                </div>
            </div>
        ');
    }
?>