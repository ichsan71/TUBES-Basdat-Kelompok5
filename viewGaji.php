<!DOCTYPE html>
<html>
    <head>
        <title>VIEW DATA GAJI </title>
    <body>
        <h1>Data Gaji</h1>
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
                font-family: 'Times New Roman ';
                font-size: 300%;
    }

th,td{
                padding: 4px;
                text-align: left;
                border-bottom:0px solid skyblue;
}

            tr:hover{background-color: skyblue;}
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
        </style>
    </body>
<?php
        include_once("function.php");
            $db = dbConnect();
                if ($db->connect_errno == 0){
                     $sql = "SELECT g.kode_gaji, g.id_karyawan, g.tanggal, g.jumlah_gaji, g.potongan, g.total_gaji_diterima
                     FROM gaji g JOIN karyawan k ON g.id_karyawan=k.id_karyawan ";
    $res = $db->query($sql);
    if ($res) {
?>
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="tambahGaji.php">Tambah Gaji</a></li>
</ul>
        <table border="1">
            <tr><th>KodeGaji </th>
                <th>IdKaryawan</th>
                    <th>Tanggal</th>
                        <th>JumlahGaji</th>
                            <th>Potongan</th>
                                <th>TotalGajiDiterima</th>
                                    <th>Aksi</th>
            </tr>
<?php
        $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                foreach ($data as $barisdata) { // telusuri satu per satu
?>
<tr>
    <td><?php echo $barisdata["kode_gaji"];?></td>
    <td><?php echo $barisdata["id_karyawan"];?></td>
    <td><?php echo $barisdata["tanggal"];?></td>
    <td><?php echo $barisdata["jumlah_gaji"];?></td>
    <td><?php echo $barisdata["potongan"];?></td>
    <td><?php echo $barisdata["total_gaji_diterima"];?></td>
    <td> <a href="editGaji.php?kode_gaji=<?php echo $barisdata["kode_gaji"]; ?>"><button>Edit</button></a> | <a href="hapusGaji.php?kode_gaji=<?php echo $barisdata["kode_gaji"]; ?>">
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
    </head>
</html>