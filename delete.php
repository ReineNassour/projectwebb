<?php
include 'db.php';
$id=$_GET['pid'];
$sql="DELETE FROM location where ID=$id ";
$conn->query($sql);
header("Location:admin.php");

?>