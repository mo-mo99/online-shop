<?php
include_once ('header.php');
$all_product = $product->getData();



$buyers = $product->boughtProduct();



?>


<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">buyers list</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                foreach ($buyers as $buyer){
                    ?>
                    <div class="row border-top py-3 mt-3">

                        <div class="col-sm-9">
                            <h5 class="font-baloo font-size-20"><?php echo $User->getUserById($buyer['user_id']); ?></h5>
                        </div>
                        <div class="col-sm-3 text-right">
                            <div class="font-baloo text-danger font-size-20">
                                <span class="product_price"> Items <?php echo $buyer['count']?></span>
                            </div>
                            <div >
                                <h5>Value : <?php echo $buyer['total']?></h5>
                            </div>
                        </div>
                    </div>
                    <?php
                }  ?>
            </div>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-7">
                <h2>All Values </h2>
            </div>
            <div class="col-sm-3">
                <h2 class="text-success"><?php echo $Cart->getSum($buyers);?> $</h2>
            </div>
        </div>
    </div>
</section>
