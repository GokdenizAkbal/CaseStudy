<?php
$jsonData = file_get_contents('products.json');
$products = json_decode($jsonData, true);
?>

<h1>Product List</h1>
<div class="product-list">
    <?php foreach($products as $product): ?>
        <div class="product-card">
            <img src="<?php echo $product['images']['yellow']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-img">
            <h2><?php echo htmlspecialchars($product['name']); ?></h2>
            <p class="price">$<?php echo number_format($product['weight'] * 50, 2); ?> USD</p>

            <div class="colors">
                <span class="color yellow" data-img="<?php echo $product['images']['yellow']; ?>"></span>
                <span class="color rose" data-img="<?php echo $product['images']['rose']; ?>"></span>
                <span class="color white" data-img="<?php echo $product['images']['white']; ?>"></span>
            </div>
            <p class="color-name">Yellow Gold</p>

            <div class="rating" data-rating="<?php echo $product['popularityScore'] * 5; ?>">
                <div class="stars-outer">
                    <div class="stars-inner"></div>
                </div>
                <span><?php echo round($product['popularityScore'] * 5, 1); ?>/5</span>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<script>

    document.querySelectorAll('.rating').forEach(rating => {
        const value = parseFloat(rating.getAttribute('data-rating'));
        const percent = (value / 5) * 100;
        rating.querySelector('.stars-inner').style.width = percent + '%';
    });


    document.querySelectorAll('.product-card').forEach(card => {
        const mainImg = card.querySelector('.product-img');
        const colorSpans = card.querySelectorAll('.colors .color');
        colorSpans.forEach(span => {
            span.addEventListener('click', () => {
                mainImg.src = span.getAttribute('data-img');
            });
        });
    });
</script>
