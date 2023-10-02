<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    
    <!-- Globals and Templates CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/globals.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/sidebar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/template/topnav.css">

    <!-- Boxicons CDN Link -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Page-specific CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/editbookadmin/editbookadmin.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/styles/settings/settings.css">

    <!-- Icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <!-- JavaScript DOM and AJAX -->
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/component/sidebar.js" defer></script>
    <script type="text/javascript" src="<?= BASE_URL ?>/javascript/editbookadmin/editbookadmin.js" defer></script>
</head>
<body>
<div id="settings">
        <?php include(dirname(__DIR__) . '/template/sidebar.php') ?>
        <main class="main-container">
            <?php include(dirname(__DIR__) . '/template/topnav.php') ?>
            <div class="input-container">
                <div class="input-group">
                    <label for="Book Title">Book Title</label><br>
                    <input class="input placeholder"type="text" id="Book Title">
                </div>
                <div class="input-group">
                    <label for="Author">Author</label><br>
                    <input class="input placeholder"type="text" id="Author">
                </div>
            </div>
            <div class="input-container">
                <div class="input-group">
                    <label for="Category">Category</label><br>
                    <input class="input placeholder"type="text" id="Category">
                </div>
                <div class="input-group">
                    <label for="Price">Price</label><br>
                    <input class="input placeholder"type="text" id="Price">
                </div>
            </div>
            <div class="input-container">
                <div class="input-group">
                    <label for="Publication">Publication Date</label><br>
                    <input class="input placeholder"type="text" id="Publication">
                </div>
                <div class="input-group">
                    <label for="summary">Upload Book Summary</label><br>
                    <input class="input placeholder"type="text" id="summary">
                </div>
            </div>
            <div class="input-container">
                <div class="input-group">
                    <label for="textbook">Upload Text Book</label><br>
                    <input class="input placeholder"type="text" id="textbook">
                </div>
                <div class="input-group">
                    <label for="Audio">Upload Audio Book</label><br>
                    <input class="input placeholder"type="text" id="Audio">
                </div>
                
            </div>
            <div class="input-group">
                    <button class="save">Save</button>
                </div>
        </main>

    </div>   


</body>
</html>