<?php include_once("function.php");?>
<html>
    <head><title>Edit Data Gaji</title>
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
</head>
</body>
    <h1>Edit Data Gaji</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGaji.php">View Gaji</a></li>
</ul>

<?php
    if (isset($_GET["kode_gaji"])){
        $db      = dbConnect();
        $kode_gaji = $db->escape_string($_GET["kode_gaji"]);
        if ($datagaji = getDataGaji ($kode_gaji)){

?>
    <form method="post"  name="frm" action="updateGaji.php">
        <table border="1">
        <tr><td>KodeGaji</td>
            <td><input type="varchar" name="kode_gaji" size="10" maxlenght="10" value="<?php echo $datagaji["kode_gaji"];?>" readonly ></td></tr>
        <tr><td>IdKaryawan</td>
            <td><input type="char" name="id_karyawan" size="12" maxlenght="12" value="<?php echo $datagaji["id_karyawan"];?>" ></td></tr>
        <tr><td>Tanggal </td>
            <td><input type="date" name="tanggal" value="<?php echo $datagaji["tanggal"];?>" ></td></tr>
        <tr><td>JumlahGaji</td>
            <td><input type="int" name="jumlah_gaji" size="13" maxlenght="13" value="<?php echo $datagaji["jumlah_gaji"];?>" ></td></tr>
        <tr><td>Potongan</td>
            <td><input type="int" name="potongan" size="13" maxlenght="13" value="<?php echo $datagaji["potongan"];?>" ></td></tr>   
        <tr><td>TotalGajiDiterima</td>
            <td><input type="int" name="total_gaji_diterima" size="13" maxlenght="13" value="<?php echo $datagaji["total_gaji_diterima"];?>" ></td></tr>
        <tr><td>&nbsp;</td>
            <td><input type="submit" name="TblUpdate" value="Update"></td></tr>
        </table>
        </form>
    <?php
    }else 
        echo "Cuti dengan kode : $kode_cuti tidak ada. Pengeditan dibatalkan";
    ?>
    <?php
    }else 
        echo " kode cuti tidak ada. Pengeditan dibatalkan";
    ?>
</body>
</html>