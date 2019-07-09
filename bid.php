<?php
require('db.php');

if($_REQUEST['bid_price'] <= $_REQUEST['current_price']) {
    echo "no bid";
} else {
    $query = "UPDATE products SET price = '".$_REQUEST['bid_price']."' WHERE id = '".$_REQUEST['product_id']."'";

    $result = mysqli_query($con, $query);
    
    var_dump($result);
    
    
    header("location: index.php");
    exit();
}

//var_dump($products);
mysqli_close($con);

?>