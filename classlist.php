<?php
    require "config.php";
    class user_manage {
        public $userName;
        public $pwd;
        public $phone;
        public $saveme;

        public function check_username() {
            $a = new config;
            $conn = $a->connect();
            $sql = "SELECT USERNAME FROM abc12users WHERE USERNAME = '".$this->userName."' ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if(count($results)>0) {
                return true;
            } else {
                return false;
            }
            $conn = NULL;
        }

        public function register() {
            $a = new config;
            $conn = $a->connect();
            $sql1= "INSERT INTO abc12users(USERNAME,PASSWORD_HASH,PHONE) VALUES ('".$this->userName."','".$this->pwd."','".$this->phone."')";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();
            $conn = NULL;
        }

        public function logins() {
            $a = new config;
            $conn = $a->connect();
            $sql = "SELECT USERNAME,PASSWORD_HASH FROM abc12users WHERE USERNAME='".$this->userName."' AND PASSWORD_HASH = '".$this->pwd."'  ";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            $results = $stmt->fetchAll();
            if(count($results)==1) {
                $name = $this->userName;
                setcookie("id",md5($name),time()+6000,"/");

                if($this->saveme == "saveme") {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    setcookie("loggedin",$name,time()+6000,"/");
                    header("location: manage.php");
                } else {
                    session_start();
                    $_SESSION["loggedin"] = TRUE;
                    header("location: manage.php");
                }
            } else {
                echo "Invalid username or password";
            }
            $conn = NULL;
        }

        public function show() {
            $a = new config;
            $conn = $a->connect();
            echo "  <tr>
                        <td>User Name</td>
                        <td>Password</td>
                        <td>Phone Number</td>
                    </tr>";
            $sql2 = "SELECT * FROM abc12users";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            $results1 = $stmt2->fetchAll();
            foreach($results1 as $row) {
                echo "<tr>";
                echo "<td>".$row["USERNAME"]."</td>";
                echo "<td>".$row["PASSWORD_HASH"]."</td>";
                echo "<td>".$row["PHONE"]."</td>";
                echo "</tr>";
            }
            $conn = NULL;
        }

    }

?>