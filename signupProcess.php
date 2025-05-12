<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    if (isset($_POST['fn'], $_POST['ln'], $_POST['email'], $_POST['pass'])) {
        include 'db.php';

        $email = $_POST['email'];
        $password = $_POST['pass'];
        $lname = $_POST['ln'];
        $fname = $_POST['fn'];

        if (empty($fname)) {
            $_SESSION['signupErr']['fn'] = "Enter a first name";
        }
        if (empty($lname)) {
            $_SESSION['signupErr']['ln'] = "Enter a last name";
        }
        if (validateEmail($email, $conn) !== true) {
            $_SESSION['signupErr']['email'] = validateEmail($email, $conn);
        }
        if (validatePassword($password) !== true) {
            $_SESSION['signupErr']['pass'] = validatePassword($password);
        }

        if (isset($_SESSION['signupErr'])) {
            header("Location: signup.php");
        } else {
            $sql = "INSERT INTO `user` VALUES(NULL,'$fname','$lname','$email','$password')";
            $conn->query($sql);
            $sql2 = "SELECT ID FROM `user` ORDER BY ID DESC LIMIT 1";
            $id = $conn->query($sql2)->fetch_assoc()['ID'];
            $_SESSION['user'] = [
                'id' => $id,
                "fullName" => $fname . ' ' . $lname,
                'email' => $email,
            ];
            header("Location: index.php");
        }
    }
}

function validateEmail($email, $conn)
{
    $parts = explode('@', $email);
    if (count($parts) != 2 || $parts[1] !== 'gmail.com') {
        return "Invalid email format.";
    }
    $result = $conn->query("SELECT ID FROM user WHERE Email = '$email'");
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
