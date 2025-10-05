<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php
$jsonData = file_get_contents('products.json');
$products = json_decode($jsonData, true);

$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL => 'https://api.metalpriceapi.com/v1/latest?api_key=fb2795d3f4600fa22697f1d0d6b61fa5&base=USD&currencies=XAU',
    CURLOPT_RETURNTRANSFER => true,
));
$response = curl_exec($curl);
curl_close($curl);

$data = json_decode($response, true);

$goldPrice= 50;

if (isset($data['rates']['USDXAU'])) {
    $goldPerOunce = $data['rates']['USDXAU'];
    $goldPrice = $goldPerOunce / 31.1035;
}

echo "Gold price per gram (USD): " . round($goldPrice, 2);
?>


<h1>Product List</h1>

<div id="productCarousel" class="carousel slide" data-bs-ride="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="product-list">
                <?php
                $i = 0;
                foreach($products as $product):
                    $price = ($product['popularityScore'] + 1) * $product['weight'] * $goldPrice;
                    ?>
                    <div class="product-card">
                        <img src="<?php echo $product['images']['yellow']; ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="product-img">
                        <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                        <p class="price">$<?php echo number_format($price, 2); ?> USD</p>

                        <div class="colors">
                            <span class="color yellow" data-img="<?php echo $product['images']['yellow']; ?>"></span>
                            <span class="color white" data-img="<?php echo $product['images']['white']; ?>"></span>
                            <span class="color rose" data-img="<?php echo $product['images']['rose']; ?>"></span>
                        </div>
                        <p class="color-name">Yellow Gold</p>

                        <div class="rating" data-rating="<?php echo $product['popularityScore'] * 5; ?>">
                            <div class="stars-outer">
                                <div class="stars-inner"></div>
                            </div>
                            <span><?php echo round($product['popularityScore'] * 5, 1); ?>/5</span>
                        </div>
                    </div>
                    <?php
                    $i++;
                    if($i % 4 == 0 && $i < count($products)){
                        echo '</div></div><div class="carousel-item"><div class="product-list">';
                    }
                endforeach;
                ?>
            </div>
        </div>
    </div>

    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon custom-arrow"></span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon custom-arrow"></span>
    </button>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

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
            if(span.classList.contains('yellow')){
                span.classList.add('selected');
                mainImg.src = span.getAttribute('data-img');
            }
        });

        colorSpans.forEach(span => {
            span.addEventListener('click', () => {

                colorSpans.forEach(s => s.classList.remove('selected'));

                span.classList.add('selected');

                mainImg.src = span.getAttribute('data-img');
            });
        });
    });
</script>
</html>