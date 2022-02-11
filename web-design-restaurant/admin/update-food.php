<?php include('partials/menu.php');?>

<?php 

if(isset($_GET['id'])){
    $id =$_GET['id'];
    $sql = "SELECT * FROM tbl_food WHERE id = '$id'";
    $res =mysqli_query($conn,$sql);
    if($res== true){ 
         $count = mysqli_num_rows($res);
        
        if($count==1){
        // get the details
        //echo 'food available';
            $rows= mysqli_fetch_assoc($res);
        
            $title=$rows['title'];
            $price=$rows['price'];
            $description=$rows['description'];
            $category=$rows['category_id']; 
            $id = $rows['id'];
            $current_image=$rows['image_name'];
            $featured=$rows['featured'];
            $active=$rows['active'];
}
else{
    $_SESSION['update-category']="<div class= 'error'> failed to update category</div>";
    header('location:'.HOMEURL.'admin/manage-category.php');
}
}

}
else 
{
$_SESSION['update-category']="<div class= 'error'> failed to update category</div>";
header('location:'.HOMEURL.'admin/manage-category.php');
}
?>
<div class = main-content>
    <div class= wrapper>
        <h1>Update Food</h1>
    </div>
    <form action = '' method ='post' enctype = multipart/form-data > <!-- that allows to get data from an image -->
        <table class = 'tbl-30'>
            <tr>
                <td>Title: </td> 
                <td>  
                    <input type = text name= title value = "<?php echo $title?>">    
                </td>  
                </tr>
                <td>description: </td> 
                <td>  
                <textarea name= Description cols =30 rows = 5 placeholder="
                decription of the food " ></textarea> 
                </td>    
            </tr>
            <tr>
                <td>Price: </td> 
                
                <td>  
                <input type = number name= price placeholder='Enter Price'> 
                </td> 
            <!-- image starts here -->
            <tr>
                <td>current Image: </td> 
                <td>  
                <?php 
                        // check wehter image name is available or not 
                        if ($current_image!= ''){
                            // display image
                            ?>
                            <img src = "<?php echo HOMEURL;?>images/food/<?php echo $current_image;?>" width = "100 px" height = 'auto'>

                            <?php
                        }
                        else{
                            // display message
                            echo "<div class = error ><image not added <div>";
                        }
                        
                        ?> 

                </td>    
            </tr>
            
            <tr>
                <td>new Image: </td> 
                <td>  
                   
                <input type = file name= image>     
                </td>    
            </tr>
            
            <tr>
                <td>category_id : </td> 
                <td>  
                <select name = category >
                    <?php
                    // create php code to display catgories from database
                    // 1. create sql query to get all active categories from database 
                    // display on drop down 
                    $sql = "SELECT * FROM tbl_category WHERE active ='yes'";
                    $res = mysqli_query($conn, $sql);                
                    // count rows to check whether we have data in database
                    $count = mysqli_num_rows($res);// counting rows in database
                    // check the num of rows 
                    if($count > 0){
                        // we have data
                        while($rows= mysqli_fetch_assoc($res))
                        {
                            // using while loop to get the data in the database 
                            
                            // get individual data 
                            $id = $rows ['id'];
                            $title = $rows ['title'];
                            ?>
                            <option value='<?php echo $id;?>'><?php echo $title;?></option>
                            <?php    
                           
                           
                            //display the values in html
                        }
                    }
                    else{
                        ?>
                        <option value="0">no categories Found</option>
                        <?php    
                    }

                    ?>
                </select>
                <!-- category id -->  
                </td>    
            <!-- featured starts here-->
            <tr>
                <td>Featured: </td> 
                
                <td>  
                    <input type = radio name= active value = yes >yes    
                    <input type = radio name= active value =no > no
                </td> 
                <!-- active starts here-->   
            </tr>
            
            <tr>
                <td>active: </td> 
                
                <td>  
                    <input type = radio name= featured value = yes>yes    
                    <input type = radio name= featured value =no>no
                </td>    
            </tr>
            <tr>
                
                
                <td>  
                    <id coslpan =2 >
                        <input type = submit name = submit value = add-category class = btn-secondary>
                </td>    
            </tr>
        </table>
</form>

</div>
<?php
    if(isset($_POST['submit'])){    
         //echo 'clicked';

         // getting the value of the data
         $title=$_POST['title'];
         $price=$_POST['price'];
         $category=$_POST['category'];
         $description=$_POST['Description'];
            // check if the radio button is clicked or not 
            if(isset($_POST['featured'])){
                // get the value from form
                $featured=$_POST['featured'];
            }
            else{
                // set the default value
                $featured ='no';
            } 
            if(isset($_POST['active'])){
                // get the value from form
                $active=$_POST['active'];
            }
            else{
                // set the default value
                $active ='No';
            }
            // check wether the image is selected or not and set the vailue for image name accordingly 
            if(isset($_FILES['image']['name'])){
                // upload the image
                // to upload the image we need image name, source path and destination path 
                $image_name = $_FILES['image']['name'];
                // upload the image only if the image is selected 
                if($image_name != ''){ 
                    // create sectionn to auto rename image
                    
                    // get the extension of our image (jpg, png, gif, etc.. )e.g test.jpg
                    $ext = end(explode('.',$image_name));

                    // rename the image
                    $image_name = 'food_name-'.rand(000,999).'.'.$ext; // eg. food_category_012 .jpg

                    $src_path = $_FILES['image']['tmp_name'];
                    $destination_path ='../images/food/'.$image_name;
                    // upload the image
                    $upload = move_uploaded_file($src_path,$destination_path);
                    // check if the image is uploaded or not 
                    // if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload == false){
                        // set message 
                        $_SESSION['upload']='<div class = "error">failed to upload image. </div>';
                        header('location'.HOMEURL.'admin/add-food.php');
                        die();
                }
                // removing our current image 
                $remove_path ='../images/food/'.$current_image;
                $remove = unlink($remove_path);
                //check if the image is removed or not 
                // if failed to remove display message and stop the process 
                if($remove== false){
                    // failed to remove image
                    $_SESSION['failed-remove']='<div class = "error">failed to remove current image. </div>';
                    header('location'.HOMEURL.'admin/manage-food.php');
                    die();
                }
            }
                
            }
            else{
                // for some reason it doesn't come on the else when called 
                // why doesnt this else work !! its strange 
                echo 'hello world';

                // dont upload the image and set the image name as blank
                $image_name="";
            }
            // create sql query to insert category into databas
           // $sql = "INSERT INTO tbl_food (title,description,price,image_name,category_id,featured, active ) VALUES ('$title','$description','$price','$image_name','$category','$featured', '". $active ."')";
            echo $image_name;
            $sql="UPDATE tbl_food set
            title='$title',
            description='$description',
            price='$price',
            image_name = '$image_name',
            category_id='$category',
            featured='$featured',
            active='$active'
            WHERE id='$id'
            ";
            $res = mysqli_query($conn, $sql);

            // check wether the query executed or not and data added or not 

            if($res== true){
                //echo 'data inserted';
                //create a variable to display a message
                $_SESSION['add']='<div class = "success">category added succesfully </div>';
                // redirect page TO MANAGE ADMIN 
                header('location:'.HOMEURL.'admin/manage-food.php');
                echo $res;
               }
            else{
                 //echo 'data not inserted';
                //create a variable to display a message
                $_SESSION['add']='<div class = "error" ></div>Failed to add category please chech all forms </div>';
                // redirect page TO add ADMIN 
                header('location:'.HOMEURL.'admin/add-food.php');
            }
    }

     
?>
<?php include('partials/footer.php') ?>
