<!DOCTYPE html>
<html>
    <head>
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
        <title>VIEW DATA CUTI</title>
    <body>
        <h1>Data Cuti</h1>
 <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="tambahCuti.php">Tambah Cuti</a></li>
</ul>
    </body>
<?php
        include_once("function.php");
            $db = dbConnect();
                if ($db->connect_errno == 0){
                     $sql = "SELECT c.kode_cuti,k.id_karyawan, c.tanggal_cuti, c.jumlah_cuti
                            FROM cuti c JOIN karyawan k ON c.id_karyawan=k.id_karyawan ";
    $res = $db->query($sql);
    if ($res) {
?>
        <table border="1">
            <tr><th>KodeCuti </th>
                <th>IdKaryawan</th>
                    <th>TanggalCuti</th>
                        <th>JumlahCuti</th>
                                <th>Aksi</th>
            </tr>
<?php
        $data = $res->fetch_all(MYSQLI_ASSOC); // ambil seluruh baris data
                foreach ($data as $barisdata) { // telusuri satu per satu
?>
<tr>
    <td><?php echo $barisdata["kode_cuti"];?></td>
    <td><?php echo $barisdata["id_karyawan"];?></td>
    <td><?php echo $barisdata["tanggal_cuti"];?></td>
    <td><?php echo $barisdata["jumlah_cuti"];?></td>
    <td> <a href="editCuti.php?kode_cuti=<?php echo $barisdata["kode_cuti"]; ?>"><button>Edit</button></a> | <a href="hapusCuti.php?kode_cuti=<?php echo $barisdata["kode_cuti"]; ?>">
    <button>Hapus</button></a>
</tr>
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