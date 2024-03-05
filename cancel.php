<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php
  if (isset($_SESSION['s_username'])) {
    $user_id = $_SESSION['s_id'];
    $sql_query = "SELECT * from `orders` WHERE `user_id` == '$user_id'";
    $result = mysqli_query($connection, $sql_query);
    while ($rows = mysqli_fetch_assoc($result)) {
      $user_name = $row[''];
    }
  } else {

  }
?>

<?php include "includes/footer.php"; ?> 