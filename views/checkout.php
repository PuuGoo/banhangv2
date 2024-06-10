<div class="container">
  <div class="site-cart sc mt-80">
    <div class="sc-title display-3 text-center mb-40">Check Out</div>

    <form action="checkout_" method="post">
      <div class="sc-cartAddress d-flex flex-column border rounded-1" style="width: 100%; padding: 24px;">
        <div class="sc-ca-title display-3 mb-24">Your Address</div>
        <div class="input-group mb-16 flex-column">
          <label for="" class="mb-8 h2">Fullname</label>
          <input type="text" name="hoten" id="" class="form-control" placeholder="Please Typing Fullname!" style="width: 100%;" value="<?= isset($_POST['hoten']) ? htmlspecialchars($_POST['hoten']) : false ?>">
          <?php if (isset($errors['hoten'])) : ?>
            <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['hoten']) ?></div>
          <?php endif; ?>
        </div>
        <div class="input-group mb-16 flex-column">
          <label for="" class="mb-8 h2">Email</label>
          <input type="email" name="email" id="" class="form-control" placeholder="Please Typing Email!" style="width: 100%;" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : false ?>">
          <?php if (isset($errors['email'])) : ?>
            <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['email']) ?></div>
          <?php endif; ?>
        </div>
        <div class="input-group mb-16 flex-column">
          <label for="" class="mb-8 h2">Address</label>
          <input type="text" name="diachi" id="" class="form-control" placeholder="Please Typing Address!" style="width: 100%;" value="<?= isset($_POST['diachi']) ? htmlspecialchars($_POST['diachi']) : false ?>">
          <?php if (isset($errors['diachi'])) : ?>
            <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['diachi']) ?></div>
          <?php endif; ?>
        </div>
        <div class="input-group mb-16 flex-column">
          <label for="" class="mb-8 h2">Mobile Number</label>
          <input type="number" name="dienthoai" id="" class="form-control" placeholder="Please Typing Mobile Number!" style="width: 100%;" value="<?= isset($_POST['dienthoai']) ? htmlspecialchars($_POST['dienthoai']) : false ?>">
          <?php if (isset($errors['dienthoai'])) : ?>
            <div class="errorMes h2 mt-2" style="color: var(--red-01);"><?= strtoupper($errors['dienthoai']) ?></div>
          <?php endif; ?>
        </div>
        <div class="sc-ca-button text-end">
          <button type="submit" class="btn btn-primary">Save Order</button>
        </div>
      </div>
    </form>
    <div class="sc-items p-4 border rounded-1 mt-3">
      <div class="sc-title display-3 text-start mb-4">Your Products Selected</div>
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
                    <input type="checkbox" name="checkbox" id="" class="form-check-input" <?= isset($_SESSION['checkbox']) && $_SESSION['checkbox'][$prod->id_sp] == "true" ? "checked" : "" ?>>
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
    </div>
  </div>
</div>
</div>