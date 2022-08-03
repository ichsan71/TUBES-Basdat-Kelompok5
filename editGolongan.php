<?php
include_once("function.php");
?>
<html>
    <head><title>Edit Data Golongan</title>
    <style>
body{
    height: 100vh;
    background-image: url('bg.jpg');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
}

h1 {
                color: black;
                font-family: 'Times New Roman';
                font-size: 300%;
}
table{
                       border-collapse: collapse;
                       width: 50%;
                       font-family: 'Calibri';
     }
       
th,td{
                       padding: 4px;
                       text-align: left;
                       border-bottom:0px solid skyblue;
}
       
tr:hover{background-color: skyblue;}

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
</body><h1>Edit Data Golongan</h1>
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGolongan.php">Karyawan</a></li>
</ul>

<?php
    if (isset($_GET["kode_golongan"])){
        $db      = dbConnect();
        $kode_golongan = $db->escape_string($_GET["kode_golongan"]);
        if ($datagolongan = getdatagolongan ($kode_golongan)){

?>
    <form method="post"  name="frm" action="updateGolongan.php">
        <table border="1">

        <tr><td>Kode Golongan</td>
            <td><input type="text" name="kode_golongan" size="30" maxlenght="30" value="<?php echo $datagolongan["kode_golongan"];?>" ></td></tr>
        <tr><td>Nama Golongan</td>
            <td><input type="text" name="nama_golongan" size="30" maxlenght="30" value="<?php echo $datagolongan["nama_golongan"];?>" ></td></tr>
        <tr><td>TunjanganIstri</td>
            <td><input type="text" name="tunjangan_istri" size="30" maxlenght="30" value="<?php echo $datagolongan["tunjangan_istri"];?>" ></td></tr>
        <tr><td>TunjanganAnak </td>
            <td><input type="text" name="tunjangan_anak" size="30" maxlenght="30" value="<?php echo $datagolongan["tunjangan_anak"];?>" ></td></tr>
        <tr><td>GajiPokok </td>
            <td><input type="text" name="gaji_pokok" size="30" maxlenght="30" value="<?php echo $datagolongan["gaji_pokok"];?>" ></td></tr>
        
        <tr><td>&nbsp;</td>
                    <td><input type="submit" name="TblUpdate" value="Update">
                            
        </table>
    </form>
<?php
    }else 
        echo "Produk Dengan Id : $Id_Dokter tidak ada. Pengeditan dibatalkan";
    ?>
<?php
    }else 
        echo " Id_Dokter tidak ada. Pengeditan dibatalkan";
    ?>
</body>
</html>