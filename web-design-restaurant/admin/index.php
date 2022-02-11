
<?php include('partials/menu.php') ?>
         <!-- main content starts here -->
         <div class='main-content'>
            <div class= "wrapper">
           <h1>DASHBOARD</h1>
            <br>
            <?php 
                if(isset($_SESSION['login'])){
                echo $_SESSION['login'];
                unset($_SESSION['login']);
                }
            ?>

           <div class= "col-4 text-center">
               <?php 
               // sql query
               $sql = "SELECT * FROM tbl_category";
               // Execute query 
               $res = mysqli_query($conn,$sql);
               $count =mysqli_num_rows($res)
               ?>
               <h1><?php echo $count?></h1>
               <br/>
               Categories
           </div>
           
           <div class= "col-4 text-center">
           <?php 
               // sql query
               $sql2 = "SELECT * FROM tbl_food";
               // Execute query 
               $res2 = mysqli_query($conn,$sql2);
               $count =mysqli_num_rows($res2)
               ?>
               <h1> <?php echo $count?> </h1>
               <br/>
               Foods
           </div>
           <div class= "col-4 text-center">
           <?php 
               // sql query
               $sql3 = "SELECT * FROM tbl_order";
               // Execute query 
               $res3 = mysqli_query($conn,$sql3);
               $count3 =mysqli_num_rows($res3)
               ?> 
               <h1> <?php echo $count3?> </h1>
               <br/>
               Total Orders
           </div>
           <div class= "col-4 text-center">
               <?php 
                // create sql query to get total revenue generated 
                // agregate function in sql 
                $sql4 ="SELECT SUM(total) AS total  FROM tbl_order";
                
                // execute the qury 
                $res4 = mysqli_query($conn, $sql4);
                $rows4 = mysqli_fetch_assoc($res4);

                // get the total revenue 
               $totall = $rows4['total'];

               ?>
               <h1> KSH <?php echo $totall ?> </h1>
               <br/>
               Revenue Generated
           </div>
            <div class="clearfix"></div>
           </div>
           
           
        </div>
         

        <!-- main content ends here -->
         <?php include('partials/footer.php') ?>