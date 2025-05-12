<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "db.php";
    function validateEmail($email, $conn){
        $result = $conn->query("SELECT ID FROM `admin` WHERE Email = '$email'");
        if ($result->num_rows == 0) {
            return "Invalid email or password.";
        }else{
            return true;
        }
    }
    
    function validatePassword($email,$conn,$password){
        $result = $conn->query("SELECT Password FROM `admin` WHERE Email = '$email'");
        $user = $result->fetch_assoc();
        $dbPassword =$user['Password'];
        if($dbPassword != $password){
            return "Invalid email or password.";
        }else{
            return true;
        }
    }
    
    function getName($email, $conn){
        $result = $conn->query("SELECT Name FROM `admin` WHERE Email = '$email'");
        $user = $result->fetch_assoc();
        $n = $user['Name'];
    
        return $n;
    }
    
    function getID($email, $conn){
        $result = $conn->query("SELECT ID FROM `admin` WHERE Email = '$email'");
        $user = $result->fetch_assoc();
        $id = $user['ID'];
    
        return $id;
    }
    
    if(isset($_POST['email'],$_POST['pass'])){
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $emailValidated = validateEmail($email,$conn);
        session_start();
        if($emailValidated === true){
            $passwordValidated = validatePassword($email,$conn,$pass);
            if($passwordValidated === true){
                $_SESSION['admin'] = [
                    'id' => getID($email,$conn),
                    "Name" => getName($email,$conn),
                    'email' => $email,
                ];
                header("Location: admin.php");
            }else{
                $_SESSION['loginErr'] = $passwordValidated;
                header("Location: adminlogin.php");
            }
        }else{
            $_SESSION['loginErr'] = $emailValidated;
            header("Location: adminlogin.php");
        }
        session_write_close();
    }
}else{
    header("Location: adminlogin.php");
}

 ?>