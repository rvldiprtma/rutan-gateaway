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
                            <th align="center"></th>
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
                            <th align="center"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>TH001</td>
                            <td>Free man minum susu</td>
                            <td>Pengadilan Negeri Pontianak</td>
                            <td>25/05/2025</td>
                            <td>25/05/2029</td>
                            <td>1460 hari</td>
                            <td align="center">
                                <a href="<?= base_url('member') . '/edit_tahanan' ?>" class="btn btn-success">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <a href="#" data-toggle="modal" data-target="#hapusTahanan" class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>
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
                <a class="btn btn-primary" href="#">Ya</a>
            </div>
        </div>
    </div>
</div>