<?php include('partials/menu.php') ?>
         <!-- main content starts here -->
         <div class='main-content'>
            <div class= "wrapper">
           <h1>Manage Admin</h1>
           <br/>    
           <?php 
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'];//adding session message
               unset($_SESSION['add']);//removing session message
           }
           if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];//adding session message
            unset($_SESSION['delete']);
           }
           if(isset($_SESSION['out'])){
            echo $_SESSION['out'];//outing session message
            unset($_SESSION['out']);//removing session message
        }
        if(isset($_SESSION['update'])){
            echo $_SESSION['update'];//outing session message 
            unset($_SESSION['update']);
        }
        if(isset($_SESSION['no-match'])){
            echo $_SESSION['no-match'];//outing session message 
            unset($_SESSION['no-match']);
        }
        if(isset($_SESSION['password-dont-match'])){
            echo $_SESSION['password-dont-match'];//outing session message 
            unset($_SESSION['password-dont-match']);
        }
        if(isset($_SESSION['change-pwd'])){
            echo $_SESSION['change-pwd'];//outing session message 
            unset($_SESSION['change-pwd']);
        }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];//outing session message 
            unset($_SESSION['delete']);
        }
           ?>
           <br/> </br> 
        <!-- button to add admin -->
        <a href='add-admin.php' class='btn-primary'> Add Admin</a>
        
        </br>  </br>     
        <table class = 'tbl-full'>
               <tr>
                   <th>S.N</th>
                   <th>Full Name</th>
                   <th>Username</th>
                   <th>Actions</th>
               </tr>

               <?php
                $sql = 'SELECT * FROM tbl_admin';
                $res= mysqli_query($conn,$sql);
                // check wether the query is excecuted or not 

                if ($res==true){
                    // count rows to check whether we have data in database
                    $count = mysqli_num_rows($res);// counting rows in database
                    // check the num of rows 
                    if($count > 0){
                        // we have data
                        $sn=1; // create a variable outside the value
                        while($rows= mysqli_fetch_assoc($res))
                        {
                            // using while loop to get the data in the database 
                            
                            // get individual data 
                            $id = $rows ['id'];
                            
                            $full_name=$rows['full_name'];
                            $username=$rows['username'];
                            //display the values in html
                            ?>
                            
                            <tr>
                    <td><?php echo $sn++; ?></td>
                   <td><?php echo $full_name; ?></td>
                   <td><?php echo $username; ?></td>
                   <td>
                    <a href='<?php echo HOMEURL;?>admin/update-password.php?id=<?php echo $id?>' class=btn-primary>change password</a>
                    <a href='<?php echo HOMEURL;?>admin/check-user.php?id=<?php echo $id?>' class='btn-secondary'> Update Admin</a>
                
                     <a href= '<?php echo HOMEURL;?>admin/delete-admin.php?id=<?php echo $id?>' class='btn-danger'> Delete Admin</a>
                  
               </tr>


                            <?php


                        }
                    }
                    else{
                        // we dont have jack 
                    }         
                }
               ?>
           </table>
           <br/>
        </div>

        <!-- main content ends here -->
<?php include('partials/footer.php'); ?>