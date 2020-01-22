<?php
class DB {
    private $pdo = null;
    private $stmt = null;

    function __construct(){
        try {
            $this->pdo = new PDO(
                "mysql:host=robertmill.org.mysql;dbname=robertmill_org;charset=utf8",
                "robertmill_org", "PF8FB86k2JheamCgEoaZac6e", [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]
            );
        } catch (Exception $ex) { die($ex->getMessage()); }
    }

    function __destruct(){
        if ($this->stmt!==null) { $this->stmt = null; }
        if ($this->pdo!==null) { $this->pdo = null; }
    }

    function select($sql){
        $result = false;



        try {
            $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->execute();
            $result = $this->stmt->fetchAll();
            $this->stmt = null;


            return $result;
        } catch (Exception $ex) { $this->stmt = null; return 'Exception'; }

    }
    function insert($data=null){
        $result=false;
        $sql="INSERT INTO formdata ( firstName, lastName, email, gender, age, height) VALUES (:firstName, :lastName, :email, :gender, :age, :height)";
        $data = [
            ':firstName' => $data['inputFirstName'],
            ':lastName' => $data['inputLastName'],
            ':email' => $data['inputEmail'],
            ':gender' => $data['gender'],
            ':age' => $data['selectage'],
            ':height' => $data['selectheight']
            ];



        try{
           $this->stmt = $this->pdo->prepare($sql);
            $this->stmt->bindValue(':firstName', 'inputFirstName');
            $this->stmt->bindValue(':lastName', 'inputLastName');
            $this->stmt->bindValue(':email', 'inputEmail');
            $this->stmt->bindValue(':gender', 'gender');
            $this->stmt->bindValue(':age', 'selectage');
            $this->stmt->bindValue(':height', 'selectheight');
           $this->stmt->execute($data);
           return 'Data sent';
        }
        catch (Exception $e)
        {
            $str= filter_var($e->getMessage(), FILTER_SANITIZE_STRING);
            $_SESSION['_msg_err'] = $str;
        }
    }
}
?>