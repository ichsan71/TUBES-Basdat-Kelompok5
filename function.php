<?php
    define("DEVELOPMENT", TRUE); // menyatakan situs masih dalam pengambangan
        function dbConnect()
    {
        $db = new mysqli("localhost", "root", "", "db_karyawan");
            return $db;
    }

// getListKategori digunakan untuk mengambil seluruh data dari tabel Dokter
function getListKaryawan()
    {
        $db = dbConnect();
             if ($db->connect_errno == 0) {
                $res = $db->query("SELECT * FROM karyawan ORDER BY id_karyawan");
            if ($res) {
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                         $res->free();
         return $data;
    } else
        return FALSE;
    } else
        return FALSE; 
    }

function getdatakaryawan($id_karyawan) 
    { 
        $db = dbConnect(); 
            if ($db->connect_errno == 0) { 
                    $res = $db->query ("SELECT k.id_karyawan, k.nama, k.kode_golongan, k.No_Telepon, k.alamat
                     FROM karyawan k JOIN golongan g ON k.kode_golongan=g.kode_golongan WHERE k.id_karyawan='$id_karyawan'");
        if ($res) { 
            if ($res->num_rows > 0) { 
                $data = $res->fetch_assoc(); 
            $res->free(); 
    return $data; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
} 

// getListGolongan digunakan untuk mengambil seluruh data dari tabel golongan
    function getListGolongan()
    {
        $db = dbConnect();
            if ($db->connect_errno == 0) {
        $res = $db->query("SELECT * FROM golongan ORDER BY kode_golongan");
            if ($res) {
        $data = $res->fetch_all(MYSQLI_ASSOC);
        $res->free();
    return $data;
} else
    return FALSE;
} else
    return FALSE; 
}

function getdatagolongan($kode_golongan)
{
    $db = dbConnect();
        if ($db->connect_errno == 0) {
    $res = $db->query("SELECT * FROM golongan WHERE kode_golongan = '$kode_golongan'");
        if ($res) {
        if ($res->num_rows > 0) {
$datagolongan = $res->fetch_assoc();
$res->free();
    return $datagolongan;
} else
    return FALSE;
} else
    return FALSE;
} else
    return FALSE;
}

// getListKategori digunakan untuk mengambil seluruh data dari tabel Dokter
function getListCuti()
    {
        $db = dbConnect();
             if ($db->connect_errno == 0) {
                $res = $db->query("SELECT * FROM cuti ORDER BY kode_cuti");
            if ($res) {
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                         $res->free();
         return $data;
    } else
        return FALSE;
    } else
        return FALSE; 
    }

function getDataCuti($kode_cuti) 
    { 
        $db = dbConnect(); 
            if ($db->connect_errno == 0) { 
                    $res = $db->query ("SELECT c.kode_cuti, c.id_karyawan, c.tanggal_cuti, c.jumlah_cuti
                     FROM cuti c JOIN karyawan k ON c.id_karyawan=k.id_karyawan WHERE c.kode_cuti='$kode_cuti'");
        if ($res) { 
            if ($res->num_rows > 0) { 
                $data = $res->fetch_assoc(); 
            $res->free(); 
    return $data; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
} 

// getListKategori digunakan untuk mengambil seluruh data dari tabel Dokter
function getListGaji()
    {
        $db = dbConnect();
             if ($db->connect_errno == 0) {
                $res = $db->query("SELECT * FROM gaji ORDER BY kode_gaji");
            if ($res) {
                    $data = $res->fetch_all(MYSQLI_ASSOC);
                         $res->free();
         return $data;
    } else
        return FALSE;
    } else
        return FALSE; 
    }

function getDataGaji($kode_gaji) 
    { 
        $db = dbConnect(); 
            if ($db->connect_errno == 0) { 
                    $res = $db->query ("SELECT g.kode_gaji, g.id_karyawan, g.tanggal, g.jumlah_gaji, g.potongan, g.total_gaji_diterima
                     FROM gaji g JOIN karyawan k ON g.id_karyawan=k.id_karyawan WHERE g.kode_gaji='$kode_gaji'");
        if ($res) { 
            if ($res->num_rows > 0) { 
                $data = $res->fetch_assoc(); 
            $res->free(); 
    return $data; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
        } else 
    return FALSE; 
} 


function banner(){
    ?>
    <center>
  <div id="banner"><h1>PT.SEHAT SEJAHTERA</h1></center>
  </div>
    <?php
}

function navigator(){
    ?>
  <div id="navigator">
      <ul>
        <li><a href="tambahKaryawan.php">Data Karyawan</a></li>
        <li><a href="tambahGolongan.php">Data Golongan</a></li> 
        <li><a href="tambahGaji.php">Data Gaji</a></li> 
        <li><a href="tambahCuti.php">Data Cuti</a></li> 
        <li><a href="logout.php">Logout</a></li>    
       </ul>    
  </div>
    <?php
  }

  function showError($message){
    ?>
  <div style="background-color:#FAEBD7;padding:10px;border:1px solid red;margin:15px 0px">
  <?php echo $message;?>
  </div>
    <?php
  }
  function navigator1(){
    ?>
  <div id="navigator">
      <ul>
        <li><a href="tambahKaryawanphp">Karyawan</a></li>
        <li><a href="tambahGolongan.php">Golongan</a></li> 
        <li><a href="tambahCuti.php">Cuti</a></li> 
        <li><a href="tambahGaji.php">Gaji</a></li> 
        <li><a href="logout.php">Logout</a></li>    
       </ul>    
  </div>
    <?php
  }

  