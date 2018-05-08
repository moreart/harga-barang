<h2>Formulir Update Data</h2>
<hr>
<?php
include "koneksi.php";

$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->getKoneksi();

if($koneksi->connect_error) {
    echo "Gagal koneksi : " . $koneksi->connect_error;
}

$query = "select * from stok_barang where kode='" . 
    $_GET["kode"] . "'";
$data = $koneksi->query($query);
$namaBarang = "";
$stok = "";
if($data->num_rows <= 0) {
    echo "Mas/Mba, kalo isi data sesuai prosedur yah!";
} else {
    while($row = $data->fetch_assoc()) {
        $namaBarang = $row["nama_barang"];
        $stok = $row["stok"];
    }
}
?>
<form action="update.php" method="post">
    <table>
        <tr>
            <td>KODE </td>
            <td>: <input type="text" name="kode" readonly="true"
                value=<?php echo $_GET["kode"]; ?> ></td>
        </tr>
        <tr>
            <td>NAMA BARANG</td> 
            <td>: <input type="text" name="namaBarang" 
                value=<?php echo $namaBarang; ?>></td>
        </tr>
        <tr>
            <td>STOK</td>
            <td> : <input type="text" name="stok"
                value=<?php echo $stok; ?>></td>
        </tr>
    </table>
    <input type="submit" value="Simpan">
</form>