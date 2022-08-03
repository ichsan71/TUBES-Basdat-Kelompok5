<?php
include_once("function.php");
?>
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
        <title>View Data Gaji</title>
      </head>
    <body>
        <h1>Tambah Data Gaji</h1>
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGaji.php">View Gaji</a></li>
</ul>
        <form method="post" name="frm" action="simpanGaji.php">
    <table border="0">
      <tr><td>Kode Gaji</td>
         <td><input type="varchar" name="kode_gaji" size="20" maxlength="20"></td></tr>
      <tr><td>Id Karyawan</td>
    <td><select name="id_karyawan">
    <option>Pilih Karyawan</option>
    <?php
      $datakaryawan=getListKaryawan();
      foreach($datakaryawan as $data){
        echo "<option value=\"".$data["id_karyawan"]."\">".$data["nama"]."</option>";
      }
            ?>
            </select>
        </td></tr>

      <tr><td>Tanggal Gaji</td>
         <td><input type="date" name="tanggal"></td></tr>

      <tr><td>Jumlah Gaji </td>
         <td><input type="int" name="jumlah_gaji" size="20" maxlength="20"></td></tr>

      <tr><td>Potongan </td>
        <td><input type="int" name="potongan" size="20" maxlength="20"></td></tr>

      <tr><td>Total Gaji Diterima</td>
        <td><input type="int" name="total_gaji_diterima" size="20" maxlength="20"></td></tr>

         <td><input type="submit" name="TblSimpan" value="Simpan"></td></tr>
    </table>
         </form>
    </body>
</html>

