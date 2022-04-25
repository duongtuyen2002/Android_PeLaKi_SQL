<?php 
     require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT * from loaithucan');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['idloaithucan'] ;
            $tenloaithucan= $row['tenloaithucan'] ;
            $hinhanhloaithucan = $row['hinhanhloaithucan'] ;
            array_push($mang, new ThucAn($id, $tenloaithucan, $hinhanhloaithucan));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class ThucAn{
        var $id;
        var $tenloaisp;
        var $hinhanhloaisp;
        function ThucAn($i, $t, $h){
            $this->id = $i;
            $this->tenloaisp = $t;
            $this->hinhanhloaisp = $h;
        }
    }
?>