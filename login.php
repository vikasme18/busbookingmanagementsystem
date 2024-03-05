<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>
    
    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>

<!-- Login -->
<?php

if (!isset($_SESSION['s_username'])) {
    ?>
        <div class="bus-login-form">
            <form action="includes/login.php" method="post">

                    <!-- <input name="username" type="text" class="form-control" placeholder="Username">
                    <input name="password" type="password" class="form-control" placeholder="Password" style="margin-top: 10px;">

                    <button class="btn btn-primary" name="login" style="margin-left: 130px; margin-top: 10px;">Login</button> -->

              <div class="form-container">
              <h1 class="login-heading">Login</h1>
              <hr/>
              <div class="form-inner-container">
                <label for="uname"><strong>Username</strong></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="psw"><strong>Password</strong></label>
                <input type="password" placeholder="Enter Password" name="password" required>
              </div>
              <div class="container" style="background-color: #eee">
                <label style="padding-left: 15px">
                <input type="checkbox"  checked="checked" name="remember"> Remember me
                </label>
                <span class="psw"><a href="#"> Forgot password?</a></span>
              </div>
              <button class="login-btn" type="submit" name="login">Login</button>
              
    
                
            </form>
        </div>
    
<?php } ?>

<?php include "includes/footer.php"; ?>