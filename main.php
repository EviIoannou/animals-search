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

<!-- Show all data for table 'animals'-->
<form action="queryAll.php" method="post">
<input type="submit" value="Show all data">
</form>

<!-- HTML form to search for an animal-->
<form action="query.php" method="post">
<?php include 'select.php'; ?>
or <br>
Search by name: <input type="text" name="name"><br> 
<input type="submit" value="Search">
</form>

</body>
</html>
 
