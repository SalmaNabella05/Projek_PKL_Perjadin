  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Pengaturan Akun</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo validation_errors(); ?>
                          </div>
                      <?php endif; ?>
                      <form action="<?= base_url('Operator/pengaturan_akun/' . $user['id_user']) ?>" method="post" enctype="multipart/form-data" style="margin-left: 10px; padding: 10px;">
                          <input type="hidden" name="id_user" value="<?= $user['id_user']; ?>">
                          <div class="form-group">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control" id="nama" name="nama" style=" width:50%;" value="<?= $user['nama']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="nip">NIP</label>
                              <input type="text" class="form-control" id="nip" name="nip" style=" width:50%;" value="<?= $user['nip']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="jabatan">Jabatan</label>
                              <input type="text" class="form-control" id="jabatan" name="jabatan" style=" width:50%;" value="<?= $user['jabatan']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="email">Email</label>
                              <input type="text" class="form-control" id="email" name="email" style=" width:50%;" value="<?= $user['email']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="password">Password</label>
                              <input type="text" class="form-control" id="password" name="password" style=" width:50%;" value="<?= $user['password']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="pendidikan">Pendidikan</label>
                              <input type="text" class="form-control" id="pendidikan" name="pendidikan" style=" width:50%;" value="<?= $user['pendidikan']; ?>" readonly>
                          </div>
                          <div class="form-group" hidden>
                              <input type="text" class="form-control" id="level" name="level" style=" width:50%;" value="<?= $user['level']; ?>" readonly>
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary float-right">Simpan</button>
                      </form>
                  </div>
                  <!-- /widget-content -->
              </div>
              <!-- /widget -->
              <!-- </div> -->
          </div>
          <!-- /container -->
      </div>
      <!-- /main-inner -->
  </div>
  <!-- /main -->