<?php
    class config {
        public $serverName = "localhost";
        public $userName = "root";
        public $pwd = "";
        public $dbName = "abc12";

        public function connect() {
            $dsn = "mysql:host=".$this->serverName.";dbname=".$this->dbName.";charset=utf8";
            $option = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            try {
                // echo "connect succes";
                return new PDO($dsn,$this->userName,$this->pwd,$option);
            } catch(PDOException $e) {
                echo $e->getMessage();
            }
        }
    }
?>