<?php 
session_start();
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
  


<!DOCTYPE html>
<html lang="en">

<head>
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


    <style>
        .nav-pills>li.active>a,
        .nav-pills>li.active>a:hover,
        .nav-pills>li.active>a:focus {
            color: #fff;

            background-color: #008651;
        }

        .margintop20 {
            margin-top: 20px;
        }

        .nav-pills>li>a {
            border-radius: 0px;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        a:hover {
            color: #000;
            text-decoration: none;
        }


        .nav-stacked>li+li {
            margin-top: 0px;
            margin-left: 0;
            border-bottom: 1px solid #dadada;
            border-left: 1px solid #dadada;
            border-right: 1px solid #dadada;
        }

        .active2 {
            border-right: 4px solid #428bca;






        }

        a {
            color: #40a47d;
        }

        .header {
            margin-top: 20px;
        }

        .btn-info {
            border-color: #024899;
            background: #024899;
        }



        .fa-star {
            color: #FC0;
        }

        .no-js #loader {
            display: none;
        }

        .js #loader {
            display: block;
            position: absolute;
            left: 100px;
            top: 0;
        }

        .se-pre-con {
            position: fixed;
            left: 0px;
            top: 0px;
            width: 100%;
            height: 100%;
            z-index: 9999;
            background: url(https://Alpha.html.com/assets/Preloader_3.gif) center no-repeat #fff;
        }

    </style>

</head>

<body>


    <?php include("header.php") ?>

    <br><br>


    <main role="main" class="container">
        
        <br>
        <div class="container" style="margin-top:20px;">
            <div class="row text-center">
               <h3><?php echo $product['name']; ?>|</h3> 
                
                
                
                <h3>&#8358;<?php echo $product['price']; ?></h3>
                 
                
                 
                <img src="../<?php echo $product['image_path'] ?>" class="img-responsive img-fluid" alt="<?php echo $product['name'] ?>">
            </div>
        </div>

        <br><br>

    </main><!-- /.container -->


    <?php include("footer.php") ?>


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="../Images/bootstrap.min.js.download"></script>
    <script src="../Images/jquery.min.js.download"></script>
    <script src="../Images/slick.js.download"></script>
    <script src="../Images/socket.io.js.download"></script>

</body>

</html>