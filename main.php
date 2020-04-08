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

<?php
//Our select statement. This will retrieve the data that we want.
$sql = "SELECT name FROM animals";

//Prepare the select statement.
$stmt = $db->prepare($sql);

//Execute the statement.
$stmt->execute();

//Retrieve the rows using fetchAll.
$animals = $stmt->fetchAll();
?>

<!-- HTML form to search for an animal-->
<form action="query.php" method="post">
Search by name: <input type="text" name="name"><br> 
or <br>
Select an animal:
<select>
    <?php foreach($animals as $animal): ?>
        <option value="<?= $animal['id']; ?>"><?= $animal['name']; ?></option>
    <?php endforeach; ?>
</select> <br>

<input type="submit">
</form>

</body>
</html>
 
