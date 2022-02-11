<?php include('partials/menu.php') ?>


<div class="main-content">
    <div class="wrapper">
        <h1> Update password</h1>
        <?php
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        ?>
        <form action="" method="POST">
        <table class = tbl-30>
            <tr>
            <tr>
                        
                        <td>Enter old Password:  </td>
                        <td><input type ='password' name='pass' placeholder="Enter your password" value = ></td>
            </tr>
            <tr>
                        <td>Enter new  Password:  </td>
                        <td><input type ='password' name='newpass' placeholder="Enter your new password" value = ></td>

                    </tr>
                    <tr>
                        <td>Confrim new  Password:  </td>
                        <td><input type ='password' name='confirm' placeholder="Confrim password" value = ></td>

                    </tr>
                    <tr> 
                        <td colspan = 2>
                            <input type ='hidden' name ='id' value="<?php echo $id ?>">
                        <input type=submit name = submit value="Update password" class = btn-secondary>
                        </tr>
                    
                    </tr>
        </table>

            </form>
        </br>


<?php 

if(isset($_POST['submit']))
{
    //$full_name = $_POST['full_name'];
    //$username = $_POST['username'];
    //echo $check = ($_POST['pass']);
    $id = $_POST['id'];
    $check = md5($_POST['pass']);
    $new = md5($_POST['newpass']);
    $confirm =md5($_POST['confirm']);
    $sql = "SELECT * from tbl_admin WHERE id =$id AND password ='$check'";
    $res =mysqli_query($conn,$sql);
    if($res== true){
        $count = mysqli_num_rows($res);
        if ($count ==1){

            // check wehter data is available or not 
            echo 'user found ';
            // check wether the new password and confirm password match
            if($new == $confirm){
                // update the password
                
                $sql2 = "UPDATE tbl_admin SET
                password = '$new'
                WHERE id =$id
                ";
                //execute the query 
                $res2 =mysqli_query($conn,$sql2);
                // check whether query executed or not 
                if($res2==true){
                    // display success message
                    $_SESSION['change-pwd']='<div class = "success">Passwords changed succesfully</div>';
                    header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
                }
                else{
                    //display error message 
                    $_SESSION['change-pwd']='<div class = "error">failed to change password</div>';
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

<?php 



        
 /*       
if($count==1){ // this is checking the user password and id
    // get the details
    //echo 'Admin available';
    $rows= mysqli_fetch_assoc($res);
    $password =$rows['password'];
    if ($check == $password){
        $sql = "UPDATE tbl_admin set
        password='$new'
        ";
        echo 'correct';
        $new = md5($_POST['newpass']);
        $_SESSION['in']='<div class = "success">Password succesfull updated </div>';
        //header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
}
     else {
        echo 'check is not the same as pass ';
        $_SESSION['no match']='<div class = "error">password do not match  try again </div>';
        //header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
}
else {
    echo 'count is greater than 1 ';
    $_SESSION['no match']='<div class = "error">password do not match  try again </div>';
    //header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
}



else{
echo 'res is false  ';
$_SESSION['user-not-found']='<div class = "error">login unsuccesfull try agaiiiin </div>';
//header("Location:".HOMEURL."admin/manage-admin.php?id=".$id);
}
}
}














$sql = "SELECT * FROM tbl_admin WHERE id = '$id'";
$res =mysqli_query($conn,$sql);
$count = mysqli_num_rows($res);

 
*/
?>




<?php include('partials/footer.php'); ?>