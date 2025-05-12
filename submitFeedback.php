<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    session_start();
    if (isset($_POST['feedback'], $_SESSION['user'])) {
        $feedback = $_POST['feedback'];
        $fullName = $_SESSION['user']['fullName'];
        $id = $_SESSION['user']['id'];

        $sql = "INSERT INTO Feedback (UserID,Comment,Date_Time) VALUES ($id,'$feedback',NOW());";
        include "db.php";
        $conn->query($sql);
        header("Location: index.php");
        session_write_close();
    }
}
