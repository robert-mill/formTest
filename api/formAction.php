<?php include_once '../models/db.php';?>
<?php include_once '../controllers/bootController.php';?>

<?php
$data = new Boot();
if($_GET['chart']){
    $val = $_GET['chart'];
    $newData =  $data->getThis("SELECT `gender`, `".$val."` from `formdata`");


    $newData = json_encode($newData);

    echo $newData;
}
else if($_GET){
    return $data->get();

}else if($_POST){

    $data->post($_POST);
    return false;
}else{
    echo 'oops';
}
?>