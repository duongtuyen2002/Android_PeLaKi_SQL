<?php 
    require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT loaisp.idloaisp, sanpham.tensp, sanpham.giasp, sanpham.hinhanhsp from loaisp,sanpham where loaisp.idloaisp = sanpham.idloaisp and loaisp.idloaisp = 1');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['idloaisp'] ;
            $tensp= $row['tensp'] ;
            $giasp =$row['giasp'];
            $hinhanhsp = $row['hinhanhsp'] ;
            array_push($mang, new NhanVien($id, $tensp, $giasp, $hinhanhsp));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class NhanVien{
        var $id;
        var $tensp;
        var $giasp;
        var $hinhanhsp;
        function NhanVien($i, $t, $g, $h){
            $this->id = $i;
            $this->tensp = $t;
            $this->giasp= $g;
            $this->hinhanhsp = $h;
        }
    }
?>