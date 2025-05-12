<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    if (isset($_POST['fn'],$_POST['email'], $_POST['pass'])) {
        include 'db.php';

        $email = $_POST['email'];
        $password = $_POST['pass'];
        $name = $_POST['fn'];
        

        if (empty($name)) {
            $_SESSION['signupErr']['ln'] = "Enter a name";
        }
        if (validateEmail($email, $conn) !== true) {
            $_SESSION['signupErr']['email'] = validateEmail($email, $conn);
        }
        if (validatePassword($password) !== true) {
            $_SESSION['signupErr']['pass'] = validatePassword($password);
        }

        if (isset($_SESSION['signupErr'])) {
            header("Location: signupadp.php");
        } else {
            $sql = "INSERT INTO `admin` VALUES(NULL,'$name','$email','$password')";
            $conn->query($sql);
            $sql2 = "SELECT ID FROM `admin` ORDER BY ID DESC LIMIT 1";
            $id = $conn->query($sql2)->fetch_assoc()['ID'];
            $_SESSION['admin'] = [
                'id' => $id,
                "Name" => $name,
                'email' => $email,
            ];
            header("Location: admin.php");
        }
    }
}

function validateEmail($email, $conn)
{
    $parts = explode('@', $email);
    if (count($parts) != 2 || $parts[1] !== 'gmail.com') {
        return "Invalid email format.";
    }
    $result = $conn->query("SELECT ID FROM admin WHERE Email = '$email'");
    if ($result->num_rows > 0) {
        return "Email already exists.";
    }

    return true;
}

// Function to validate password
function validatePassword($password)
{
    $hasDigit = false;
    $hasUpper = false;
    $hasSpecial = false;
    $specialChars = ['$', '@', '!', '#'];

    if (strlen($password) < 8) {
        return "Password must be at least 8 characters long.";
    }

    for ($i = 0; $i < strlen($password); $i++) {
        $char = $password[$i];
        if (ctype_digit($char)) {
            $hasDigit = true;
        } elseif (ctype_upper($char)) {
            $hasUpper = true;
        } elseif (in_array($char, $specialChars)) {
            $hasSpecial = true;
        }
    }

    if (!$hasDigit) {
        return "Password must contain at least one digit.";
    }
    if (!$hasUpper) {
        return "Password must contain at least one uppercase letter.";
    }
    if (!$hasSpecial) {
        return "Password must contain at least one special character ($, @, !, or #).";
    }

    return true;
}
