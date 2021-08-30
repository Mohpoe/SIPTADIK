<?php
$title = "Riwayat";
include("layout/header.php");
?>

<!-- ISI MULAI -->
<div class="container">
	<h2 class="my-4">Riwayat Tamu</h2>

	<div class="container mt-3 mb-4">
		<div class="col mt-4 mt-lg-0">
			<div class="row">
				<div class="col-md-12">
					<div class="user-dashboard-info-box table-responsive mb-0 bg-white p-4 shadow-sm">
						<input class="form-control d-inline-block" style="width: 20%;min-width: 200px;" type="search" placeholder="Search" aria-label="Search">
						<i class="bi bi-filter-square-fill" style="font-size: 1.5rem;color: #ababab"></i>
						<i class="bi bi-arrow-right-square" style="font-size: 1.5rem;color: #ababab"></i>
						<i class="bi bi-arrow-left-square" style="font-size: 1.5rem;color: #ababab"></i>
						<table class="table manage-candidates-top mb-0">
							<thead>
								<tr>
									<th>Nama Tamu</th>
									<th>Instansi</th>
									<th>Bidang Tujuan</th>
									<th>Tujuan</th>
								</tr>
							</thead>
							<tbody>

								<!-- TAMU 1 START -->
								<tr class="candidates-list">
									<td class="title">
										<div class="thumb">
											<img class="img-fluid" src="./img/tamu1.jpg" alt="">
										</div>
										<div class="candidate-list-details">
											<div class="candidate-list-info">
												<div class="candidate-list-title">
													<h5 class="mb-0"><a href="#" data-bs-toggle="modal" data-bs-target="#tamu1">NAMA TAMU 1</a>
													</h5>
												</div>
												<div class="candidate-list-option">
													<ul class="list-unstyled">
														<li><i class="bi bi-person-badge me-1"></i>6472134516890001
														</li>
													</ul>
												</div>
											</div>
										</div>
									</td>
									<td>Instansi Tamu 1</td>
									<td>Bidang Tujuan 1</td>
									<td>Tujuan Tamu 1</td>
								</tr>
								<!-- TAMU 1 END -->
								<!-- MODAL TAMU 1 -->
								<div class="modal fade" id="tamu1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Detail Tamu 1</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<!-- ISI MODAL START HERE -->
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Nama Tamu">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">NIK/NIP</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="123456">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Instansi</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Dinas Pendidikan Kabupaten Pinrang">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Sub Bidang Tujuan</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Sub Bidang Tujuan">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Tujuan</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Kunjungan Dinas">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Status</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Diterima">
													</div>
												</div>
												<!-- ISI MODAL END HERE -->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
											</div>
										</div>
									</div>
								</div>
								<!-- MODAL TAMU 1 -->

								<!-- TAMU 2 START -->
								<tr class="candidates-list">
									<td class="title">
										<div class="thumb">
											<img class="img-fluid" src="./img/tamu2.jpg" alt="">
										</div>
										<div class="candidate-list-details">
											<div class="candidate-list-info">
												<div class="candidate-list-title">
													<h5 class="mb-0"><a href="#" data-bs-toggle="modal" data-bs-target="#tamu2">NAMA TAMU 2</a>
													</h5>
												</div>
												<div class="candidate-list-option">
													<ul class="list-unstyled">
														<li><i class="bi bi-person-badge me-1"></i>6472134516890001
														</li>
													</ul>
												</div>
											</div>
										</div>
									</td>
									<td>Instansi Tamu 2</td>
									<td>Bidang Tujuan Tamu 2</td>
									<td>Tujuan Tamu 2</td>
								</tr>
								<!-- TAMU 2 END -->
								<!-- MODAL TAMU 2 -->
								<div class="modal fade" id="tamu2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header">
												<h5 class="modal-title" id="exampleModalLabel">Detail Tamu 2</h5>
												<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
											</div>
											<div class="modal-body">
												<!-- ISI MODAL START HERE -->
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Nama</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Nama Tamu">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">NIK/NIP</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="98767654">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Instansi</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Pemkab Pinrang">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Sub Bidang Tujuan</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Sub Bidang Tujuan">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Tujuan</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Kunjungan Dinas">
													</div>
												</div>
												<div class="mb-3 row">
													<label class="col-sm-2 col-form-label">Status</label>
													<div class="col-sm-10">
														<input type="text" readonly class="form-control-plaintext" value="Ditolak">
													</div>
												</div>
												<!-- ISI MODAL END HERE -->
											</div>
											<div class="modal-footer">
												<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Keluar</button>
											</div>
										</div>
									</div>
								</div>
								<!-- MODAL TAMU 2 -->

							</tbody>
						</table>

					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Pagination Mulai -->
	<nav aria-label="Page navigation example">
		<ul class="pagination justify-content-center">
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Previous">
					<span aria-hidden="true">&laquo;</span>
				</a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1</a></li>
			<li class="page-item"><a class="page-link" href="#">2</a></li>
			<li class="page-item"><a class="page-link" href="#">3</a></li>
			<li class="page-item">
				<a class="page-link" href="#" aria-label="Next">
					<span aria-hidden="true">&raquo;</span>
				</a>
			</li>
		</ul>
	</nav>
	<!-- Pagination Selesai -->

</div>
<!-- ISI SELESAI -->

<?php
include("layout/footer.php");
?>