<?php include_once("function.php");?>
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
        <title>Pembaruan Data Gaji</title>
    </head>
    <body>
        <h1>Pembaruan Data Gaji</h1>
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGaji.php">View Gaji</a></li>
</ul>
<?php
if (isset($_POST["TblUpdate"])){
    $db = dbConnect();
    if ($db->connect_errno == 0){
        $kode_gaji           = $db->escape_string($_POST["kode_gaji"]);
        $id_karyawan         = $db->escape_string($_POST["id_karyawan"]);
        $tanggal             = $db->escape_string($_POST["tanggal"]);
        $jumlah_gaji         = $db->escape_string($_POST["jumlah_gaji"]);
        $potongan            = $db->escape_string($_POST["potongan"]);
        $total_gaji_diterima = $db->escape_string($_POST["total_gaji_diterima"]);
        $sql         = "UPDATE gaji SET id_karyawan='$id_karyawan', tanggal='$tanggal', jumlah_gaji='$jumlah_gaji', potongan='$potongan', total_gaji_diterima=$total_gaji_diterima
                           WHERE kode_gaji='$kode_gaji'";
        
        $res       = $db->query($sql);
        if ($res)  {
            if ($db->affected_rows > 0) {
?>
        Data berhasil di Update.<br>
        <a href="viewGaji.php"><button>View Gaji</button></a>
        <?php
        } else {
?>
        Data berhasil diupdate tetapi tanpa ada perubahan data.<br>
        <a href="javascript:history.back()"><button>Edit Kembali</button></a> 
        <a href="viewGaji.php"><button>View Gaji</button></a>
        
        <?php
        }
    } else {
?>      
        Data gagal diupdate
        <a href="javascript:history.back()"><button>Edit Kembali</button></a>
        <?php
    }
        } else
             echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
        }
?>
</body>
</html>