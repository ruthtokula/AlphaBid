<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../Images/favicon.jpg">
    <title>Alpha</title>

    <!--Template based on URL below-->
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/starter-template/">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Place your stylesheet here-->
    <link href="../css/stylesheet.css" rel="stylesheet" type="text/css">

    <link href="../Images/ribbons.css" rel="stylesheet" type="text/css">

    <link href="../Images/styles.css" rel="stylesheet" type="text/css">

    <link href="../Images/bootstrap.min.css" rel="stylesheet" type="text/css">

    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

<body>

<?php include("header.php") ?>

    <?php
require('db.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username']) && isset($_REQUEST['email']) && isset($_REQUEST['password'])) {
    
    // removes backslashes
	$username = stripslashes($_REQUEST['username']);
    
    //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username); 
	$email = stripslashes($_REQUEST['email']);
	$email = mysqli_real_escape_string($con,$email);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	$trn_date = date("Y-m-d H:i:s");
    
    $query = "INSERT into users (username, password, email, trn_date)
                VALUES ('".$username."', '".md5($password)."', '".$email."', '".$trn_date."')";
        
    $result = mysqli_query($con, $query);
    
//    var_dump($result);
        
        if($result) {
            echo "<div class='form'>
                <h3>You are registered successfully.</h3>
                <br/>Click here to <a href='login.php'>Login</a></div>";
        }
    
    } else { ?>
          
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="form.php" method="post">
                    <div class="input-container">
                     <i class="fa fa-user icon"></i>        
                     <input type="text" name="username" placeholder="Username" required /></div>
             <div class="input-container">
    <i class="fa fa-envelope icon"></i>
                 <input type="email" name="email" placeholder="Email" required /></div>
            <div class="input-container">
    <i class="fa fa-key icon"></i>
                <input type="password" name="password" placeholder="Password" required /></div>
            <input type="submit" name="submit" value="Register" />
        </form>
    </div>
    
    <?php } ?>
    

 <?php include("footer.php") ?>

</body>

</html>
