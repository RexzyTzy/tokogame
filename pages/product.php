<?php
include '../includes/db.php';
$id = $_GET['id'];
$result = $conn->query("SELECT * FROM products WHERE id=$id");
$product = $result->fetch_assoc();
?>
<div class="container">
    <h2><?= $product['name']; ?></h2>
    <img src="../images/<?= $product['image']; ?>" width="200">
    <p>Harga: Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
    <a href="checkout.php?id=<?= $product['id']; ?>" class="btn">Beli Sekarang</a>
</div>