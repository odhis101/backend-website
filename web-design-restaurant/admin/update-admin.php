<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1> Update admin</h1>
</br>
<?php 
 if(isset($_SESSION['in'])){
    echo $_SESSION['in'];//adding session message
    unset($_SESSION['in']);//removing session message
}

$id =$_GET['id'];
$sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
$res =mysqli_query($conn,$sql);
if($res== true){
    
    
    $count = mysqli_num_rows($res);
    if($count==1){
        // get the details
        //echo 'Admin available';
        $rows= mysqli_fetch_assoc($res);
        
        $full_name=$rows['full_name'];
        $username=$rows['username'];
    }
    else{
        header('location:'.HOMEURL.'admin/manage-admin.php');
    }
}

?>
    <form action="" method="POST">
  
    <table class = tbl-30>
       <tr>
       <tr>
                    <td>Full Name: </td>
                    <td><input type ='text' name='full_name' placeholder="Enter your name" value =<?php echo $full_name; ?>></td>
               
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type ='text' name='username' placeholder="Enter your username" value = <?php echo $username; ?>></td>
        <tr>
            <td colspan ='2'>
                <input type="hidden" name ='id' value='<?php echo $id; ?> '>
                <input type=submit name = submit value="Update admin" class = btn-secondary>
            </td>

            
        </tr>
        </table>
        
    </form>
    </div>
</div>

<?php
    // check wethere the submit button was clicked 
    if(isset($_POST['submit'])){
        //echo 'button clicked';
        // get all the values from for to update 
        $id=$_GET['id'];
        $full_name=$_POST['full_name'];
        $username=$_POST['username'];

        // create sql query to update admin 

        
        $sql="UPDATE tbl_admin set
        full_name='$full_name',
        username='$username'
        WHERE id='$id'
        ";
        $res =mysqli_query($conn,$sql);
        
        // check whethere query executed or not 
        if($res==true){
            $_SESSION['update']="<div class= 'success'> admin updated Sucessfully</div>";
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }
        else{
            //failed to update admin
            $_SESSION['update']="<div class= 'error'> failed to update admin</div>";
            header('location:'.HOMEURL.'admin/manage-admin.php');
        }

    }
?>

<?php include('partials/footer.php'); ?>