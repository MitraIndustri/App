<?php
session_start();
require("mainconfig.php");

if (isset($_SESSION['user'])) {
	$sess_username = $_SESSION['user']['username'];

	$check_user = mysqli_query($db, "SELECT * FROM users WHERE username = '$sess_username'");
	$data_user = mysqli_fetch_assoc($check_user);
	if (mysqli_num_rows($check_user) == 0) {
		header("Location: " . $cfg_baseurl . "logout.php");
	} else if ($data_user['status'] == "Suspended") {
		header("Location: " . $cfg_baseurl . "logout.php");
	} else if ($data_user["guru"] != "Yes") {
		header("Location: " . $cfg_baseurl);
	} else {
    
    $count = mysqli_num_rows(mysqli_query($db, "SELECT * FROM users WHERE email = '' AND siswa = 'Yes'"));
    	
		include("lib/header.php");
?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card">
					<div class="card-header"><a target="_blank" href="belumx.php" class="btn btn-success shadow-primary btn-round px-5"><i class="icon-lock"></i> Export to Xls</a> <a class="btn btn-primary shadow-primary btn-round px-5">Jumlah Siswa : <?php echo $count; ?></a></div>
					<div class="card-body">
						<div class="col-md-6">
						</div>
						<div class="clearfix"></div>
						<br />
											<div class="table-responsive">
											<table id="data-table-1" class="table table-hover w-100">
								<thead>
									<tr>
									    <th>No</th>
										<th>Nama</th>
										<th>NIS</th>
										<th>Kelas</th>
									</tr>
								</thead>
								<tbody>
									<?php
									$no = 1;
                                    $check = mysqli_query($db, "SELECT * FROM users WHERE email = '' AND siswa = 'Yes' ORDER BY kelas,nama ASC");
									$records_per_page = 10;
									$starting_position = 1;
									while ($data = mysqli_fetch_array($check)) {
									?>
										<tr>
										    <td><?php echo $no++; ?></td>
											<td><?php echo $data['nama']; ?></td>
											<td><?php echo $data['nis']; ?></td>
											<td><?php echo $data['kelas']; ?></td>
										</tr>
									<?php
									}
									?>
								</tbody>
							</table>
						</div>
						<br />
					</div>
				</div>
			</div>
		</div>

<?php
		include("lib/footer.php");
	}
} else {
	header("Location: " . $cfg_baseurl);
}
?>