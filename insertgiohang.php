<?php
try{
    require "dbConnect.php";
    $id = null;
    $tensp = $_POST['TenSP'];
    $gia =$_POST['Gia'];
	$img = $_POST['hinhanh'];
    $soluong = $_POST['soluong'];
 
    $stmt = $conn->prepare('INSERT INTO giohang values (:Id, :TenSP, :Gia, :hinhanh, :soluong)');
    $stmt->bindParam(':Id', $tensp);
    $stmt->bindParam(':TenSP', $tennv);
    $stmt->bindParam(':Gia', $gia);
	$stmt->bindParam(':hinhanh', $img);
    $stmt->bindParam(':soluong', $soluong);
    $stmt->execute();
    echo "insert data successful";
}catch(PDOException $pe) {
    die("Could not insert data to the database $dbname :" . $pe->getMessage());
}
?>