

<?php
    // include constants file 
    include('../config/constraints.php');
    // echo 'delete page'; 
    // check whether whether the id and mange_name value is set or not 

    if(isset($_GET['id']) AND isset($_GET['image_name'])){

        // get the value and delte 
        echo 'get value and delete';

        $id = $_GET['id'];
        $image_name= $_GET['image_name'];

        // remove the physical image file is available 

        if($image_name != ''){
            // image is available so remove it 
            $path = "../images/category/".$image_name;
            $remove = unlink($path);
            $_GET['image_name'];
            // if failed to remove then add an error message snd stop the process
            if($remove= false)
            {
                // set the session message 
                $_SESSION['remove'] = "<div class ='error' > Failed to remove category Image</div>";
                header('location:'.HOMEURL.'admin/manage-category.php');
                // stop the process
                die();
                
            }

        }
        // delete data form the database 
        $sql = "DELETE FROM tbl_category WHERE  id='$id'";
        
        // REdirect to manage category page with message
        $res=mysqli_query($conn,$sql);

        // check wether the data is delete from database
        if($res==true){
            // set success meassage and redirect
            $_SESSION['delete'] = "<div class ='success' >Deleted Succesfully </div>";
            header('location:'.HOMEURL.'admin/manage-category.php');
        }
        else{
            // set fail message and redirects 
            $_SESSION['delete'] = "<div class ='error' > Failed to remove category Image</div>";
            header('location:'.HOMEURL.'admin/manage-category.php');
        }
    }
    else{
        //redirect to manage category page
        header('location:'.HOMEURL.'admin/mange-category.php');

    }
?>

