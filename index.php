<?php include "includes/db.php"; ?>
<?php include "includes/header.php"; ?>

    <!-- Navigation -->
    <?php include "includes/navigation.php"; ?>
    
    <?php
        if (isset($_GET['fm'])) {
            echo "Fields Mandatory";
        }
    ?>

    <!-- Section A -->
    <section id="main-screen">
        <div class="main-back-img">
            <img class="background-img" src="images/bus-background1.jpg" alt="Bus Image">
            <div class="search-box"><?php include "includes/search.php"; ?></div>
        </div>
    </section>

    <section>
        <?php include "includes/routes.php"; ?>
    </section>

    <section id="carousel">
        <?php include "includes/carousel.php"; ?>
    </section>

    <section>
        <?php include "includes/partner.php"; ?>
    </section>
    

<?php include "includes/footer.php"; ?>