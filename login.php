<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Login</title>
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

</head>

<body>

    <?php include("header.php"); ?>
    <?php
require('db.php');

// If form submitted, insert values into the database.
if (isset($_POST['username'])) {
        // removes backslashes
	$username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
	$username = mysqli_real_escape_string($con,$username);
	$password = stripslashes($_REQUEST['password']);
	$password = mysqli_real_escape_string($con,$password);
	
    //Checking is user existing in the database or not
    $query = "SELECT * FROM `users` WHERE username='".$username."' and password='".$password."'";
	$result = mysqli_query($con,$query) or die(mysql_error());
	$rows = mysqli_num_rows($result);
    
        if($rows==1){
            
            while($row = $result->fetch_assoc()) {
                $_SESSION['user'] = $row;
            }            
        
            // Redirect user to index.php
	       header("Location: index.php");
            
         } else {
            
            echo "<div class='form'>
                <h6 class='text-danger'>Username/password is incorrect.</h6></div>";
	       }
    
    }
    
else{
}
?>
    <div class="form">
        <h1>Log In</h1>
        <form action="login.php" method="post" name="login" >
            <div class="input-container">
                     <i class="fa fa-user icon"></i>    
                <input type="text" name="username" placeholder="Username" required /></div>
              <div class="input-container">
                        <i class="fa fa-key icon"></i>
                  <input type="password" name="password" placeholder="Password" required /><br></div>
            <input name="submit" type="submit" value="Login" class="text-center" />
        </form>
        <p>Not registered yet? <a href='form.php'>Register Here</a></p>
    </div>
    <?php  ?>
    <?php include("footer.php") ?>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../Images/bootstrap.min.js.download"></script>
    <script src="../Images/jquery.min.js.download"></script>
    <script src="../Images/slick.js.download"></script>
    <script src="../Images/socket.io.js.download"></script>

</body>

</html>
