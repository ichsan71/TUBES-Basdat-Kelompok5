<?php include_once("function.php");?>
  <!DOCTYPE html>
    <html>
      <head>
        <title>Pembaruan Data Nota</title>
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
     
<body>
    <h1>Pembaruan Data Karyawan</h1>
    <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewKaryawan.php">View Karyawan</a></li>
</ul>
<?php
    if(isset($_POST["TblUpdate"])){
        $db=dbConnect();
            if($db->connect_errno==0){

// Susun query update
      $sql="UPDATE karyawan SET nama=?, kode_golongan=?, No_Telepon=?, alamat=? WHERE id_karyawan=?";
// Eksekusi query update
    if($stmt=$db->prepare($sql)){
      $stmt->bind_param("sssss",$_POST["nama"],
         $_POST["kode_golongan"],$_POST["No_Telepon"], $_POST["alamat"], $_POST["id_karyawan"]);
    if($stmt->execute()){
        if($db->affected_rows>0){ // jika ada update data
          ?>
            <br><font size="6">Data berhasil diupdate<br><br></font>
          <?php
        }
        else{ // Jika sql sukses tapi tidak ada data yang berubah
          ?>
          <br><font size="6">Data berhasil diupdate tetapi tanpa ada perubahan data.<br><br></font>
            <a href="javascript:history.back()"><button><font size="3">Edit Kembali</button></font></a>
          <?php
        }
      }
      else{ // gagal query
        ?>
        <br><font size="6">Data gagal diupdate.<br><br></font>
        
        <a href="javascript:history.back()"><button><font size="3">Edit Kembali</button></font></a>
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

