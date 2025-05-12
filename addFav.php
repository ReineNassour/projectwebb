<?php
session_start();
if(isset($_SESSION['user'])){
    if(isset($_GET['id'])){
        include "db.php";
        $locID = $_GET['id'];
        $userID = $_SESSION['user']['id'];
        $sql = "SELECT * FROM FAVOURITE WHERE USER_ID = $userID AND LOC_ID = $locID";
        $result = $conn->query($sql);
        if($result->num_rows == 0){
            $sql2 = "INSERT INTO FAVOURITE VALUES($userID,$locID)";
            $conn->query($sql2);
        }
        header("Location:fav.php");
    }else{
        header("Location:index.php");
    }
}else{
    header("Location:index.php");
}