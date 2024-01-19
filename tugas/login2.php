<?php
include 'hubung.php';

if(isset($_POST['login'])){
    $username=$_POST['username'];
    $password=$_POST['password'];
    $query=mysqli_query($koneksi, "select * from toko where username='$username' and password='$password'");
    if(mysqli_num_rows($query)>0){
        header("Location: web.php");
    }else{
        header("Location: login.php");
    }
}
if(isset($_POST['daftar'])){
    $nama_pengguna = $_POST['nama_pengguna'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $queryy = mysqli_query($koneksi, "select * from toko where username='$username'");
    $cek_login = mysqli_num_rows($queryy);

    if($cek_login > 0){
        echo "<script>
        alert('username telah digunakan');
        window.location = 'login.php';
        </script>";
    }else{
        if ($pw != $pw2){
            echo"<script>
            alert('konfirmasi password tidak sesuai');
            window.localtion = 'login.php';
            </script>";
        }else{
            mysqli_query($koneksi,"INSERT INTO toko VALUE('$id_pengguna','$nama_pengguna','$username','$password')")
; echo "<script>
alert('data berhasil dikirim');
window.location = 'web.php';
</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="baru.css">
</head>
<body>
   <div class="container">
    <input type="checkbox" id="check">
    <div class="login form">
         <header>login to YannsCake</header>
         <form action="login.php" method="post">
            <input type="text" placeholder="username" name="username">
            <input type="password" placeholder="Masukan password" name="password">
            <a href="#">Lupa password?</a>
            <input type="submit" value="login" name="login" class="submit">
         </form>
         <div class="signup">
            <span class="signup">Belum punya akun?
            <label for="check">Daftar</label>
            </span>
         </div>
    </div>
    <div class="registration form">
        <header>register form</header>
            <form action="login.php" method="post">
                <input type="text" placeholder="Nama lengkap" name="nama_pengguna">
                <input type="text" placeholder="Username" name="username">
                <input type="password" placeholder="Masukan password" name="password">
                <input type="password" placeholder="Masukan ulang password" name="password">
                <input type="submit" value="daftar" name="daftar" class="submit">
            </form>
            <div class="signup">
                <span class="signup">Sudah punya akun?
                    <label for="check">Login</label>
                </span>
            </div>
    </div>
</div>
</body>
</html>