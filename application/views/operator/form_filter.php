  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Filter Cetak</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo validation_errors(); ?>
                          </div>
                      <?php endif; ?>
                      <form action="<?= base_url('Operator/prosesCetak') ?>" method="post" enctype="multipart/form-data" style="margin-left: 10px; padding: 10px;">
                          <div class="form-group" hidden>
                              <input type="text" class="form-control" id="nama" name="nama" value="<?= $_SESSION['id_user'] ?>">
                          </div>
                          <div class="form-group">
                              <label for="bulan">Bulan</label>
                              <select class="form-control" id="bulan" name="bulan" style="width: 300px;">
                                  <option>-- Pilih Bulan --</option>
                                  <option value="1">Januari</option>
                                  <option value="2">Februari</option>
                                  <option value="3">Maret</option>
                                  <option value="4">April</option>
                                  <option value="5">Mei</option>
                                  <option value="6">Juni</option>
                                  <option value="7">Juli</option>
                                  <option value="8">Agustus</option>
                                  <option value="9">September</option>
                                  <option value="10">Oktober</option>
                                  <option value="11">November</option>
                                  <option value="12">Desember</option>
                              </select>
                          </div>
                          <div class="form-group">
                              <label for="tahun">Tahun</label>
                              <input type="number" class="form-control" id="tahun" name="tahun">
                          </div>
                          <button type="submit" name="submit" class="btn btn-primary float-right">Submit</button>
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