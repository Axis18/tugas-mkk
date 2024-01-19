<?php
    include "hubung.php";
    session_start();
    if(isset($_POST['login'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username!="" && $password!=""){
            $mysql=mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' and password='$password'");
            if($data = mysqli_fetch_array($mysql)){
                $_SESSION['username']=$data['username'];
                $_SESSION['password']=$data['password'];
                header('location:admin.php');
            }else{

            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <form action="" method="post">
        <table width="25%" border=0 align="center">
            <tr>
                <td>Username</td>
                <td><input type="text" name="username"></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password"></td>
            </tr>
            <tr>
                <td><input type="submit" name="login" value="Login"></td>
            </tr>
        </table>
    </form>
</body>
</html>
