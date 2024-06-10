<?php
// Cart Session
if (isset($_POST['id_sp']) && isset($_POST['quantity'])) {
    $id_sp = $_POST['id_sp'];
    $quantity = $_POST['quantity'];
    $_SESSION['cart'][$id_sp] = $quantity;
    $prod = Product::find_product_by_id($id_sp);
    $amount = number_format($prod->gia * $quantity, 0, "", ".") . " VND";

    // Send respose to showCart.php
    echo json_encode(array("id_sp" => $_SESSION['cart'][$id_sp], "quantity" => $quantity, "amount" => $amount));
}

// Checkbox Session
if (isset($_POST['id_sp']) && isset($_POST['state'])) {
    $id_sp = $_POST['id_sp'];
    $state = $_POST['state'];
    $_SESSION['checkbox'][$id_sp] = $state;

    echo json_encode(array("checkbox" => $_SESSION['checkbox']));
}

// Delete Item in Cart Session
if (isset($_POST['delete_id_sp'])) {
    $id_sp = $_POST['delete_id_sp'];

    unset($_SESSION['cart'][$id_sp]);
    unset($_SESSION['checkbox'][$id_sp]);

    echo json_encode(array("delete_id_sp" => $id_sp));
}
