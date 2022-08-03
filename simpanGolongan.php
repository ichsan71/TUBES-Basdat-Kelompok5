<?php include_once("function.php");?> 
<html> 
    <head><title>Penyimpanan Data Golongan</title>
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
                font-family:'Times New Roman';
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
        <h1>Penyimpanan Data Golongan</h1> 
        <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGolongan.php">View Golongan</a></li>
</ul>
<?php 
    if(isset($_POST["TblSimpan"])){
      $db=dbConnect(); 
    if($db->connect_errno==0){ 
    //Bersihkan Data
      $kode_golongan   = $db->escape_string($_POST['kode_golongan']);
      $nama_golongan   = $db->escape_string($_POST['nama_golongan']);
      $tunjangan_istri = $db->escape_string($_POST['tunjangan_istri']);
      $tunjangan_anak  = $db->escape_string($_POST['tunjangan_anak']);
      $gaji_pokok      = $db->escape_string($_POST['gaji_pokok']);
      
 
    // Susun query insert 
    $sql="INSERT INTO golongan(kode_golongan, nama_golongan, tunjangan_istri, tunjangan_anak, gaji_pokok)  
          VALUES(?,?,?,?,?)"; 
 
    // Eksekusi query insert 
    if($stmt=$db->prepare($sql)){ // Jika prepared sukses 
      $stmt->bind_param("ssiii",$_POST["kode_golongan"],$_POST["nama_golongan"],$_POST["tunjangan_istri"],$_POST["tunjangan_anak"],$_POST["gaji_pokok"]); 
      if($stmt->execute()){ 
        if($db->affected_rows>0){ // jika ada penambahan data 
          ?> 
          <br><font size="6">Data berhasil Disimpan<br><br></font>
                  <a href="viewGolongan.php"><font size="3"><button>View Golongan</button></font></a>
          <?php 
        } 
      } 
      else{ 
        ?> 
        Data gagal disimpan karena Kode Golongan mungkin sudah ada.<br> 
        <a href="javascript:history.back()"><button>Kembali</button></a> 
        <?php 
      } 
    } 
    else 
      echo "Query Error : ".(DEVELOPMENT?" : ".$db->error:"")."<br>"; 
  } 
  else 
    echo "Gagal koneksi".(DEVELOPMENT?" : ".$db->connect_error:"")."<br>"; 
} 
?> 
</body> 
</html>