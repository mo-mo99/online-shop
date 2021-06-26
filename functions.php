 <?php

 require ('database/DBController.php');
 require ('database/Product.php');
 require ('database/Cart.php');
 require ('database/User.php');

 $db = new DBController();

 $product = new Product($db);
 $product_shuffle = $product->getData();

 $Cart = new Cart($db);

 $User = new User($db);

 $current_user = $_SESSION['auth'];
 $result = $product->db->con->query("SELECT * FROM product WHERE item_id IN (SELECT item_id FROM cart WHERE user_id = {$current_user})");
 $resultArray = array();

 while ($item = mysqli_fetch_array($result,MYSQLI_ASSOC)){
     $resultArray[] = $item;
 }


