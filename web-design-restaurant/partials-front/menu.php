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
                    <li>
                        <a href="<?php echo HOMEURL; ?>admin">View Backend ?</a>
                    </li>
                </ul>
            </div>

            <div class="clearfix"></div>
        </div>
    </section>
    