<!-- Begin Page Content -->
<div class="container-fluid">

    <?= form_error(
        'nama_role',
        '<div class="alert alert-danger" role="alert">',
        '</div>'
    ); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="container">
        <!-- jika ingin membuat flashdata (posisi disini) -->
        <?php echo $this->session->flashdata('message');
        ?>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
                <h6 class="m-0 font-weight-bold text-primary">
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addRole">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Role Baru</span>
                    </a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th align="center"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Role</th>
                                <th align="center"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($role as $r) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $r['role']; ?></td>
                                    <td align="center">

                                        <a href="<?= base_url('administrator/roleaccess/') . $r['id'] ?>" class="btn btn-warning">
                                            <i class="fas fa-check-double"></i>
                                        </a>

                                        <a href="#" data-toggle="modal" data-target="#editRole<?= $r['id']; ?>" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <?php if ($r['id'] != 1 && $r['id'] != 2 && $r['id'] != 3) : ?>
                                            <a href="#" data-toggle="modal" data-target="#hapusRole<?= $r['id'] ?>" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        <?php else : ?>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                                <!-- Hapus Modal-->
                                <div class="modal fade" id="hapusRole<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Hapus <strong><?= $r['role'] ?></strong> ?</h5> <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Pilih "hapus" jika yakin ingin menghapus Role ini.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-primary" href="<?= base_url('administrator/deleteRole/') . $r['id'] ?>">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal-->
                                <div class="modal fade" id="editRole<?= $r['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Tambah Role Baru?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <!-- <form class="user" method="post" action="<?= base_url('administrator/editRole'); ?>"> -->

                                                <?= form_open('administrator/editRole', ['class' => 'user', 'method' => 'post']) ?>
                                                <input type="hidden" name="role_id" value="<?= $r['id']; ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="nama_role" placeholder="Nama Role ..." name="nama_role" value="<?= $r['role'] ?>" required>
                                                </div>
                                                <!-- </form> -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Edit</button>
                                                </div>
                                                <!-- </form> -->
                                                <?= form_close() ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<!-- Edit Modal-->
<div class="modal fade" id="addRole" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Role Baru?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- <form class="user" method="post" action="<?= base_url('administrator/role'); ?>"> -->
                <?= form_open(current_url(), ['class' => 'user', 'method' => 'post']) ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_role" placeholder="Nama Role ..." name="nama_role" value="" required>
                </div>
                <!-- </form> -->
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                    <button class="btn btn-primary" type="submit">Tambah</button>
                </div>
                <!-- </form> -->
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>