
	<option value="">-- Pilih Mata Pelajaran --</option>
	
<?php
require("../mainconfig.php");

if (isset($_POST['jurusan'])) {
	$jurusan = $_POST["jurusan"];

	$sql = "SELECT mapel.id,mapel.mapel FROM mapping_mapel,mapel WHERE mapping_mapel.mapel_id=mapel.id AND mapping_mapel.jurusan_id='$jurusan' ORDER BY mapel.id ASC";
	$hasil = mysqli_query($db, $sql);
	while ($data = mysqli_fetch_array($hasil)) {
	?>
		<option value="<?php echo  $data['id']; ?>"><?php echo $data['mapel']; ?></option>
<?php
	}
} 