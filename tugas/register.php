<?php 

include 'hubung.php';
    if(isset($_POST['registrasi'])){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $query = mysqli_query($koneksi,"INSERT INTO user VALUES('','$username','$password')");
        echo "<script>
        alert('data berhasil dikirim');
        window.location = 'home.php';</script>";
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Registrasi</title>
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
                <td>Password</td>
                <td><input type="password" name="password2"></td>
            </tr>
            <tr>
                <td><input type="submit" name="registrasi" ></td>
            </tr>
        </table>
    </form>
</body>
</html>