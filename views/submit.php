<?php
// Cart Session
if (isset($_POST['id_sp']) && isset($_POST['quantity'])) {
    $id_sp = $_POST['id_sp'];
    $quantity = $_POST['quantity'];

    $_SESSION['cart'][$id_sp] = $quantity;
}


// Checkbox Session
if (
    isset($_POST['id_sp']) && isset($_POST['state'])
) {
    $checkbox_id = $_POST['id_sp'];
    $state = $_POST['state'];

    $_SESSION["checkbox"][$checkbox_id] = $state;
}
