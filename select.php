<?php
//This statement will retrieve the data that we want.
$sql = "SELECT * FROM animals";

//Prepare the select statement.
$stmt = $db->prepare($sql);

//Execute the statement.
$stmt->execute();

//Retrieve the rows using fetchAll.
$animals = $stmt->fetchAll();
?>



