<?php
include "db.php";
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['ContinentID'])){
        $ContinentID = $_POST['ContinentID'];
        $sql = "SELECT * FROM country where CONTINENT_ID = $ContinentID";
        $res = $conn->query($sql);
        while ($row = $res->fetch_assoc()) { ?>
            <option value="<?php echo $row['ID'] ?>"> <?php echo $row['NAME'] ?></option>
        <?php }
    }
}