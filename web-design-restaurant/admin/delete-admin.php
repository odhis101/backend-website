<?php 
include('partials/menu.php');

?>
<div class="main-content">
    <div class="wrapper">
        <h1> User Authentication</h1>
</br>

<?php
// include constraints

// 1 . get the id of admin to be deleted 
$id =$_GET['id'];

// 2. create sql query to delete admin 

// this should only delete if our password is correct 
$sql = "SELECT * FROM tbl_admin  WHERE id = '$id'";
// excecute the query 
$res =mysqli_query($conn,$sql);
// check wether the query is done succesfully or not 
if($res== true){
    
    
    $count = mysqli_num_rows($res);
    if($count==1){
        // get the details
        //echo 'Admin available';
        $rows= mysqli_fetch_assoc($res);
        $password =$rows['password'];
    
        
    }
else{

    // failed to delete admin 
    //echo 'admin failed to delete';
    $_SESSION['delete ']='<div class = "error">failed to delete admin try again later </div>';
    header('localhost'.HOMEURL.'admin/manage-admin.php');
    //3. redirect to manage admin page with message either (succes /error )
}
}

?>
 <form action="" method="POST">
<table class = tbl-30>
       <tr>
       <tr>
                    
                    <td>Enter Password:  </td>
                    <td><input type ='password' name='pass' placeholder="Enter your password" value = ></td>

                </tr>
                <tr> 
                    <td colspan = 2>
                    <input type=submit name = submit value="Delete User" class = btn-secondary>
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
     $res =mysqli_query($conn,$sql);

     if($res== true){
        $count = mysqli_num_rows($res);
        if ($count ==1){
            // check wehter data is available or not
            if ($check == $password){
                $sql2="DELETE from tbl_admin WHERE id ='$id'";
                // this executes the query
                $res2 =mysqli_query($conn,$sql2);
                if($res2==true){
                    // display success message
                    $_SESSION['change-pwd']='<div class = "success">User  Deleted succesfully</div>';
                    header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
                }
                else{
                    //display error message 
                    $_SESSION['change-pwd']='<div class = "error">failed to Delete User</div>';
                    header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
                }

            }
            else{
                // redirect to manage admin page with Error message
                $_SESSION['password-dont-match']='<div class = "error">Passwords dont match</div>';
                header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
            }
        
        }
        else{

            // user doesnt exist 
            $_SESSION['no-match']='<div class = "error">user not found</div>';
            header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
        }
  
    }
}
?>


<?php include('partials/footer.php'); ?>