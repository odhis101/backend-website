
<?php include('partials-front/menu.php');?>

<body>
    
   
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Categories</h2>


            <?php
            // create a sql query to display categories 
            $sql ='SELECT * FROM tbl_category where active = "yes" AND featured ="yes"LIMIT 3';
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
                    ?>
                    <a href=" cateegory-page.php?id=<?php echo $id?>">
                    <div class="box-3 float-container">
                        <?php 
                        if ($image_name ==''){
                            // image not available
                            echo '<div clase ="error"></div>image now available </div>';
                        }
                        else{
                            ?>
                            <img src = "<?php echo HOMEURL;?>images/category/<?php echo $image_name;?>"alt="Pizza" class="img-responsive img-curves">
                        <?php
                        }
                        ?>
                    
                
                <h3 class="float-text text-white"><?php echo $title ?></h3>
            </div>
            </a>
                    <?php
    
                }
            }   
            else{
                // catefories not availablle 
                echo '<div class ="error" > category not available </div>';

            }
            ?>
           

           

            
            
                    </div>
                    
                    <div class="clearfix"></div>
                </section>
            

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
                        <span class="cd-cart__undo">Item removed. <a href="#0">Undo</a></span>
                    </header>
                    
                    <div class="cd-cart__body">
                        <ul>
                            <!-- products added to the cart will be inserted here using JavaScript -->
                        </ul>
                    </div>
        
                    <footer class="cd-cart__footer">
                        <a href="categories.html" class="cd-cart__checkout">
                  <em>Checkout - ksh<span>0</span>
                    <svg class="icon icon--sm" viewBox="0 0 24 24"><g fill="none" stroke="currentColor"><line stroke-width="2" stroke-linecap="round" stroke-linejoin="round" x1="3" y1="12" x2="21" y2="12"/><polyline stroke-width="2" stroke-linecap="round" stroke-linejoin="round" points="15,6 21,12 15,18 "/></g>
                    </svg>
                  </em>
                </a>
            </div>
        </div> 
    </section>
<?php include('partials-front/footer.php') ?>

</body>
</html>