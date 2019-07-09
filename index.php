<?php
session_start();
require('db.php');
    
$bidError = false;


$sql="SELECT * FROM products ORDER BY created_at DESC";

if ($result=mysqli_query($con,$sql)) {
    
  // Fetch one and one row
  $products = [];
  if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $products[] = $row;
      } 
  }

  mysqli_free_result($result);
}


// HANDLE BID REQUEST
if(isset($_REQUEST['bid_price'])) {
    
    // ensure user is logged in
    if(!isset($_SESSION["user"])) {
        header('Location: login.php');
        die();
    }
       
    if($_REQUEST['bid_price'] <= $_REQUEST['current_price']) {
        $bidError = true;
    } else {
        
        $_SESSION['bidSuccess'] = true;
        
        $query = "UPDATE products SET price = '".$_REQUEST['bid_price']."' WHERE id = '".$_REQUEST['product_id']."'";

        $result = mysqli_query($con, $query);

        var_dump($result);


        header("location: index.php");
        exit();
    }
    
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




    <main role="main" class="container">
                        
        <?php if($bidError) { ?> 
        <div class="alert alert-danger">
          <strong>Error!</strong> Please enter a higher bid price.
        </div>
        <?php } if(isset($_SESSION['bidSuccess'])) { ?> 
        <div class="alert alert-success">
          <strong>Success!</strong> Bid was placed successfully.
        </div>
        <?php } ?> 


        <div class="col rowspace">
            <img src="../Images/header.png" alt="header image" class="img-responsive img-fluid">
        </div>



        <br>


        <form class="form-right my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>FEATURED <b class="text-primary">PRODUCTS</b></h3>
                </div>
            </div>
        </div>


        <div class="container">

            <div class="row">
                <?php foreach(array_slice($products, 0, 4) as $product) {  ?>
                <div class="col-sm mr-3" style="border:1px solid #CCC;">
                    <div class="ribbon dark"><span>Limited Offer</span></div>
                    <div class="col-item">
                        <div class="photo">
                            <img style="max-height:250px;min-height:250px;" src="../<?php echo $product['image_path'] ?>" class="img-responsive" alt="a">
                        </div>
                        <div class="info" style="border-top:1px solid #f5f4f3;">
                            <div class="row">
                                <div class="price col-md-12">
                                    <h4> <?php echo $product['name'] ?> - <span class="text-info">&#8358; <?php echo $product['price'] ?></span></h4>
                                </div>

                            </div>
                            <div class="btn-group btn-group-justified">
                                <a href="checkout.php?product_id=<?php echo $product['id'] ?>" class="btn btn-primary"><i class="fa fa-shopping-cart"> Buy Now</i>
                                </a>
                                <a href="product.php?product_id=<?php echo $product['id'] ?>" class="btn btn-default hidden-xs"><i class="fa fa-list"></i> View Details</a>
                            </div>
                            <div class="clearfix">
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>

            </div>
        </div>





        <br>
        <div class="container" style="margin-top:20px;">
            <h1 class="text-center">LIVE <b class="text-primary">AUCTIONS</b></h1><br>
            <div class="row">
                <?php foreach(array_slice($products, 5, 4) as $product) {  ?>
                <div class="col-md-3" style="padding:5px; margin-bottom:30px;" id="liveauction<?php echo $product['id'] ?>">
                    <div class="pro_div" style="border:1px solid #CCC;">

                        <h4 title="Television" class="text-center prodiv_heading" style="border-bottom:1px solid #CCC; padding-bottom:10px;"> <?php echo $product['name'] ?>
                        </h4>

                        <div class="img_div" style="padding:5px;">
                            <div class="ribbon base"><span>Bid Now</span></div>
                            <a href="index.html"><img src="../<?php echo $product['image_path'] ?>" class="img img-responsive center-block" style="max-height:250px;min-height:250px;"></a>
                            <p class="hidden-lg text-center text-info"> &#8358; <?php echo $product['price'] ?></p>
                            <p class="hidden-xs text-center text-info">RRP (Recommended Retail Price)<br><b>
                                    &#8358; <?php echo $product['price'] ?></b></p>
                            <!--                            <h5>Auction ID - <b id="aucid20">100030020</b></h5>-->

                        </div>
                        <div id="upcoming20">
                            <div class="auction_details" style="background:#eaeaea; padding-left:10px; padding-right:10px;">
                                <div class="row">
                                    <div class="col-md-6 userandtime pull-right col-xs-6 zoomfont" id="bid_div20" style="display: block;">
                                        <input type="hidden" id="totbids20" href="20" value="18863">
                                        <h5 class="text-success style_prevu_kit text-center" style="background:none;"></h5>

                                        <span>
                                            <b class="text-primary" id="demo<?php echo $product['id'] ?>" title="107143"></b></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form action="index.php" method="post" class="mt-3">
                           <input type="hidden" name="product_id" value="<?php echo $product['id'] ?>" />
                           <input type="hidden" name="current_price" value="<?php echo $product['price'] ?>" />
                           
                            <input name="bid_price" type="number" required class="form-control text-center" placeholder="Enter Bid Amount" />
                            
                            <button class="btn btn-block btn-info placebid"><i class="fa fa-gavel"></i> Bid</button>
                        </form>

                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
        <br><br>

    <?php unset($_SESSION["bidSuccess"]); ?>


    </main>

    <!-- /.container -->
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

    <script>
        var count1 = <?php echo $products[5]['id']; ?>;
        var count2 = count1 - 1;
        var count3 = count1 - 2;
        var count4 = count1 - 3;

        window.onload = function() {
            timer('demo' + count1, 'Jul 25, 2019 15:37:25');
            timer('demo' + count2, 'Jul 24, 2019 18:00:00');
            timer('demo' + count3, 'Jul 29, 2019 15:50:40');
            timer('demo' + count4, 'Jul 31, 2019 13:50:40');
        }

        function timer(showTime, timeToShow) {

            // Set the date we're counting down to
            var countDownDate = new Date(timeToShow).getTime();

            // Update the count down every 1 second
            var x = setInterval(function() {

                // Get today's date and time
                var now = new Date().getTime();

                // Find the distance between now and the count down date
                var distance = countDownDate - now;

                // Time calculations for days, hours, minutes and seconds
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                // Output the result in an element with id="demo"
                document.getElementById(showTime).innerHTML = days + "d " + hours + "h " +
                    minutes + "m " + seconds + "s ";

                // If the count down is over, write some text 
                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("demo").innerHTML = "EXPIRED";
                }
            }, 1000);
        }

    </script>

</body>

</html>
