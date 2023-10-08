<?php
$targetDirBookImg = "http://localhost:8080/storage/book-img/";
$targetDirAudio = "http://localhost:8080/storage/audio/";

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Handle book cover upload
    if (!empty($_FILES["bookCover"]["name"])) {
        $bookCoverFilename = basename($_FILES["bookCover"]["name"]);
        $targetFilePathBookImg = $targetDirBookImg . $bookCoverFilename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES["bookCover"]["tmp_name"], $targetFilePathBookImg)) {
            echo "Book cover uploaded successfully.";
        } else {
            echo "Error uploading book cover.";
        }
    }

    // Handle audio book upload
    if (!empty($_FILES["audioBook"]["name"])) {
        $audioBookFilename = basename($_FILES["audioBook"]["name"]);
        $targetFilePathAudio = $targetDirAudio . $audioBookFilename;

        // Move the uploaded file to the destination directory
        if (move_uploaded_file($_FILES["audioBook"]["tmp_name"], $targetFilePathAudio)) {
            echo "Audio book uploaded successfully.";
        } else {
            echo "Error uploading audio book.";
        }
    }
}
?>
