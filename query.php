<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Hind">
<body>
<h1>Search for animals</h1>
</body>
</html>

<?php

function getResults($query){
    require 'connection.php';
    echo "Running the query: ". $query . "<br>"; 
    $sth = $db -> query($query);
    $animalcount = $sth->rowCount();
    if ($animalcount==0){ //check if there is data
        echo "Sorry, there is no data about this animal.";
    exit;
    }
    else {
        echo '<table bgcolor"#bdc0ff" cellpadding="6"' ;
        echo '<tr> <b> <td>Name</td> <td>Category</td> <td>Birthday</td> </b> </tr>';
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            printf("<tr><td> %s</td> <td>%s </td> <td>%s </td> </tr>", 
            $row["name"], $row["category"], $row["birthday"]);
        }
    }
}

$animalOption = $_POST['animalName'];
$animalText = $_POST['name'];
if (isset($animalOption)){
     if ($animalOption!= '0' && empty($animalText)) {
        $query = "select * from animals where name like '%". $animalOption. "%'";
        getResults($query);   
        }

    else if ($animalOption=== '0' && !empty($animalText)) {
        $query = "select * from animals where name like '%". $animalText. "%'";
        getResults($query);
        }

}
   





