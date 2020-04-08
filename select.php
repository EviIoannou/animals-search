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

<!-- HTML form to search for an animal-->

Select an animal:
<select>
    <option value=0>Select</option>
    <?php foreach($animals as $animal){
    echo  "<option value= ". $animal['id']. ">". $animal['name']. "</option>";
    }
    ?>
</select> <br>