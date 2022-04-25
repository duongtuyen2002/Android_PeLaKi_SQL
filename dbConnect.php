<?php 
    $host = 'mysql5025.site4now.net'; 
    $dbname = 'db_a852e7_pelaki'; 
    $username = 'a852e7_pelaki'; 
    $password = 'kubjn2002'; 
     try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }
?>