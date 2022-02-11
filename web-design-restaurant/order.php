<?php include('partials-front/menu.php');?>

    <?php 
    if(isset($_GET['food_id'])){

         $food_id=$_GET['food_id'];
         $sql= "SELECT * FROM tbl_food WHERE id =$food_id";
         $res = mysqli_query($conn,$sql);
         $count =mysqli_num_rows($res);
         if($count > 0){
            // we have data
            while($rows= mysqli_fetch_assoc($res))
            {
                // using while loop to get the data in the database 
                
                // get individual data 
                $title = $rows ['title'];
                $image_name = $rows['image_name'];
                $price = $rows['price'];
                $description = $rows['description'];
               
            }
        }
    }
    else{
        // redirect to homepage
        header("location:".HOMEURL.'/index.php');
    }
    ?>
  

    <link rel="stylesheet" href="css/styles.css">
    <section class="food-search">
        <div class="container">
            
            <h2 class="text-center text-white">Fill this form to confirm your order.</h2>

            <form action="" method = POST  class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php 
                        if ($image_name ==''){
                            // image not available
                            echo '<div clase ="error"></div>image now available </div>';
                        }
                        else{
                            ?>
                            <!-- this is for the image first -->
                            <img src="<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>" alt="<?php echo$title ?>" class="img-responsive img-curve" id ='image'>
                            <!-- image stops here now its -->
                            <?php
                        }
                            ?>
                        
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title?></h3>
                        <input type =hidden name=food value = <?php echo $title;?>>
                        <p class="food-price"> KSH <?php echo $price?></p>
                        <input type =hidden name=price value = <?php echo $price;?>>
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required min=1>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Joshua  Odhiambo" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 9843xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. hi@odhiambo.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>
                

            </form>
                 
            <?php
            if(isset($_POST['submit'])){
                // get all the data from the form
                $date = new \DateTime();
                $date->setTimezone(new \DateTimeZone('+0300')); //GMT
                //echo $date->format('Y-m-d H:i:sa');
                $food = $_POST['food'];
                $price = $_POST['price'];
                $qty = $_POST['qty'];
               
                $total = $price * $qty;

                $order_date = $date->format('Y-m-d H:i:sa');//order date 
                $status ='Ordered'; // ordered, on delivery and delivered, cancelled 
                $customer_name = $_POST['full-name'];
                $customer_contact = $_POST['contact'];
                $customer_email = $_POST['email'];
                $customer_address = $_POST['address'];

                // save the order in Database
                //create sql to save the data
                $sql2= "INSERT INTO tbl_order SET 
                food ='$food',
                price =$price,
                quantity =$qty,
                total=$total,
                order_date ='$order_date',
                status ='$status',
                customer_name ='$customer_name',
                customer_contact ='$customer_contact',
                customer_email ='$customer_email',
                customer_adress ='$customer_address'
                ";
                //echo $sql2; die();
               $res2 = mysqli_query($conn , $sql2);
                // check whether execution is succesful or not 
                if ($res2==true)
                {
                    
                    // query executed and oder saved 
                    $_SESSION['order']="<div class= 'sucess text-center' > Order placed Succesfully</div>";
                    header('location:'.HOMEURL.'index.php');
                }
                else{
                   
                    $_SESSION['order']="<div class= 'error text-center'> failed to order food</div>";
                    header('location:'.HOMEURL.'index.php');
                        
                   
                }


            }
            else{
                // they havent clicked submit 
            }
            ?>

        </div>
    </section>
    
</body>
</html>