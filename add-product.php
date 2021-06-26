<?php
include_once ('header.php');
var_dump($_SERVER['REQUEST_METHOD']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['btn-submit'])) {
        $image = "'./assets/products/".$_POST['image']."'";
        $name = "'".$_POST['name']."'";
        $brand = "'".$_POST['brand']."'";
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        echo 'yes';
        $res = $product->createProduct($name,$brand,$price,$image, $quantity);
    }
}

?>



<body>
<div id="my_form">
    <h3 class="text-center text-white pt-5">Product form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6 ">
                <div id="login-box" class="col-md-8 ">
                    <form class="form" method="post">
                        <h3 class="text-center text-info">Add Product</h3>
                        <div class="form-group">
                            <label for="name" class="text-info">Name:</label><br>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="brand" class="text-info">Brand:</label><br>
                            <input type="text" name="brand" id="brand" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="price" class="text-info">Price:</label><br>
                            <input type="" name="price" id="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="quantity" class="text-info">Quantity:</label><br>
                            <input type="" name="quantity" id="quantity" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Add photo</label>
                            <input class="form-control" name="image" type="file" id="formFile">
                        </div>
                        <div class="form-group">

                            <input type="submit" name="btn-submit" class="btn btn-info btn-md my-2" value="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>