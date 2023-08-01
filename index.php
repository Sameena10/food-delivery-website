<?php include('partials-front/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <style>
        @keyframes fade-in {
            from {
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }

        .page-transition {
            animation: fade-in 0.9s ease-in-out;
        }
     </style>
     <title>index</title>
</head>

<body> 
    <!-- food search start here -->
    <div class="page-transition"></div>
    <section class="food-search text-center">
        <div class="container">
            <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <?php
    if (isset($_SESSION['order'])) {
        echo $_SESSION['order'];
        unset($_SESSION['order']);
    }
    if (isset($_SESSION['contact'])) {
        echo $_SESSION['contact'];
        unset($_SESSION['contact']);
    }
    ?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">FOOD CATEGORIES</h2>
            <?php
            $sql = "SELECT * FROM category WHERE active= 'Yes' AND featured='Yes' LIMIT 3";

            $res = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($res);
            if ($count > 0) {
                //category available
                while ($row = mysqli_fetch_assoc($res)) {
                    //get values like id title image_name
                    $id = $row['id'];
                    $title = $row['title'];
                    $image_name = $row['image_name'];
            ?>

                    <a href="<?php echo SITEURL; ?>category-food.php?category_id=<?php echo $id; ?>">
                        <div class="box-3 float-container">
                            <?php
                            if ($image_name == "") {
                                echo "<div class='error'>image not available</div>";
                            } else {
                            ?>
                                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name ?>" alt="Pizza" class='img-responsive img-curve'>

                            <?php
                            }
                            ?>
                            <h3 class="float-text text-white"></h3>

                        </div>
                    </a>
            <?php

                }
            } else {
                echo "<div class='error'>Category not avaialble</div>";
            }


            ?>
        </div>
    </section>
    <br>
    <br>
    <br>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food</h2>
            <?php
            //getting food from databasethat are active and features
            //sql query
            $sql2 = "SELECT * FROM food WHERE active='Yes' AND featured ='Yes' LIMIT 3";
            $res2 = mysqli_query($conn, $sql2);
            $count2 = mysqli_num_rows($res2);
            //check whether food avaialable or not
            if ($count2 > 0) {
                //food available
                while ($row = mysqli_fetch_assoc($res2)) {
                    //get all values
                    $id = $row['id'];
                    $title = $row['title'];
                    $price = $row['price'];
                    $description = $row['description'];
                    $image_name = $row['image_name'];
            ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                            // check whether image available or not 
                            if ($image_name == "") {
                                //image nt available

                                echo "<div class='error'>Image not avaialbel</div>";
                            } else {
                                //available image
                            ?>
                                <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">
                            <?php
                            }
                            ?>
                            <!-- <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve"> -->
                        </div>

                        <div class="food-menu-desc">
                            <h4><?php echo $title; ?></h4>
                            <p class="food-price">Rs.<?php echo $price; ?>/-</p>
                            <p class="food-detail">
                                <?php echo $description; ?>
                            </p>
                            <br>
                            <a href="<?php echo SITEURL; ?>order.php?food_id=<?php echo $id; ?>" class="btn btn-primary">Order Now</a>
                        </div>
                    </div>
            <?php

                }
            } else {
                //food not available
                echo "<div class='error'>Food not availbel</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
        <p class="text-center">
            <a href="#">See All Foods</a>
        </p>
    </section>
        </div>
    <!-- <script src="script.js"></script>  -->

    <!-- fOOD Menu Section Ends Here -->

    <!-- social Section Starts Here-->
</body>

</html> 
<?php include('partials-front/footer.php');
