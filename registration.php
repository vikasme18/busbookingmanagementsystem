<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
<?php 
  if (!isset($_SESSION['s_username'])) {
?>
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<?php

if (isset($_POST['register'])) {
//echo "registered";
    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $phone_no = $_POST['phone_no'];
    $password = $_POST['password'];

    $image = $_FILES['image']['name'];
    $tmp_image = $_FILES['image']['tmp_name'];

    move_uploaded_file($tmp_image, "images/$image");
    if ($image == "") {
      $image = "user_default.jpg";
    }

if ($username=="" || $firstname=="" || $lastname=="" || $email=="" || $phone_no=="" || $image=="" || $password=="") {
  # code...
  echo "**ALL FIELDS MANDATORY";
}
elseif (strlen($phone_no)!=10) {
  # code...
  echo "**PhoneNo Must Contain Of 10 bits";
}

else {

$query = "INSERT INTO users(username, user_password, user_firstname, user_lastname, user_email, user_phoneno, user_role, user_image) VALUES('$username', '$password', '$firstname', '$lastname', '$email', '$phone_no', 'subscriber', '$image') ";

$register_user = mysqli_query($connection, $query);

if(!$register_user) {
    die("Query Failed" . mysqli_error($connection));
}

header("Location: index.php");

}

}

?>

    <!-- Page Content -->
    <!-- <div class="container jumbotron" style="width: 45%; border-radius: 15px"> -->

    <div class="container">
        <div class="row">
            <div class="col-lg-6">
              <h2 class="regi-heading">Registration</h2>
              <form style="font-family: 'Heebo'; font-weight: 500; font-size: 16px;" action="" method="post" enctype="multipart/form-data">
                
                <div class="form-group">
                  <label style="font-weight: 500;" for="email">Username:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Username" name="username">
                </div>

                <div class="form-group">
                  <label style="font-weight: 500;" for="email">Firstname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Firstname" name="firstname">
                </div>

                <div class="form-group">
                  <label style="font-weight: 500;" for="email">Lastname:</label>
                  <input type="text" class="form-control" id="email" placeholder="Enter Lastname" name="lastname">
                </div>

                <div class="form-group">
                    <label style="font-weight: 500;" for="bus-image">UserImage</label>
                    <input type="file" name="image" >
                </div>

                <div class="form-group">
                  <label style="font-weight: 500;" for="email">Email:</label>
                  <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                
                <div class="form-group">
                  <label style="font-weight: 500;" for="pwd">Phone No:</label>
                  <input type="text" class="form-control" id="pwd" placeholder="Enter password" name="phone_no">
                </div>

                <div class="form-group">
                  <label style="font-weight: 500;" for="pwd">Password:</label>
                  <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>

                <div class="regi-btn-grid">
                  <button type="submit" class="btn btn-primary regi-btn" name="register">Register</button>
                  <button type="submit" class="btn btn-primary regi-btn" name="clear">Clear</button>
                </div>
              </form>
            </div>

            <div class="col-lg-6 regi-bus-grid">
                <img class="regi-bus-img" src="images/bus-seats.jpg">
            </div>
        </div>

    </div>
        <hr>

<?php include "includes/footer.php"; ?>

<?php
  }else {
    header("location: error404");
    exit();
  } 
?>