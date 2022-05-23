<?php
try{
    require "dbConnect.php";
    $tensp = $_POST['tensp'];
    $gia = $_POST['giasp'];
    $hinhanh = $_POST['hinhanhsp'];
    $soluong = $_POST['soluong'];
 
    $stmt = $conn->prepare("INSERT INTO giohang values ('$tensp', ' $gia', ' $hinhanh', ' $soluong')");
    // $stmt->bindParam(':tensp', $tensp);
    // $stmt->bindParam(':giasp', $gia);
    // $stmt->bindParam(':hinhanhsp', $hinhanh);
    // $stmt->bindParam(':soluong', $soluong);
    $stmt->execute();
    echo "insert data successful";
}catch(PDOException $pe) {
    die("Could not insert data to the database $dbname :" . $pe->getMessage());
}
?>