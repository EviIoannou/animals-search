<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Hind">
<body>

<h1>Search for animals</h1>
<!-- require that connection to database works -->
<?php require "connection.php"; ?> 

<section id="form">
    <div id="image">
    <!-- HTML form to upload images -->
    <h2>Upload a cute animal photo</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        Select image to upload:<br>
        <input type="file" name="fileToUpload" id="fileToUpload"> <br>
        <input type="submit" value="Upload Image" name="submit" class="submit">
    </form>
    </div>
    
    <div id="allData">
    <!-- Show all data for table 'animals'-->
    <h2>All data about animals</h2>
    <form action="queryAll.php" method="post">
    See all available data about animals <br>
    <input type="submit" value="Show all data" class="submit">
    </form>
    </div>
    
    <div id="myQuery">
    <!-- HTML form to search for an animal-->
    <h2>Search data about an animal</h2>
    <form action="query.php" method="post">
    <?php include 'select.php'; ?>
    Select an animal:
    <select name='animalName'>
        <option value = '0' >Select</option>
        <?php foreach($animals as $animal){
        echo  "<option value= ". $animal['name']. " >". $animal['name']. "</option>";
        }
        ?>
    </select> <br>
    or <br>
    Search by name: <input type="text" name="name"><br> 
    <input type="submit" value="Search" class="submit">
    </div>

    </form>
</section>


</body>
</html>
 
