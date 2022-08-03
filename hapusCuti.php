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
        <title>Hapus Data Cuti</title></head>
    <body>
        <h1>Hapus Data Cuti</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewCuti.php">View Cuti</a></li>
</ul>
       
<?php
    if (isset($_GET["kode_cuti"])) {
        $db           = dbConnect();
        $kode_cuti    = $db->escape_string($_GET["kode_cuti"]);
        if ($datacuti = getDatacuti($kode_cuti)) {
?>
    <form method="post" name="frm" action="prosesHapusCuti.php">
    <input type="hidden" name="kode_cuti" value="<?php echo $datacuti["kode_cuti"];?>">
    <table border="1">
        <tr><td>Kode Cuti</td><td><?php echo $datacuti["kode_cuti"];?></td></tr>
        <tr><td>Id Karyawan</td><td><?php echo $datacuti["id_karyawan"];?></td></tr>
        <tr><td>Tanggal Cuti</td><td><?php echo $datacuti["tanggal_cuti"];?></td></tr>
        <tr><td>Jumlah Cuti</td><td><?php echo $datacuti["jumlah_cuti"];?></td></tr>
        <tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
    </table>
        </form>
<?php
        } else 
             echo "Data dengan Kode : $kode_cuti tidak ada. Penghapusan dibatalkan";
?>
<?php
        } else
             echo "Kode Cuti Tidak Ada. Penghapusan dibatalkan";
?>
</body>
</html>