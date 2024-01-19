<?php
include 'hubung.php';
session_start();
if(!isset($_SESSION['username'])){
    header('location:login.php');
}

if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $result = mysqli_query($koneksi,
        "SELECT * FROM user WHERE id_user='$_GET[id_user]'");
        while($data = mysqli_fetch_array($result)){
            $nama= $data['username'];
            $pw= $data['password'];
        }
    }else if($_GET['aksi']=="hapus"){
        $hapus = mysqli_query($koneksi,
        "DELETE FROM user WHERE id_user='$_GET[id_user]'");
        if($hapus){
            header('Location: admin.php');
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
    <form action="" method="POST" enctype="multipart/form-data">
        <table width="25%" border=0>
            <tr>
                <td>Nama Pengguna</td>
                <td><input type="text" name="username"required value=<?=@$nama?>></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="text" name="password"required value=<?=@$pw?>></td>
            </tr>
          
            <tr>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <table border='1'>
        <thead>
            <th>No. </th>
            <th>Username</th>
            <th>Password</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            <?php
            include 'hubung.php';
            $no=1;
            $query = mysqli_query($koneksi, "SELECT * FROM user");
            while($data=mysqli_fetch_array($query)){
                
                echo "<td>".$no; $no++. "</td>";
                echo "<td>".$data['username']."</td>";
                echo "<td>".$data['password']."</td>";
                ?>
                <td> <a href="admin.php?aksi=edit&id_user=<?=$data['id_user']?>"> Edit </a>
                <a href="admin.php?aksi=hapus&id_user=<?=$data['id_user']?>" onclick="return confirm('hapus kah?')"> Hapus </a></td>
            </tr>
            
            <?php } ?>
            
        </tbody>
    </table>
    <?php 
    include 'hubung.php';

    if(isset($_POST['submit'])){
        if($_GET['aksi']=="edit"){
        $id_user = $_GET['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        $edit = mysqli_query($koneksi, "UPDATE user
        SET username='$username', password='$password'
        where id_user='$id_user'");

        if($edit > 0){
            header("Location: admin.php");
        }
    }else{
        $username = $_POST['username'];
        $password = $_POST['password'];

        $result = mysqli_query($koneksi, "INSERT INTO user(username,password) VALUES('$username','$password')");
        if($result > 0){
            header("Location: admin.php");
        }
    }
}
    
    ?>
</body>
</html>