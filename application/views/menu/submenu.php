<!-- Begin Page Content -->
<div class="container-fluid">

    <?= form_error(
        'nama_menu',
        '<div class="alert alert-danger" role="alert">',
        '</div>'
    ); ?>
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <!-- jika ingin membuat flashdata (posisi disini) -->
    <?php echo $this->session->flashdata('message');
    ?>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <!-- <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6> -->
            <h6 class="m-0 font-weight-bold text-primary">
                <a href="#" class="btn btn-primary btn-icon-split" data-toggle="modal" data-target="#addSubmenu">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Tambah Submenu Baru</span>
                </a>
            </h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th align="center">Icon</th>
                            <th>Active</th>
                            <th align="center"></th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Menu</th>
                            <th>Url</th>
                            <th align="center">Icon</th>
                            <th>Active</th>
                            <th align="center"></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($submenu as $sm) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= $sm['title']; ?></td>
                                <td><?= $sm['menu']; ?></td>
                                <td><?= $sm['url']; ?></td>
                                <td align="center"><i class="<?= $sm['icon']; ?>"></i></td>
                                <td>
                                    <?php if ($sm['is_active'] == 1) : ?>
                                        <span class="badge bg-gradient-success" style="color: #fff;"><i class="fa fa-check "></i> Aktif</span>
                                    <?php else : ?>
                                        <span class="badge bg-gradient-danger" style="color: #fff;"><i class="fa fa-remove "></i> Non aktif</span>
                                    <?php endif; ?>
                                </td>
                                <td align="center">
                                    <a href="#" data-toggle="modal" data-target="#editSubmenu<?= $sm['id'] ?>" class="btn btn-success">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <?php if ($sm['menu'] == 'Menu') : ?>
                                    <?php else : ?>
                                        <a href="#" data-toggle="modal" data-target="#hapusSubmenu<?= $sm['id'] ?>" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </a>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <!-- Delete Modal-->
                            <div class="modal fade" id="hapusSubmenu<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Yakin Untuk Hapus?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">Pilih "Hapus" jika yakin ingin menghapus Submenu ini.</div>
                                        <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                            <a class="btn btn-primary" href="<?= base_url('menu/deleteSubmenu/') . $sm['id'] ?>">Hapus</a>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <!-- Edit Modal-->
                            <div class="modal fade" id="editSubmenu<?= $sm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Submenu?</h5>
                                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">


                                            <form class="user" method="post" action="<?= base_url('menu/editSubmenu') ?>">
                                                <input type="hidden" name="id" value="<?= $sm['id']; ?>">
                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="nama_submenu" placeholder="Nama Submenu ..." name="nama_submenu" value="<?= $sm['title'] ?>" required style="border-radius: 100px">
                                                </div>

                                                <div class="form-group">
                                                    <select class="form-control" id="exampleFormControlSelect1" name="menu_id" style="border-radius: 100px">
                                                        <option disabled selected>- Pilih -</option>
                                                        <?php foreach ($menu as $m) : ?>
                                                            <?php if ($m->id == $sm['menu_id']) : ?>
                                                                <option value="<?= $m->id;  ?>" selected><?= ucfirst($m->menu);   ?></option>
                                                            <?php else : ?>
                                                                <option value="<?= $m->id;  ?>"><?= ucfirst($m->menu);   ?></option>
                                                            <?php endif; ?>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="icon_submenu" placeholder="Icon Submenu ..." name="icon_submenu" value="<?= $sm['icon'] ?>" required style="border-radius: 100px">
                                                </div>

                                                <div class="form-group">
                                                    <input type="text" class="form-control form-control-user" id="url_submenu" placeholder="URL Submenu ..." name="url_submenu" value="<?= $sm['url'] ?>" required style="border-radius: 100px">
                                                </div>

                                                <div class="form-group">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                                                        <label class="form-check-label" for="is_active">
                                                            Aktif?
                                                        </label>
                                                    </div>
                                                </div>

                                                <!-- </form> -->
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                                                    <button class="btn btn-primary" type="submit">Edit</button>
                                                </div>
                                            </form>
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
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->



<!-- Add Modal-->
<div class="modal fade" id="addSubmenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Submenu Baru?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">


                <form class="user" method="post" action="<?= base_url('menu/submenu'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="nama_submenu" placeholder="Nama Submenu ..." name="nama_submenu" value="" required>
                    </div>

                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="menu_id" style="border-radius: 100px">
                            <option disabled selected>- Pilih -</option>
                            <?php foreach ($menu as $m) : ?>
                                <?php if ($m->id == set_value('menu_id')) : ?>
                                    <option value="<?= $m->id;  ?>" selected><?= ucfirst($m->menu);   ?></option>
                                <?php else : ?>
                                    <option value="<?= $m->id;  ?>"><?= ucfirst($m->menu);   ?></option>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="icon_submenu" placeholder="Icon Submenu ..." name="icon_submenu" value="" required>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="url_submenu" placeholder="URL Submenu ..." name="url_submenu" value="" required>
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="is_active" name="is_active" checked>
                            <label class="form-check-label" for="is_active">
                                Aktif?
                            </label>
                        </div>
                    </div>

                    <!-- </form> -->
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Batal</button>
                        <button class="btn btn-primary" type="submit">Tambah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>