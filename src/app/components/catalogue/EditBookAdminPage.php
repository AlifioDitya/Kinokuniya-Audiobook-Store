<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Form has been submitted!";
    $bookcover_dir = "storage/book-img/";
    $audio_dir = "storage/book-audio/";

    // Handle Book Cover Upload
    if (isset($_FILES["bookCover"])) {
        $target_file = $bookcover_dir . basename($_FILES["bookCover"]["name"]);
        if (move_uploaded_file($_FILES["bookCover"]["tmp_name"], $target_file)) {
            echo "Book cover uploaded successfully.";
        } else {
            echo "Error uploading book cover.";
        }
    }

    // Handle Audio Book Upload
    if (isset($_FILES["audioBook"])) {
        $target_file = $audio_dir . basename($_FILES["audioBook"]["name"]);
        if (move_uploaded_file($_FILES["audioBook"]["tmp_name"], $target_file)) {
            echo "Audio book uploaded successfully.";
        } else {
            echo "Error uploading audio book.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "https://ugc.production.linktr.ee/HgDUQezLRzaAhdOsHX7E_757110a46f23cdba31b42e43f2c1a7fb.png" 
    type = "image/x-icon">
    <title>Edit Book</title>
    
    <!-- Globals and Templates CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/globals.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/topnav.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Page-specific CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/catalogue/editbookadmin.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- JavaScript DOM and AJAX -->
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/component/sidebar.js" defer></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/catalogue/editbookadmin.js" defer></script>
</head>
<body>
<div id="root">
        <div id="is-admin" hidden><?= $this->data['isAdmin'] ?></div>
        <?php include(dirname(__DIR__) . '/template/sidebar.php') ?>
        <main class="main-container">
            <?php include(dirname(__DIR__) . '/template/topnav.php') ?>
             <div class="input-container">
                <div class="input-group">
                    <label for="Book Title">Book Title</label><br>
                    <input class="search-input input placeholder"type="search" id="Book Title" placeholder="Input Book Title . . .">
                </div>
                <div class="input-group">
                    <label for="Author">Author</label><br>
                    <input class="search-input input placeholder"type="search" id="Author" placeholder="Input Book Author . . .">
                </div>
            </div>
            <div class="input-container">
                <div class="input-group">
                    <label for="Category">Category</label><br>
                    <input class="search-input input placeholder"type="search" id="Category" placeholder="Input Book category . . .">
                </div>
                <div class="input-group">
                    <label for="Price">Price</label><br>
                    <input class="search-input input placeholder"type="search" id="Price" placeholder="Input Book Price . . .">
                </div>
            </div>
            <div class="input-container">
                <div class="input-group">
                    <label for="Publication">Publication Date</label><br>
                    <input class="search-input input placeholder"type="date" id="Publication">
                </div>
                <div class="input-group">
                    <label for="summary">Book Summary</label><br>
                    <textarea class="search-input summary-textarea" rows="5" type="file" id="Summary"></textarea>
                </div>
            </div>
            <form action="editbookadminpage.php" method="POST" enctype="multipart/form-data">
            <div class="input-container">
                    <div class="input-group">
                        <label for="textbook">Upload Book Cover</label><br>
                        <input class="search-input input placeholder"type="file" id="Cover" name="bookCover">
                    </div>
                    <div class="input-group">
                        <label for="Audio">Upload Audio Book</label><br>
                        <input class="search-input input placeholder"type="file" id="Audio" name="audioBook">
                    </div>
                    
                </div>
                <div class="input-group">
                        <button class="save" id="Save-btn">Save</button>
                    </div> 
                </form>
        </main>

    </div>   


</body>
</html>