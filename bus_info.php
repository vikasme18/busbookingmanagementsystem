<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

<!-- Navigation -->
<?php include "includes/navigation.php"; ?>

<?php
$login_alert = false;
$btn_disable = false;

if (isset($_GET['bus_id'])) {
    $selected_bus = $_GET['bus_id'];
    if (!isset($_SESSION['s_username'])) {
        $login_alert = true;
        $login_alert = "Please login first";
        $btn_disable = true;
    }
}else {
    header("location: error404");
}
?>

<?php if ($login_alert) {
    echo '<div class="alert">
        <span class="closebtn" onclick="this.parentElement.style.display=' . 'none' . ';">&times;</span>
        ' . $login_alert . '
      </div>';
    } 
    
    else if (isset($_GET['fm'])) {
        if ($_GET['fm'] == 1) {
            echo '
            <div class="alert">
                <span class="closebtn" onclick="this.parentElement.style.display=' . 'none' . ';">&times;</span>
                All Field Mandetory!
            </div>';
        }
    }

    else if (isset($_GET['alert'])){
        if ($_GET['alert'] == 'passengerexist') {
            echo '
                <div class="alert">
                    <span class="closebtn" onclick="this.parentElement.style.display=' . 'none' . ';">&times;</span>
                    Use other name!
                </div>';
        }
    }
    


?>


<!-- Page Content -->
<div class="container">

    <div class="row">

        <!-- Blog Entries Column -->
        <div class="col-md-8">

        
        <div class="col-md-12 book-grid">

            <?php
            $query = "SELECT *  FROM  posts WHERE post_id = $selected_bus ";
            $select_all_bus_query = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($select_all_bus_query)) {
                $post_title = $row['post_title'];
                $bus_title = $row['post_title'];
                $bus_author = $row['post_author'];
                $bus_date = $row['post_date'];
                $bus_id = $row['post_id'];
                $bus_via = $row['post_via'];
                $times = $row['post_via_time'];
                $bus_cat = $row['post_category_id'];
                $available_seats = $row['available_seats'];
                $max_seats = $row['max_seats'];
                $bus_price = $row['price'];
                $bus_name = $row['bus_name'];
                $departure_time = $row['departure_time'];
                $arrival_time = $row['arrival_time'];
                $travel_time = $row['travel_time'];
                $source = $row['post_source'];
                $destination = $row['post_destination'];

            ?>

                <!-- First Blog Post -->
                <div class="main-bus-category">
                    <div class="book-info">
                        <h3 class="book-detail-heading">Booking Details</h3>
                    </div>
                    <div class="main-inner">
                        <div class="main-bus-heading">
                            <a class="bus-heading" href="bus_info.php?bus_id=<?php echo $post_id; ?>"><?php echo $post_title; ?></a>
                            <p><?php echo $bus_name; ?></p>
                        </div>
                        <div class="bus-timing">
                            <p class="start-time"><?php echo $departure_time; ?></p>
                            <div class="main-travel-direction">
                                <div class="travel-direction">
                                    <span class="left-bullet"></span>
                                    <span class="hrtz-line"></span>
                                    <span class="right-bullet"></span>
                                </div>
                                <span class="tavel-time"><?php echo $travel_time; ?></span>
                            </div>
                            <p class="end-time"><?php echo $arrival_time; ?></p>
                        </div>
                        <div class="bus-price">
                            <p>Starts from ₹<span><?php echo $bus_price; ?></span></p>
                            <p><?php echo $available_seats; ?> Seats Availabel</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 psg-grid">
                <div class="main-bus-category psg-detail-grid">
                    <form action="book_ticket.php?bus_id=<?php echo $selected_bus; ?>&fare=<?php echo $bus_price; ?>&source=<?php echo $source; ?>&destination=<?php echo $destination; ?>" method="POST">
                        <div class="book-info">
                            <h3 class="book-detail-heading">Add Passengers for this ticket</h3>
                        </div>
                        <div class="warning">
                        <img src="icon/warning-icon.png" alt="warning icon">
                        <p>Name should be same as in Goverment ID proof.</p>
                        
                        </div>
                        <p class="psg-select-info">You can select only one passenger for this ticket</p>
                        <div class="psg-info">
                        <input id="passenger-name" class="psg-input" type="text" name="passenger-name" placeholder="Full Name">
                        </div>
                        <div class="psg-email-phone-info">
                        <div class="psg-email">
                            <input id="passenger-email" class="psg-email-input" type="email" name="passenger-email" placeholder="Email" require>
                        </div>
                        <div class="psg-phone">
                            <input id="passenger-phone" class="psg-phone-input" type="text" name="passenger-phone" placeholder="Phone Number">
                        </div>
                        </div>
                        <div class="psg-age-info">
                        <div class="psg-age-half">
                            <input id="passenger-age" class="psg-input psg-age" type="text" name="passenger-age" placeholder="Age">
                        </div>
                        <div class="psg-gen-info">
                            <div class="psg-gen-half">
                            <div class="gen-title">Gender</div>
                            <div class="gen-male">
                                <input id="radio" class="gen-radio" type="radio" value="Male" name="gender">
                                <label for="">Male</label>
                            </div>
                            <div class="gen-female">
                                <input id="radio" class="gen-radio" type="radio" value="Female" name="gender">
                                <label for="">Female</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
                </div>
            </div>
            <div>
                <div class="col-md-4">
                    <div class="ticket-pay main-bus-category">
                        <div class="book-info">
                            <h3 class="ticket-heading">Ticket Fare</h3>
                        </div>
                        <div class="total-fare">
                            <p class="fare-title">Total Fare</p>
                            <p class="fare-value"><?php echo $bus_price; ?></p>
                        </div>
                        <div class="pay-now">
                            <button class="btn btn-primary btn-block btn-pay" type="submit">Proceed to Pay</button>
                        </div>
                    </div>
                </div>
                
            </div>
            </form>
        </div>
    </div>
    <?php } ?>
    </div>
</div>

<?php include "includes/footer.php"; ?>