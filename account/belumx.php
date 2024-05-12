<?php
require("mainconfig.php");
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data yang belum.xls");
?>
<html>
<head>
	<title></title>
</head>
<body>
	<style type="text/css">
	body{
		font-family: sans-serif;
	}
	table{
		margin: 20px auto;
		border-collapse: collapse;
	}
	table th,
	table td{
		border: 1px solid #3c3c3c;
		padding: 3px 8px;
 
	}
	a{
		background: blue;
		color: #fff;
		padding: 8px 10px;
		text-decoration: none;
		border-radius: 2px;
	}
	</style>
 
	<table border="1">
	                                <tr>
									    <th>No</th>
										<th>Nama</th>
										<th>NIS</th>
										<th>Kelas</th>
										<th>Kendala</th>
									</tr>
		                            <?php
									$no = 1;
                                    $check_absen = mysqli_query($db, "SELECT * FROM users WHERE email = '' AND siswa = 'Yes' ORDER BY kelas,nama ASC");
									$records_per_page = 10;
									$starting_position = 1;
									while ($data_absen = mysqli_fetch_array($check_absen)) {
									?>
										<tr>
										    <td><?php echo $no++; ?></td>
											<td><?php echo $data_absen['nama']; ?></td>
											<td><?php echo $data_absen['nis']; ?></td>
											<td><?php echo $data_absen['kelas']; ?></td>
											<td></td>
										</tr>
									<?php
									}
									?>
	</table>
</body>
</html>