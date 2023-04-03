<?php 
 include 'connect.php';

 
$sql = "SELECT * FROM city ORDER BY PlateNo + 0 ASC";
$result = $db->query($sql);

// JSON formatında döndür
$data = array();
if ($result->rowCount() > 0) {
    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $data[] = $row;
    }
};

echo json_encode($data);
?>