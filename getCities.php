<?php
include "db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['countryID'])){
        $countryID = $_POST['countryID'];
        $sql = "SELECT * FROM city where country_id = $countryID";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) { ?>
            <option value="<?php echo $row['id'] ?>"> <?php echo $row['NAME'] ?></option>
        <?php }
    }
}