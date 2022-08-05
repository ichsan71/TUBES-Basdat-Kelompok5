<!DOCTYPE html>
    <html>
        <head>
            <title>View Data Golongan</title>
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
            <h1>Data Golongan</h1>

<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="tambahGolongan.php">Tambah Golongan</a></li>
</ul>

    <?php include_once("function.php");
        $db = dbConnect();
            if ($db->connect_errno == 0) { 
                $sql = $sql="SELECT * FROM golongan";
                    $res = $db->query($sql);
            if ($res) {
    ?>
    <table border="1">
         <tr><th>KodeGolongan</th>
         <th>NamaGolongan</th>
         <th>TunjanganIstri</th>
         <th>TunjanganAnak</th>
         <th>GajiPokok</th>
         <th>Aksi</th>
    </tr>

<?php
    $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
        foreach ($data as $barisdata) { // telusuri satu per satu
?>

    <tr>
        <td><?php echo $barisdata["kode_golongan"];?></td>
        <td><?php echo $barisdata["nama_golongan"];?></td>
        <td><?php echo $barisdata["tunjangan_istri"];?></td>
        <td><?php echo $barisdata["tunjangan_anak"];?></td>
        <td><?php echo $barisdata["gaji_pokok"];?></td>
        <td> <a href="editGolongan.php?kode_golongan=<?php echo $barisdata["kode_golongan"]; ?>"><button>Edit</button></a> | <a href="hapusGolongan.php?kode_golongan=<?php echo $barisdata["kode_golongan"]; ?>">
        <button>Hapus</button></a>
    <?php
}
?>
</table>
<?php
$res->free();
} else
echo "Gagal Eksekusi SQL" . (DEVELOPMENT ? " : " . $db->error : "") . "<br>";
} else
echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
?>
</body>
</html>