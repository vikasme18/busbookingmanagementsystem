<?php include"db.php" ?>
    <nav class="custom-nav navbar-font navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a style="font-size: 20px;" class="navbar-brand nav-brand" href="index.php">Vikas Bus</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="nav-item-font collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav-item-font nav navbar-nav container-font">
                    <?php 

                        $query = "SELECT *  FROM  categories";
                        $select_all_categories_query = mysqli_query($connection,$query);

                        while($row = mysqli_fetch_assoc($select_all_categories_query)) {
                            $cat_title = $row['cat_title'];
                            $cat_id = $row['cat_id'];
                            echo "<li> <a href='category.php?category=$cat_id'> {$cat_title} </a></li>";
                        }
                     ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">

                    <?php 
                    if(isset($_SESSION['s_username'])) {
                        if ($_SESSION['s_role']=='admin') {
                            ?>
                            <li>
                                <a href="admin/index.php"><i class="fa fa-fw fa-child"></i>Admin</a>
                            </li>
                    }
                    <?php } } ?>

<!--                <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li> -->

                    <?php 
                        if (isset($_SESSION['s_username'])) {
                            # code...
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php 

                                if(isset($_SESSION['s_username'])) {
                                echo ucfirst($_SESSION['s_username']);} ?> <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="profile.php"><i class="fa fa-fw fa-user"></i> Profile</a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="includes/logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                                    </li>
                                </ul>
                            </li>
                            
                    <?php    }
                    else {
                        echo '
                        <li>
                            <a href="registration.php"><i class="fas fa-solid fa-desktop icon-desktop"></i>Register Here</a>
                        </li>
                        <li>
                            <a href="login.php"><i class="fas fa-solid fa-user icon-desktop"></i>Login</a>
                        </li>
                        ';
                    }
                    ?>
                    

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
