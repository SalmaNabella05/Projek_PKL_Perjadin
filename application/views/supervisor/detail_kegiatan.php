  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Detail Data Kegiatan Pegawai</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <table class="table table-striped table-bordered">
                          <tr>
                              <th>Output</th>
                              <td><?= $kegiatan['output']; ?></td>
                          </tr>
                          <tr>
                              <th>Komponen</th>
                              <td><?= $kegiatan['komponen']; ?></td>
                          </tr>
                          <tr>
                              <th>Kegiatan</th>
                              <td><?= $kegiatan['kegiatan']; ?></td>
                          </tr>
                          <tr>
                              <th>Volume</th>
                              <td><?= $kegiatan['volume']; ?></td>
                          </tr>
                          <tr>
                              <th>Satuan</th>
                              <td><?= $kegiatan['satuan']; ?></td>
                          </tr>
                          <tr>
                              <th>Tanggal Mulai</th>
                              <td><?= date("l, d F Y", strtotime($kegiatan['tanggal_mulai'])); ?></td>
                          </tr>
                          <tr>
                              <th>Tanggal Selesai</th>
                              <td><?= date("l, d F Y", strtotime($kegiatan['tanggal_selesai'])); ?></td>
                          </tr>
                      </table>
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