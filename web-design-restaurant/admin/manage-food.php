<?php include('partials/menu.php') ?>
<div class='main-content'>
            <div class= "wrapper">
           <h1>Manage food</h1>
           <br/> </br>   
           <?php
    if(isset($_SESSION['upload'])){
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
    <br/> </br>
        <!-- button to add admin -->
        <a href='add-food.php' class='btn-primary'> Add Food</a>
        
        </br></br>     
        <table class = 'tbl-full'>
               <tr>
                   <th>S.N</th>
                   <th>Title</th>
                   <th>description</th>
                   <th>price</th>
                   <th>image_name</th>
                   <th>category_id	</th>
                   <th>featured</th>
                   <th>active</th>
                   <th>actions</th>
               </tr>
               <?php 
              // what we want to do is first lets get the data 

              // lets get the title 
              $sql = 'SELECT * FROM tbl_food';
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
                        $title=$rows['title'];
                        $price=$rows['price'];
                        $description=$rows['description'];
                        $category=$rows['category_id']; 
                        $id = $rows['id'];
                        $image_name=$rows['image_name'];
                        $featured=$rows['featured'];
                        $active=$rows['active'];
                        //display the values in html
                        ?>
              
                   <td><?php echo $sn++; ?></td>
                   <td><?php echo $title; ?></td>
                   <td> <?php echo $description ?> </td>
                   <td> <?php echo $price ?> </td>

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
                            <img src = "<?php echo HOMEURL;?>images/food/<?php echo $image_name;?>" width = "70 px" height = 'auto'>

                            <?php
                        }
                        
                        ?> 
                    </td>
                    <td><?php echo $category; ?> </td>
                   <td><?php echo $featured; ?></td>
                   <td><?php echo $active; ?></td>
                   <td>
                     

                    <a href='<?php echo HOMEURL;?>admin/update-food.php?id=<?php echo $id?> ' class='btn-secondary'> Update Category</a>
                     <a href= '<?php echo HOMEURL;?>admin/delete-food.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>' class='btn-danger'> Delete Category</a>
                   
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


        </table>
        </div>
        


<?php include('partials/footer.php'); ?>