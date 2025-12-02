<?php
declare(strict_types=1);
$storeName = "Zie Donuts";
// Donuts and prices with stock
$donuts = [
    'Glazed Donut' => ['price' => 30, 'stock' => 13],
    'Chocolate Frosted' => ['price' => 35, 'stock' => 9],
    'Strawberry Donut' => ['price' => 35, 'stock' => 15],
    'Sprinkle Donut' => ['price' => 35, 'stock' => 15],
    'Choco Butternut' => ['price' => 40, 'stock' => 20],
];
$tax = 5;

// Functions
function get_reorder_message(int $stock): string {
    return ($stock < 10) ? 'Yes' : 'No';
}
function get_total_value(float $price, int $quantity): float {
    return $price * $quantity;
}
function get_tax_due(float $price, int $quantity, int $tax = 0): float {
    return ($price * $quantity) * ($tax / 100);
}

// Descriptions
$description = "At Zie Donuts, We offer freshly made donuts every day using quality ingredients. 
Our menu includes classic flavors and premium favorites that many customers love. 
Check out our delicious selections below and enjoy sweet treats made with care and passion.";

$welcomeMessage = "We're delighted to share our love for freshly baked donuts with you. 
Every day, we create a variety of sweet treats using only the finest ingredients, 
from classic favorites like Glazed and Chocolate Frosted, to our special Choco Butternut delights. 
Whether you're stopping by for breakfast, a quick snack, or a celebration, our donuts are crafted 
to bring a smile to your day.";

// Promo Calculations
$donutPrices = array_column($donuts, 'price');
while (count($donutPrices) < 6) {
    $donutPrices[] = $donutPrices[0];
}
$totalSix = 0;
$count = 0;
foreach ($donuts as $data) {
    if ($count == 6) break;
    $totalSix += $data['price'];
    $count++;
}
$discountAmountBox = $totalSix * 0.05;
$finalSix = $totalSix - $discountAmountBox;

// Promo 2: 3 Choco Butternut
$threeChocoTotal = $donuts['Choco Butternut']['price'] * 3;
$discountChoco = $threeChocoTotal * 0.05;
$finalChocoPrice = $threeChocoTotal - $discountChoco;

$page = $_GET['page'] ?? 'home';
?>
<!DOCTYPE html>
<head>
    <title><?= $storeName ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="page-header">
    <h1><?= $storeName ?></h1>
    <?php include 'includes/header.php'; ?>
</div>
<?php
if ($page == 'home') { ?>
    <h1>Welcome To <?= $storeName ?>!</h1>
    <h2>Fresh, Sweet, and Delightful Every Day!</h2>
    <p><?= $welcomeMessage ?></p>
    <a href="?page=menu" class="btn">View Our Menu</a>
    <div class="highlights">
        <div class="highlight-card"><h3>Daily Fresh Donuts</h3><p>Soft, fluffy, and sweet donuts baked every morning.</p></div>
        <div class="highlight-card"><h3>Special Flavors</h3><p>Premium flavors made with love.</p></div>
    </div>
<?php
} elseif ($page == 'stock') { ?>
    <h2>Stock Control</h2>
    <table>
        <tr>
            <th>Product</th>
            <th>Stock</th>
            <th>Re-Order</th>
            <th>Total Value</th>
            <th>Tax Due</th>
        </tr>

        <?php foreach ($donuts as $product_name => $data) { ?>
        <tr>
            <td><?= $product_name ?></td>
            <td><?= $data['stock'] ?></td>
            <td><?= get_reorder_message($data['stock']) ?></td>
            <td>₱<?= get_total_value($data['price'], $data['stock']) ?></td>
            <td>₱<?= get_tax_due($data['price'], $data['stock'], $tax) ?></td>
        </tr>
        <?php } ?>
    </table>
<?php
} elseif ($page == 'menu') { ?>
    <p><?= $description ?></p>
    <h2>Our Menu</h2>
    <table>
        <tr><th>Donut Flavors</th><th>Price</th></tr>
        <?php foreach ($donuts as $name => $data): ?>
        <tr>
            <td><?= $name ?></td>
            <td>₱<?= $data['price'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a class="btn" href="?page=promo">View Our Promo Offers</a>
<?php
} elseif ($page == 'promo') { ?>
    <h1>Special Promos at <?= $storeName ?></h1>
    <p>Enjoy our exciting promos for better deals on your favorite donuts!</p>

    <div class="promo1">
        <h2>Promo 1: 6-Piece Box — 5% Discount</h2>
        <p>Total Price: ₱<?= $totalSix ?></p>
        <p>Discount (5%): ₱<?= $discountAmountBox ?></p>
        <p><b>Final Price: ₱<?= $finalSix ?></b></p>
    </div>

    <div class="promo2">
        <h2>Promo 2: Buy 3 Choco Butternut Donuts — 5% Off</h2>
        <p>Regular Total: ₱<?= $threeChocoTotal ?></p>
        <p>Discount (5%): ₱<?= $discountChoco ?></p>
        <p><b>Final Price: ₱<?= $finalChocoPrice ?></b></p>
    </div>
<?php } else { ?>
    <h1>Page not found!</h1>
<?php } ?>
<?php include 'includes/footer.php'; ?>
</body>
</html>
