<?php
$title = "Admin";
include("layout/header.php");
$_SESSION['role'] != 1 ? pindahko("/") : "";
$data = $_SESSION['data']['dataPjb'];
$dataBidang = $_SESSION['data']['dataBidang'];
$dataUser = $_SESSION['data']['dataUser'];

// UNTUK PAGINATION START
$page = $_GET['p'] ?? 1;
$limit = 8;
$offset = ($page - 1) * $limit;
$total_data = count($data);
$total_pages = ceil($total_data / $limit);
$total_number = 2;
$start_number = ($page > $total_number) ? ($page - $total_number) : 1;
$end_number = ($page < ($total_pages - $total_number)) ? ($page + $total_number) : $total_pages;
// JIKA OVERFLOW, KE LAST PAGE
if ($page > $total_pages) {
	$_GET['p'] = $total_pages;
	pindahko("?" . http_build_query($_GET));
}
$data = array_slice($data, $offset, $limit);
// UNTUK PAGINATION END

// print_r($_SESSION['data']['dataUser']);
?>

<!-- MODAL SLIDER -->
<div class="modal fade" id="slider_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Pengaturan Gambar Slider</h5>
				</div>
				<!-- ISI MODAL START HERE -->
				<div class="modal-body">
					<div class="px-3 text-center">

						<!-- THUMBNAIL VIEWER -->
						<div class="mb-1 row d-block text-center coba">
							<div class="col-sm-2 d-inline-block rounded p-0">
								<img class="align-top" src="img/slide1.jpg" alt="">
							</div>
							<div class="col-sm-2 d-inline-block rounded p-0">
								<img class="align-top" src="img/slide2.jpg" alt="">
							</div>
							<div class="col-sm-2 d-inline-block rounded p-0">
								<img class="align-top" src="img/slide3.jpg" alt="">
							</div>
							<div class="col-sm-2 d-inline-block rounded p-0">
								<img class="align-top" src="img/slide4.jpg" alt="">
							</div>
							<div class="col-sm-2 d-inline-block rounded p-0">
								<img class="align-top" src="img/slide5.jpg" alt="">
							</div>
						</div>
						<div class="row d-block text-center">
							<div class="col-sm-2 d-inline-block">
								<input class="form-control d-none" type="file" name="slider_1" id="slider_1" accept="image/*">
								<label for="slider_1" class="btn btn-sm btn-primary">Ganti</label>
							</div>
							<div class="col-sm-2 d-inline-block">
								<input class="form-control d-none" type="file" name="slider_2" id="slider_2" accept="image/*">
								<label for="slider_2" class="btn btn-sm btn-primary">Ganti</label>
							</div>
							<div class="col-sm-2 d-inline-block">
								<input class="form-control d-none" type="file" name="slider_3" id="slider_3" accept="image/*">
								<label for="slider_3" class="btn btn-sm btn-primary">Ganti</label>
							</div>
							<div class="col-sm-2 d-inline-block">
								<input class="form-control d-none" type="file" name="slider_4" id="slider_4" accept="image/*">
								<label for="slider_4" class="btn btn-sm btn-primary">Ganti</label>
							</div>
							<div class="col-sm-2 d-inline-block">
								<input class="form-control d-none" type="file" name="slider_5" id="slider_5" accept="image/*">
								<label for="slider_5" class="btn btn-sm btn-primary">Ganti</label>
							</div>
						</div>
						<i class="text-muted mt-3 d-block">Recommended image ratio: 1625 x 900 pixel (65:36)</i>

					</div>
				</div>
				<!-- ISI MODAL END HERE -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL TAMBAH PEJABAT -->
<div class="modal fade" id="modalTambahPejabat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" id="formTambahPejabat">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus-fill"></i> Tambah Pejabat</h5>
				</div>
				<div class="modal-body">
					<!-- ISI MODAL START HERE -->


					<div class="row px-4">

						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="pengguna_pjb"><i>Username</i></label>
								<input name="username" id="pengguna_pjb" type="text" class="form-control" placeholder="Nama pengguna" required>
								<div class="mt-1">
									<small class="text-danger"><i>Hanya huruf kecil dan angka, diawali dengan huruf</i></small>
								</div>
							</div>
						</div>
						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="pass_pjb_1"><i>Password</i></label>
								<input name="password" id="pass_pjb_1" type="password" class="form-control pass" placeholder="Kata Sandi" required>
								<div class="mt-1">
									<small class="text-danger"><i>Disarankan paduan huruf, angka dan/atau simbol</i></small>
								</div>
							</div>
						</div>

						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="nama_pjb">Nama Lengkap</label>
								<input name="nama" id="nama_pjb" type="text" class="form-control" placeholder="Nama Lengkap" required>
							</div>
						</div>
						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="nip_pjb">NIP / NIK</label>
								<input name="nip" id="nip_pjb" type="text" class="form-control" placeholder="NIP/NIK" required>
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="foto_pjb">Foto Profil</label>
								<input name="foto" id="foto_pjb" type="file" class="form-control" accept=".png,.jpg,.jpeg" required>
								<div class="mt-1">
									<small class="text-danger">
										<i>Disarankan rasio 1:1 (persegi)</i>
									</small>
								</div>
							</div>
						</div>

						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="mb-1" for="hp_pjb">Nomor HP</label>
								<input name="nohp" id="hp_pjb" type="text" class="form-control" placeholder="Nomor Handphone" required>
							</div>
						</div>
						<div class="col-6 mb-3">
							<div class="form-group">
								<label class="mb-1" for="alamat_pjb">Alamat</label>
								<input name="alamat" id="alamat_pjb" type="text" class="form-control" placeholder="Alamat Lengkap" required>
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="bid">Bagian</label>
								<select id="bid" class="form-select" name="bidang" required>
									<option value="" selected></option>
									<?php foreach ($dataBidang as $val) { ?>
										<option value="<?= $val[0] ?>"><?= $val[1] ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<div class="col-12 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="subbid">Sub-Bagian</label>
								<select id="subbid" class="form-select" name="subbidang" disabled>
									<option value="" selected></option>
									<?php
									foreach ($dataBidang as $val) {
										if ($val[3] == "") {
											continue;
										}
									?>
										<option value="<?= $val[2] ?>"><?= $val[3] ?></option>
									<?php

									}
									?>
								</select>
							</div>
						</div>

						<div class="col-12 mb-3">
							<div class="form-group">
								<label class="required-field mb-1" for="jabat">Jabatan</label>
								<select id="jabat" class="form-select" name="jabatan" disabled required>
									<option value="" selected></option>
									<option value="jp">PENGELOLA</option>
									<option value="jb">BENDAHARA</option>
								</select>
							</div>
						</div>

						<!-- <div class="mb-3 row">
							<label class="col-sm-3 col-form-label"><i>Username &amp; Password</i></label>
							<div class="col">
								<input name="pengguna_pjb" type="text" class="form-control" placeholder="Nama pengguna" required>
								<div class="mt-1">
									<small class="text-danger"><i>Hanya huruf kecil dan angka, diawali dengan huruf</i></small>
								</div>
							</div>
							<div class="col">
								<input name="pass_pjb_1" type="password" class="form-control pass" placeholder="Kata Sandi" required>
								<div class="mt-1">
									<small class="text-danger"><i>Disarankan paduan huruf, angka dan/atau simbol</i></small>
								</div>
							</div>
						</div> -->

						<!-- <div class="mb-3 row">
							<label class="col-sm-3 col-form-label"><i>Username</i></label>
							<div class="col-sm-9">
								<input name="pengguna_pjb" type="text" class="form-control" required>
							</div>
						</div>
						<div class="mb-3 row">
							<label class="col-sm-3 col-form-label"><i>Password</i></label>
							<div class="col-sm-9">
								<input name="pass_pjb_1" type="password" class="form-control pass" required>
								<div class="mt-1">
									<small class="text-danger"><i>Disarankan paduan huruf, angka dan/atau simbol</i></small>
								</div>
							</div>
						</div> -->

						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">Foto Profil</label>
							<div class="col-9">
								<input name="foto_pjb" type="file" class="form-control" accept=".png,.jpg,.jpeg" required>
								<div class="mt-1">
									<small class="text-danger">
										<i>Disarankan rasio 1:1 (persegi)</i>
									</small>
								</div>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">Nama &amp; NIP/NIK</label>
							<div class="col">
								<input name="nama_pjb" type="text" class="form-control" placeholder="Nama Lengkap" required>
							</div>
							<div class="col">
								<input name="nip_pjb" type="text" class="form-control" placeholder="NIP/NIK" required>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">NIP</label>
							<div class="col-9">
								<input name="nip_pjb" type="text" class="form-control" required>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">Bidang</label>
							<div class="col-9">
								<select id="bid" class="form-select" name="edit_nama_bagian_pengguna" required>
									<option value="" selected></option>
									<?php foreach ($dataBidang as $val) { ?>
										<option value="<?= $val[0] ?>"><?= $val[1] ?></option>
									<?php } ?>
								</select>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">Sub-Bidang</label>
							<div class="col-9">
								<select id="subbid" class="form-select" name="edit_nama_subbagian_pengguna" disabled>
									<option value="" selected></option>
									<?php
									foreach ($dataBidang as $val) {
										if ($val[3] == "") {
											continue;
										}
									?>
										<option value="<?= $val[2] ?>"><?= $val[3] ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">Jabatan</label>
							<div class="col-9">
								<select id="jabat" class="form-select" name="edit_nama_jabatan_pengguna" disabled required>
									<option value="" selected></option>
									<option value="jp">PENGELOLA</option>
								</select>
							</div>
						</div> -->
						<!-- <div class="mb-3 row">
							<label class="col-3 col-form-label">No. HP</label>
							<div class="col-9">
								<input name="hp_pjb" type="text" class="form-control" placeholder="Nomor Handphone" required>
							</div>

						</div>
						<div class="mb-3 row">
							<label class="col-3 col-form-label">Alamat</label>
							<div class="col-9">
								<input name="alamat_pjb" type="text" class="form-control" placeholder="Alamat Lengkap" required>
							</div>
						</div> -->
					</div>
					<!-- ISI MODAL END HERE -->
				</div>
				<div class="modal-footer">
					<button type="submit" name="tambahPejabat" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL TAMBAH PIKET -->
<div class="modal fade" id="modal_tambah_piket" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" id="formTambahPiket">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-person-plus-fill"></i> Tambah Piket</h5>
				</div>
				<div class="modal-body">
					<!-- ISI MODAL START HERE -->
					<div class="px-4">
						<table class="table td-vmiddle">
							<thead>
								<tr>
									<th width="10%">#</th>
									<th width="35%"><i>Username</i></th>
									<th width="35%"><i>Password</i> <i>(Edit Only)</i></th>
									<th width="20%">Pilihan</th>
								</tr>
							</thead>
							<tbody>

								<?php
								$num = 0;
								foreach ($dataUser as $value) {
									if ($value[0] != "" && $value[2] == 2) {
										$num++;
								?>

										<tr>
											<th><?= $num ?></th>
											<td>
												<input id="piket_u_<?= $value[0] ?>" name="piket_u_<?= $value[0] ?>" type="text" class="form-control" required="" value="<?= $value[0] ?>" readonly="readonly">
											</td>
											<td>
												<input id="piket_p_<?= $value[0] ?>" name="piket_p_<?= $value[0] ?>" type="text" class="form-control" required="" readonly="readonly" placeholder="Kata sandi">
											</td>
											<td>
												<button class="btn btn-primary" type="button" id="piket_btn<?= $value[0] ?>">
													<i id="ikon_piket_btn<?= $value[0] ?>" class="bi bi-pencil-square"></i>
												</button>
												<button class="btn btn-danger"><i class="bi bi-trash"></i></button>
											</td>
										</tr>

										<!-- JQUERY PENGATUR INPUT -->
										<script>
											$("#piket_btn<?= $value[0] ?>").click(function() {
												$('#piket_u_<?= $value[0] ?>').attr('readonly', function(index, attr) {
													return attr == 'readonly' ? null : 'readonly';
												});
												$('#piket_p_<?= $value[0] ?>').attr('readonly', function(index, attr) {
													return attr == 'readonly' ? null : 'readonly';
												});
												$('#ikon_piket_btn<?= $value[0] ?>').attr('class', function(index, attr) {
													return attr == 'bi bi-pencil-square' ? 'bi bi-check-lg' : 'bi bi-pencil-square';
												});
												$('#piket_btn<?= $value[0] ?>').attr('class', function(index, attr) {
													return attr == 'btn btn-primary' ? 'btn btn-success' : 'btn btn-primary';
												});
											});
										</script>

								<?php
									}
								}
								?>

								<tr>
									<td>Tambah</td>
									<td><input name="tambah_username_piket" type="text" class="form-control" required></td>
									<td><input name="tambah_password_piket" type="text" class="form-control" required></td>
									<td>
										<button class="col-5 btn btn-success"><i class="bi bi-plus-lg"></i></button>
									</td>
								</tr>

							</tbody>
						</table>
					</div>
					<!-- ISI MODAL END HERE -->
				</div>
				<div class="modal-footer">
					<button type="submit" name="tambah_piket" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL BAGIAN -->
<div class="modal fade" id="modal_bagian_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" id="formTambahBagian">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-tools"></i> Pengaturan Bagian</h5>
				</div>
				<!-- ISI MODAL START HERE -->
				<div class="modal-body px-4">
					<table class="table td-vmiddle">
						<thead>
							<tr>
								<th width="10%">#</th>
								<th width="70%">Nama Bagian</th>
								<th width="30%">Pilihan</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$num = 0;
							foreach ($dataBidang as $value) {
								if ($value[0] != "") {
									$num++;
							?>

									<tr>
										<th><?= $num ?></th>
										<td>
											<input id="bagian_<?= $value[0] ?>" name="bagian_<?= $value[0] ?>" type="text" class="form-control" required="" value="<?= $value[1] ?>" readonly="readonly">
										</td>
										<td>
											<button class="btn btn-primary" type="button" id="tombol_e_<?= $value[0] ?>">
												<i id="ikon_tombol_e_<?= $value[0] ?>" class="bi bi-pencil-square"></i>
											</button>
											<button class="btn btn-danger"><i class="bi bi-trash"></i></button>
										</td>
									</tr>

									<!-- JQUERY PENGATUR INPUT -->
									<script>
										$("#tombol_e_<?= $value[0] ?>").click(function() {
											$('#bagian_<?= $value[0] ?>').attr('readonly', function(index, attr) {
												return attr == 'readonly' ? null : 'readonly';
											});
											$('#ikon_tombol_e_<?= $value[0] ?>').attr('class', function(index, attr) {
												return attr == 'bi bi-pencil-square' ? 'bi bi-check-lg' : 'bi bi-pencil-square';
											});
											$('#tombol_e_<?= $value[0] ?>').attr('class', function(index, attr) {
												return attr == 'btn btn-primary' ? 'btn btn-success' : 'btn btn-primary';
											});
										});
									</script>

							<?php
								}
							}
							?>

							<tr>
								<td>Tambah</td>
								<td><input name="tambah_bagian" type="text" class="form-control" required></td>
								<td>
									<button class="col-5 btn btn-success"><i class="bi bi-plus-lg"></i></button>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
				<!-- ISI MODAL END HERE -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL SUBBAGIAN -->
<div class="modal fade" id="modal_subbagian_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" method="POST" action="">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-tools"></i> Pengaturan Sub-Bagian</h5>
				</div>
				<!-- ISI MODAL START HERE -->
				<div class="modal-body px-4">
					<table class="table td-vmiddle">
						<thead>
							<tr>
								<th width="7%">#</th>
								<th width="40%">Nama Sub-Bagian</th>
								<th width="30%">Bagian</th>
								<th width="23%">Pilihan</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$num = 0;
							foreach ($dataBidang as $value) {
								if ($value[2] != '') {
									$num++;
									$id = $value[2];
									$id_bidang = array_search_multi($dataBidang, 0, substr($value[2], 0, 2), false)[0][0];
							?>
									<tr>
										<th><?= $num ?></th>
										<td>
											<input id="subbagian_<?= $id ?>" name="subbagian_<?= $id ?>" type="text" class="form-control class_subbagian_<?= $id ?>" required="" value="<?= $value[3] ?>" readonly="readonly">
										</td>
										<td>
											<select id="edit_nama_bagian_<?= $id ?>" class="form-select" name="edit_nama_bagian_<?= $id ?>" required disabled="disabled">
												<option value="" selected="">== Pilih jenis bagian ==</option>
												<?php
												foreach ($dataBidang as $val) {
													if ($val[0] != "") {
												?>
														<option value="<?= $val[0] ?>" <?= $val[0] == $id_bidang ? "selected" : "" ?>><?= $val[1] ?></option>
												<?php
													}
												}
												?>
											</select>
										</td>
										<td>
											<button class="btn btn-primary" id="btn_e_subbagian_<?= $id ?>" type="button">
												<i id="btn_i_subbagian_<?= $id ?>" class="bi bi-pencil-square"></i>
											</button>
											<button class="btn btn-danger"><i class="bi bi-trash"></i></button>
										</td>
									</tr>

									<!-- JQUERY PENGATUR INPUT -->
									<script>
										$("#btn_e_subbagian_<?= $id ?>").click(function() {
											$('#subbagian_<?= $id ?>').attr('readonly', function(index, attr) {
												return attr == 'readonly' ? null : 'readonly';
											});
											$('#edit_nama_bagian_<?= $id ?>').attr('disabled', function(index, attr) {
												return attr == 'disabled' ? null : 'disabled';
											});
											$('#btn_i_subbagian_<?= $id ?>').attr('class', function(index, attr) {
												return attr == 'bi bi-pencil-square' ? 'bi bi-check-lg' : 'bi bi-pencil-square';
											});
											$('#btn_e_subbagian_<?= $id ?>').attr('class', function(index, attr) {
												return attr == 'btn btn-primary' ? 'btn btn-success' : 'btn btn-primary';
											});
										});
									</script>

							<?php
								}
							}
							?>

							<tr>
								<td>Tambah</td>
								<td><input name="tambah_subbagian" type="text" class="form-control" required></td>
								<td>
									<select class="form-select" name="tambah_subbagian" required>
										<option value="" selected="">== Pilih jenis bagian ==</option>
										<?php
										foreach ($dataBidang as $val) {
											if ($val[0] != "") {
										?>
												<option value="<?= $val[0] ?>"><?= $val[1] ?></option>
										<?php
											}
										}
										?>
									</select>
								</td>
								<td>
									<button class="col-5 btn btn-success"><i class="bi bi-plus-lg"></i></button>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
				<!-- ISI MODAL END HERE -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MODAL JABATAN -->
<div class="modal fade" id="modal_jabatan_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<form class="m-0 p-0" method="POST" action="">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel"><i class="bi bi-tools"></i> Pengaturan Jabatan</h5>
				</div>
				<!-- ISI MODAL START HERE -->
				<div class="modal-body px-4">
					<table class="table td-vmiddle">
						<thead>
							<tr>
								<th width="8%">#</th>
								<th width="72%">Nama Jabatan</th>
								<th width="20%">Pilihan</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$num = 0;
							foreach ($dataBidang as $value) {
								if ($value[4] != '' && $value[4] != 'kd' && $value[4] != 'sd') {
									$num++;
									$id_j = $value[4];
									$nama_j = $value[5];
							?>

									<tr>
										<th><?= $num ?></th>
										<td>
											<input id="jabatan_<?= $id_j ?>" name="jabatan_<?= $id_j ?>" type="text" class="form-control" required="" value="<?= $nama_j ?>" readonly="readonly">
										</td>
										<td>
											<button class="btn btn-primary col-5" type="button" id="tombol_j_<?= $id_j ?>"><i id="ikon_tombol_j_<?= $id_j ?>" class="bi bi-pencil-square"></i></button>
											<button class="btn btn-danger col-5"><i class="bi bi-trash"></i></button>
										</td>
									</tr>

									<!-- JQUERY PENGATUR INPUT -->
									<script>
										$("#tombol_j_<?= $id_j ?>").click(function() {
											$('#jabatan_<?= $id_j ?>').attr('readonly', function(index, attr) {
												return attr == 'readonly' ? null : 'readonly';
											});
											$('#ikon_tombol_j_<?= $id_j ?>').attr('class', function(index, attr) {
												return attr == 'bi bi-pencil-square' ? 'bi bi-check-lg' : 'bi bi-pencil-square';
											});
											$('#tombol_j_<?= $id_j ?>').attr('class', function(index, attr) {
												return attr == 'btn btn-primary col-5' ? 'btn btn-success col-5' : 'btn btn-primary col-5';
											});
										});
									</script>

							<?php
								}
							}
							?>

							<tr>
								<td>Tambah</td>
								<td><input name="tambah_jabatan" type="text" class="form-control" required></td>
								<td>
									<button class="col-5 btn btn-success"><i class="bi bi-plus-lg"></i></button>
								</td>
							</tr>

						</tbody>
					</table>
				</div>
				<!-- ISI MODAL END HERE -->
				<div class="modal-footer">
					<button type="button" class="btn btn-primary">Simpan</button>
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
				</div>
			</form>
		</div>
	</div>
</div>

<!-- MAIN CONTENT -->
<main>
	<div class="pt-4 pb-3">
		<!-- DAFTAR PEJABAT -->
		<div class="container-sm pb-3">
			<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">

				<?php
				foreach ($data as $value) {
					$id = encrypt_decrypt("e", $value[0]);
				?>

					<div class="col">
						<div class="card shadow-sm">

							<!-- NAMA -->
							<div class="card-header warna-dasar">
								<?= $value[3] ?>
							</div>

							<!-- FOTO -->
							<div class="tunggu" style="height: 310px; overflow: hidden;">
								<img style="cursor:zoom-in; width: 100%; min-height: 310px; min-width: 310px;" src="<?= $value[7] != "" ? $value[7] : "img/p.webp" ?>" data-bs-toggle="modal" data-bs-target="#foto_<?= $value[0] ?>">
							</div>

							<!-- MODAL FOTO -->
							<div class="modal fade" id="foto_<?= $value[0] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalLabel">Foto: <?= $value[3] ?></h5>
											<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
										</div>
										<div class="modal-body">
											<!-- ISI MODAL START HERE -->
											<img class="modal-foto" src="<?= $value[7] != "" ? $value[7] : "img/p.webp" ?>" alt="">
											<!-- ISI MODAL END HERE -->
										</div>
									</div>
								</div>
							</div>

							<!-- CARD BODY -->
							<div class="card-body">
								<!-- JABATAN -->
								<p class="card-text">
									<!-- <?= $value[2] ?> -->
								</p>
								<!-- TOMBOL -->
								<div class="d-flex justify-content-between align-items-center">
									<div class="btn-group">
										<a href="detail.php?id=<?= $id ?>" type="button" class="btn btn-sm btn-outline-primary">Detail</a>
										<a href="#" type="button" class="btn btn-sm btn-outline-danger" onclick="return tanya_hapus()">Hapus</a>
									</div>
									<!-- <small class="text-muted">Status keberadaan</small> -->
								</div>
							</div>

						</div>
					</div>

				<?php
				}
				?>

			</div>
		</div>

		<!-- PAGINATION MULAI -->
		<?php if ($total_data > $limit) : ?>
			<nav aria-label="Page navigation example">
				<ul class="pagination justify-content-center">

					<!-- SEBELUMNYA -->
					<li class="page-item <?= $page == 1 ? "disabled" : "" ?>">
						<a class="page-link" href="?p=1" aria-label="Previous">
							<span aria-hidden="true">&laquo;</span>
						</a>
					</li>

					<!-- TENGAH-TENGAH -->
					<?php
					for ($start_number; $start_number <= $end_number; $start_number++) {
						$active = $page == $start_number ? "active" : "";
					?>
						<li class="page-item <?= $active ?>">
							<?php if (!isset($_GET['p']) && $start_number == 1) { ?>
								<span class="page-link"><?= $start_number ?></span>
							<?php } elseif ($page != $start_number) { ?>
								<a class="page-link" href="?p=<?= $start_number ?>"><?= $start_number ?></a>
							<?php } else { ?>
								<span class="page-link"><?= $start_number ?></span>
							<?php } ?>
						</li>
					<?php
					}
					?>

					<!-- SELANJUTNYA -->
					<li class="page-item <?= $page == $end_number ? "disabled" : "" ?>">
						<a class="page-link" href="?p=<?= $total_pages ?>" aria-label="Next">
							<span aria-hidden="true">&raquo;</span>
						</a>
					</li>

				</ul>
			</nav>
		<?php endif; ?>
		<!-- PAGINATION SELESAI -->

	</div>
</main>

<script>
	let modalTambahPengguna = new bootstrap.Modal(document.getElementById('modalTambahPejabat'));

	// TAMBAH PENGGUNA
	$('#formTambahUser').submit(function(e) {
		let foto, valArr = [];
		$(`#modalTambahPejabat input,#modalTambahPejabat select`).filter((ind, el) => {
			valArr.push(el.value);
		});

		let reader = new FileReader();
		reader.onload = function() {
			foto = new Uint8Array(reader.result);

			let dataQuery = new URLSearchParams(new FormData($('#formTambahPejabat')[0]));
			dataQuery.set('foto', foto);

			console.log(dataQuery)

			const data = `tambahPejabat=&username=${valArr[0]}&password=${valArr[1]}&nama=${valArr[3]}&nip=${valArr[4]}&bidang=${valArr[5]}&subbidang=${valArr[6]}&jabatan=${valArr[7]}&nohp=${valArr[8]}&alamat=${valArr[9]}&foto=${foto}`;

			tanya_simpan("Tambah Pengguna", "Yakin akan simpan?", data);
			responProses().then(res => { ///////////// PROMISE ====================+
				if (res != 'Username sudah digunakan') {
					notif('Data tersimpan');
					modalTambahPengguna.hide()
					$(`#modalTambahPejabat input,#modalTambahPejabat select`).filter((ind, el) => {
						el.value = "";
					});
				} else {
					notif(res);
					$(`#modalTambahPejabat input`)[0].click()
				}
			})
		}
		reader.readAsArrayBuffer($(`#modalTambahPejabat input`)[2].files[0]);
		e.preventDefault()
	});

	// TAMBAH BAGIAN
	$('#formTambahBagian').submit(function(e) {
		//
		e.preventDefault()
	});

	<?php
	if (isset($_POST['data'])) {
		unset($data);
		unset($_SESSION['data']);
		$data = $_POST['data']['dataPjb'];
	}
	?>

	$('#formTambahPiket').submit(function(e) {
		e.preventDefault();
		alert('Under Maintenance');
	})
</script>

<?php
include("layout/footer.php");
?>