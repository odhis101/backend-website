<?php include('partials/menu.php')?>

<div class="main-content">
    <div class="wrapper">
        <h1> User Authentication</h1>
</br>
<?php 

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
        $password =$rows['password'];
    
        
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
                    
                    <td>Enter Password:  </td>
                    <td><input type ='text' name='pass' placeholder="Enter your password" value = ></td>

                </tr>
                <tr> 
                    <td colspan = 2>
                    <input type=submit name = submit value="Add password" class = btn-secondary>
                    </tr>
                
                </tr>
</table>

<?php 
if(isset($_POST['submit']))
{
    //$full_name = $_POST['full_name'];
    //$username = $_POST['username'];
    //echo $check = ($_POST['pass']);
    
     $check = md5($_POST['pass']);
    if ($check == $password){
        $_SESSION['in']='<div class = "success">login succesfull added succesfully </div>';
        header("Location:".HOMEURL."admin/update-admin.php?id=".$id);
    }
    else{
        $_SESSION['out']='<div class = "error">login unsuccesfull try again </div>';
        header('location:'.HOMEURL.'admin/check-user.php');
    }
}
?>

<?php include('partials/footer.php'); ?>