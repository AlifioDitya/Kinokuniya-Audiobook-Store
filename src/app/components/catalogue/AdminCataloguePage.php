<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "https://ugc.production.linktr.ee/HgDUQezLRzaAhdOsHX7E_757110a46f23cdba31b42e43f2c1a7fb.png" 
    type = "image/x-icon">
    <title>Catalogue</title>
    
    <!-- Globals and Templates CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/globals.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/topnav.css">

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
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/component/search.js" defer></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/catalogue/admincatalogue.js" defer></script>
</head>
<body>
    <div id="root">
        <?php include(dirname(__DIR__) . '/template/sidebar.php') ?>
        <main class="main-container">
            <?php include(dirname(__DIR__) . '/template/topnav.php') ?>
            <div class="secondary-container">
                <div class="search-panel">
                    <form role="search" id="input-form">
                        <input type="search" id="query" class="search-input" name="q" placeholder="Search books or authors..." aria-label="Search through site content">
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="select-btn-text">All Categories</span>
                            <i class="bx bx-chevron-down"></i>
                        </div>
                        
                        <ul class="options">
                            <li class="option">
                                <span class="option-text">Fiction</span>
                            </li>
                            <li class="option">
                                <span class="option-text">Non-fiction</span>
                            </li>
                        </ul>
                    </div>
                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="select-btn-text">All Price Range</span>
                            <i class="bx bx-chevron-down"></i>
                        </div>
                        <ul class="options">
                            <li class="option">
                                <span class="option-text">< Rp500k</span>
                            </li>
                            <li class="option">
                                <span class="option-text">Rp500k-1000k</span>
                            </li>
                            <li class="option">
                                <span class="option-text">> Rp1M</span>
                            </li>
                        </ul>
                    </div>
                    <div class="select-menu">
                        <div class="select-btn">
                            <span class="select-btn-text">Sort By</span>
                            <i class="bx bx-sort-alt-2"></i>
                        </div>
                        <ul class="options">
                            <li class="option">
                                <span class="option-text">Price: Low to High</span>
                            </li>
                            <li class="option">
                                <span class="option-text">Price: High to Low</span>
                            </li>
                            <li class="option">
                                <span class="option-text">Newest First</span>
                            </li>
                            <li class="option">
                                <span class="option-text">Oldest First</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <section class="books-section">
                    <div class="card-grid-pagination">
                        <?php foreach ($this->data['books'] as $book) : ?>
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="<?= $book->cover_img_url ?>" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title"><?= $book->title ?></h4>
                                    <p class="book-card-author">by <?= $book->author ?></p>
                                    <p class="book-card-price">Rp <?= number_format($book->price, 0, ',', '.') ?></p>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </section>
            </div>
        </main>
    </div>
</body>
<html>