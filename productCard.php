<h1>Product List</h1>
<div class="product-list">
    <div class="product-card">
        <img src="Images/ring.png" alt="Product Image">
        <h2>Product Title</h2>
        <p class="price">$101.00 USD</p>

        <div class="colors">
            <span class="color gold"></span>
            <span class="color silver"></span>
            <span class="color pink"></span>
        </div>
        <p class="color-name">Yellow Gold</p>

        <div class="rating" data-rating="4.5">
        <div class="stars-outer">
            <div class="stars-inner"></div>
        </div>
            <span>4.5/5</span>
        </div>
    </div>

    <div class="product-card">
        <img src="Images/ring.png" alt="Product Image">
        <h2>Product Title</h2>
        <p class="price">$101.00 USD</p>

        <div class="colors">
            <span class="color gold"></span>
            <span class="color silver"></span>
            <span class="color pink"></span>
        </div>
        <p class="color-name">Yellow Gold</p>

        <div class="rating" data-rating="2.5">
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
            <span>2.5/5</span>
        </div>
    </div>

    <div class="product-card">
        <img src="Images/ring.png" alt="Product Image">
        <h2>Product Title</h2>
        <p class="price">$101.00 USD</p>

        <div class="colors">
            <span class="color gold"></span>
            <span class="color silver"></span>
            <span class="color pink"></span>
        </div>
        <p class="color-name">Yellow Gold</p>

        <div class="rating" data-rating="4">
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
            <span>4.0/5</span>
        </div>
    </div>

    <div class="product-card">
        <img src="Images/ring.png" alt="Product Image">
        <h2>Product Title</h2>
        <p class="price">$101.00 USD</p>

        <div class="colors">
            <span class="color gold"></span>
            <span class="color silver"></span>
            <span class="color pink"></span>
        </div>
        <p class="color-name">Yellow Gold</p>

        <div class="rating" data-rating="4.5">
            <div class="stars-outer">
                <div class="stars-inner"></div>
            </div>
            <span>4.5/5</span>
        </div>
    </div>
</div>


<script>
    document.querySelectorAll('.rating').forEach(rating => {
        const value = parseFloat(rating.getAttribute('data-rating'));
        const percent = (value / 5) * 100;
        rating.querySelector('.stars-inner').style.width = percent + '%';
    });
</script>
