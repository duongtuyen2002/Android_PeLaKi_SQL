<?php 
     require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT * from thucan');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['idthucan'];
            $tenthucan= $row['ten'];
            $giathucan = $row['giathucan'];
            $hinhanhthucan = $row['hinhanhthucan'];
            $idloaithucan = $row['idloaithucan'];
            array_push($mang, new ThucAn($id, $tenthucan, $giathucan, $hinhanhthucan, $idloaithucan));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class ThucAn{
        var $id;
        var $ten;
        var $gia;
        var $hinhanh;
        var $idloai;
        function ThucAn($i, $t, $g, $h, $idl){
            $this->id = $i;
            $this->ten = $t;
            $this->hinhanh = $h;
            $this->gia = $g;
            $this->idloai = $idl;
        }
    }
?>