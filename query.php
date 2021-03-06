<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Hind">
<body>

<h1>Animals database</h1>

<?php

function getResults($query){
    require 'connection.php';
    echo '<p id="query"> Running the query: '. $query . '</p>'; 
    $sth = $db -> query($query);
    $animalcount = $sth->rowCount();
    if ($animalcount==0){ //check if there is data
        echo "Sorry, there is no data about this animal.";
    }
    else {
        echo '<table>' ;
        echo '<tr>  <td>Name</td> <td>Category</td> <td>Birthday</td> </tr>';
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            printf("<tr><td> %s</td> <td>%s </td> <td>%s </td> </tr>", 
            $row["name"], $row["category"], $row["birthday"]);
        }
    }
    
}

$animalOption = $_POST['animalName'];
$animalText = $_POST['name'];
if (isset($animalOption)){
    if (preg_match('/[0-9]/', $animalText )){
        echo "<p class='error'> Animal name cannot include numbers. </p>";
        }
    else if ($animalOption!= 'none' && empty($animalText)) {
        $query = "select * from animals where name like '%". $animalOption. "%'";
        getResults($query);
        }
    else if ($animalOption=== 'none' && !empty($animalText)) {
        $query = "select * from animals where name like '%". $animalText. "%'";
        getResults($query);
        }
    else {
        echo "<p class='error'> Please select an animal from the list OR search for an animal name.</p>";
    }
}

?>

<a href="index.php"><input type="button" value="Back" class="back"></a> 
</body>
</html>


   





