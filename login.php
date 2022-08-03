<?php include_once("function.php");?>
    <?php
        $db = dbConnect();
            if ($db->connect_errno == 0) {
            if (isset($_POST["TblLogin"])) {
    $id_karyawan = $db->escape_string($_POST["id_karyawan"]);
    $password = $db->escape_string($_POST["Pass"]);
    $sql = "SELECT id_karyawan,nama,kode_golongan,No_Telepon,alamat FROM karyawan
                WHERE id_karyawan='$id_karyawan' and Pass='$password'";
    $res = $db->query($sql);
    if ($res) {
    if ($res->num_rows == 1) {
    $data = $res->fetch_assoc();
    session_start();
        $_SESSION["id_karyawan"] = $data["id_karyawan"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["kode_golongan"] = $data["kode_golongan"];
        $_SESSION["No_Telepon"] = $data["No_Telepon"];
        $_SESSION["alamat"] = $data["alamat"];
    header("Location: index-admin.php");
} else
    header("Location: index.php?error=1");
}
} else
    header("Location: index.php?error=2");
} else
    header("Location: index.php?error=3");
?>