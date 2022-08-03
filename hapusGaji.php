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
        <title>Hapus Data Gaji</title>
    </head>
    <body>
        <h1>Hapus Data Gaji</h1>
        <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGaji.php">View Gaji</a></li>
</ul>
<?php
    if (isset($_GET["kode_gaji"])) {
        $db           = dbConnect();
        $kode_gaji   = $db->escape_string($_GET["kode_gaji"]);
        if ($datagaji = getDataGaji($kode_gaji)) {
?>
    <form method="post" name="frm" action="prosesHapusGaji.php">
    <input type="hidden" name="kode_gaji" value="<?php echo $datagaji["kode_gaji"];?>">
    <table border="1">
        <tr><td>KodeGaji</td><td><?php echo $datagaji["kode_gaji"];?></td></tr>
        <tr><td>IdKaryawan</td><td><?php echo $datagaji["id_karyawan"];?></td></tr>
        <tr><td>Tanggal</td><td><?php echo $datagaji["tanggal"];?></td></tr>
        <tr><td>JumlahGaji</td><td><?php echo $datagaji["jumlah_gaji"];?></td></tr>
        <tr><td>Potongan</td><td><?php echo $datagaji["potongan"];?></td></tr>
        <tr><td>TotalGajiDiterima</td><td><?php echo $datagaji["total_gaji_diterima"];?></td></tr>
        <tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
    </table>
        </form>
<?php
        } else 
             echo "Data dengan Kode : $kode_gaji tidak ada. Penghapusan dibatalkan";
?>
<?php
        } else
             echo "Kode Gaji Tidak Ada. Penghapusan dibatalkan";
?>
</body>
</html>