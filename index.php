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
.container{
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    padding: 20px 25px;
    width: 300px;

    background-color: rgba(0,0,0,.7);
    box-shadow: 0 0 10px rgba(255,255,255,.3);}

.container h1{
    text-align: left;
    color: #fafafa;
    margin-bottom: 30px;
    text-transform: uppercase;
    border-bottom: 4px solid #2979ff;
}

.container label{
    text-align: left;
    color: #90caf9;
}

.container form input{
    width: calc(100% - 20px);
    padding: 8px 10px;
    margin-bottom: 15px;
    border: none;
    background-color: transparent;
    border-bottom: 2px solid #2979ff;
    color: #fff;
    font-size: 20px;
}

.container form button{
    width: 100%;
    padding: 5px 0;
    border: none;
    background-color:#2979ff;
    font-size: 18px;
    color: #fafafa;
}

</style>

            <title>Login</title>
        </head>
        <?php
    if(isset($_GET["error"])){
        $error=$_GET["error"];
    if($error==1)
        showError("IdKaryawan dan password tidak sesuai.");
    else if($error==2)
        showError("Error database. Silahkan hubungi administrator");
    else if($error==3)
        showError("Koneksi ke Database gagal. Autentikasi gagal.");
    else if($error==4)
        showError("Anda tidak boleh mengakses halaman sebelumnya karena belum login. Silahkan
    login terlebih dahulu.");
        else
    showError("Unknown Error.");
    }
?>
    <body>
    <div class="container">
    <form method="post" name="f" action="login.php">
    <h1>Login</h1>
        <label>IdKaryawan<label><br>
            <input type="text" name="id_karyawan" maxlength="25" size="25"><br>

        <label>Password</label><br>
            <input type="password" name="Pass" maxlength="25" size="25"><br>

        <button input type="submit" name="TblLogin">Log in </button><br>
        <br><a href="Registrasi.php">Registrasi
</table>
</form>
</body>
</html>