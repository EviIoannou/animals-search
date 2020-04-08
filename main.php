
<?php
//try to connect to database
try {
    $db = new PDO ("mysql:host=localhost; dbname=zoo", "Evi", "evi3101");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successful connection! <br>";
}
//show error message if not able to connect
catch (PDOException $e){
    echo "We had a problem: \n", $e->getMessage() ;
    exit;
} 
?>

<!-- form to upload images -->
<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>


<?php
//database open; an example query
$query = "select * from animals";
echo "Debug: running the query: ". $query . "<br>"; 
try {
    $sth = $db -> query($query);
    $animalcount = $sth->rowCount();
    if ($animalcount==0){ //check if there is data
        echo "Sorry, there is no data about these animals.";
    exit;
    }
    else {
        echo '<table bgcolor"#bdc0ff" cellpadding="6"' ;
        echo '<tr> <b> <td>Name</td> <td>Category</td> <td>Birthday</td> </b> </tr>';
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            printf("<tr><td> %s</td> <td>%s </td> <td>%s </td> </tr>", $row["name"], $row["category"], $row["birthday"]);
        }
    }
}
catch (PDOException $e){
    echo "We had a problem: \n", $e->getMessage() ;
}
 
