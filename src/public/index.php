<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kinukoniya</title>
    <link rel="stylesheet" href="styles/app.css">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;700&family=Roboto+Slab:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Karla:wght@300;400;700&display=swap" rel="stylesheet">
</head>
<body>
    <div id="app">
        <aside class="sidenav">
            <nav class="sidenav-content", id="sidenav-content">
                <div class="logo">
                    <h1 class="kinukoniya">Kinukoniya</h1>
                    <p class="bookstore">Book Store</p>
                </div>
                <ul class="sidenav-opt", id="sidenav-opt">
                    <a href="google.com">
                        <li class="nav-btn", id="nav-dashboard">
                            <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
    <path d="M7.66667 18.2083H14.6667C15.3083 18.2083 15.8333 17.6646 15.8333 17V7.33333C15.8333 6.66875 15.3083 6.125 14.6667 6.125H7.66667C7.025 6.125 6.5 6.66875 6.5 7.33333V17C6.5 17.6646 7.025 18.2083 7.66667 18.2083ZM7.66667 27.875H14.6667C15.3083 27.875 15.8333 27.3312 15.8333 26.6667V21.8333C15.8333 21.1687 15.3083 20.625 14.6667 20.625H7.66667C7.025 20.625 6.5 21.1687 6.5 21.8333V26.6667C6.5 27.3312 7.025 27.875 7.66667 27.875ZM19.3333 27.875H26.3333C26.975 27.875 27.5 27.3312 27.5 26.6667V17C27.5 16.3354 26.975 15.7917 26.3333 15.7917H19.3333C18.6917 15.7917 18.1667 16.3354 18.1667 17V26.6667C18.1667 27.3312 18.6917 27.875 19.3333 27.875ZM18.1667 7.33333V12.1667C18.1667 12.8312 18.6917 13.375 19.3333 13.375H26.3333C26.975 13.375 27.5 12.8312 27.5 12.1667V7.33333C27.5 6.66875 26.975 6.125 26.3333 6.125H19.3333C18.6917 6.125 18.1667 6.66875 18.1667 7.33333Z" fill="white"/>
                            </svg>
                            <p>Dashboard</p>
                        </li>
                    </a>
                    <a href="/catalogue">
                        <li class="nav-btn", id="nav-catalogue">
                            <svg width="24" height="24" viewBox="0 0 34 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <g clip-path="url(#clip0_16_16207)">
                                <path d="M22.8334 27.1667H8.83337C8.19171 27.1667 7.66671 26.6229 7.66671 25.9583V11.4583C7.66671 10.7938 7.14171 10.25 6.50004 10.25C5.85837 10.25 5.33337 10.7938 5.33337 11.4583V27.1667C5.33337 28.4958 6.38337 29.5833 7.66671 29.5833H22.8334C23.475 29.5833 24 29.0396 24 28.375C24 27.7104 23.475 27.1667 22.8334 27.1667ZM26.3334 5.41667H12.3334C11.05 5.41667 10 6.50417 10 7.83333V22.3333C10 23.6625 11.05 24.75 12.3334 24.75H26.3334C27.6167 24.75 28.6667 23.6625 28.6667 22.3333V7.83333C28.6667 6.50417 27.6167 5.41667 26.3334 5.41667ZM26.3334 17.5L23.4167 15.6875L20.5 17.5V7.83333H26.3334V17.5Z" fill="#F2F3F5"/>
                                </g>
                                <defs>
                                <clipPath id="clip0_16_16207">
                                <rect width="28" height="29" fill="white" transform="translate(3 3)"/>
                                </clipPath>
                                </defs>
                            </svg>
                            <p>Catalogue</p>
                        </li>
                    </a>
                    <a href="/books">
                        <li class="nav-btn", id="nav-books">
                            <svg width="24" height="24" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4.25004 8.5C3.47087 8.5 2.83337 9.1375 2.83337 9.91667V28.3333C2.83337 29.8917 4.10837 31.1667 5.66671 31.1667H24.0834C24.8625 31.1667 25.5 30.5292 25.5 29.75C25.5 28.9708 24.8625 28.3333 24.0834 28.3333H7.08337C6.30421 28.3333 5.66671 27.6958 5.66671 26.9167V9.91667C5.66671 9.1375 5.02921 8.5 4.25004 8.5ZM28.3334 2.83333H11.3334C9.77504 2.83333 8.50004 4.10833 8.50004 5.66667V22.6667C8.50004 24.225 9.77504 25.5 11.3334 25.5H28.3334C29.8917 25.5 31.1667 24.225 31.1667 22.6667V5.66667C31.1667 4.10833 29.8917 2.83333 28.3334 2.83333ZM25.5 15.5833H14.1667C13.3875 15.5833 12.75 14.9458 12.75 14.1667C12.75 13.3875 13.3875 12.75 14.1667 12.75H25.5C26.2792 12.75 26.9167 13.3875 26.9167 14.1667C26.9167 14.9458 26.2792 15.5833 25.5 15.5833ZM19.8334 21.25H14.1667C13.3875 21.25 12.75 20.6125 12.75 19.8333C12.75 19.0542 13.3875 18.4167 14.1667 18.4167H19.8334C20.6125 18.4167 21.25 19.0542 21.25 19.8333C21.25 20.6125 20.6125 21.25 19.8334 21.25ZM25.5 9.91667H14.1667C13.3875 9.91667 12.75 9.27917 12.75 8.5C12.75 7.72083 13.3875 7.08333 14.1667 7.08333H25.5C26.2792 7.08333 26.9167 7.72083 26.9167 8.5C26.9167 9.27917 26.2792 9.91667 25.5 9.91667Z" fill="#F2F3F5"/>
                            </svg>
                            <p>My Books</p>
                        </li>
                    </a>
                </ul>
            </nav>
        </aside>
        <main class="main-container">
            <nav class="topnav", id="topnav">
                <div class="topnav-label", id="topnav-label">
                    <svg width="24" height="24" viewBox="0 0 40 40" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_10_13161)">
                    <path d="M9.01964 21.4216H17.2549C18.0098 21.4216 18.6275 20.7818 18.6275 20V8.62744C18.6275 7.84558 18.0098 7.20587 17.2549 7.20587H9.01964C8.26474 7.20587 7.64709 7.84558 7.64709 8.62744V20C7.64709 20.7818 8.26474 21.4216 9.01964 21.4216ZM9.01964 32.7941H17.2549C18.0098 32.7941 18.6275 32.1544 18.6275 31.3725V25.6863C18.6275 24.9044 18.0098 24.2647 17.2549 24.2647H9.01964C8.26474 24.2647 7.64709 24.9044 7.64709 25.6863V31.3725C7.64709 32.1544 8.26474 32.7941 9.01964 32.7941ZM22.7451 32.7941H30.9804C31.7353 32.7941 32.353 32.1544 32.353 31.3725V20C32.353 19.2181 31.7353 18.5784 30.9804 18.5784H22.7451C21.9902 18.5784 21.3726 19.2181 21.3726 20V31.3725C21.3726 32.1544 21.9902 32.7941 22.7451 32.7941ZM21.3726 8.62744V14.3137C21.3726 15.0956 21.9902 15.7353 22.7451 15.7353H30.9804C31.7353 15.7353 32.353 15.0956 32.353 14.3137V8.62744C32.353 7.84558 31.7353 7.20587 30.9804 7.20587H22.7451C21.9902 7.20587 21.3726 7.84558 21.3726 8.62744Z" fill="#F18912"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_10_13161">
                    <rect width="32.9412" height="34.1176" fill="white" transform="translate(3.52942 2.94116)"/>
                    </clipPath>
                    </defs>
                    </svg>

                    <h4>Dashboard</h4>
                </div>
                <div class="topnav-menu">
                    <a href="google.com">
                        <button class="topnav-btn">
                            <svg width="16" height="16" viewBox="0 0 30 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.39481 22.4C7.85481 22.4 6.60881 23.66 6.60881 25.2C6.60881 26.74 7.85481 28 9.39481 28C10.9348 28 12.1948 26.74 12.1948 25.2C12.1948 23.66 10.9348 22.4 9.39481 22.4ZM0.994812 1.4C0.994812 2.17 1.62481 2.8 2.39481 2.8H3.79481L8.83481 13.426L6.94481 16.842C5.92281 18.718 7.26681 21 9.39481 21H24.7948C25.5648 21 26.1948 20.37 26.1948 19.6C26.1948 18.83 25.5648 18.2 24.7948 18.2H9.39481L10.9348 15.4H21.3648C22.4148 15.4 23.3388 14.826 23.8148 13.958L28.8268 4.872C29.3448 3.948 28.6728 2.8 27.6088 2.8H6.88881L5.95081 0.798C5.72681 0.308 5.22281 0 4.69081 0H2.39481C1.62481 0 0.994812 0.63 0.994812 1.4ZM23.3948 22.4C21.8548 22.4 20.6088 23.66 20.6088 25.2C20.6088 26.74 21.8548 28 23.3948 28C24.9348 28 26.1948 26.74 26.1948 25.2C26.1948 23.66 24.9348 22.4 23.3948 22.4Z" fill="white"/>
                            </svg>
                        </button>
                    </a>
                    <a href="./Settings.php">
                        <button class="topnav-btn">
                            <svg width="16" height="16" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_11_14126)">
                            <path d="M27.5259 18.3883C27.5825 17.935 27.625 17.4817 27.625 17C27.625 16.5183 27.5825 16.065 27.5259 15.6117L30.515 13.2742C30.7842 13.0617 30.855 12.6792 30.685 12.3675L27.8517 7.46584C27.6817 7.15418 27.2992 7.04084 26.9875 7.15418L23.46 8.57084C22.7233 8.00418 21.93 7.53668 21.0658 7.18251L20.5275 3.42834C20.485 3.08834 20.1875 2.83334 19.8333 2.83334H14.1667C13.8125 2.83334 13.515 3.08834 13.4725 3.42834L12.9342 7.18251C12.07 7.53668 11.2767 8.01834 10.54 8.57084L7.01252 7.15418C6.68668 7.02668 6.31835 7.15418 6.14835 7.46584L3.31502 12.3675C3.13085 12.6792 3.21585 13.0617 3.48502 13.2742L6.47418 15.6117C6.41752 16.065 6.37502 16.5325 6.37502 17C6.37502 17.4675 6.41752 17.935 6.47418 18.3883L3.48502 20.7258C3.21585 20.9383 3.14502 21.3208 3.31502 21.6325L6.14835 26.5342C6.31835 26.8458 6.70085 26.9592 7.01252 26.8458L10.54 25.4292C11.2767 25.9958 12.07 26.4633 12.9342 26.8175L13.4725 30.5717C13.515 30.9117 13.8125 31.1667 14.1667 31.1667H19.8333C20.1875 31.1667 20.485 30.9117 20.5275 30.5717L21.0658 26.8175C21.93 26.4633 22.7233 25.9817 23.46 25.4292L26.9875 26.8458C27.3133 26.9733 27.6817 26.8458 27.8517 26.5342L30.685 21.6325C30.855 21.3208 30.7842 20.9383 30.515 20.7258L27.5259 18.3883ZM17 21.9583C14.2659 21.9583 12.0417 19.7342 12.0417 17C12.0417 14.2658 14.2659 12.0417 17 12.0417C19.7342 12.0417 21.9583 14.2658 21.9583 17C21.9583 19.7342 19.7342 21.9583 17 21.9583Z" fill="white"/>
                            </g>
                            <defs>
                            <clipPath id="clip0_11_14126">
                            <rect width="34" height="34" fill="white"/>
                            </clipPath>
                            </defs>
                            </svg>
                        </button>
                    </a>
                </div>
            </nav>
            <div class="secondary-container">
                <section class="hero-section">
                    <form role="search" id="input-form">
                        <input type="search" id="query" class="search-input" name="q" placeholder="Search books..." aria-label="Search through site content">
                        <button class="search-btn">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                    <div class="hero-banner">
                        <div class="hero-welcome">
                            <h1 class="hero-header"><span style="color: #F18912">Broaden your Horizon</span> with our Education Books</h1>
                            <p class="hero-desc">Embark on a journey of knowledge and discovery with our extensive collection of education books. Whether you're a student looking to excel in your studies, an educator seeking valuable resources, or a lifelong learner eager to expand your horizons, our carefully curated selection has something for everyone.</p>
                            <div class="hero-btn">
                                <button class="btn-standard">Explore More</button>
                            </div>
                        </div>
                        <img id="hero-image" src="images/hero.svg" alt="Hero Image">
                    </div>
                </section>
                <section class="dashboard-section">
                    <div>
                        <div class="card-header">
                            <h4 class="dashboard-header">Newest Releases</h4>
                            <a href="google.com">
                                <p class="see-all">See All</p>
                            </a>
                        </div>
                        <div class="card-grid">
                            <div class="book-card">
                                <div class="book-card-container">
                                    <img class="book-img" src="images/klara.svg" alt="Book Image">
                                    <div class="book-card-desc">
                                        <h4 class="book-card-title">Klara and the Sun</h4>
                                        <p class="book-card-author">by Kazuo Ishiguro</p>
                                        <p class="book-card-summary">Klara and The Sun tells the story of Klara, an Artificial Friend with outstanding observational qualities, who, from her place in the store, watches carefully...</p>
                                        <a href="google.com"><p class="read-more">Read More</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="book-card">
                                <div class="book-card-container">
                                    <img class="book-img" src="images/cantik-itu-luka.svg" alt="Book Image">
                                    <div class="book-card-desc">
                                        <h4 class="book-card-title">Cantik itu Luka</h4>
                                        <p class="book-card-author">by Eka Kurniawan</p>
                                        <p class="book-card-summary">Cantik itu Luka merupakan novel pertama karya penulis Indonesia, Eka Kurniawan. Pertama kali diterbitkan tahun 2002 atas kerjasama Akademi Kebudayaan...</p>
                                        <a href="google.com"><p class="read-more">Read More</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="book-card">
                                <div class="book-card-container">
                                    <img class="book-img" src="images/klara.svg" alt="Book Image">
                                    <div class="book-card-desc">
                                        <h4 class="book-card-title">Klara and the Sun</h4>
                                        <p class="book-card-author">by Kazuo Ishiguro</p>
                                        <p class="book-card-summary">Klara and The Sun tells the story of Klara, an Artificial Friend with outstanding observational qualities, who, from her place in the store, watches carefully...</p>
                                        <a href="google.com"><p class="read-more">Read More</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="book-card">
                                <div class="book-card-container">
                                    <img class="book-img" src="images/cantik-itu-luka.svg" alt="Book Image">
                                    <div class="book-card-desc">
                                        <h4 class="book-card-title">Cantik itu Luka</h4>
                                        <p class="book-card-author">by Eka Kurniawan</p>
                                        <p class="book-card-summary">Cantik itu Luka merupakan novel pertama karya penulis Indonesia, Eka Kurniawan. Pertama kali diterbitkan tahun 2002 atas kerjasama Akademi Kebudayaan...</p>
                                        <a href="google.com"><p class="read-more">Read More</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="book-card">
                                <div class="book-card-container">
                                    <img class="book-img" src="images/klara.svg" alt="Book Image">
                                    <div class="book-card-desc">
                                        <h4 class="book-card-title">Klara and the Sun</h4>
                                        <p class="book-card-author">by Kazuo Ishiguro</p>
                                        <p class="book-card-summary">Klara and The Sun tells the story of Klara, an Artificial Friend with outstanding observational qualities, who, from her place in the store, watches carefully...</p>
                                        <a href="google.com"><p class="read-more">Read More</p></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="card-header">
                            <h4 class="dashboard-header">Owned Books</h4>
                            <a href="google.com">
                                <p class="see-all">See All</p>
                            </a>
                        </div>
                        <div class="card-grid-pagination">
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="images/klara.svg" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Klara and the Sun</h4>
                                    <p class="book-card-author">by Kazuo Ishiguro</p>
                                    <p class="book-card-price">Rp 150.000</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="images/cantik-itu-luka.svg" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Cantik itu Luka</h4>
                                    <p class="book-card-author">by Eka Kurniawan</p>
                                    <p class="book-card-price">Rp 150.000</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="images/laut-bercerita.svg" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Laut Bercerita</h4>
                                    <p class="book-card-author">by Leila S. Chudori</p>
                                    <p class="book-card-price">Rp 150.000</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="images/nebula.svg" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Nebula</h4>
                                    <p class="book-card-author">by Tere Liye</p>
                                    <p class="book-card-price">Rp 150.000</p>
                                </div>
                            </div>
                            <div class="book-card-brief">
                                <a>
                                    <img class="book-img-brief" src="images/rich-people-problem.svg" alt="Book Image">
                                </a>
                                <div class="book-card-brief-desc">
                                    <h4 class="book-card-title">Rich People Problem</h4>
                                    <p class="book-card-author">by Kevin Kwan</p>
                                    <p class="book-card-price">Rp 150.000</p>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
        </main>
    </div>
</body>
</html>