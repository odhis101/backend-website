

<?php include('partials-front/menu.php');?>

    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
           <!-- breakfast-->
            <a href="#breakfast">
            <div class="box-3 float-container" id = section1>
                <img src="images/breakfast.jpg" alt="Pizza" class="img-responsives img-curves">
                
                <h3 class="float-text text-white">Breakfast</h3>
            </div>
            </a>
            <!-- Lunch-->
            <a href="#lunch">
            <div class="box-3 float-container">
                <img src="images/burger.jpg" alt="Burger" class="img-responsives img-curves">

                <h3 class="float-text text-white tex">Lunch&Dinner</h3>
            </div>
            </a>
            <!-- Beverages-->
            <a href="#beverages">
            <div class="box-3 float-container">
                <img src="images/momo.jpg" alt="Momo" class="img-responsives img-curves">

                <h3 class="float-text text-white">Beverages</h3>
            </div>
            </a>

</br>
<div class="clearfix"></div>
<?php
        if(isset($_SESSION['order'])){
            echo $_SESSION['order'];//outing session message 
            unset($_SESSION['order']);
        }
        ?>
            <h2 id=breakfast><center>Breakfast</center></h2>
            <?php
            // create a sql query to display categories 
            $sql2 ='SELECT * FROM tbl_food where active = "yes" AND featured ="yes" AND category_id = "33"';
            $res = mysqli_query($conn,$sql2);
            $count =mysqli_num_rows($res);
            if($count > 0){
                // we have data
                while($rows= mysqli_fetch_assoc($res))
                {
                    // using while loop to get the data in the database 
                    
                    // get individual data 
                    $id = $rows ['id'];
                    $title = $rows ['title'];
                    $image_name = $rows['image_name'];
                    $price = $rows['price'];
                    $description = $rows['description'];
                    ?>
                     
                <div class="food-menu-box-2" >
                <!-- this is for the image first -->    
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
                        </div>
                

                        <div class="food-menu-desc-2">
                        <h4><?php echo $title?></h4>
                        <p class="food-price-2">Ksh <?php echo$price ?></p>
                        <p class="food-detail">
                            <?php echo $description ?>
                        </p>
                        <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary "  data-price="<?php echo $price ?>" data-name="<?php echo$title ?>"  data-image="<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>">Add To Cart</a>
                        
                    </div>
                        </div>
            
                        <?php
                        }    
                }
            }   
            else{
                // catefories not availablle 
                echo '<div class ="error" > category not available </div>';

            }
            
            ?>
        
            <div class="clearfix"></div> 
            <h2 id=lunch><center>Lunch & dinner</center></h2>
            <!--work on scorll to top later -->         
            <?php
            // create a sql query to display categories 
            $sql ='SELECT * FROM tbl_food where active = "yes" AND featured ="yes" AND category_id = "36"';
            $res = mysqli_query($conn,$sql);
            $count =mysqli_num_rows($res);
            if($count > 0){
                // we have data
                while($rows= mysqli_fetch_assoc($res))
                {
                    // using while loop to get the data in the database 
                    
                    // get individual data 
                    $id = $rows ['id'];
                    $title = $rows ['title'];
                    $image_name = $rows['image_name'];
                    $price = $rows['price'];
                    $description = $rows['description'];
                    ?>
                     
                <div class="food-menu-box-2" >
                <!-- this is for the image first -->    
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
                        </div>
                

                        <div class="food-menu-desc-2">
                        <h4><?php echo $title?></h4>
                        <p class="food-price-2">Ksh <?php echo$price ?></p>
                        <p class="food-detail">
                            <?php echo $description ?>
                        </p>
                        <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary "  data-price="<?php echo $price ?>" data-name="<?php echo$title ?>"  data-image="<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>">Add To Cart</a>
                        
                    </div>
                        </div>
            
                        <?php
                        }    
                }
            }   
            else{
                // catefories not availablle 
                echo '<div class ="error" > category not available </div>';

            }
            
            ?>


        
        <div class="clearfix"></div> 
        <h2 id=beverages><center>Beverages</center></h2>
        <!--work on scorll to top later -->         
        <?php
        // create a sql query to display categories 
        $sql ='SELECT * FROM tbl_food where active = "yes" AND featured ="yes" AND category_id = "37"';
        $res = mysqli_query($conn,$sql);
        $count =mysqli_num_rows($res);
        if($count > 0){
            // we have data
            while($rows= mysqli_fetch_assoc($res))
            {
                // using while loop to get the data in the database 
                
                // get individual data 
                $id = $rows ['id'];
                $title = $rows ['title'];
                $image_name = $rows['image_name'];
                $price = $rows['price'];
                $description = $rows['description'];
                ?>
                 
            <div class="food-menu-box-2" >
            <!-- this is for the image first -->    
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
                    </div>
            

                    <div class="food-menu-desc-2">
                    <h4><?php echo $title?></h4>
                    <p class="food-price-2">Ksh <?php echo$price ?></p>
                    <p class="food-detail">
                        <?php echo $description ?>
                    </p>
                    <a href="<?php echo HOMEURL; ?>order.php?food_id=<?php echo $id ?>" class="btn btn-primary "  data-price="<?php echo $price ?>" data-name="<?php echo$title ?>"  data-image="<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>">Add To Cart</a>
                    
                </div>
                    </div>
        
                    <?php
                    }    
            }
        }   
        else{
            // catefories not availablle 
            echo '<div class ="error" > category not available </div>';

        }
        
        ?>


            

       </section> <!-- check out code-->
                <!-- lets just try connect this to sql so we can transfer the data easier-->

                       
          
                <div class="clearfix"></div>
            <div class="cd-cart cd-cart--empty js-cd-cart">
            <a href="#0" class="cd-cart__trigger text-replace">
                <!--Cart-->
                <ul class="cd-cart__count"> <!-- cart items count -->
                    <li>0</li>
                    <li>0</li>
                </ul> <!-- .cd-cart__count -->
            </a>
        
            <div class="cd-cart__content">
                <div class="cd-cart__layout">
                    <header class="cd-cart__header">
                        <h2>Cart</h2>
                        <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span> <!-- when they click undo that should remove there item -->
                    </header>
                    
                    <div class="cd-cart__body">
                        <ul>
                            <!-- products added to the cart will be inserted here using JavaScript -->
                            <!-- i want all the items i place to be stored into the sql -->
                        </ul>
                    </div>
        
                    <footer class="cd-cart__footer">
                        <a href="" name ='link 1' class="cd-cart__checkout">
                  <em>Checkout - ksh<span name=pricess>0</span>
      
                    <svg class="icon icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
                    </svg>
                  </em>
                </a>
            </div>
        </div> 
    </section>
    <?php include('partials-front/footer.php') ?>



<script src="assets/js/util.js"></script> <!-- util functions included in the CodyHouse framework -->
<script src="assets/js/main.js"></script> 

</body>
</html>