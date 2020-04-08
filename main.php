<!DOCTYPE html>
<html>
<body>

<h1>Search for animals</h1>
<!-- require that connection to database works -->
<?php require "connection.php"; ?> 

<!-- HTML form to upload images -->
<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<!-- HTML form to search for an animal-->
<form action="query.php" method="post">
Select an animal: <input type="text" name="name"><br> 
or <br>
Search by name: <select name="name"><br>
<input type="submit">
</form>

</body>
</html>


<?php include "query.php" ?>
 
