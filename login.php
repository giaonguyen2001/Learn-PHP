<?php
    session_start();
    $login = array(
        "rashford" => "lw10",
        "cavani" => "st07",
        "sancho" => "rw25",
        "pogba" => "cm06",
        "bruno" => "cam18"
    );
    $check = false;
    if(isset($_POST["submit"])){
        $username = $_POST["user"];
        $password = $_POST["pass"];
        foreach($login as $user => $pass){
            if($username == $user && $password == $pass){
                $_SESSION["id_user"] = $username;
                $check = true;
                header("Location: session.php");
            }
        }
        if($check == false){
            echo "Wrong username or password!";
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login</title>
    <style></style>
</head>
<body>
    <div class="form-login">
    <h1 >LOGIN</h1>
    <form action="login.php" method="post">
        <p class="">User: <br><input type="text" name="user"></p>
        <p>Password: <br><input type="password" name="pass"></p>
        <p><input type="submit" name="submit" value="Login"></p>
    </form>
    </div>
</body>
</html>
