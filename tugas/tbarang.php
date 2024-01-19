<?php
include 'hubung.php';


if(isset($_GET['aksi'])){
    if($_GET['aksi']=="edit"){
        $result = mysqli_query($koneksi,
        "SELECT * FROM menu WHERE id_menu='$_GET[id_menu]'");
        while($data = mysqli_fetch_array($result)){
            $nama= $data['nama_menu'];
            $harga= $data['harga_menu'];
            $foto= $data['foto_menu'];
        }
    }else if($_GET['aksi']=="hapus"){
        $hapus = mysqli_query($koneksi,
        "DELETE FROM menu WHERE id_menu='$_GET[id_menu]'");
        if($hapus){
            header('Location: tbarang.php');
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
                <td>Nama Menu</td>
                <td><input type="text" name="nama_menu"required value=<?=@$nama?>></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga_menu"required value=<?=@$harga?>></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto_menu"required value=<?=@$foto?>></td>
            </tr>
          
            <tr>
                <td><input type="submit" name="submit" value="Tambah"></td>
            </tr>
        </table>
    </form>
    <table border='1'>
        <thead>
            <th>No. </th>
            <th>Nama Menu</th>
            <th>Harga Menu</th>
            <th>Foto Menu</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            
            <?php
            include 'hubung.php';
            $no=1;
            $query = mysqli_query($koneksi, "SELECT * FROM menu");
            while($data=mysqli_fetch_array($query)){
            ?>
            <tr>
                <td><?= $no++?></td>
                <td><?= $data['nama_menu']?></td>
                <td><?= $data['harga_menu']?></td>
                <td><img src="img/<?= $data['foto_menu']?>" alt="" width="150px"></td>
                <td> <a href="tbarang.php?aksi=edit&id_menu=<?=$data['id_menu']?>"> Edit </a>
                <a href="tbarang.php?aksi=hapus&id_menu=<?=$data['id_menu']?>" > Hapus </a></td>
            </tr>
            
            <?php } ?>
            
        </tbody>
    </table>
    <?php 
    include 'hubung.php';

    if(isset($_POST['submit'])){
        if($_GET['aksi']=="edit"){
        $id_menu = $_GET['id_menu'];
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $foto = $_FILES['foto_menu']['name'];
        $file_tmp = $_FILES['foto_menu']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'.$foto);
        $edit = mysqli_query($koneksi, "UPDATE menu
        SET nama_menu='$nama', harga_menu='$harga', foto_menu='$foto'
        where id_menu='$id_menu'");

        if($edit > 0){
            header("Location: tbarang.php");
        }
    }else{
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $foto = $_FILES['foto_menu']['name'];
        $file_tmp = $_FILES['foto_menu']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'.$foto);

        $result = mysqli_query($koneksi, "INSERT INTO menu(nama_menu,harga_menu,foto_menu) VALUES('$nama','$harga','$foto')");
        if($result > 0){
            header("Location: tbarang.php");
        }
    }
}
    
    ?>
</body>
</html>