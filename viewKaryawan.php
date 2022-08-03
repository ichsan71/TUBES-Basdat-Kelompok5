<!DOCTYPE html>
    <html>
        <head>
            <title>View Data Karyawan</title>
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
            <h1>Data Karyawan</h1>
<ul>
        <li><a href="index-admin.php">Home</a></li>
</ul>

<?php include_once("function.php");
        $db = dbConnect();
            if ($db->connect_errno == 0) { 
                $sql = $sql="SELECT k.id_karyawan, k.nama, k.kode_golongan, k.No_Telepon, k.alamat
                                     FROM karyawan k JOIN golongan g ON k.kode_golongan=g.kode_golongan ";
                 $res = $db->query($sql);
            if ($res) {
?>
    <table border="1">
         <tr><th>Id Karyawan</th>
         <th>Nama Karyawan</th>
         <th>Kode Golongan</th>
         <th>No Telepon</th>
         <th>Alamat</th>
         <th>Aksi</th>
    </tr>
<?php
    $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
        foreach ($data as $barisdata) { // telusuri satu per satu
?>
    <tr>
        <td><?php echo $barisdata["id_karyawan"];?></td>
        <td><?php echo $barisdata["nama"];?></td>
        <td><?php echo $barisdata["kode_golongan"];?></td>
        <td><?php echo $barisdata["No_Telepon"];?></td>
        <td><?php echo $barisdata["alamat"];?></td>
        
        <td> <a href="editKaryawan.php?id_karyawan=<?php echo $barisdata["id_karyawan"]; ?>"><button>Edit</button></a> | <a href="hapusKaryawan.php?id_karyawan=<?php echo $barisdata["id_karyawan"]; ?>">
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