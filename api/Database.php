<?php

Class Database{
    private $conn;

    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO('sqlite:exercise01.sqlite');
        }catch(PDOException $e){
            echo $e->getMessage();
        }
        return $this->conn;
    }
}
?>
