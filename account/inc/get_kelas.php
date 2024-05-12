<option value="">-- Pilih Mata Pelajaran --</option>
<?php
require("../mainconfig.php");
if (isset($_POST['jurusan'])) {
    $jurusan = $_POST["jurusan"];

    $sql = "SELECT mapel.id,mapel.mapel FROM mapel,mapping_mapel WHERE mapel.id=mapping_mapel.mapel_id AND mapping_mapel.jurusan_id='$jurusan' ORDER BY mapel.id ASC";
    $hasil = mysqli_query($db, $sql);
    while ($data = mysqli_fetch_assoc($hasil)) {
?>
        
        <option value="<?php echo  $data['id']; ?>"><?php echo $data['mapel']; ?></option>
<?php
    }
}
