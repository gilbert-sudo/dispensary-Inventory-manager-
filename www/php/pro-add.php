<?php
if (isset($_POST["import_btn"])){
// Set local PHP vars from the POST vars sent from our form using the array
// of data that the $_FILES global variable contains for this uploaded file
$fileName = $_FILES["file1"]["name"]; // The file name
$fileTmpLoc = $_FILES["file1"]["tmp_name"]; // File in the PHP tmp folder
$fileType = $_FILES["file1"]["type"]; // The type of file it is
$fileSize = $_FILES["file1"]["size"]; // File size in bytes
$fileErrorMsg = $_FILES["file1"]["error"]; // 0 for false... and 1 for true

// Specific Error Handling if you need to run error checking
if (!$fileTmpLoc) { // if file not chosen
    echo "ERROR: Please browse for a file before clicking the upload button.";
    exit();
} else if($fileSize > 90000000) { // if file is larger than we want to allow
    $errMess = 'ERREUR : La taille de votre fichier était supérieure à 90 Mo!';
    header("location: ../main.php?pg=pro-add&err=1&errMess=$errMess&typeMess=danger");
    unlink($fileTmpLoc);
    exit();
} else if (!preg_match("/.(db)$/i", $fileName) ) {
     // This condition is only if you wish to allow uploading of specific file types    
     $errMess = 'ERREUR : Votre fichier n\'est pas au bon format, il doit être au format ".db"!';
     header("location: ../main.php?pg=pro-add&err=1&errMess=$errMess&typeMess=danger");
     unlink($fileTmpLoc);
     exit();
}

// Place it into your "uploads" folder mow using the move_uploaded_file() function
$new_name = "programmed-add.db";
$fileName = $new_name;

if (file_exists("../$fileName")) {
    unlink("../programmed-add.db");
}

move_uploaded_file($fileTmpLoc, "../$fileName");

// Check to make sure the uploaded file is in place where you want it
if (!file_exists("../$fileName")) {
    $errMess = 'ERREUR : ERREUR non-identifié durant l\'importation!';
    header("location: ../main.php?pg=pro-add&err=1&errMess=$errMess&typeMess=danger");
    exit();
}
$old_name = "Produits.db";
$fileName = $old_name;

// Display things to the page so you can see what is happening for testing purposes
$errMess = "Le fichier nommé $fileName a été importer avec succès!";
header("location: ../main.php?pg=pro-add&err=1&errMess=$errMess&typeMess=success");

}