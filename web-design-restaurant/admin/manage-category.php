<?php include('partials/menu.php') ?>
<div class='main-content'>
            <div class= "wrapper">
           <h1>Manage category</h1>
           <br/> </br>   
        <!-- button to add admin -->
        <a href='<?PHP echo HOMEURL; ?>admin/add-category.php'class='btn-primary'> Add category</a>
        </br>  </br>  
        <?php
        if(isset($_SESSION['add'])){
                echo $_SESSION['add'];
                unset($_SESSION['add']);
        }
        if(isset($_SESSION['remove'])){
            echo $_SESSION['remove'];
            unset($_SESSION['remove']);
    }
        if(isset($_SESSION['delete'])){
            echo $_SESSION['delete'];
            unset($_SESSION['delete']);
    }
    if(isset($_SESSION['update-category'])){
        echo $_SESSION['update-category'];
        unset($_SESSION['update-category']);
}
if(isset($_SESSION['failed-remove'])){
    echo $_SESSION['failed-remove'];
    unset($_SESSION['failed-remove']);
}
        ?>
                
        </br>  </br>     
        <table class = 'tbl-full'>
               <tr>
                   <th>S.N</th>
                   <th>title</th>
                   <th class= border-spacing:200px  >image</th>
                   <th>featured</th>
                   <th>active</th>
                   <th>actions</th>
               </tr>
              <?php 
              // what we want to do is first lets get the data 

              // lets get the title 
              $sql = 'SELECT * FROM tbl_category';
              $res= mysqli_query($conn,$sql);
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
                        $title = $rows ['title'];
                        $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];
                        //display the values in html
                        ?>
              
                   <td><?php echo $sn++; ?></td>
                   <td><?php echo $title; ?></td>
                   <td>
                        <?php 
                       // display message
                        if ($image_name== ''){
                            // display image
                            echo '<div class = "error">image not available. </div>';
                           
                        }
                        else{
                            
                            // check wehter image name is available or not 
                            ?>
                            <img src = "<?php echo HOMEURL;?>images/category/<?php echo $image_name;?>" width = "70 px" height = 'auto'>

                            <?php
                        }
                        
                        ?> 
                    </td>
                   <td><?php echo $featured; ?></td>
                   <td><?php echo $active; ?></td>
                   <td>
                     

                    <a href='<?php echo HOMEURL;?>admin/update-category.php?id=<?php echo $id?> ' class='btn-secondary'> Update Category</a>
                     <a href= '<?php echo HOMEURL;?>admin/delete-category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>' class='btn-danger'> Delete Category</a>
                   
               </tr>


            <?php
                        }
                    }

                    else{
                       ?>
                        <tr>
                        <td colspan=6 ><div class =error > No Category Added </div></td>      
                        </tr>
                        <?php
                    }         
                }
            ?>
           </table>
           <br/>
        </div>

               
           </table>
        </div>


<?php include('partials/footer.php'); ?>