<?php
    function getAmount() {
        $amount = $_POST['amount'];
        return $amount;
    }
    header('location:index.php');
?>