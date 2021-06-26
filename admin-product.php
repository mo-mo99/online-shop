<?php
include_once ('header.php');
$all_product = $product->getData();

?>


<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">product list</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($all_product as $p){
                ?>
                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img class="img-fluid" src="<?php echo $p['item_image']?>" style="height: 120px;" alt="product">
                    </div>
                    <div class="col-sm-7">
                        <h5 class="font-baloo font-size-20"><?php echo $p['item_name']?></h5>
                        <small><?php echo $p['item_price']?> $</small>

                    </div>
                    <div class="col-sm-3 text-right">
                        <div class="font-baloo text-danger font-size-20">
                            In Shop : <span class="product_price"><?php echo $p['quantity']?></span>
                        </div>
                        <div >
                            <h5>Value : <?php echo $p['quantity'] * $p['item_price']?> $</h5>
                        </div>
                    </div>
                </div>
                  <?php
                }  ?>
            </div>
        </div>
        <div class="row">
        <div class="col-sm-7">
            <h2>All Values </h2>
        </div>
        <div class="col-sm-3">
            <h2 class="text-success"><?php echo $product->getStoreValue();?> $</h2>
        </div>
        </div>
    </div>
</section>