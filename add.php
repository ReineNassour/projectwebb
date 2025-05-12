<!DOCTYPE html>
<html lang="en">
<?php session_start(); ?>
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
    <div class="row text-center">
        <!-- Add Continent Button -->
        <div class="col-md-3 mb-3">
            <a href="addContinent.php" class="btn btn-primary w-100">Add Continent</a>
        </div>
        
        <div class="col-md-3 mb-3">
            <a  href="addCountry.php" class="btn btn-success w-100">Add Country</a>
        </div>
        
        <div class="col-md-3 mb-3">
            <a  href="addCity.php" class="btn btn-secondary w-100">Add City</a>
        </div>

        <div class="col-md-3 mb-3">
            <a href="addLocation.php" class="btn btn-danger w-100">Add Location</a>
        </div>
    </div>
</div>


<!-- <form method="post" action="">
ID : <input type="number" name="id"><br><br>
Type : <input type="text" name="type"><br><br>
City : <input type="text" name="city"><br><br>
Country : <input type="text" name="country"><br><br>
Continent : <input type="text" name="continent"><br><br>
Name : <input type="text" name="name"><br><br>
Description : <input type="text" name="description"><br><br>
Rating : <input type="number" name="rating"><br><br>
Price : <input type="text" name="price"><br><br>
Select Picture:
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div><br>
<button type="submit">Submit</button>
</form> -->

<?php
// include 'db.php';
// if($_SERVER['REQUEST_METHOD']=='POST'){
//     $id=$_POST['id'];
//     $type=$_POST['type'];
//     $city=$_POST['city'];
//     $country=$_POST['country'];
//     $continent=$_POST['continent'];
//     $name=$_POST['name'];
//     $desc=$_POST['description'];
//     $rating=$_POST['rating'];
//     $price=$_POST['price'];

//      if (empty($id) || empty($type) || empty($city) || empty($country) || empty($continent) || empty($name) || empty($desc) || empty($rating) || empty($price)) {
//         echo "<h3>All fields must be filled!</h3>";
//         exit();
//     }

//     $filename = $_FILES["uploadfile"]["name"];
// 	$tempname = $_FILES["uploadfile"]["tmp_name"];
// 	$folder = "./image/" . $filename;
          
// 	$sql = "INSERT INTO `location` (ID,Type,City,Country,Continent,Name,Description,Rating,image,price)
//      VALUES 
//      ('".$id."','".$type."','".$city."','".$country."','".$continent."','".$name."','".$desc."','".$rating."','".$filename."','".$price."')";

// 	$result=$conn->query($sql);

// 	if (move_uploaded_file($tempname, $folder)) {
// 		header("location:admin.php");
// 	} else {
// 		echo "<h3> Failed to upload image!</h3>";
// 	}
//            header("Location : admin.php");
//}
?>
                   
</body>
</html>