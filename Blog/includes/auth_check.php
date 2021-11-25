<?php 
    if(!isset($_SESSION['USER']) || !isset($_SESSION['PASSWORD'])){
        header('location:login.php');
    }else{
        header('location:main.php');
    }
?>