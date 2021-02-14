  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Edit Data Kegiatan Pegawai</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo validation_errors(); ?>
                          </div>
                      <?php endif; ?>
                      <form action="<?= base_url('CSupervisor/edit_kegiatan/' . $kegiatan['id_kegiatan']) ?>" method="post" enctype="multipart/form-data" style="margin-left: 10px; padding: 10px;">
                          <input type="hidden" name="id_kegiatan" value="<?= $kegiatan['id_kegiatan']; ?>">
                          <div class="form-group">
                              <label for="output">Output</label>
                              <input type="text" class="form-control" id="output" name="output" style=" width:50%; text-transform: uppercase;" value="<?= $kegiatan['output']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="komponen">Komponen</label>
                              <input type="text" class="form-control" id="komponen" name="komponen" style=" width:25%; text-transform: uppercase;" value="<?= $kegiatan['komponen']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="kegiatan">Kegiatan</label>
                              <input type="text" class="form-control" id="kegiatan" name="kegiatan" style=" width:50%;" value="<?= $kegiatan['kegiatan']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="volume">Volume</label>
                              <input type="text" class="form-control" id="volume" name="volume" style=" width:25%;" value="<?= $kegiatan['volume']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="satuan">Satuan</label>
                              <input type="text" class="form-control" id="satuan" name="satuan" style=" width:25%; text-transform: uppercase;" value="<?= $kegiatan['satuan']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="tanggal_mulai">Tanggal Mulai</label>
                              <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" style=" width:25%;" value="<?= $kegiatan['tanggal_mulai']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="tanggal_selesai">Tanggal Selesai</label>
                              <input type="date" class="form-control" id="tanggal_selesai" name="tanggal_selesai" style=" width:25%;" value="<?= $kegiatan['tanggal_selesai']; ?>">
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