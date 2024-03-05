<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php
  if(isset($_SESSION['s_username'])) {
?>

<?php
$alert_field_mandatory = false;
if (isset($_GET['bus_id']) && isset($_GET['fare'])){
  $bus_id = $_GET['bus_id'];
  $fare = $_GET['fare'];
  $source = $_GET['source'];
  $destination = $_GET['destination'];
  if (isset($_SESSION['s_username'])) {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')  {
      if ($_POST['passenger-name'] == "" || $_POST['passenger-email'] == "" || $_POST['passenger-phone'] == "" || $_POST['passenger-age'] == "" || $_POST['gender'] == "") {
        $alert_field_mandatory = true;
        header("location: bus_info.php?bus_id=$bus_id&fm=1");
      } else {
        $name = $_POST['passenger-name'];
        $email = $_POST['passenger-email'];
        $phone = $_POST['passenger-phone'];
        $age = $_POST['passenger-age'];
        $gender = $_POST['gender'];
        $user_id = $_SESSION['s_id'];
        $current_date = date("d/m/y");
        $checkpsg_sql = "SELECT * FROM `orders` WHERE `bus_id` = '$bus_id' AND `psg_name` = '$name' AND `date` = '$current_date'";
        $checkresult = mysqli_query($connection, $checkpsg_sql);
        $num = mysqli_num_rows($checkresult);
        if ($num > 0) {
          header("Location: bus_info.php?bus_id=$bus_id&alert=passengerexist");
          exit();
        } 
        else {
          $sql = "INSERT INTO `orders` (`order_id`, `bus_id`, `user_id`, `psg_name`, `user_age`, `source`, `destination`, `date`, `cost`, `gender`, `phone_number`, `email`, `status`) VALUES (NULL, '$bus_id', '$user_id', '$name', '$age', '$source', '$destination', '$current_date', '$fare', '$gender', '$phone', '$email', 'booked')";
          $result = mysqli_query($connection, $sql);
          if ($result) {
          header("location: ticket_print.php?name=$name&s=$source&dest=$destination&fare=$fare&age=$age");
          } 
          else {
            header("location: Error404");
            exit();
          }
        }
      }
    }else {
      header("location: Error404");
      exit();
    }

  }else {
    header("location: bus_info.php?bus_id=$bus_id");
  }
} else {
  header("location: Error404");
  exit();
}

?>
<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php include "includes/footer.php"; ?>
<?php
  } else {
    header("location: Error404");
    exit();
  } 
?>