<?php 
    session_start();
        if (!isset($_SESSION["id_karyawan"]))
    header("Location: index.php?error=4");
?>
<?php include_once("function.php"); ?>
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
                color: blue;
                font-family: 'Cambria';
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

        <title>Pengelolaan Data</title></head>
        <?php banner(); ?>
    <body>
  <ul>
        <li><a href="index-admin.php">Home</a></li>
        <li><a href="viewKaryawan.php">Karyawan</a></li>
        <li class="dropdown">
        <a href="#" class="dropbtn">Input</a>
  <div class="dropdown-content">
        <a href="tambahGolongan.php">Golongan</a>
        <a href="tambahCuti.php">Cuti</a>
        <a href="tambahGaji.php">Gaji</a>
        <li><a href="logout.php">Logout</a></li>
  </div>
      </li>
  </ul>
</body>
        <center>
    <h1>Menu Utama</h1>
    <br>
       <p> Selamat Datang <?php echo $_SESSION["nama"];?><br>
            Silahkan pilih aktivitas yang ingin ada lakukan dengan mengklik menu yang ada.</p>
</br>
        </center>
</body>
</html