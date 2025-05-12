<?php

if($_SERVER['REQUEST_METHOD'] == "POST"){
    include "db.php";
    function validateEmail($email, $conn){
        $result = $conn->query("SELECT ID FROM `user` WHERE Email = '$email'");
        if ($result->num_rows == 0) {
            return "Invalid email or password.";
        }else{
            return true;
        }
    }
    
    function validatePassword($email,$conn,$password){
        $result = $conn->query("SELECT Password FROM `user` WHERE Email = '$email'");
        $user = $result->fetch_assoc();
        $dbPassword =$user['Password'];
        if($dbPassword != $password){
            return "Invalid email or password.";
        }else{
            return true;
        }
    }
    
    function getName($email, $conn){
        $result = $conn->query("SELECT FirstName, LastName FROM `user` WHERE Email = '$email'");
        $user = $result->fetch_assoc();
        $fn = $user['FirstName'];
        $ln = $user['LastName'];
    
        return $fn.' '.$ln;
    }
    
    function getID($email, $conn){
        $result = $conn->query("SELECT ID FROM `user` WHERE Email = '$email'");
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
                $_SESSION['user'] = [
                    'id' => getID($email,$conn),
                    "fullName" => getName($email,$conn),
                    'email' => $email,
                ];
                header("Location: index.php");
            }else{
                $_SESSION['loginErr'] = $passwordValidated;
                header("Location: login.php");
            }
        }else{
            $_SESSION['loginErr'] = $emailValidated;
            header("Location: login.php");
        }
        session_write_close();
    }
}else{
    header("Location: login.php");
}

 ?>