<?php 
    // require "config.php";
    require "classlist.php";
    
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam1</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h4>Register form</h4>
            <div class="form-group">
                <label for="">User Name</label>
                <input type="text" name="username">
            </div>
            <div class="form-group">
                <label for="">Password</label>
                <input type="password" name="pwd">
            </div>
            <div class="form-group">
                <label for="">Phone Number</label>
                <input type="text" name="phone">
            </div>
            <input type="submit" name="save" value="Registration">
            <p>If you have account <a href="login.php">Login</a></p>
        </form>

        <table>
            
            
<?php

    $p = new user_manage;
    if(isset($_POST["save"])) {
        $p->userName = $_POST["username"];
        $p->pwd = sha1($_POST["pwd"]) ;
        $p->phone = $_POST["phone"];
        if(!$p->check_username()) {
            $p->register();
            $p->show();
        } else {
            echo "user name areadry exit";
        }
    }
?>
            
        </table>
    </div>
</body>
</html>