<?php
session_start();
include '../includes/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id']; // Pastikan user login
    $conn->query("INSERT INTO orders (user_id, product_id, status) VALUES ($user_id, $product_id, 'pending')");
    echo "<script>alert('Pesanan berhasil!'); window.location='../index.php';</script>";
}

$id = $_GET['id'];
$product = $conn->query("SELECT * FROM products WHERE id=$id")->fetch_assoc();
?>

<div class="container">
    <h2>Checkout</h2>
    <p>Produk: <?= $product['name']; ?></p>
    <p>Harga: Rp <?= number_format($product['price'], 0, ',', '.'); ?></p>
    <form method="POST">
        <input type="hidden" name="product_id" value="<?= $product['id']; ?>">
        <button type="submit" class="btn">Bayar Sekarang</button>
    </form>
</div>