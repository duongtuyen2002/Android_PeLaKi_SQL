<?php 
    require "dbConnect.php";
    try {
        $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $stmt = $conn ->prepare('SELECT * from dichvu limit 5');
        //Thiết lập kiểu dữ liệu trả về
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $mang = array();
         while($row = $stmt->fetch()) {
            $id = $row['iddichvu'] ;
            $tendichvu= $row['tendichvu'] ;
            $tenhang= $row['tenhang'] ;
            $gia= $row['giadichvu'] ;
            $hinhanhdichvu = $row['hinhanhdichvu'] ;
            array_push($mang, new DichVu($id, $tendichvu, $tenhang,$gia,$hinhanhdichvu));
        }   
        echo json_encode($mang);
    } catch (PDOException $pe) {
        die("Could not connect to the database $dbname :" . $pe->getMessage());
    }

    class DichVu{
        var $id;
        var $tendichvu;
        var $tenhang;
        var $gia;
        var $hinhanhdichvu;
        function DichVu($i, $tdv,$th,$g, $h){
            $this->id = $i;
            $this->tendichvu = $tdv;
            $this->tenhang = $th;
            $this->gia = $g;
            $this->hinhanhdichvu = $h;
        }
    }
?>