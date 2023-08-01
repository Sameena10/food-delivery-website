
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
            background-color:lightgreen;
            animation: fade-in 0.9s ease-in-out;
        }
    </style>
    <title>category</title>
</head>
<body>
    
    <div class="page-transition">
    
    <section class="categories">
        <div class="container" style="background-color:lightblue;border:4px solid yellow; width:70%; align-items:center;">
            <h2 class="text-center">Categories</h2>
            <h3 class="text-center">Click On Category</h3>
        <br> <br>
        <?php
        //display all cataogry that ae active
        $sql = "SELECT * FROM category WHERE active ='Yes'";
        //execute he query
        $res = mysqli_query($conn, $sql);
        //count rows
        $count = mysqli_num_rows($res);
        //check whether category available or not
        if ($count > 0) {
            //categories available
            while ($row = mysqli_fetch_assoc($res)) {
                //get values
                $id = $row['id'];
                $title = $row['title'];
                $image_name = $row['image_name'];
        ?>
                <a href="<?php echo SITEURL?>category-food.php?category_id=<?php echo $id;?>">
                    <div class="box-3 float-container">
                        <?php
                        if($image_name==""){
                            //image not available 
                            echo "<div class='error'>Image not availble</div>";
                        }else{
                            //image avaialable
                            ?>
                               <img src="<?php echo SITEURL;?>images/category/<?php echo $image_name;?>" width="110%"  alt="Pizza" class='img-responsive img-curve'>
                            <?php

                        }
                        ?>
                        <h3 class="float-text" style="color:yellow;"><?php echo $title?></h3>
                    </div>
                    <!-- <div>Click on Category Option</div> -->
                </a>
        <?php
            }
        } else {
            //category not available
            echo "<div class='error'>Category not availble</div>";
        }
        ?>
        <div class="clearfix"></div>
    </div>
</section>
    </div>
<!-- Categories Section Ends Here -->
</body>
</html>
<?php include('partials-front/footer.php'); ?>
    