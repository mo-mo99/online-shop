<?php
include_once ('header.php');

$id = $_SESSION['auth'];


$check_user = $User->db->con->query("SELECT is_superuser FROM user WHERE user_id = {$id}");
$check = mysqli_fetch_array($check_user,MYSQLI_ASSOC);
if (! $check['is_superuser']){
    header('location:index.php');
}
?>

<div style="text-align: center; height: 18rem;">
    <a href="admin-product.php" ><button style="margin: 20px" type="button" class="btn btn-primary btn-lg">Products</button></a>
    <a href="admin-cart.php"><button style="margin: 20px" type="button" class="btn btn-secondary btn-lg">Sold Items</button></a>
</div>


<?php
include_once ('footer.php');

?>