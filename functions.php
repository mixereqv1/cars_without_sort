<?php
    function checkPrivileges($mysqli) {
        if(isset($_SESSION['user'])) {
            $user = $_SESSION['user'];
            $check_privileges = "SELECT * FROM privileges WHERE user_name = '$user'";
            $check_result = mysqli_query($mysqli,$check_privileges);
            $check_row = mysqli_fetch_assoc($check_result);
            return $check_row;
        }
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
                    if(checkPrivileges($mysqli)['modify'] == 1) {
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
                    if(checkPrivileges($mysqli)['delete'] == 1) {
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