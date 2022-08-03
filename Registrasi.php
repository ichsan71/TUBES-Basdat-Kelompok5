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

input{
    width: calc(100% - 20px);
    padding: 5px 5px;
    margin-bottom: 2px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #2979ff;
    color: #fff;
    font-size: 15px;  
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
    <title>Registrasi</title>    
</head>
<body>
    <h1>Registrasi</h1>
    <form method="post" name="frm" action="simpanKaryawan.php">        
    <table border="0"> 
    <tr><td>Id Karyawan</td> 
        <td><input type="text" name="id_karyawan" size="50" maxlength="50"></td></tr> 

    <tr><td>NamaKaryawan</td> 
        <td><input type="text" name="nama" size="50" maxlength="50"></td></tr> 

    <tr><td>KodeGolongan
        <td><input type="text" name="kode_golongan" size="50" maxlength="50"></td></tr> 

    <tr><td>Telepon</td> 
        <td><input type="text" name="No_Telepon" size="50" maxlength="50"></td></tr> 

    <tr><td>Alamat</td> 
        <td><input type="text" name="alamat" size="50" maxlength="50"></td></tr> 
    
    <tr><td>Password</td>
        <td><input type ="password" name="Pass" size="50" maxlength="50"></td></tr>
</table> 
        <button input type="submit" name="TblSimpan">Simpan</button> 

</form> 
</body> 
</html>
