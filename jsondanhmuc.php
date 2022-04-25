<?php 
    require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT * from loaisp');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['idloaisp'] ;
            $tenloaisp= $row['tenloaisp'] ;
            $hinhanhloaisp = $row['hinhanhloaisp'] ;
            array_push($mang, new NhanVien($id, $tenloaisp, $hinhanhloaisp));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class NhanVien{
        var $id;
        var $tensp;
        var $hinhanhsp;
        function NhanVien($i, $t, $h){
            $this->id = $i;
            $this->tensp = $t;
            $this->hinhanhsp = $h;
        }
    }
?>