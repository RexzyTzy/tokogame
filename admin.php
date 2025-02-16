<?php
include 'config.php';
session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
}

$orders = $conn->query("SELECT orders.id, users.name AS user, products.name AS product, orders.status 
                        FROM orders 
                        JOIN users ON orders.user_id = users.id 
                        JOIN products ON orders.product_id = products.id");

?>

<h2>Admin Panel - Daftar Pesanan</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Pelanggan</th>
        <th>Produk</th>
        <th>Status</th>
        <th>Aksi</th>
    </tr>
    <?php while ($order = $orders->fetch_assoc()): ?>
    <tr>
        <td><?= $order['id']; ?></td>
        <td><?= $order['user']; ?></td>
        <td><?= $order['product']; ?></td>
        <td><?= $order['status']; ?></td>
        <td>
            <form method="POST" action="update_order.php">
                <input type="hidden" name="order_id" value="<?= $order['id']; ?>">
                <select name="status">
                    <option value="pending" <?= $order['status'] == 'pending' ? 'selected' : ''; ?>>Pending</option>
                    <option value="completed" <?= $order['status'] == 'completed' ? 'selected' : ''; ?>>Completed</option>
                    <option value="canceled" <?= $order['status'] == 'canceled' ? 'selected' : ''; ?>>Canceled</option>
                </select>
                <button type="submit">Update</button>
            </form>
        </td>
    </tr>
    <?php endwhile; ?>
</table>