<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogue</title>
    
    <!-- Globals and Templates CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/globals.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/topnav.css">

    <!-- Page-specific CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/cart/cart.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- JavaScript DOM and AJAX -->
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/component/sidebar.js" defer></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/cart/cart.js" defer></script>
</head>
<body>
    <div id="root">
        <?php include(dirname(__DIR__) . '/template/sidebar.php') ?>
        <main class="main-container">
            <?php include(dirname(__DIR__) . '/template/topnav.php') ?>
            <div class="secondary-container">
                <section class="cart-section">
                    <div class="payment-container">
                        <div class="card-grid-pagination">
                            <div class="book-card-brief">
                                <a>
                                    <i class="bx bx-x"></i>
                                </a>
                                <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/klara.svg" alt="Book Image">
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Klara and the Sun</h4>
                                    <p class="book-card-author">by Kazuo Ishiguro</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <i class="bx bx-x"></i>
                                </a>
                                <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/cantik-itu-luka.svg" alt="Book Image">
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Cantik itu Luka</h4>
                                    <p class="book-card-author">by Eka Kurniawan</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <i class="bx bx-x"></i>
                                </a>
                                <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/laut-bercerita.svg" alt="Book Image">
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Laut Bercerita</h4>
                                    <p class="book-card-author">by Leila S. Chudori</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <i class="bx bx-x"></i>
                                </a>
                                <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/nebula.svg" alt="Book Image">
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Nebula</h4>
                                    <p class="book-card-author">by Tere Liye</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <i class="bx bx-x"></i>
                                </a>
                                <img class="book-img-brief" src="<?= STORAGE_URL ?>/book-img/rich-people-problem.svg" alt="Book Image">
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Rich People Problem</h4>
                                    <p class="book-card-author">by Kevin Kwan</p>
                                </div>
                            </div>
                        </div>
                        <div class="payment-checkout">
                            <div class="payment-checkout-header">
                                <h3 class="payment-checkout-title">Billing Summary</h3>
                            </div>
                            <div class="payment-checkout-body">
                                <div class="payment-checkout-item">
                                    <p class="payment-checkout-item-title">Subtotal</p>
                                    <p class="payment-checkout-item-price">Rp750.000</p>
                                </div>
                                <div class="payment-checkout-item">
                                    <p class="payment-checkout-item-title">Tax (10% subtotal)</p>
                                    <p class="payment-checkout-item-price">Rp40.000</p>
                                </div>
                            <div class="payment-checkout-footer">
                                <div class="payment-checkout-footer-line"></div>
                                <div class="payment-checkout-item">
                                    <p class="payment-checkout-footer-total">Grand Total</p>
                                    <p class="payment-checkout-footer-total">Rp790.000</p>
                                </div>
                                <button class="payment-checkout-footer-btn">Checkout</button>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
<html>