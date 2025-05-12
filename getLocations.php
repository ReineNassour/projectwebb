<?php
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(isset($_POST['cityID'])){
        $cityID = $_POST['cityID'];
        include 'db.php';
        $sql="SELECT * FROM `location` where CITY_ID = $cityID ";
        $result=$conn->query($sql);

        if ($result->num_rows > 0) {
           while($row = $result->fetch_assoc()) {
               $cityID = $row['CITY_ID'];
               $citysql = "SELECT * FROM CITY WHERE ID = $cityID";
               $cityRes = $conn->query($citysql)->fetch_assoc();
               $cityName = $cityRes['NAME'];
               $countryID = $cityRes['country_id'];
               $countrysql = "SELECT * from country where id = $countryID";
               $countryRes = $conn->query($countrysql)->fetch_assoc();
               $countryName = $countryRes['NAME'];
               $continentID = $countryRes['CONTINENT_ID'];
               $continentsql = "SELECT NAME FROM CONTINENT WHERE ID = $continentID";
               $continentName = $conn->query($continentsql)->fetch_assoc()['NAME'];
        ?>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
           <div class="room-item shadow rounded overflow-hidden">
               <div class="position-relative">
               <img class="img-fluid" src="<?php echo $row['image'] ?>" alt="">
                   <small class="position-absolute start-0 top-100 translate-middle-y bg-primary text-white rounded py-1 px-3 ms-4"><?php echo $row['price'];?></small>
               </div>
               <div class="p-4 mt-2">
                   <div class="d-flex justify-content-between mb-3">
                       <h5 class="mb-0"><?php echo $continentName;?>-<?php echo $countryName;?>-<?php echo $cityName;?>- <?php echo $row['Name'];?></h5>

                       </h5>
                       <div class="ps-2">
                          <form method="post">
                           <p>Rate location</p>
                           <input type="number" name="rate" min="1" max="5" step="1"><br><br>
                           <input type="hidden" name="location_id" value="<?php echo $row['ID']; ?>">
                           <button type="submit" class="btn btn-sm btn-primary rounded py-2 px-4">Submit</button>
                           </form>
                       </div>
                   </div>
                   <p class="text-body mb-3"><?php echo $row['Description'];?></p>
                   <div class="d-flex justify-content-between">
                   <a href="fav.php?id=<?=$row['ID']?>" class="btn btn-sm btn-primary rounded py-2 px-4">Add to Favorite</a>
                   </div>
               </div>
           </div>
       </div>
       <?php  
       }
       }
       else {
           echo "No Locations found.";
       }
        
    }
}