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
      <title>Penyimpanan Data Cuti</title></head> 
<body>  
        <h1>Penyimpanan Data Cuti</h1> 
<ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewCuti.php">View Cuti</a></li>
</ul>
       
<?php 
    if(isset($_POST["TblSimpan"])){
      $db=dbConnect(); 
    if($db->connect_errno==0){ 

    //Bersihkan Data
      $kode_cuti   = $db->escape_string($_POST['kode_cuti']);
      $id_karyawan   = $db->escape_string($_POST['id_karyawan']);
      $tanggal_cuti  = $db->escape_string($_POST['tanggal_cuti']);
      $jumlah_cuti = $db->escape_string($_POST['jumlah_cuti']);

    // Susun query insert 
    $sql="INSERT INTO cuti(kode_cuti, id_karyawan, tanggal_cuti, jumlah_cuti )  
          VALUES(?,?,?,?)"; 
 
    // Eksekusi query insert 
      if($stmt=$db->prepare($sql)){ // Jika prepared sukses 
      $stmt->bind_param("sssi",$_POST["kode_cuti"],$_POST["id_karyawan"],$_POST["tanggal_cuti"],$_POST["jumlah_cuti"]); 
      if($stmt->execute()){ 
        if($db->affected_rows>0){ // jika ada penambahan data 
          ?> 
                <br><font size="6">Data berhasil Disimpan<br><br></font>
                  <a href="viewCuti.php"><font size="3"><button>View Cuti</button></font></a>
          <?php
        }
      }
      else{
        ?>
        <br><font size="6">Data gagal disimpan karena kode_cuti mungkin sudah ada.<br><br></font>
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