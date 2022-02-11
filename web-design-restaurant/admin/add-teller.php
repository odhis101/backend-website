<?php include('partials/menu.php') ?>
<div class="main-content">
    <div class="wrapper">
        <h1>Add Admin</h1>
        <br></br>
        <?php 
           if(isset($_SESSION['add'])){
               echo $_SESSION['add'];//adding session message
               unset($_SESSION['add']);//removing session message
           }
           ?>

        <form action='' method ='Post'>
            <table class = tbl-30>
                <tr>
                    <td>Full Name: </td>
                    <td><input type ='text' name='full_name' placeholder="Enter your name"></td>
               
                </tr>
                <tr>
                    <td>User Name: </td>
                    <td><input type ='text' name='username' placeholder="Enter your username"></td>
               
                </tr>
                <tr>
                    <td>Password: </td>
                    <td><input type ='password' name='password' placeholder="Enter your password"></td>
               
                </tr>
                <tr> 
                    <td colspan = 2>
                    <input type=submit name = submit value="Add admin" class = btn-secondary>
                    </tr>
                
            </table>

        </form>
    </div>

</div>
<?php include('partials/footer.php') ?>


<?php 
    // process the value form and save it in database
   
    // check whether the submit button is clicked or not 
    if(isset($_POST['submit']))
    {
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);//password encryption with md5

        //sql query to save the data into the database
        $sql="INSERT INTO  tbl_teller SET 
            full_name ='$full_name',
            username ='$username',
            password ='$password'
        ";
        // save data in data base
        

         $res=mysqli_query($conn, $sql) or die(mysqli_error($conn));
         if (empty($username)) {
            $res=false;
          }
          if (empty($password)) {
            $res=false;
          }
          if (empty($full_name)) {
            $res=false;
          }
         if($res== true){
             //echo 'data inserted';
             //create a variable to display a message
             $_SESSION['add']='<div class = "success">admin added succesfully </div>';
             // redirect page TO MANAGE ADMIN 
             header('location:'.HOMEURL.'admin/manage-teller.php');
             echo $res;
            }
         else{
              //echo 'data inserted';
             //create a variable to display a message
             $_SESSION['add']='<div class = "error" ></div>Failed to add admin please chech all forms </div>';
             // redirect page TO add ADMIN 
             header('location:'.HOMEURL.'admin/add-admin.php');
         }
        
        }

   
?>