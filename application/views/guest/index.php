<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- jika ingin membuat flashdata (posisi disini) -->
    <?= $this->session->flashdata('message'); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th rowspan="2" style="text-align: center; ">No</th>
                            <th rowspan="2" style="text-align: center; ">Nomor Regis</th>
                            <th rowspan="2" style="text-align: center; ">Nama</th>
                            <th rowspan="2" style="text-align: center; ">Tanggal Masuk</th>
                            <th colspan="3" style="text-align: center; ">Pihak Penahanan</th>
                            <th rowspan="2" style="text-align: center; ">Tgl Keluar</th>
                            <th rowspan="2" style="text-align: center; ">Sisa Masa Tahanan</th>
                        </tr>
                        <tr>
                            <th style="text-align: left;">10 hari</th>
                            <th style="text-align: left;">3 hari</th>
                            <th style="text-align: left;">1 hari</th>
                        </tr>
                    </thead>
                    <tfoot>

                    </tfoot>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>TH001</td>
                            <td>Free man minum susu</td>
                            <td>21/05/2029</td>
                            <td>21/05/2029</td>
                            <td>21/05/2029</td>
                            <td>25/05/2029</td>
                            <td>25/05/2029</td>
                            <td>4 hari</td>
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