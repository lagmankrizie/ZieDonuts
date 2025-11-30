<?php
$storeName = "Zie Donuts";

// Donuts and prices
$donuts = ["Glazed Donut", "Chocolate Frosted", "Strawberry Donut", "Sprinkle Donut", "Choco Butternut"];
$prices = [30, 35, 35, 35, 40];

// Descriptions and messages
$description = "We offer freshly made donuts every day using quality ingredients. 
Our menu includes classic flavors and premium favorites that many customers love. 
Check out our delicious selections below and enjoy sweet treats made with care and passion.";

$welcomeMessage = " We're delighted to share our love for freshly baked donuts with you. 
Every day, we create a variety of sweet treats using only the finest ingredients, from classic favorites like Glazed and Chocolate Frosted,
to our special Choco Butternut delights. Whether you're stopping by for breakfast, a quick snack, or a celebration with friends and family,
our donuts are crafted to bring a smile to your day. Come join us and experience the joy of soft, fluffy, and delicious donuts made with care and passion!";

$aboutus = "Welcome to Zie Donuts! Founded with a passion for creating joy in every bite, we craft our donuts fresh daily using only the finest ingredients.
From our classic Glazed Donuts to the indulgent Choco Butternut, each treat is made with care to delight your taste buds.
At Zie Donuts, we believe every donut is more than just a snack—its a moment of happiness.
Join us for breakfast, a sweet snack, or a special treat, and experience the love and passion baked into every donut!";

// Promo calculations
$totalSix = array_sum($prices) + $prices[0];
$discountAmountBox = $totalSix * 0.05;
$finalSix = $totalSix - $discountAmountBox;

$threeChocoTotal = $prices[4] * 3;
$discountChoco = $threeChocoTotal * 0.05;
$finalChocoPrice = $threeChocoTotal - $discountChoco;

// Determine page
$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $storeName ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="page-header">
    <h1><?= $storeName ?></h1>
    <?php include 'header.php'; ?>
</div>
<?php
if ($page == 'home') {
?>
    <h1>Welcome To <?= $storeName ?>!</h1>
    <h2>Fresh, Sweet, and Delightful Every Day!</h2>
    <p><?= $welcomeMessage ?></p>
    <a href="?page=menu" class="btn">View Our Menu</a>

    <div class="highlights">
        <div class="highlight-card"><h3>Daily Fresh Donuts</h3><p>Soft, fluffy, and sweet donuts baked every morning.</p></div>
        <div class="highlight-card"><h3>Special Flavors</h3><p>Premium flavors made with love.</p></div>
    </div>

<?php
} elseif ($page == 'about') {
?>
<div class="container">
        <h1>About Us</h1>
        <p><?= $aboutus ?></p>

        <div class="highlights">
            <div class="highlight-card">
                <h3>Our Mission</h3>
                <p>To bring a smile to every customer by serving delicious, fresh donuts made with love and high-quality ingredients.</p>
            </div>
            <div class="highlight-card">
                <h3>Our Vision</h3>
                <p>To be the leading donut shop in our community, known for quality, creativity, and creating joyful experiences for every customer.</p>
            </div>
        </div>
    </div>

<?php
} elseif ($page == 'menu') {
?>
    <h1><?= $storeName ?></h1>
    <p><?= $description ?></p>
    <h2>Our Menu</h2>
    <table>
        <tr><th>Donut Flavors</th><th>Price</th></tr>
        <?php for ($i = 0; $i < count($donuts); $i++): ?>
        <tr><td><?= $donuts[$i] ?></td><td>₱<?= $prices[$i] ?></td></tr>
        <?php endfor; ?>
    </table>
    <a class="btn" href="?page=promo">View Our Promo Offers</a>

<?php
} elseif ($page == 'promo') {
?>
    <h1>Special Promos at <?= $storeName ?></h1>
    <p>
        Enjoy our exciting promos for better deals on your favorite donuts!
    </p>
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

<?php
} else {
    echo "<h1>Page not found!</h1>";
}
?>

<?php include 'footer.php'; ?>
</body>
</html>