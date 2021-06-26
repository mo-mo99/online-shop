<?php
$item_id = $_GET['item_id'] ?? 1;
foreach ($product->getData() as $item):
if ($item['item_id'] == $item_id):
?>

<section id="product" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img src="<?php echo $item['item_image']?>" alt="product" class="img-fluid">
                <div class="form-row pt-4 font-size-16 font-baloo">
                    <div class="col">
                        <button type="submit" class="btn btn-danger form-control">Buy It</button>
                    </div>
                    <div class="col">
                        <button type="submit" class="btn btn-warning form-control">Add To Card</button>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 py-5">
                <h5 class="font-baloo font-size-20"><?php echo $item['item_name']?></h5>
                <small>by <?php echo $item['item_brand']?></small>
                <div class="d-flex">
                    <div class="rating text-warning font-size-12">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                    </div>
                </div>
                <hr>
                <table class="my-3">
                    <tr class="font-rale font-size-14">
                        <td>M.R.P</td>
                        <td><strike>$162.00</strike></td>
                    </tr>
                    <tr class="font-rale font-size-14">
                        <td>Deal price : </td>
                        <td class='font-size-20 text-danger'>$<span><?php echo $item['item_price']?></span></td>
                    </tr>
                </table>
                <div class="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-retweet border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">10 Dyas<br>Replacement</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-truck border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">Daily Tuition<br>Delivered</a>
                        </div>
                        <div class="return text-center mr-5">
                            <div class="font-size-20 my-2 color-second">
                                <span class="fas fa-check-double border p-3 rounded-pill"></span>
                            </div>
                            <a href="#" class="font-rale font-size-12">1 Year<br>Warranty</a>
                        </div>
                    </div>
                </div>
                <div class="qty d-flex py-4">
                    <h6 class="font-baloo">Qty</h6>
                    <?php
                    if ($product->getQuantity($item_id) == 0 ){
                        echo '<button type="submit" disabled class="btn btn-danger font-size-12 mx-3">finished</button>';
                    }
                    else{
                        echo '<div class="px-4 d-flex font-rale">
                        <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>
                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">
                        <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>
                        </div>';
                    }
                    ?>
<!--                    <div class="px-4 d-flex font-rale">-->
<!--                        <button class="qty-up border bg-light" data-id="pro1"><i class="fas fa-angle-up"></i></button>-->
<!--                        <input type="text" data-id="pro1" class="qty_input border px-2 w-50 bg-light" disabled value="1" placeholder="1">-->
<!--                        <button data-id="pro1" class="qty-down border bg-light"><i class="fas fa-angle-down"></i></button>-->
<!--                    </div>-->
                </div>
            </div>

            <div class="col-12">
                <h6 class="font-rubik pt-5">Product Description</h6>
                <hr>
                <p class="font-rale font-size-14">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae quibusdam quidem ratione, dolor animi iure quaerat. Vitae quaerat quidem est!</p>
            </div>

        </div>
    </div>
</section>

<?php
endif;
endforeach;
?>