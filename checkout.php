<?php
session_start();

if(!isset($_SESSION["user"])) {
    header('Location: login.php');
    die();
}

$product_id = $_GET['product_id'];

require('db.php');

$sql="SELECT * FROM products WHERE id='".$product_id."'";

if ($result=mysqli_query($con,$sql)) {
    
  // Fetch one and one row
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $product = $row;
      } 
  }
    
//var_dump($product);

    
  // Free result set
  mysqli_free_result($result);
}

//var_dump($products);
mysqli_close($con);
?>


<html>

<head>
    <title>Check Out</title>
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

<style>
    

    .row {
        display: -ms-flexbox;
        /* IE10 */
        display: flex;
        -ms-flex-wrap: wrap;
        /* IE10 */
        flex-wrap: wrap;
        margin: 0 -16px;
    }

    .col-25 {
        -ms-flex: 25%;
        /* IE10 */
        flex: 25%;
    }

    .col-50 {
        -ms-flex: 50%;
        /* IE10 */
        flex: 50%;
    }

    .col-75 {
        -ms-flex: 75%;
        /* IE10 */
        flex: 75%;
    }

    .col-25,
    .col-50,
    .col-75 {
        padding: 0 16px;
    }

    .container {
        background-color: #f2f2f2;
        padding: 5px 20px 15px 20px;
        border: 1px solid lightgrey;
        border-radius: 3px;
    }

    input[type=text] {
        width: 100%;
        margin-bottom: 20px;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    label {
        margin-bottom: 10px;
        display: block;
    }

    .icon-container {
        margin-bottom: 20px;
        padding: 7px 0;
        font-size: 24px;
    }

    .btn {
        
        color: white;
        padding: 12px;
        margin: 10px 0;
        border: none;
        width: 100%;
        border-radius: 3px;
        cursor: pointer;
        font-size: 17px;
    }

    .btn:hover {
        background-color: skyblue;
    }

    span.price {
        float: right;
        color: grey;
    }

    /* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (and change the direction - make the "cart" column go on top) */
    @media (max-width: 800px) {
        .row {
            flex-direction: column-reverse;
        }

        .col-25 {
            margin-bottom: 20px;
        }
    }

</style>

<body>
    <?php include("header.php") ?>
    
    <div class="container" >
      
       <h3>Available Payment Options</h3><br>
        <img src="../Images/remita.png" alt="remita">
<!--        <img src="../Images/Paypal.png" alt="paypal">-->
        <img src="../Images/verve.png"  alt="verve">
        <img src="../Images/visa.png"  alt="visa">
        <img src="../Images/mastercard.png"  alt="mastercard">
    </div> 

    <div class="col-25">
        <div class="container">
            <h4>Cart
                <span class="price" style="color:black">
                    <i class="fa fa-shopping-cart"></i>
                    <b>1</b>
                </span>
            </h4>
            <p><?php echo $product['name'] ?> <span class="price">&#8358; <?php echo $product['price'] ?></span></p>
            <hr>
            <p>Total <span class="price" style="color:black"><b>&#8358; <?php echo $product['price'] ?></b></span></p>
            <div class="text-center"> <button cass="btn"> Pay </button></div>
        </div>
    </div>

    
        <?php include("footer.php") ?>
</body>

</html>
