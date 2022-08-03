<?php include_once("function.php");?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Hapus Data Golongan</title>
<style>
body{
    height: 100vh;
    background-image: url('bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

table{
                border-collapse: collapse;
                width: 50%;
                font-family: 'Calibri';
    }
    
h1 {
                color: black;
                font-family: 'Times New Roman';
                font-size: 300%;
}

p{
          color: black;
                font-family: 'Calibri';
                font-size: 150%;
 }

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: #333;
}

li {
float: left;
}

li a, .dropbtn {
display: inline-block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
background-color: steelblue;
}

li.dropdown {
display: inline-block;
}

.dropdown-content {
display: none;
position: absolute;
background-color: #f9f9f9;
min-width: 160px;
box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
z-index: 1;
}

.dropdown-content a {
color: black;
padding: 12px 16px;
text-decoration: none;
display: block;
text-align: left;
}

.dropdown-content a:hover {background-color: #f1f1f1;}

.dropdown:hover .dropdown-content {
display: block;
}
</style>

        </head>
    <body>
        <h1> Hapus Data Golongan</h1>
        <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGolongan.php">View Golongan</a></li>
</ul>
<?php
        if (isset($_GET["kode_golongan"])) {
            $db = dbConnect();
                $kode_golongan = $db->escape_string($_GET["kode_golongan"]);
                    if ($datagolongan = getdatagolongan($kode_golongan)) { // cari data golongan, kalau ada simpan di $data
?>
    <form method="post" name="frm" action="proses_hapus_golongan.php">
        <input type="hidden" name="kode_golongan" value="<?php echo $datagolongan["kode_golongan"];?>">
<table border="1">
        <tr><td>KodeGolongan</td><td><?php echo $datagolongan["kode_golongan"];?></td></tr>
            <tr><td>NamaGolongan</td><td><?php echo $datagolongan["nama_golongan"];?></td></tr>
                <tr><td>TunjanganIstri</td><td><?php echo $datagolongan["tunjangan_istri"];?></td></tr>       
                    <tr><td>TunjanganAnak</td><td><?php echo $datagolongan["tunjangan_anak"];?></td></tr>
                        <tr><td>GajiPokok</td><td><?php echo $datagolongan["gaji_pokok"];?></td></tr>
                         <tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
    </form>
<?php
    } else
        echo "golongan dengan kode : $kode_golongan tidak ada. Penghapusan dibatalkan";
?>
<?php
    } else
            echo "Golongan dengan kode : $kode_golongan tidak ada. Penghapusan dibatalkan.";
?>
    </body>
    </html>