<?php include ('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper">
        <h1> update odred</h1>
        <br></br>


        <?php
        // check wether id is set or not 
        if(isset($_GET['id']))
        {
            // get ther order details
            $id = $_GET['id'];

            // get all other details based on this id 
            // sql query to fet the order details 

            $sql ="SELECT * FROM tbl_order WHERE id =$id";
            //executer query
            $res = mysqli_query($conn,$sql);
            //count rows
            $count = mysqli_num_rows($res);
            if($count=1){
                // Detail Available 

                $row = mysqli_fetch_assoc($res);

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

              
                // execute the query 
              
            }
            else{
                // Detail not Available 
                        $_SESSION['update']='<div class = "error">Failed to Update Order. </div>';
                        header('location'.HOMEURL.'admin/manage-order.php');
            }
          
        }
        else{
            //if id is not there redirect 
            header('location:'.HOMEURL.'admin/manage-order.php');
        }

        ?>
        <form action = "" method = POST >
            <table class = tbl-30>
            <tr>
                <td>Food Name</td>
                <td><b><?php echo $food ?> </b></td>
            </tr>
            <tr>
                <td> Price </td>
                <td> 
                    <b>KSH <?php echo $price ?> </b> 
                </td>
            </tr>
            <tr>
                <td> Qty </td>
                <td> <input type = 'number' name = 'qty' value= "<?php echo $quantity; ?>" > </td>
            </tr>
            <tr>
                <td> Status </td>
                <td> <select name = status>
                 <option <?php if ($status == 'ordered'){echo 'selected';}?>value="Ordered"> Ordered </option>
                 <option <?php if ($status == 'On Delivery'){echo 'selected';}?>value="On Delivery"> On Delivery </option>
                 <option <?php if ($status == 'Delivered'){echo 'selected';}?>value="Delivered"> Delivered </option>
                 <option <?php if ($status == 'Cancelled'){echo 'selected';}?> value="Cancelled"> Cancelled </option>   
                 </select>             
                </td>
            </tr>
            <tr>
                <td> Custmer Name: </td>
                <td> 
                    <input type = 'text' name = 'customer_name' value="<?php echo $customer_name ?>">    
                 </td>
            </tr>
            <tr>
                <td> Custmer Contact: </td>
                <td> 
                    <input type = text name ='customer_contact' value="<?php echo $customer_contact ?>">    
                 </td>
            </tr>
            <tr>
                <td> Custmer Email: </td>
                <td> 
                    <input type = text name = 'customer_email' value="<?php echo $customer_email?>">    
                 </td>
            </tr>
            <tr>
                <td> Custmer Address: </td>
                <td> 
                   <textarea name = 'customer_address' cols= 30 rows = 5  > <?php echo $customer_adress ?></textarea>   
                 </td>
            </tr>
            <tr>
                <td colspan="2"> 
                <input type = hidden name = id valie = <?php echo $id;?>>
                <input type = hidden name = price valie = <?php echo $price;?>>
                <input type = submit name = submit value= "update Order"  class = btn-secondary></td>
            </tr>
            </table>




        </form>

        <?php
        $number = $id;
       

    
        // check whether update button is clicked or not
        if(isset($_POST['submit'])){
            //echo clicked 
             
            // get all the values from form 
            $customer_name = $_POST['customer_name'];
            $id = $_POST['id'];
            $quantity = $_POST['qty'];
            $status = $_POST['status'];
            $quantity= intval($quantity);
            $total =$quantity * $price;
           ;
            
            $customer_name = $_POST['customer_name'];
            $customer_contact = $_POST['customer_contact'];
            $customer_email = $_POST['customer_email'];
            $customer_address = $_POST['customer_address'];
           
            // update the values 
             // update the Values 
             $sql2= "UPDATE tbl_order SET 
             quantity =$quantity,
             total=$total,
             status ='$status',
             customer_name ='$customer_name',
             customer_contact ='$customer_contact',
             customer_email ='$customer_email',
             customer_adress ='$customer_adress'
             WHERE id =$number
             ";
            $res2 = mysqli_query($conn,$sql2);
            // check whether execution is succesful or not 
            if ($res2==true)
            {
               
                
                // query executed and oder saved 
                $_SESSION['updated']="<div class= 'sucess text-center' > Order placed Succesfully</div>";
                header('location:'.HOMEURL.'admin/manage-order.php');
           
            }
            else{
            /*
                $_SESSION['updated']="<div class= 'error text-center'> failed to order food</div>";
                header('location:'.HOMEURL.'testing.php');
              */
              echo 'it is unsuccessful';      
            
            }


        }
        else{
            // they havent clicked submit 
           
        }
        


        ?>
    </div>
</div>

<?php include ('partials/footer.php');?>