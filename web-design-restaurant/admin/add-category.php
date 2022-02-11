<!-- this might be used for later  i am not sure if it will be completly useful -->
<?php include('partials/menu.php') ?>
<div class = 'main-content'>
    <h1 class= text-center> Add Category </h1>
    <br></br>
    <?php 
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'];//adding session message
               unset($_SESSION['add']);//removing session message
           }
           if(isset($_SESSION['upload'])){
            echo $_SESSION['upload'];//uploading session message
            unset($_SESSION['upload']);//removing session message
        }
           ?>


    <!-- add category starts here  -->
    <form action = '' method ='post' enctype = multipart/form-data > <!-- that allows to get data from an image -->
        <table class = 'tbl-30'>
            <tr>
                <td>Title: </td> 
                <td>  
                    <input type = text name= title placeholder='Enter Title'>    
                </td>    
            </tr>
            <!-- image starts here -->
            <tr>
                <td>Select Image: </td> 
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
            }
            }
            else{
                // for some reason it doesn't come on the else when called 
                echo 'hello world';

                // dont upload the image and set the image name as blank
                $image_name="";
            }
            
            //print_r($_FILES['image']);
            //die();// this breaks the code 

            // create sql query to insert category into databas
           
            $sql = "INSERT INTO tbl_category (title,image_name,featured, active ) VALUES ('$title','$image_name','$featured', '". $active ."')";
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