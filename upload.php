<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Hind">
<body>
<h1>Animals database</h1>
</body>
</html>

<?php //code for uploading files by W3schools.com
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ". <br>";
        $uploadOk = 1;
    } else {
        echo "<p class='error'> File is not an image. </p>";
        $uploadOk = 0;
        exit;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "<p class='error'> File already exists. </p>";
    $uploadOk = 0;
    exit;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "<p class='error'> Your file is too large. </p>";
    $uploadOk = 0;
    exit;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "<p class='error'> Only JPG, JPEG, PNG & GIF files are allowed. </p>";
    $uploadOk = 0;
    exit;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "<p class='error'> Sorry, your file was not uploaded. </p>";
    exit;
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded. <br>";
    } 
}