<?php include 'includes/header.php'; ?>
<div class="container">
    <h1>Selamat Datang di Tokogame</h1>
    <div class="products">
        <?php
        include 'includes/db.php';
        $result = $conn->query("SELECT * FROM products");
        while ($row = $result->fetch_assoc()):
        ?>
            <div class="product">
                <img src="images/<?= $row['image']; ?>" alt="<?= $row['name']; ?>">
                <h3><?= $row['name']; ?></h3>
                <p>Rp <?= number_format($row['price'], 0, ',', '.'); ?></p>
                <a href="pages/product.php?id=<?= $row['id']; ?>" class="btn">Lihat Produk</a>
            </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'includes/footer.php'; ?>