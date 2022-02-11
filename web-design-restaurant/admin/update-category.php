<?php include('partials/menu.php');?>
<?php 

if(isset($_GET['id'])){
    $id =$_GET['id'];
    $sql = "SELECT * FROM tbl_category WHERE id = '$id'";
    $res =mysqli_query($conn,$sql);
    if($res== true){ 
        $count = mysqli_num_rows($res);
        if($count==1){
        // get the details
        // counting the twos 
        //echo 'Admin available';
            $rows= mysqli_fetch_assoc($res);
        
            $title=$rows['title'];
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
        <h1>Upadta Category</h1>
    </div>
    <form action = '' method ='post' enctype = multipart/form-data > <!-- that allows to get data from an image -->
        <table class = 'tbl-30'>
            <tr>
                <td>Title: </td> 
                <td>  
                    <input type = text name= title value = "<?php echo $title?>">    
                </td>    
            </tr>
            <!-- image starts here -->
            <tr>
                <td>current Image: </td> 
                <td>  
                <?php 
                        // check wehter image name is available or not 
                        if ($current_image!= ''){
                            // display image
                            ?>
                            <img src = "<?php echo HOMEURL;?>images/category/<?php echo $current_image;?>" width = "100 px" height = 'auto'>

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
                    $image_name = 'food_category'.rand(000,999).'.'.$ext; // eg. food_category_012 .jpg

                    $src_path = $_FILES['image']['tmp_name'];
                    $destination_path ='../images/category/'.$image_name;
                    // upload the image
                    $upload = move_uploaded_file($src_path,$destination_path);
                    // check if the image is uploaded or not 
                    // if the image is not uploaded then we will stop the process and redirect with error message
                    if($upload == false){
                        // set message 
                        
                        $_SESSION['upload']='<div class = "error">failed to upload image. </div>';
                        header('location'.HOMEURL.'admin/add-category.php');
                        die();
                }
                // removing our current image 
                if ($current_image!=''){
                $remove_path ='../images/category/'.$current_image;
                $remove = unlink($remove_path);
                //check if the image is removed or not 
                // if failed to remove display message and stop the process 
                if($remove== false){
                    // failed to remove image
                    $_SESSION['failed-remove']='<div class = "error">failed to remove current image. </div>';
                    header('location'.HOMEURL.'admin/manage-category.php');
                    die();
                }
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
            $sql="UPDATE tbl_category set
            title='$title',
            image_name = '$image_name',
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
                header('location:'.HOMEURL.'admin/manage-category.php');
                echo $res;
               }
            else{
                 //echo 'data not inserted';
                //create a variable to display a message
                $_SESSION['add']='<div class = "error" ></div>Failed to add category please chech all forms </div>';
                // redirect page TO add ADMIN 
                header('location:'.HOMEURL.'admin/add-catefory.php');
            }
    }

     
?>
<?php include('partials/footer.php') ?>
