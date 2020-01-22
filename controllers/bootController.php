<?php
class Boot extends DB {
    function get(){

        return $this->select("SELECT * FROM `formdata`");
    }
    function getThis($sql){

        return $this->select( $sql);
    }
    function post($data){
        return $this->insert($data);


        //return $this->select("INSERT INTO `formData` (`firstName`,`lastName`, `email`, `gender`, `age`) VALUES (".$data['firstName'].",".$data['lastName'].",".$data['email'].",".$data['gender'].",".$data['age'].")");
    }
}
?>