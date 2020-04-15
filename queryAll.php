<!DOCTYPE html>
<html>
<link rel="stylesheet" href="style.css">
<link rel="stylesheet"
  href="https://fonts.googleapis.com/css?family=Hind">
<body>
<h1>Animals database</h1>
</body>
</html>

<?php
require 'connection.php';

//if database is open; an example query
$query = "select * from animals";
echo '<p id="query"> Running the query: '. $query . '</p>'; 
try {
    $sth = $db -> query($query);
    $animalcount = $sth->rowCount();
    if ($animalcount==0){ //check if there is data
        echo "Sorry, there is no data about these animals.";
    exit;
    }
    else {
        echo '<table>' ;
        echo '<tr> <td>Name</td> <td>Category</td> <td>Birthday</td> </tr>';
        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            printf("<tr><td> %s</td> <td>%s </td> <td>%s </td> </tr>", 
            $row["name"], $row["category"], $row["birthday"]);
        }
    }
}
catch (PDOException $e){
    echo "There is an error: \n", $e->getMessage() ;
}
