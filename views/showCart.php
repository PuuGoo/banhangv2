<?php

$priceTotal = $quantityTotal = 0;

?>

<div class="container">
    <div class="container">
        <div class="site-cart sc mt-80">
            <div class="sc-title display-3 text-center mb-40">Your Cart</div>
            <table class="table table-bordered">
                <thead>
                    <?php

                    if (isset($_SESSION['checkbox'])) {
                        $count = array_count_values($_SESSION['checkbox']);
                    }

                    ?>
                    <tr class="align-middle text-center">
                        <th scope="col">
                            <div class="form-check">
                                <input type="checkbox" name="" id="checkbox_all" class="form-check-input" <?= isset($count['true']) && $count['true'] == count($_SESSION['checkbox']) ? "checked" : "" ?>>
                            </div>
                        </th>
                        <th scope="col" class="text-start">Product</th>
                        <th scope="col">Unit price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Amount of money</th>
                        <th scope="col">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php if (isset($_SESSION['cart'])) : ?>
                        <?php foreach ($_SESSION['cart'] as $id_sp => $quantity) : ?>
                            <?php

                            $prod = Product::find_product_by_id($id_sp);
                            $amount = $prod->gia * $quantity;


                            ?>
                            <tr class="align-middle text-center">
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" name="checkbox" id="" class="form-check-input" <?= isset($_SESSION['checkbox'][$id_sp]) && $_SESSION['checkbox'][$prod->id_sp] == "true" ? "checked" : "" ?>>
                                        <input type="hidden" name="id_sp" style="display:none" value="<?= $prod->id_sp ?>">
                                    </div>
                                </td>
                                <td class="text-start">
                                    <img src="<?= $prod->hinh ?>" alt="" width="120" height="100">
                                    <?= $prod->ten_sp ?>
                                </td>
                                <td><?= number_format($prod->gia, 0, "", ".") . " VND" ?></td>
                                <td>
                                    <form action="" class="form-quantity input-group d-flex">
                                        <input class="btn" type="button" name="btn_sub" id="" value="-" data-field="quantity">
                                        <input type="number" name="quantity" class="form-control" value="<?= $quantity ?>">
                                        <input class="btn" type="button" name="btn_plus" id="" value="+" data-field="quantity">
                                        <input type="hidden" name="id_sp" style="display:none" value="<?= $prod->id_sp ?>">
                                    </form>
                                </td>
                                <td class="amount"><?= number_format($amount, 0, "", ".") . " VND" ?></td>
                                <td>
                                    <input type="hidden" name="id_sp" style="display:none" value="<?= $prod->id_sp ?>">
                                    <button type="button" name="btn_delete" style="background: transparent;" class="border-0">
                                        <a href="#"><i class="fa-solid fa-trash"></i></a>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="mes display-5" style="color: var(--red-01); display: <?= isset($count['false']) && $count['false'] == count($_SESSION['checkbox']) ? "block" : "none" ?>">Please select a product to process checkout!</div>
            <button type="submit" class="btn btn-primary" name="btn_checkout" style="display: <?= isset($count['true']) ? "block" : "none" ?>">
                <a class="text-white" href="<?= ROOT_URL . "checkout" ?>">Checkout</a>
            </button>
        </div>
    </div>
</div>