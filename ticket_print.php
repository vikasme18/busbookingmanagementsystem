<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<?php 
if (isset($_SESSION['s_username'])) {
  ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php   
  if (isset($_GET['name'])){
    $psg_name = $_GET['name'];
    $psg_source = $_GET['s'];
    $psg_dest = $_GET['dest'];
    $psg_fare= $_GET['fare'];
    $psg_age = $_GET['age'];
    
  }else {
    header("location: error404");
  }
?>

<div class="container">
  <div>
    <h2>Your ticket has been booked</h2>
    <p>Go to your account to cancel the booking and to get refunded.</p>
  </div>
  
  <table>
    <thead>
      <th>Name</th>
      <th>Place</th>
      <th>Age</th>
      <th>Preview</th>
    </thead>
    <tr>
      <td><p><?php echo $psg_name; ?></p></td>
      <td><p><?php echo $psg_source; ?> to <?php echo $psg_dest; ?></p></td>
      <td><p><?php echo $psg_age; ?></p></td>
      <td><a href="">View</a></td>
    </tr>
  </table>
</div>


<?php include "includes/footer.php"; ?>

<?php 
} else {
  header("location: Error404");
  exit();
}
?>