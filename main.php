<h2>Aplikasi Stok Barang</h2>
<hr>
<a href="input.php">Tambah Data</a>
<table border="1">
    <tr>
        <th>KODE</th>
        <th>NAMA BARANG</th>
        <th>STOK</th>
    </tr>
    
    <?php
include "koneksi.php";

$koneksiObj = new Koneksi();
$koneksi = $koneksiObj->getKoneksi();

if($koneksi->connect_error) {
    echo "<tr><td>";
    echo "Gagal koneksi : " . $koneksi->connect_error;
    echo "</td></tr>";
} //else {
//    echo "<tr><td>";
//    echo "Sambungan basis data berhasil";
//    echo "</td></tr>";
//}

$query = "select * from stok_barang";
$data = $koneksi->query($query);
if($data->num_rows <= 0) {
    echo "<tr><td>";
    echo "DATA NIHIL";
    echo "</td></tr>";
} else {
    while($row = $data->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["kode"] . "</td>";
        echo "<td>" . $row["nama_barang"] . "</td>";
        echo "<td>" . $row["stok"] . "</td>";
        echo '<td><a href="form-edit.php?kode=' . 
            $row["kode"] . '">Edit</a></td>';
        echo '<td><a href="hapus.php?kode=' . 
            $row["kode"] . '">Hapus</a></td>';
        echo "</tr>";
    }
}
    ?>
</table>