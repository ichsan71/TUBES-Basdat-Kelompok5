<?php include_once("function.php");?>
<!DOCTYPE html>
    <html>
        <head>
            <title>Penyimpanan Data Karyawan</title>
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
<h1>Penyimpanan Data Karyawan</h1>
<ul>
        <li><a href="login.php">Login</a></li>
</ul>

<?php
  if(isset($_POST["TblSimpan"])){
      $db=dbConnect();
        if($db->connect_errno==0){

 // Susun query insert
        $sql="INSERT INTO karyawan(id_karyawan,nama,kode_golongan,No_Telepon, alamat,Pass)
                    VALUES(?,?,?,?,?,?)";
    // Eksekusi query insert
       if($stmt=$db->prepare($sql)){ // Jika prepared sukses
          $stmt->bind_param("ssssss",$_POST["id_karyawan"],$_POST["nama"],
                            $_POST["kode_golongan"],$_POST["No_Telepon"],$_POST["alamat"],$_POST["Pass"]);
        if($stmt->execute()){
          if($db->affected_rows>0){ // jika ada penambahan data
          ?>
              <br><font size="6">Data berhasil Disimpan<br><br></font>
          <?php
        }
      }
      else{
        ?>
        <br><font size="6">Data gagal disimpan karena id_karyawan mungkin sudah ada.<br><br></font>
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
