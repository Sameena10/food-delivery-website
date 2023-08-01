<?php include('partials-front/menu.php'); ?>
<?php
//check whether food id is set or not
if (isset($_GET['food_id'])) {
    //get the food id and details of selected food
    $food_id = $_GET['food_id'];
    //get the details
    $sql1 = "SELECT * FROM food WHERE id= $food_id";
    $res = mysqli_query($conn, $sql1);
    //count the row
    $count = mysqli_num_rows($res);
    //data available or not
    if ($count == 1) {
        //we have data
        //get data from database
        $row = mysqli_fetch_assoc($res);

        $title = $row['title'];
        $price = $row['price'];
        $image_name = $row['image_name'];
    } else {
        // food not available 
        //redirect to home page
        header('location:' . SITEURL);
    }
} else {
    //redirect to home page
    header('location:' . SITEURL);
}
?>
<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search">
    <div class="container">

        <h2 class="text-center text-white">Confirm Order</h2>

        <form action="" method="POST" class="order">
            <fieldset>
                <legend>Selected Food</legend>

                <div class="food-menu-img">
                    <?php
                    //check whetehr the omage availble or not
                    if ($image_name == "") {
                        //image not available
                        echo "<div cass='error'>Image not available</div>";
                    } else {
                    ?>
                        <img src="<?php echo SITEURL ?>images/food/<?php echo $image_name; ?>" alt="Chicke Hawain Pizza" class="img-responsive img-curve">

                    <?php

                    }
                    ?>
                </div>

                <div class="food-menu-desc">
                    <h3><?php echo $title; ?></h3>
                    <input type="hidden" name="food" value="<?php echo $title; ?>">
                    <p class="food-price">Rs.<?php echo $price; ?>/-</p>
                    <input type="hidden" name="price" value="<?php echo $price; ?>">
                    <div class="order-label">quantity</div>
                    <input type="number" name="quantity" class="input-responsive1" value="1" required>

                </div>

            </fieldset>

            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="full-name" placeholder="E.g. Anam khan" class="input-responsive2" required>

                <div class="order-label">Phone Number</div>
                <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive2" required>

                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. kameena143@gmail.com" class="input-responsive2" required>

                <div class="order-label">Address</div>
                <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive2" required></textarea>
                <!-- <form action="" method="post"> -->
                <div class="order-label">Payment option</div>

                <select name="payment_method">
                    <?php
                    // Array of payment options
                    $paymentOptions = array(
                        'cash on delivery'
                        // Add more payment options as needed
                    );

                    // Loop through the payment options and generate the dropdown options
                    foreach ($paymentOptions as $option) {
                        echo "<option value=\"$option\">$option</option>";
                    }
                    ?>
                </select>
                <!-- </form> -->
                <br> <br> <br>
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">

    </div>

    </fieldset>

    </form>
    <?php
    //check submit button clicked or not
    if (isset($_POST['submit'])) {
        //get all the details from the form
        $food = $_POST['food'];
        $price = $_POST['price'];
       $quantity = $_POST['quantity'];
        $total = $price * $quantity; //total= price* quantity
        $order_date = date("y-m-d h:i:sa"); // date on which order is placed
        $status = "Ordered";  //ordered on delivery cancelation
        $customer_name = $_POST['full-name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_adress = $_POST['address'];
        //save the order in dataase
        //creae sql
        $sql = "INSERT INTO  order_tbl  SET
            food= '$food',
            price= $price,
            quantity= $quantity,
            total =$total,
            order_date= '$order_date',
            status= '$status',
            customer_name= '$customer_name',
            customer_contact= '$customer_contact',
            customer_email= '$customer_email',
            customer_adress= '$customer_adress'
            ";
            // echo $sql2;
            // die();
        //execute the query
        $res2 = mysqli_query($conn, $sql);
        //check query executed or not
        if ($res2 == true) {
            //query executed  and order saved
            $_SESSION['order'] =  "<div class='success'><script >alert('Food ordered successfully');</script></div>";

            // "<div class='success' text-center>Food order successfully</div>";
            header('location:'.SITEURL);
        } else {
            //failed to save
            $_SESSION['order'] = "<div class='error'><script >alert('Failed');</script></div>";
            // "<div class='error' text-center>Food order fail</div>";
            header('location:'.SITEURL);
        }
    }
    ?>

    </div>
</section>
<?php include('partials-front/footer.php'); ?>