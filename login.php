<?php
    session_start();
    $login = array(
        "rashford" => "lw10",
        "cavani" => "st07",
        "sancho" => "rw25",
        "pogba" => "cm06",
        "bruno" => "cam18"
    );
    $check = 0;
    if(isset($_POST["submit"])){
        $username = $_POST["user"];
        $password = $_POST["pass"];
        foreach($login as $user => $pass){
            if($username == $user && $password == $pass){
                $_SESSION["id_user"] = $username;
                $check = 1;
                header("Location: session.php");
            }
        }
        if($check == 0){
            echo "Wrong username or password!";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style>
        .form-login{
            text-align: center;
            margin: 200px 750px;
            width: 20%;
            border: 3px solid green;
            padding: 10px;
        }
        input{
            font-size: 20px;
        }
    </style>
</head>
<body>
    <div class="form-login">
    <h1 style="color:red;">LOGIN</h1>
    <form action="login.php" method="post">
        <p class="">User: <br><input type="text" name="user"></p>
        <p>Password: <br><input type="password" name="pass"></p>
        <p><input type="submit" name="submit" value="Login"></p>
    </form>
    </div>
</body>
</html>
