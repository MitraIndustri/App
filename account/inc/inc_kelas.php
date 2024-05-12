
		<option value="">-- Pilih Kelas --</option>

<?php
require("../mainconfig.php");

if (isset($_POST['jurusan'])) {
	$jurusan = $_POST["jurusan"];

	$sql = "SELECT * FROM kelas WHERE jurusan_id='$jurusan' ORDER BY id ASC";
	$hasil = mysqli_query($db, $sql);
	while ($data = mysqli_fetch_array($hasil)) {
?>
		<option value="<?php echo  $data['id']; ?>"><?php echo $data['nama_kelas']; ?></option>
<?php
	}
} 
