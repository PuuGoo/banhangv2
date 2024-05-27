<?php

$priceTotal = $quantityTotal = 0;

?>

<div class="container">
    <div class="container">
        <div class="site-cart sc mt-80">
            <div class="sc-title display-3 text-center mb-40">Your Cart</div>
            <form action="" method="post" id="formCart">
                <div class="sc-cartInfo d-flex align-items-center">
                    <div class="sc-items me-24 border rounded-2 border-grey d-flex flex-column" style="width: 788px; padding: 24px;height: fit-content;">
                        <?php foreach ($_SESSION['cart'] as $id_sp => $quantity) : ?>
                            <?php

                            $pro = Product::find_product_by_id($id_sp);
                            $price = $pro->gia * $quantity;
                            $priceTotal += $price;
                            $quantityTotal += $quantity;

                            if (isset($_SESSION['checkbox'][$id_sp])) {
                                if ($_SESSION['checkbox'][$id_sp] == "true") {
                                    $state = "checked";
                                } else {
                                    $state = "";
                                }
                            }


                            ?>
                            <div class="sc-item sc-i d-flex justify-content-between align-items-center mb-24 border-bottom" style="height: 100%">
                                <div class="sc-i-infoPro d-flex align-items-center">
                                    <div class="form-check me-8">
                                        <input class="form-check-input" <?= isset($state) ? $state : "" ?> type="checkbox" value="" id="<?= $pro->id_sp ?>">
                                    </div>
                                    <div class="sc-i-img me-16">
                                        <img src="<?= $pro->hinh ?>" alt="" width="100" height="100">
                                    </div>
                                    <div class="sc-i-content sc-ic">
                                        <div class="sc-ic-name display-6"><?= $pro->ten_sp ?></div>
                                        <div class="sc-ic-price display-6" style="color: var(--darkGreen-03)"><?= number_format($price, 0, "", "."); ?></div>
                                    </div>
                                </div>
                                <div class="sc-i-buttons d-flex align-items-center">
                                    <div class="sc-ib-formIncreDecre me-8">
                                        <div class="d-flex align-items-center justify-content-between border rounded-2" style="width: fit-content; padding: 12px;">
                                            <input class="border-0 bg-white button-sub" type="button" value="-" data-field="quantity">
                                            <input class="border-0 text-center" style="width: 50px;" type="number" id="<?= $id_sp ?>" step="1" max="10" value="<?= $quantity ?>" name="quantity">
                                            <input class="border-0 bg-white button-plus" type="button" value="+" data-field="quantity">
                                        </div>
                                    </div>
                                    <a class="sc-ib-delete" href="">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24" width="24" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                                            <path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="sc-proSum scp border rounded-2 border-grey d-flex flex-column justify-content-center" style="width: 400px;padding: 24px;height:200px;">
                        <div class="scp-proList mb-8">
                            <?php

                            $resultArray = array_count_values($_SESSION['checkbox']);


                            ?>
                            <?php if (isset($resultArray['false']) && $resultArray['false'] == count($_SESSION['checkbox'])) : ?>
                                <div class="scp-p-empty">No products selected</div>
                            <?php else : ?>
                                <?php foreach ($_SESSION['checkbox'] as $id_sp => $state) : ?>
                                    <?php

                                    $prod = Product::find_product_by_id($id_sp);
                                    $price = $prod->gia * $_SESSION['cart'][$id_sp];

                                    ?>
                                    <?php if ($state == "true") : ?>
                                        <div class="scp-p-items d-flex justify-content-between align-items-center">
                                            <div class="scp-pi-name text-break overflow-x-hidden" style="width: 200px;white-space: nowrap;"><?= $prod->ten_sp ?></div>
                                            <div class="scp-pi-price" style="white-space: nowrap;"><?= number_format($price, 0, "", ".") . " VND" ?></div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </div>
                        <div class="scp-priceTotal d-flex justify-content-between align-items-center mb-8">
                            <div class="scp-pt-title h2">Total Price</div>
                            <div class="scp-pt-price"><?= number_format($priceTotal, 0, "", ".") . " VND" ?></div>
                        </div>
                        <div class="sc-button text-end">
                            <a href="checkout">
                                <button class="btn btn-primary">Checkout</button>
                            </a>
                        </div>
                    </div>

                </div>
            </form>

        </div>
    </div>
</div>