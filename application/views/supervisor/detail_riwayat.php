  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Detail Data Rencana Perjadin</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <table class="table table-striped table-bordered">
                          <tr>
                              <th>Nama</th>
                              <td><?= $rencana['nama']; ?></td>
                          </tr>
                          <tr>
                              <th>Tanggal Berangkat</th>
                              <td><?= date("l, d F Y", strtotime($rencana['tanggal_berangkat'])); ?></td>
                          </tr>
                          <tr>
                              <th>Tanggal Pulang</th>
                              <td><?= date("l, d F Y", strtotime($rencana['tanggal_pulang'])); ?></td>
                          </tr>
                          <tr>
                              <th>Output</th>
                              <td><?= $rencana['output']; ?></td>
                          </tr>
                          <tr>
                              <th>Kegiatan</th>
                              <td><?= $rencana['kegiatan']; ?>(<?= $rencana['volume']; ?>)</td>
                          </tr>
                          <tr>
                              <th>Komponen</th>
                              <td><?= $rencana['komponen']; ?></td>
                          </tr>
                          <tr>
                              <th>Volume</th>
                              <td><?= $rencana['total_volume']; ?></td>
                          </tr>
                          <tr>
                              <th>Batas Waktu <br> Pengumpulan Laporan</th>
                              <td><?= date("l, d F Y", strtotime($rencana['due_date'])); ?></td>
                          </tr>
                          <tr>
                              <th>Terakhir Diubah</th>
                              <td><?= date("l, d F Y", strtotime($rencana['tanggal_pengumpulan'])); ?></td>
                          </tr>
                          <tr>
                              <th>File Laporan</th>
                              <td><?php if ($rencana['laporan'] == NULL) {
                                        echo "LAPORAN BELUM DIKUMPULKAN";
                                    } else { ?>
                                      <a href="<?= base_url('upload/' . $rencana['laporan']) ?>"><?= $rencana['laporan']; ?></a>
                                  <?php } ?>
                              </td>
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