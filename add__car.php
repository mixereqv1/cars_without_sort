<?php
    include('connect.php');
    $photo = basename($_FILES['car__photo']['name']);
    $description = $_POST['car__description'];
    $price = $_POST['car__price'];
    $promo = $_POST['car__promo'];

    //UPLOADING PHOTO
    $target_dir = "img/";
    $target_file = $target_dir . basename($_FILES['car__photo']['name']);
    // $upload_ok = 1;
    if(move_uploaded_file($_FILES['car__photo']['tmp_name'], $target_file)) {
        echo "The file has been uploaded correctly.";
    } else {
        echo "Problem with uploading photo to server.";
    }

    $sql = "INSERT INTO cars VALUES(null,'$photo','$description',$price,$promo)";
    $mysqli -> query($sql);
    header('location:login.php');
?>