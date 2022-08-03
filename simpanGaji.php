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
      <title>Penyimpanan Data Gaji</title></head>
<body>  
        <h1>Penyimpanan Data Gaji</h1> 
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewGaji.php">View Gaji</a></li>
</ul>
<?php 
    if(isset($_POST["TblSimpan"])){
      $db=dbConnect(); 
    if($db->connect_errno==0){ 

    //Bersihkan Data
      $kode_gaji           = $db->escape_string($_POST['kode_gaji']);
      $id_karyawan         = $db->escape_string($_POST['id_karyawan']);
      $tanggal             = $db->escape_string($_POST['tanggal']);      
      $jumlah_gaji         = $db->escape_string($_POST['jumlah_gaji']);
      $potongan            = $db->escape_string($_POST['potongan']);
      $total_gaji_diterima = $db->escape_string($_POST['total_gaji_diterima']);

    // Susun query insert 
    $sql="INSERT INTO gaji(kode_gaji, id_karyawan, tanggal, jumlah_gaji, potongan, total_gaji_diterima )  
          VALUES(?,?,?,?,?,?)"; 
 
    // Eksekusi query insert 
    if($stmt=$db->prepare($sql)){ // Jika prepared sukses 
      $stmt->bind_param("sssiii",$_POST["kode_gaji"],$_POST["id_karyawan"],$_POST["tanggal"],$_POST["jumlah_gaji"],$_POST["potongan"],$_POST["total_gaji_diterima"]); 
      if($stmt->execute()){ 
        if($db->affected_rows>0){ // jika ada penambahan data 
          ?> 
           <br><font size="6">Data berhasil Disimpan<br><br></font>
                  <a href="viewGaji.php"><font size="3"><button>View Gaji</button></font></a>
          <?php
        }
      }
      else{
        ?>
        <br><font size="6">Data gagal disimpan karena kode_gaji mungkin sudah ada.<br><br></font>
        <a href="javascript:history.back()"><font size="3"><button>Kembali</button></a></font>
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