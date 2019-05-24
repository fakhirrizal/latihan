<!DOCTYPE html>
<html>
	<head>
		<title>Latihan</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	</head>
	<body>
		<div class="w3-row">
			<div class="w3-container w3-quarter"></div>
			<div class="w3-container">
			<center><h1>Pengampu Mata Kuliah</h1></center>
			<hr>
			<button data-toggle="modal" href="#tambahdata" class="w3-button w3-small w3-teal">+ Tambah Data</button>
			<br>
			<br>
				<table class="w3-table-all w3-card-4 w3-centered w3-border">
					<thead>
						<tr class="w3-gray">
							<th style='text-align: center'>#</th>
							<th style='text-align: center'>Mata Kuliah</th>
							<th style='text-align: center'>Nama Dosen</th>
							<th style='text-align: center'>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$no = 1;
						foreach ($data_matkul as $value) {
						?>
						<tr>
							<th style='text-align: center'><?= $no++; ?>.<br></th>
							<td><?= $value['mata_kuliah']; ?></td>
							<td><?= ($value['pengampu'] == "") ? '-' : $value['pengampu']; // ternary operators ?></td>
							<td><a href="" title='Ubah Data'><i class="fa fa-pencil" style="color:blue;"></i></a>|<a href="" title='Hapus Data'><i class="fa fa-trash" style="color:red;"></i></a></td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="w3-container w3-quarter"></div>
		</div>
		<div class="modal fade bs-modal-lg" id="tambahdata" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="myModalLabel">Form Tambah Data</h4>
					</div>
					<div class="modal-body">
						<div class="box box-primary">
							<!-- form start -->
							<form role="form" class="form-horizontal" action="<?=site_url('Home/simpan_data');?>" method="post">
								<div class="form-body">
									<div class="form-group form-md-line-input has-danger">
										<label class="col-md-2 control-label" for="form_control_1">Mata Kuliah <span class="required"> * </span></label>
										<div class="col-md-10">
											<?php
											echo '<select name="matkul" class="form-control" required><option value="">-- Pilih --</option>';
											foreach ($data_matkul_master as $key => $value) {
												echo '<option value="'.$value->id.'">'.$value->mata_kuliah.'</option>';
											}
											echo '</select>';
											?>
										</div>
									</div>
									<div class="form-group form-md-line-input has-danger">
										<label class="col-md-2 control-label" for="form_control_1">Daftar Dosen <span class="required"> * </span></label>
										<div class="col-md-10">
											<?php
											foreach ($data_dosen as $key => $value) {
												echo'
													<div class="col-md-6">
														<input type="checkbox" name="dosen[]" value="'.$value->id.'"> '.$value->nama.'
													</div>
												';
											}
											?>
										</div>
									</div>
								</div>
								<br>
								<div class="form-actions margin-top-10">
									<div class="row">
										<div class="col-md-offset-2 col-md-10">
											<button type="button" data-dismiss="modal" class="btn default">Batal</button>
											<button type="submit" class="btn blue">Simpan</button>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>