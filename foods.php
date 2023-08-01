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
    <title>Menu</title>
</head>
<body>   
    <!-- fOOD sEARCH Section Starts Here -->
    <div class="page-transitionn">
    <section class="food-search text-center">
        <div class="container">
            
            <form action="<?php echo SITEURL;?>food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->
    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Foods</h2>
            <?php 
            //display food that are active
            $sql= "SELECT * FROM food WHERE active= 'Yes'";
            $res= mysqli_query($conn, $sql);
            $count= mysqli_num_rows($res);
            if($count>0){
                //food availble
                while($row=mysqli_fetch_assoc($res)){
                    $id= $row['id'];
                    $title= $row['title'];
                    $description= $row['description'];
                    $price= $row['price'];
                    $image_name= $row['image_name'];
                    ?>
                    <div class="food-menu-box">
                        <div class="food-menu-img">
                            <?php
                   if($image_name==""){
                       echo "<div class='error'>Image not availble</div>";
                    }else{
                        ?>
                    <img src="<?php echo SITEURL;?>images/food/<?php echo $image_name;?>" alt= "Chicke Hawain Pizza" class="img-responsive img-curve">
                    <?php
                   }
                   ?>
                    
                </div>
                    <!-- </div> -->
                    <div class="food-menu-desc">
                <h4><?php echo $title;?></h4>
                <p class="food-price">Rs.<?php echo $price ;?>/-</p>
                <p class="food-detail">
                    <?php  echo $description;?>
                </p>
                <br>
                <a href="<?php echo SITEURL;?>order.php?food_id=<?php echo $id;?>" class="btn btn-primary">Order Now</a>
            </div>
        </div>
                     <?php
                }
            }else{
                echo "<div class='error'>Food not available</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->
        </div>

</body>
</html>
    <?php include('partials-front/footer.php'); ?>