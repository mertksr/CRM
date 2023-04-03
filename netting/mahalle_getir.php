<?php 
 include 'connect.php';

 $ilce_id = $_POST['ilce_id'];
 $mahsor = $db->prepare("SELECT * FROM district WHERE TownID = $ilce_id");
 $mahsor->execute();
 $mahcek = $mahsor->fetch(PDO::FETCH_ASSOC);

$mahalle_id = $mahcek['DistrictID'];
// Verileri çek
$sql = "SELECT * FROM neighborhood WHERE DistrictID = '".$mahalle_id."' ORDER BY NeighborhoodName ASC";
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