<?php
    include_once('connect.php');

    $sql = "SELECT * FROM cars";

    //DEFINING ARRAYS
    $car__id = array();
    $photo = array();
    $description = array();
    $price = array();
    $promo = array();

    //FETCHING DATA FROM DB TO ARRAYS
    if($result = $mysqli -> query($sql)) {
        while($row = $result -> fetch_assoc()) {
            array_push($car__id,$row['id']);
            array_push($photo,$row['photo']);
            array_push($description,$row['description']);
            array_push($price,$row['price']);
            array_push($promo,$row['promo']);
        }
    }
?>