<?php
    require "classlist.php";
    // require "config.php";
    $p = new user_manage;
    if(isset($_POST["save"])) {
        $p->userName = $_POST["uname"];
        $p->pwd = sha1($_POST["pwd"]) ;
        if(isset($_POST["saveme"])) {
            $p->saveme = $_POST["saveme"];
        }
        $p->logins();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <form action="" method="POST">
            <h4>Login Form</h4>
            <div class="form-item">
                <label for="">User Name</label>
                <input type="text" name="uname">
            </div>
            <div class="form-item">
                <label for="">Password</label>
                <input type="text" name="pwd">
            </div>
            <input type="checkbox" name="saveme" value="saveme">
            <input type="submit" name="save" value="Login">
        </form>
    </div>
</body>
</html>