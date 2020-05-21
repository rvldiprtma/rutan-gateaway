<!-- Begin Page Content -->
<div class="container-fluid">

    <?= form_error(
        'nama_menu',
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
                    <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addMenu">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah Menu Baru</span>
                    </a>
                </h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th align="center"></th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama Menu</th>
                                <th align="center"></th>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach ($menu as $m) : ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $m['menu']; ?></td>

                                    <?php if ($m['menu'] != 'Menu') : ?>
                                        <td align="center">
                                            <a href="#" data-toggle="modal" data-target="#editMenu<?= $m['id'] ?>" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" data-toggle="modal" data-target="#hapusMenu<?= $m['id'] ?>" class="btn btn-danger">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    <?php else : ?>
                                        <td align="center">
                                            <a href="#" onclick="return confirm('Menu ini tidak boleh diubah');" class="btn btn-secondary">
                                                <i class="fas fa-edit"></i>
                                            </a>

                                            <a href="#" onclick="return confirm('Menu ini tidak boleh dihapus');" class="btn btn-secondary">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    <?php endif; ?>
                                </tr>
                                <!-- Delete Modal-->
                                <div class="modal fade" id="hapusMenu<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Pilih "hapus" jika yakin ingin menghapus menu ini.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                <a class="btn btn-primary" href="<?= base_url('menu/deleteMenu/') . $m['id'] ?>">Ya</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Edit Modal-->
                                <div class="modal fade" id="editMenu<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Submenu?</h5>
                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">


                                                <!-- <form class="user" method="post" action="<?= base_url('menu/editMenu') ?>"> -->
                                                <?= form_open('menu/editMenu', ['class' => 'user', 'method' => 'post']) ?>
                                                <input type="hidden" name="menu_id" value="<?= $m['id']; ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="nama_menu" placeholder="Nama Menu ..." name="nama_menu" value="<?= $m['menu']; ?>" required>
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



<!-- Add Modal-->
<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Menu Baru?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <!-- <form class="user" method="post" action="<?= base_url('menu'); ?>"> -->
                <?= form_open(current_url(), ['class' => 'user', 'method' => 'post']) ?>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" id="nama_menu" placeholder="Nama Menu ..." name="nama_menu" value="" required>
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