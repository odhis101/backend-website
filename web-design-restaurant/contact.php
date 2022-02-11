<?php include ('config/constraints.php') ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/style.css ">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css " >
    
    <title>Restaurant Website</title>
</head>
<body>
    
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="<?php echo HOMEURL; ?>index.php" title="Logo">
                    <img src="images/logo.jfif" alt="Restaurant Logo" class="img-responsive">
                </a>
               
            </div>

            <div class="menu text-right">
                <ul>
                    <li>
                        <a href="<?php echo HOMEURL; ?>index.php">Home</a>
                    </li>
                    <li>
                        <a href="<?php echo HOMEURL;?>categories.php">Categories</a>
                    </li>
                 
                    <li>
                        <a href="<?php echo HOMEURL; ?>contact.php">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
<section>
<link rel="stylesheet" href="css/style.css " >
<div class="container">
	<div class="row">
			<h1>Contact us</h1>
	</div>
	<div class="row">
			<h4 style="text-align:center">We'd love to hear from you!</h4>
	</div>
    <form action="" method ="POST">
	<div class="row input-container">
			<div class="col-xs-12">
				<div class="styled-input wide">
					<input type="text"  name = username required />
                    <label for="name">Name</label>
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input">
					<input type="text" required />
					<label>Email</label> 
				</div>
			</div>
			<div class="col-md-6 col-sm-12">
				<div class="styled-input" style="float:right;">
					<input type="text" required />
					<label>Phone Number</label> 
				</div>
			</div>
			<div class="col-xs-12">
				<div class="styled-input wide">
					<textarea required></textarea>
					<label>Message</label>
				</div>
			</div>
            <br>
			<div class="col-xs-12">
			
                <input type =submit name =submit value="Send Message" class="btn-lrg submit-btn"> 
			</div>
	</div>
</div>
</br>
</section>


<div class="clearfix"></div>

<?php
if(isset($_POST['submit'])){
    
    // process login 
    $to = "joshodhiambo5@gmail.com";
    $subject = "My subject";
    $txt = "Hello world!";
    $headers = "From: oyugiodhiambo1@gmail.com" . "\r\n" .
    "CC: somebodyelse@example.com";
    
    mail($to,$subject,$txt,$headers);
}
?>
<section class="social">
        <div class="container text-center">
            <ul>
             
                <li>
                    <a href="https://www.instagram.com/josh_odhis/"><img src="https://img.icons8.com/fluent/48/000000/instagram-new.png"/></a>
                </li>
              
            </ul>
        </div>
    </section>
    <section class="footer">
        <div class="row  text-center">
            <p style="color:aliceblue" ><?php echo date('Y') ?>. All rights Reserved. Designed By <a href="https://www.instagram.com/josh_odhis/">Joshua Odhiambo</a></p>
        </div>
    </section>