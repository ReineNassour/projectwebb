<!DOCTYPE html>
<html lang="en">
<?php session_start();
include "db.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
    $type=$_POST['type'];
    $city=$_POST['city'];
    $name=$_POST['name'];
    $desc=$_POST['description'];
    $price=$_POST['price'];

     if (empty($type) || empty($city)  || empty($name) || empty($desc) || empty($price)) {
        echo "<h3>All fields must be filled!</h3>";
        exit();
    }

    $filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];
	$folder = "./img2/" . $filename;
          
	$sql = "INSERT INTO `location` (Type,Name,CITY_ID,Description,image,price)
     VALUES('$type','$name',$city,'$desc','img2/$filename','$price') ";

	$result=$conn->query($sql);

	if (move_uploaded_file($tempname, $folder)) {
		header("Location:admin.php");
	} else {
		echo "<h3> Failed to upload image!</h3>";
	}
           header("Location: admin.php");
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

<div class="d-flex justify-content-center align-items-center">
    
<form method="post" action=""  class="pb-5" enctype="multipart/form-data">
Type : <select name="type">
 <option value="Museum">Museum</option>
 <option value="Hotel">Hotel</option>
 <option value="Garden">Garden</option>
      </select><br><br>
Name : <input type="text" name="name"><br><br>
City : <select name="city">
                <?php
                $sql = "SELECT * FROM City;";
                $res = $conn->query($sql);
                while ($row = $res->fetch_assoc()) { ?>
                    <option value="<?php echo $row['id']; ?>"><?php echo $row['NAME']; ?></option>
                <?php } ?>
                ?>
            </select><br><br>
Description : <br> 
<textarea name="description" style="width:400px; height:200px;"></textarea>
<br><br>
Price : <input type="text" name="price"><br><br>
Select Picture:
			<div class="form-group">
				<input class="form-control" type="file" name="uploadfile" value="" />
			</div><br>
<button type="submit">Submit</button>
</form>
</div>                 
</body>
</html>