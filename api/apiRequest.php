<?php include_once '../models/db.php';?>
<?php include_once '../controllers/bootController.php';?>

<?php
$data = new Boot();

foreach ($data->get() as $u) {
    echo "<tr><td>" . $u['firstName'] . "</td><td>". $u['lastname']. "</td><td><img src='/includes/images/".$u['gender'].".png' /></td><td>".$u['age']."</td><td>".$u['height']."</td></tr>";
};


?>