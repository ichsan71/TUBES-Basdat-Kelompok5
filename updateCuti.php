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
        <title>Pembaruan Data Cuti</title>
    </head>
    <body>
        <h1>Pembaruan Data Cuti</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewCuti.php">View Cuti</a></li>
</ul>
<?php
if (isset($_POST["TblUpdate"])){
    $db = dbConnect();
    if ($db->connect_errno == 0){
        $kode_cuti   = $db->escape_string($_POST["kode_cuti"]);
        $id_karyawan = $db->escape_string($_POST["id_karyawan"]);
        $tanggal_cuti= $db->escape_string($_POST["tanggal_cuti"]);
        $jumlah_cuti = $db->escape_string($_POST["jumlah_cuti"]);
        $sql       = "UPDATE cuti SET id_karyawan='$id_karyawan', tanggal_cuti='$tanggal_cuti', jumlah_cuti='$jumlah_cuti'
                      WHERE kode_cuti='$kode_cuti'";
        
        $res       = $db->query($sql);
        if ($res)  {
            if ($db->affected_rows > 0) {
        ?>

        <br><font size="6">Data berhasil di Update.<br></font>

        <?php
        } else {
            ?>
            <br><font size="6">Data berhasil diupdate tetapi tanpa ada perubahan data.<br><br></font>
            <a href="javascript:history.back()"><button><font size="3">Edit Kembali</button></font></a>
          <?php
        }
      }
      else{ // gagal query
        ?>
        <br><font size="6">Data gagal diupdate.<br><br></font>
        
        <a href="javascript:history.back()"><button><font size="3">Edit Kembali</button></font></a>
        <?php
      }
    }
        } else
             echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
        
?>
</body>
</html>