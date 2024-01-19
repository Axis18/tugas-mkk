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
            header('Location: mon.php');
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.css"  rel="stylesheet" />

    
    <title>Document</title>
</head>
<body>
<form action="" method="POST" enctype="multipart/form-data">
        <table width="25%" border=0>
            <tr>
            <div class="relative">

    <input type="text" name="nama_menu" id="floating_outlined" class="block  pb-2.5 pt-6 w-80 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer mt-6 ml-6" placeholder="" required value=<?=@$nama?> >
    
    
    <label for="Nama Menu" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-70 top- z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 ml-6">Nama Menu</label>
    
</div>
<div class="relative">
    <input type="text" name="harga_menu" id="floating_outlined" class="block  pb-2.5 pt-6 w-80 text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer mt-6 ml-6" placeholder="" required value=<?=@$harga?> >

    <label for="Harga Menu" class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4 scale-70 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2 peer-focus:scale-75 peer-focus:-translate-y-4 left-1 ml-6">Harga Menu</label>

</div>
    <label for="Foto" class="block text-md  ml-6 mt-6">Foto</label>

     <tr>
        <td><input type="file" name="foto_menu" class="mt-3 ml-6"required value=<?=@$foto?>></td>
    </tr>

</div>

        </table>
        <div class="button ml-6 mt-4 mb-4">
  <button name="submit" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>

  </div>
    </form>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Product name
                </th>
                
                <th scope="col" class="px-6 py-3">
                    Price
                </th>
                <th scope="col" class="px-6 py-3">
                    Photo
                </th>
                <th scope="col" class="px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($koneksi, "SELECT * FROM menu");
            while($data=mysqli_fetch_array($query)){
            ?>
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                <?= $data['nama_menu']?>
                </th>
                <td class="px-6 py-4">
                <?= $data['harga_menu']?>
                </td>
                <td class="px-6 py-4">
                <img src="img/<?= $data['foto_menu']?>" alt="" width="150px"></td>
                
                <td> <a href="mon.php?aksi=edit&id_menu=<?=$data['id_menu']?>"> Edit </a>
                <a href="mon.php?aksi=hapus&id_menu=<?=$data['id_menu']?>" > Hapus </a></td>
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
            echo "<script> document.location.href='mon.php' </script>";
        }
    }else{
        $nama = $_POST['nama_menu'];
        $harga = $_POST['harga_menu'];
        $foto = $_FILES['foto_menu']['name'];
        $file_tmp = $_FILES['foto_menu']['tmp_name'];
        move_uploaded_file($file_tmp, 'img/'.$foto);

        $result = mysqli_query($koneksi, "INSERT INTO menu(nama_menu,harga_menu,foto_menu) VALUES('$nama','$harga','$foto')");
        if($result > 0){
            header("Location: mon.php");
        }
    }
}
    
    ?>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.8.1/flowbite.min.js"></script>
</body>
</html>