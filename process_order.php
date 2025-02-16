<?php
session_start();
include 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo "<script>alert('Anda harus login terlebih dahulu!'); window.location='login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $product_id = $_POST['product_id'];
    $user_id = $_SESSION['user_id'];

    $conn->query("INSERT INTO orders (user_id, product_id, status) VALUES ($user_id, $product_id, 'pending')");

    echo "<script>alert('Pesanan berhasil dibuat!'); window.location='index.php';</script>";
}
?>