<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- jika ingin membuat flashdata (posisi disini) -->
	<?= $this->session->flashdata('message'); ?>
	<!-- Page Heading -->
	<h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
			<h6 class="m-0 font-weight-bold text-primary">
				<a href="<?= base_url('member/add_tahanan'); ?>" class="btn btn-primary btn-icon-split">
					<span class="icon text-white-50">
						<i class="fas fa-plus"></i>
					</span>
					<span class="text">Tambah Tahanan Baru</span>
				</a>
			</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>No</th>
							<th>Nomor Regis</th>
							<th>Nama</th>
							<th>Pihak Penahanan</th>
							<th>Tgl Masuk</th>
							<th>Tgl Keluar</th>
							<th>Sisa Masa Tahanan</th>
							<th align="center">Action</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>No</th>
							<th>Nomor Regis</th>
							<th>Nama</th>
							<th>Pihak Penahanan</th>
							<th>Tgl Masuk</th>
							<th>Tgl Keluar</th>
							<th>Sisa Masa Tahanan</th>
							<th align="center">Action</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($tahanan as $index => $tahanan) : ?>
							<tr>
								<td><?= $index++ + 1 ?></td>
								<td><?= $tahanan->regis ?></td>
								<td><?= $tahanan->nama_lengkap ?></td>
								<td><?= $tahanan->nama_pihak_penahanan ?></td>
								<td><?= date('d/m/Y', strtotime($tahanan->tanggal_masuk)) ?></td>
								<td><?= date('d/m/Y', strtotime($tahanan->tanggal_keluar)) ?></td>
								<td><?= date_diff(date_create($tahanan->tanggal_masuk), date_create($tahanan->tanggal_keluar))->days ?> Hari</td>
								<td align="center">
									<a href="<?= base_url('member') . '/edit_tahanan/' . $tahanan->tahanan_id ?>" class="btn btn-success">
										<i class="fas fa-edit"></i>
									</a>

									<a href="#" data-toggle="modal" onclick="delete_tahanan(<?= $tahanan->tahanan_id ?>)" data-target="#hapusTahanan" class="btn btn-danger">
										<i class="fas fa-trash-alt"></i>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Logout Modal-->
<div class="modal fade" id="hapusTahanan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">Pilih "hapus" jika yakin ingin menghapus tahanan ini.</div>
			<div class="modal-footer">
				<button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
				<a class="btn btn-primary" id="delete_button" href="#">Ya</a>
			</div>
		</div>
	</div>
</div>

<script>
	$(document).ready(() => {
		var id

		delete_tahanan = (delete_id) => {
			id = delete_id;
		}

		$('#delete_button').click(() => {
			window.location.href = "<?= base_url('member/delete_tahanan/') ?>" + id
		})
	})
</script>
