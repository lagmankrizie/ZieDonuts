<?php
$storeName = "Zie Donuts";
$donuts = ["Glazed Donut", "Chocolate Frosted","Strawberry Donut", "Sprinkle Donut", "Choco Butternut"];
$prices = [30, 35, 35, 35, 40];
$description = "Welcome to Zie Donuts! We offer freshly made donuts every day using quality ingredients. 
Our menu includes classic flavors and premium favorites that many customers love. 
Check out our delicious selections below and enjoy sweet treats made with care and passion.";
?>
<!DOCTYPE html>
<html>
<head>
    <title><?= $storeName ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h1><?= $storeName ?></h1>
    <p><?= $description ?></p>
<h2>Our Menu</h2>
<table>
    <tr>
        <th>Donut Flavors</th>
        <th>Price</th>
    </tr>

    <tr>
        <td><?= $donuts[0] ?></td>
        <td>₱<?= $prices[0] ?></td>
    </tr>

    <tr>
        <td><?= $donuts[1] ?></td>
        <td>₱<?= $prices[1] ?></td>
    </tr>

    <tr>
        <td><?= $donuts[2] ?></td>
        <td>₱<?= $prices[2] ?></td>
    </tr>
    <tr>
        <td><?= $donuts[3] ?></td>
        <td>₱<?= $prices[3] ?></td>
    </tr>
    <tr>
        <td><?= $donuts[4] ?></td>
        <td>₱<?= $prices[4] ?></td>
    </tr>
</table>
    <a class="btn" href="promo.php">View Our Promo Offers</a>
</body>
</html>
