<?php 
 include 'connect.php';

// Verileri çek
$il_id = $_POST['il_id'];
$sql = "SELECT * FROM town WHERE CityID = '".$il_id."' ORDER BY TownName ASC";
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