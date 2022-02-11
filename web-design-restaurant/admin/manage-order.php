<?php include('partials/menu.php') ?>
<div class='main-content'>
            <div class= "wrapper">
           <h1>Manage order</h1>
           <br/> </br>   
           <?php 
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'];//adding session message
               unset($_SESSION['add']);//removing session message
           }
           if(isset($_SESSION['updated'])){
            echo $_SESSION['updated'];//updateding session message
            unset($_SESSION['updated']);//removing session message
        }
           ?>
        <!-- button to add admin -->        
        </br>  </br>     
        <table class = 'tbl-full'>
               <tr>
                   <th>S.N</th>
                   <th>Food</th>
                   <th> Price</th>
                   <th>Quantity</th>
                   <th>Total</th>
                   <th>Order date</th>
                   <th>Status</th>
                   <th>Customer Name</th>
                   <th>Customer Contacts</th>
                   <th>Email</th>
                   <th>Address</th>
                   <th>Actions</th>
               </tr>
               <?php
                // Get all the orders from database
                $sql ="SELECT * FROM  tbl_order ORDER BY id DESC"; // Display the latest order first
                $res = mysqli_query($conn,$sql);
                $count = mysqli_num_rows($res);

                $sn= 1; // create a serial number and set its initial value 
                if($count>0){
                    // Order available 
                    while ($row=mysqli_fetch_assoc($res)){
                        $id = $row['id'];
                        $food = $row['food'];
                        $price = $row['price'];
                        $quantity = $row['quantity'];
                        $total = $row['total'];
                        $order_date = $row['order_date'];
                        $status = $row['status'];
                        $customer_name = $row['customer_name'];
                        $customer_contact = $row['customer_contact'];
                        $customer_email = $row['customer_email'];
                        $customer_adress = $row['customer_adress'];
                        ?>
                            <tr>
                            <td><?php echo $sn++ ?></td>
                            <td> <?php echo $food; ?></td>
                            <td><?php echo $price ?></td>
                            <td><?php echo $quantity ;?></td>
                            <td><?php echo $total ;?></td>
                            <td><?php echo $order_date ;?></td>
                            <td><?php 
                             // ordered on delivery ,delivered , cancelled 
                                    if($status == 'Ordered'){
                                        echo "<label> $status</label>";
                                    }
                                    elseif($status == 'On Delivery'){
                                        echo "<label style= 'color : orange;' > $status</label>";
                                    }
                                    elseif($status == 'Delivered'){
                                        echo "<label style ='color : green; '> $status</label>";
                                    }
                                    elseif($status == 'Cancelled'){
                                        echo "<label style ='color : red;' > $status</label>";
                                    };?></td>
                            <td><?php echo $customer_name ;?></td>
                            <td><?php echo $customer_contact ;?></td>
                            <td><?php echo $customer_email ;?></td>
                            <td><?php echo $customer_adress ;?></td>
                            
                            
                            <td>
                            <a href='<?php echo HOMEURL;?>admin/updater-order.php?id=<?php echo $id?> ' class='btn-secondary'> Update Order</a>
                            </td>
               </tr>
                        <?php
                    }
                }
                else{
                    // order not available
                    echo "<tr> <td colspan = 12 class= 'error'> Orders not available</td></tr>";
                }
               ?>
               
              
           </table>
        </div>


<?php include('partials/footer.php'); ?>