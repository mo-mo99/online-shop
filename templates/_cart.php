<?php
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['delete_cart_submit'])){
        $deletedrecord = $Cart->deleteCart($_POST['item_id']);
    }
//    if (isset($_POST['save_quantity'])){
//        echo 'hey';
//    }

}

?>

<section id="cart" class="py-3">
    <div class="container-fluid w-75">
        <h5 class="font-baloo font-size-20">Shopping Cart</h5>
        <div class="row">
            <div class="col-sm-9">
                <?php
                $sum = 0;
                foreach ($resultArray as $item):
                    $cart = $product->getProduct($item['item_id']);
                    foreach ($cart as $val){
                        $sum += $val['item_price'];
                    ?>

                <div class="row border-top py-3 mt-3">
                    <div class="col-sm-2">
                        <img class="img-fluid" src="<?php echo $val['item_image'];?>" style="height: 120px;" alt="product">
                    </div>
                    <div class="col-sm-8">
                        <h5 class="font-baloo font-size-20"><?php echo $val['item_name'];?></h5>
                        <small>By <?php echo $val['item_brand']?></small>
                        <div class="d-flex">
                            <div class="rating text-warning font-size-12">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                            </div>
                        </div>
                        <div class="qty d-flex pt-2">
                            <div class="d-flex font-rale w-25">
                                <button class="qty-up border bg-light" data-id="<?php echo $item['item_id'] ?? '0' ?>"><i class="fas fa-angle-up"></i></button>
                                <input name="quantity" type="text" data-id="<?php echo $item['item_id'] ?? '0' ?>" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                                <button data-id="<?php echo $item['item_id'] ?? '0' ?>" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                            </div>
                            <form method="post">
                                <input type="hidden" value="<?php echo $val['item_id'] ?>" name="item_id">
                            <button type="submit" name="delete_cart_submit" class="btn font-baloo text-danger px-3 border-right">Delete</button>
                            </form>
                            <form>
                                <input type="hidden" value="<?php echo $val['item_id'] ?>" name="item_id">
                            <button type="submit" name="save_quantity" class="btn font-baloo text-danger px-3 ">Save</button>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-2 text-right">
                        <div class="font-baloo text-danger font-size-20">
                            $<span class="product_price"><?php echo $val['item_price']?></span>
                        </div>
                    </div>
                </div>

                <?php
                }
                endforeach; ?>
            </div>
            <div class="col-sm-3">
                <div class="sub-total border text-center mt-2">
                    <h6 class="font-rale font-size-12 text-success"><i class="fas fa-check"></i> check</h6>
                    <div class="border-top py-4">
                        <h5 class="font-baloo font-size-20"><?php echo count($resultArray); ?>items&nbsp;<span class="text-danger">$<span class="text-danger" id="deal_price"><?php echo $sum ; ?></span></span></h5>
                        <button class="btn btn-warning mt-3">Proceed to buy</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
