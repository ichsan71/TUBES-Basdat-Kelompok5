<?php include_once("function.php"); ?>
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
        <h1>Edit Data Karyawan</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewKaryawan.php">View Karyawan</a></li>
    </ul>

<?php
        if (isset($_GET["id_karyawan"])) {
            $db = dbConnect();
                $id_karyawan= $db->escape_string($_GET["id_karyawan"]);
        if ($datakaryawan = getdatakaryawan($id_karyawan)){

// cari data karyawan, kalau ada simpan di $datakaryawan
?>
        <form method="post" name="frm" action="updateKaryawan.php">
        <table border="1">
                <tr><td>Id_Karyawan</td>
                    <td><input type="text" name="id_karyawan" size="16" maxlength="15"
                         value="<?php echo $datakaryawan["id_karyawan"];?>" readonly></td></tr>

                <tr><td>Nama_Karyawan</td>
                    <td><input type="text" name="nama" size="50" maxlength="50"
                         value="<?php echo $datakaryawan["nama"];?>"></td></tr>

                <tr><td>KodeGolongan</td>
                    <td><input type="text" name="kode_golongan" size="50" maxlength="50"
                         value="<?php echo $datakaryawan["kode_golongan"];?>"></td></tr>

                <tr><td>Telepon</td>
                    <td><input type="text" name="No_Telepon" size="13" maxlength="13"
                        value="<?php echo $datakaryawan["No_Telepon"];?>"></td></tr>

                <tr><td>Alamat</td>
                    <td><input type="text" name="alamat" size="50" maxlength="50"
                        value="<?php echo $datakaryawan["alamat"];?>"></td></tr>

                <tr><td>&nbsp;</td>
                    <td><input type="submit" name="TblUpdate" value="Update">
                        
        </table>
            </form>
<?php
    } else
        echo "Karyawan dengan Id : $id_karyawan tidak ada. Pengeditan dibatalkan";
?>
<?php
    } else
        echo "No_Nota tidak ada. Pengeditan dibatalkan.";
?>
    </body>
        </html>
