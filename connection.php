<?php
//try to connect to database
try {
    $db = new PDO ("mysql:host=localhost; dbname=zoo", "Evi", "evi3101");
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Successful connection! <br>";
}
//show error message if not able to connect
catch (PDOException $e){
    echo "There is an error: \n", $e->getMessage() ;
    exit;
} 