<?php 
    require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT * from thongbao');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['id'] ;
            $tentb= $row['thongbao'] ;
            $noidungtb =$row['noidung'];
            $hinhanhtb = $row['hinhanhtb'] ;
            array_push($mang, new thongbao($id, $tentb, $noidungtb, $hinhanhtb));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class thongbao{
        var $id;
        var $tentb;
        var $noidungtb;
        var $hinhanhtb;
        function thongbao($i, $t, $n, $h){
            $this->id = $i;
            $this->tentb = $t;
            $this->noidungtb= $n;
            $this->hinhanhtb = $h;
        }
    }
?>