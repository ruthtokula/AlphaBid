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

    </style>
    <style>
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

        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Manage Products</h3>

                    <?php 
                    require('db.php');

                    if (isset($_REQUEST['name']) && isset($_REQUEST['price']) && isset($_FILES['image_path'])) {
                        
                        if(isset($_FILES['image_path'])){
                          $errors= array();
                          $file_name = $_FILES['image_path']['name'];
                          $file_size =$_FILES['image_path']['size'];
                          $file_tmp =$_FILES['image_path']['tmp_name'];
                          $file_type=$_FILES['image_path']['type'];
                            
                          $explodedImg = explode('.',$_FILES['image_path']['name']);
                          $file_ext=strtolower(end($explodedImg));
                        

                          $extensions= array("jpeg","jpg","png");

                          if(in_array($file_ext,$extensions)=== false){
                             $errors[]="extension not allowed, please choose a JPEG or PNG file.";
                          }

//                          if($file_size > 2097152){
//                             $errors[]='File size must be excately 2 MB';
//                          }

                          if(empty($errors)==true){
                             move_uploaded_file($file_tmp,"../Images/products/".$file_name);


                            $name = stripslashes($_REQUEST['name']);
                            $name = mysqli_real_escape_string($con,$name);

                            $price = stripslashes($_REQUEST['price']);
                            $price = mysqli_real_escape_string($con,$price);

                            $query = "INSERT into products (name, price, image_path)
                                        VALUES ('".$name."', '".$price."', 'Images/products/".$file_name."')";

                            $result = mysqli_query($con, $query);

                        //    var_dump($result);

                                if($result) {
                                    echo "<div class='form'>
                                        <h3 class='text-success'>Product saved successfully.</h3>";
                                }

                          }else{
                             print_r($errors);
                          }
                       }

                    } else { ?>

                    <h5 class="text-danger">All fields are required</h5>

                    <?php } ?>

                    <form action="products_manager.php" enctype="multipart/form-data" method="post">
                        <div class="form-group row">
                            <label for="name" class="col-sm-2 col-form-label">Name</label>
                            <div class="col-sm-10">
                                <input name="name" type="text" class="form-control" id="name" placeholder="Name">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="price" class="col-sm-2 col-form-label">Price</label>
                            <div class="col-sm-10">
                                <input name="price" type="text" class="form-control" id="price" placeholder="Price">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image_path" class="col-sm-2 col-form-label">Product Image</label>
                            <div class="col-sm-10">
                                <input name="image_path" type="file" class="form-control" id="image_path" placeholder="Product Image">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Add Product</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </main>

    <?php include("footer.php") ?>

</body>

</html>
