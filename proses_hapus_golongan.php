<?php include_once("function.php"); ?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Hapus Data Karyawan</title>
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
            <h1>Hapus Data Golongan</h1>
            <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGolongan.php">View Golongan</a></li>
</ul>
<?php
         if (isset($_POST["TblHapus"])) {
                $db = dbConnect();
        if ($db->connect_errno == 0) {
                $kode_golongan= $db->escape_string($_POST["kode_golongan"]);

// Susun query delete
        $sql = "DELETE FROM golongan WHERE kode_golongan='$kode_golongan'";
// Eksekusi query delete
        $res = $db->query($sql);
            if ($res) {
                if ($db->affected_rows > 0) // jika ada data terhapus
                        echo "<br><font size=6> Data berhasil dihapus.<br>";
                                else // Jika sql sukses tapi tidak ada data yang dihapus
                                        echo "<br><font size=6>Penghapusan gagal karena data yang dihapus tidak ada.<br>";
    } else { // gagal query
                                echo "<br><font size=6>Data gagal dihapus. <br>";
}
?>
                <a href="viewGolongan.php"><font size="3"><button>View Golongan</button></a>
<?php
    } else
                echo "Gagal koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
    }
?>
</body>
    </html>
