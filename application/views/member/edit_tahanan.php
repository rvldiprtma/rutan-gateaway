<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
                    <div class="col-lg">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Isi Data Dengan Benar!</h1>
                            </div>
                            <form class="user" method="post" action="<?= base_url(''); ?>">
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="nama_lengkap" placeholder="Nama Lengkap ..." name="nama_lengkap" value="">
                                </div>

                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" id="regis" placeholder="Nomor Registrasi ..." name="regis" value="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Pihak Penahanan</label>
                                    <select class="form-control id=" exampleFormControlSelect1" name="pihak_penahanan" style="border-radius: 100px">
                                        <option disabled selected>- Pilih -</option>
                                        <?php foreach ($pihak_penahanan as $pp) : ?>
                                            <?php if ($pp->id == set_value('pihak_penahanan')) : ?>
                                                <option value="<?= $pp->id;  ?>" selected><?= ucfirst($pp->nama_pihak_penahanan);   ?></option>
                                            <?php else : ?>
                                                <option value="<?= $pp->id;  ?>"><?= ucfirst($pp->nama_pihak_penahanan);   ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal Ditahan</label>
                                    <input type="text" class="form-control form-control-user tanggal-masuk" id="tanggal-masuk" placeholder="Tanggal Masuk Penahanan ..." name="tanggal_masuk" value="">
                                </div>

                                <div class="form-group">
                                    <label for="tanggal">Tanggal Habis Masa Tahanan</label>
                                    <input type="text" class="form-control form-control-user tanggal-masuk" id="tanggal-keluar" placeholder="Tanggal Keluar Tahanan ..." name="tanggal_keluar" value="">
                                </div>

                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Edit Tahanan
                                </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url('member') ?>">Kembali ke list tahanan</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


</div>
<!-- End of Main Content -->