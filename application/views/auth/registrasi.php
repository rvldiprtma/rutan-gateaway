<div class="container">

  <div class="card o-hidden border-0 shadow-lg my-5 col-lg-7 mx-auto">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <!-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> -->
        <div class="col-lg">
          <div class="p-5">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Buat Akun Admin Master!</h1>
            </div>
            <form class="user" method="post" accept="<?= base_url('auth/registrasi'); ?>">
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="nama_lengkap" placeholder="Nama Lengkap ..." name="nama_lengkap" value="<?= set_value('nama_lengkap') ?>">
                <?= form_error('nama_lengkap', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" id="email" placeholder="Alamat Email ..." name="email" value="<?= set_value('email') ?>">
                <?= form_error('email', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group">
                <input type="number" class="form-control form-control-user" id="nomor_hp" placeholder="Nomor HP ..." name="nomor_hp" value="<?= set_value('nomor_hp') ?>">
                <?= form_error('nomor_hp', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group">
                <label for="exampleFormControlSelect1">Instansi Penahanan</label>
                <select class="form-control" id="exampleFormControlSelect1" name="instansi_penahanan" style="border-radius: 100px">
                  <option disabled selected>- Pilih -</option>
                  <?php foreach ($instansi_penahanan as $ip) : ?>
                    <?php if ($ip->id == set_value('instansi_penahanan')) : ?>
                      <option value="<?= $ip->id;  ?>" selected><?= ucfirst($ip->nama_instansi);   ?></option>
                    <?php else : ?>
                      <option value="<?= $ip->id;  ?>"><?= ucfirst($ip->nama_instansi);   ?></option>
                    <?php endif; ?>
                  <?php endforeach; ?>
                </select>
                <?= form_error('instansi_penahanan', '<small class="text-danger pl-3">', '</small>') ?>
              </div>
              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <input type="password" class="form-control form-control-user" id="password1" placeholder="Password" name="password1">
                  <?= form_error('password1', '<small class="text-danger pl-3">', '</small>') ?>
                </div>
                <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="password2" placeholder="Ulangi Password" name="password2">
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-user btn-block">
                Register Account
              </button>
            </form>
            <hr>
            <div class="text-center">
              <a class="small" href="forgot-password.html">Forgot Password?</a>
            </div>
            <div class="text-center">
              <a class="small" href="<?= base_url('auth') ?>">Already have an account? Login!</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>