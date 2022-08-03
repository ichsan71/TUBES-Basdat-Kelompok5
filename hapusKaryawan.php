<?php include_once("function.php");?>
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
            <title>Hapus Data Karyawan</title>
        </head>
    <body>
        
        <h1> Hapus Data Karyawan</h1>
        <ul>
            <li><a href="index-admin.php">Home</a></li>
            <li><a href="viewKaryawan.php">View Karyawan</a></li>
        </ul>
<?php
        if (isset($_GET["id_karyawan"])) {
            $db = dbConnect();
                $id_karyawan = $db->escape_string($_GET["id_karyawan"]);
                    if ($datakaryawan = getdatakaryawan($id_karyawan)) { // cari data karyawan, kalau ada simpan di $data
?>
    <form method="post" name="frm" action="proses_hapus_karyawan.php">
        <input type="hidden" name="id_karyawan" value="<?php echo $datakaryawan["id_karyawan"];?>">
<table border="1">
        <tr><td>Id Karyawan</td><td><?php echo $datakaryawan["id_karyawan"];?></td></tr>
            <tr><td>Nama</td><td><?php echo $datakaryawan["nama"];?></td></tr>
                <tr><td>KodeGolongan</td><td><?php echo $datakaryawan["kode_golongan"];?></td></tr>       
                    <tr><td>Telepon</td><td><?php echo $datakaryawan["No_Telepon"];?></td></tr>
                        <tr><td>Alamat</td><td><?php echo $datakaryawan["alamat"];?></td></tr>
                         <tr><td>&nbsp;</td><td><input type="submit" name="TblHapus" value="Hapus"></td></tr>
</table>
    </form>
<?php
    } else
        echo "karyawan dengan Id : $id_karyawan tidak ada. Penghapusan dibatalkan";
?>
<?php
    } else
            echo "Karyawan dengan Id : $id_karyawan tidak ada. Penghapusan dibatalkan.";
?>
    </body>
    </html>