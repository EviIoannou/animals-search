<?php
require 'connection.php';

//if database is open; an example query
$query = "select * from animals";
echo "Running the query: ". $query . "<br>"; 
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
            printf("<tr><td> %s</td> <td>%s </td> <td>%s </td> </tr>", 
            $row["name"], $row["category"], $row["birthday"]);
        }
    }
}
catch (PDOException $e){
    echo "There is an error: \n", $e->getMessage() ;
}