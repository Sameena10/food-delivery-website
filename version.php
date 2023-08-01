<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/admin.css">
  <title>food order:home page</title>
</head>

<body>
  <?php include('partials/menu.php'); ?>

  <!-- main content start -->
  <div class="main-content">
    <div class="wrapper">
      <!-- <h1>Dashboard</h1>
      <br> <br> -->
      <?php
      if (isset($_SESSION['login'])) {
         echo $_SESSION['login'];
        unset($_SESSION['login']);
       }
       ?>
      
      <br> <br>

       <!-- <strong>Dashboard</strong> -->
      <div class="col-4 text-center">
        <?php
        $sql = "SELECT * FROM category";
        //execute query
        $res = mysqli_query($conn, $sql);
        //count row
        $count = mysqli_num_rows($res);

        ?>
        <h1><?php echo $count; ?></h1>
        <br>
        Categories
      </div>
      <div class="col-4 text-center">
        <?php
        $sql2 = "SELECT * FROM food";
        //execute query
        $res2 = mysqli_query($conn, $sql2);
        //count row
        $count2 = mysqli_num_rows($res2);
        ?>
        <h1><?php echo $count2;?></h1>
        </br>
        Foods
      </div>
      <div class="col-4 text-center">
      <?php
            $sql3= "SELECT * FROM order_tbl";
            //execute query
            //count row
            $res3 = mysqli_query($conn, $sql3);
            $count3= mysqli_num_rows($res3);
            ?>
        <h1><?php echo $count3;?></h1>
        </br>
        Total Orders
      </div>
      <div class="col-4 text-center">
        <?php
           //sql query to generate revennue
           $sql4= "SELECT SUM(total) AS Total FROM order_tbl WHERE status= 'Delivered'";
           //execute the query
           $res4= mysqli_query($conn, $sql4);
           //gget the values
           $row4= mysqli_fetch_assoc($res4);
           //get total revenue
           $total_revenue= $row4['Total'];
        ?>
        <h1><?php echo $total_revenue?></h1>
        <br>
        Revenue Generated 
      </div>
      <div class="clearfix">
</div>
    </div>
  </div>
  <?php include('partials/footer.php'); ?>