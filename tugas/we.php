<form method="POST">
    <title> Gaji Bersih<title><br>
        <h1>Hitung Gaji<h1><br>
            Nama : <input type="text" name="nama"><br>
            Bagian : <select name="personal">
                <option value="Personalia">Personalia</option>
                <option value="Produksi">Produksi</option>
                <option value="Keuangan">Keuangan</option>
            </select><br>
            <input type="submit" name="gas" value="Hitung Gaji">
</form>
<?php
    if(isset($_POST['gas'])){
        $nama=$_POST['nama'];
        $jenis=$_POST['personal'];
        //////////////////////////
        function person(){
            $person=1200000;
            echo"$person";
        }
        function person1(){
            $person=(1200000*15)/100;
            echo"person";
        }
        function person2(){
            $person=(1200000*10)/100;
            echo"person";
        }
        function person3(){
            $person=1200000+(((1200000*15)/100)-1200000*10)/100;
            echo"person";
        }
        if($jenis=="Personalia"){
            echo"Nama : $nama<br>";
            echo"Bagian : $jenis<br>";
            echo"Gaji Pokok : <br>".person();          
            echo"Tunjangan Kesehatan : <br>".person1();
            echo"Pajak : <br>".person2();
            echo"Gaji Bersih : <br>".person3();
        }
        function produk(){
            $person=1300000;
            echo"$person";
        }
        function produk1(){
            $person=(1300000*15)/100;
            echo"person";
        }
        function produk2(){
            $person=(1300000*10)/100;
            echo"person";
        }
        function produk3(){
            $person=1300000+(((1300000*15)/100)-1300000*10)/100;
            echo"person";
        }
        if($jenis=="Produksi"){
            echo"Nama : $nama<br>";
            echo"Bagian : $jenis<br>";
            echo"Gaji Pokok : <br>".produk();          
            echo"Tunjangan Kesehatan : <br>".produk1();
            echo"Pajak : <br>".produk2();
            echo"Gaji Bersih : <br>".produk3();
        }
        function uang(){
            $person=1400000;
            echo"$person";
        }
        function uang1(){
            $person=(1400000*15)/100;
            echo"person";
        }
        function uang2(){
            $person=(1400000*10)/100;
            echo"person";
        }
        function uang3(){
            $person=1400000+(((1400000*15)/100)-1400000*10)/100;
            echo"person";
        }
        if($jenis=="Keuangan"){
            echo"Nama : $nama<br>";
            echo"Bagian : $jenis<br>";
            echo"Gaji Pokok : <br>".uang();          
            echo"Tunjangan Kesehatan : <br>".uang1();
            echo"Pajak : <br>".uang2();
            echo"Gaji Bersih : <br>".uang3();
        }
    }
?>