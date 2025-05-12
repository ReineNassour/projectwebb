<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
<?php
include 'db.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $city = $_POST['city'];
    $country = $_POST['country'];

    if (empty($city) || empty($country)) {
        echo "<h3>All fields must be filled!</h3>";
        exit();
    }

    $sql = "INSERT INTO `City` (NAME,country_id) VALUES('$city',$country)";
    $result = $conn->query($sql);
    header("Location: add.php");
}
?>

<head>
    <meta charset="utf-8">
    <title>Hotelier - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <?php
    include 'adminheader.php';
    ?>
    <br>
    <div class="container my-4">
        <form method="post" action="">
            City Name : <input type="text" name="city"><br><br>
            Country: <select name="country">
                <?php
                $sql = "SELECT * FROM Country;";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) { ?>
                    <option value="<?php echo $row['ID']; ?>"><?php echo $row['NAME']; ?></option>
                <?php } ?>
                ?>
            </select>
            <button type="submit">Submit</button>
        </form>
</body>

</html>