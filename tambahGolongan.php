<?php
include_once("function.php");
?>
<!DOCTYPE html>
    <html><head><title>Tambah Data Golongan</title>
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
        <h1>Tambah Data Golongan</h1>
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGolongan.php">View Golongan</a></li>
</ul>
        <form method="post" name="frm" action="simpanGolongan.php">
    <table border="0">
      <tr><td>Kode Golongan</td>
         <td><input type="text" name="kode_golongan" size="12" maxlength="12"></td></tr>
      <tr><td>Nama Golongan</td>
         <td><input type="text" name="nama_golongan" size="30" maxlength="30"></td></tr>
      <tr><td>Tunjangan Istri </td>
         <td><input type="int" name="tunjangan_istri" size="13" maxlength="13"></td></tr>
      <tr><td>Tunjangan Anak</td>
         <td><input type ="int" name="tunjangan_anak" size="13" maxlength="13"></td></tr>
      <tr><td>Gaji Pokok</td>
         <td><input type ="int" name="gaji_pokok" size="13" maxlength="13"></td></tr>
   
         <td><input type="submit" name="TblSimpan" value="Simpan"></td></tr>
    </table>
         </form>
    </body>
</html>

