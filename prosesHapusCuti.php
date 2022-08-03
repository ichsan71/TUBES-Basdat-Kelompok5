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
        <title>Hapus Data Cuti</title>
    </head>
    <body>
        <h1>Hapus Data Cuti</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewCuti.php">View Cuti</a></li>
    </ul>
       
<?php
    if (isset($_POST["TblHapus"])) {
    $db = dbConnect();
    if ($db->connect_errno == 0){
        $kode_cuti = $db->escape_string($_POST["kode_cuti"]);

        $sql      = "DELETE FROM cuti WHERE kode_cuti='$kode_cuti'";

        $res      = $db->query($sql);
        if ($res) {
            if ($db->affected_rows > 0) 
                echo "<br><font size=6>Data berhasil dihapus.<br>";
            else 
                echo "<br><font size=6>Penghapusan gagal karena data yang dihapus tidak ada.<br>";
        }
            else {
                echo "<br><font size=6>Data gagal dihapus . <br>";
            }
?>
         <br><a href="viewCuti.php"><font size="3"><button>View Cuti</button></font></a>
<?php
    } else 
        echo "Gagal Koneksi" . (DEVELOPMENT ? " : " . $db->connect_error : "") . "<br>";
}
?>    
</body>  
</html>