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
    <title>Contact</title>
</head>
<body>
    <div class="page-transition">
    
    <section class="contact">
        <div class="container">

        <h2 class="text-center text-white">Contact Us</h2>

        <form action="" method="POST" class="order" style="border: 4px solid black; background-color:lightpink">
            <fieldset>
                <legend style="text-align: center;font-size: medium;font-weight: bold; background-color: aqua; border:1px black;">Contact Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" name="name" placeholder="E.g. Anam khan" class="input-responsive2"  required>
                <div class="order-label">Email</div>
                <input type="email" name="email" placeholder="E.g. kameena143@gmail.com" class="input-responsive2" required>

                <div class="order-label">Number:</div>
                <input type="tel" name="number" placeholder="E.g. 9843xxxxxx" class="input-responsive2" required>

                <div class="order-label">Message</div>
                <textarea name="message" cols="30" rows="5" placeholder="detail" required></textarea>
                 <br> <br>
                <input type="submit" name="submit" value="confirm information" class="btn btn-primary">
                 <br> <br>                
            </div>

            </fieldset>

        </form>
        <?php
        //check submit button clicked or not
        if (isset($_POST['submit'])) {
            //get all the details from the form
            $name = $_POST['name'];
            $email = $_POST['email'];
            $number = $_POST['number'];
            $message = $_POST['message'];
            //save the order in dataase
            //creae sql
            $sql = "INSERT INTO  contact_tbl  SET    
                name= '$name',
                email= '$email',
                number= '$number',
                message= '$message'
                ";
                // echo $sql2;
                // die();
            //execute the query
            $res = mysqli_query($conn, $sql);
            //check query executed or not
            if ($res == true) {
                //query executed  and order saved
                $_SESSION['contact'] = "<div class='success'><script >alert('contact successfully');</script></div>";
                header('location:'.SITEURL);
            } else {
                //failed to save
                $_SESSION['contact'] ="<div class='error'><script >alert('Failed to contact');</script></div>";
                header('location:'.SITEURL.'contact.php');
            }
        }
        ?>

    </div>
</section>
</div>
</section>
</div>
</body>
</html>
<?php include('partials-front/footer.php'); ?>
