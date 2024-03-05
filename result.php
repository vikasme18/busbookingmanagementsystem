<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<div class="container main-container">
  <div class="row bus-container">
    <div class="col-md-9">
      <?php 
        if (isset($_GET['source'])) {
          $source = $_GET['source'];
          $destination = $_GET['destination'];
          $date = $_GET['date'];
          
          $sql = "SELECT * FROM `posts` WHERE MATCH (post_source, post_destination) against ('$source')";
          $result = mysqli_query($connection, $sql);
          while ($row = mysqli_fetch_assoc($result)) {
            $post_title = $row['post_title'];
            $post_id = $row['post_id'];
            $seats_available = $row['available_seats'];
            $bus_price = $row['price'];
            $bus_name = $row['bus_name'];
            $departure_time = $row['departure_time'];
            $arrival_time = $row['arrival_time'];
      ?>

      <!-- First Blog Post -->
      <div class="main-bus-category">
          <div class="main-inner">
              <div class="main-bus-heading">
              <a class="bus-heading" href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a> 
              <p><?php echo $bus_name; ?></p>
              </div>
              <div class="bus-timing">
                  <p class="start-time"><?php echo $departure_time; ?></p>
                  <p class="end-time"><?php echo $arrival_time; ?></p>
              </div>
              <div class="bus-price">
                  <p>Starts from ₹<span><?php echo $bus_price; ?></span></p>
                  <p><?php echo $seats_available; ?> Seats Availabel</p>
              </div>
              <div class="btn-book">
                  <a href="bus_info.php?bus_id=<?php echo "$post_id"; ?>" class="btn btn-primary">Book Now</a>
              </div>
          </div>
      </div>

      <?php
          }
        }else {
          header("location: error404");
        }
      ?>
    </div>
  </div>
</div>

<?php include "includes/footer.php"; ?>
