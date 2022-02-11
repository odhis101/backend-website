<?php 
include('partials/menu.php');

?>

<?php 

     $id =$_GET['id'];

// check wehter data is available or not
    $sql2="DELETE from tbl_food WHERE id ='$id'";
    // this executes the query
    $res2 =mysqli_query($conn,$sql2);
    if($res2==true){
        // display success message
        $_SESSION['change-pwd']='<div class = "success">Food  Deleted succesfully</div>';
        header("Location:".HOMEURL."admin/manage-food.php?id=".$id);
    }
    else{
        //display error message 
        $_SESSION['change-pwd']='<div class = "error">failed to Delete User</div>';
        header("Location:".HOMEURL."admin/manage-food.php?id=".$id);
    }




?>


<?php include('partials/footer.php'); ?>