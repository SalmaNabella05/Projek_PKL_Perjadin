  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <div class="row">
                  <div class="panel panel-primary filterable">
                      <div class="panel-heading">
                          <h3 class="panel-title">Data Riwayat Perjadin</h3>
                          <div class="pull-right">
                              <!-- <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
                              <a href="<?= base_url(); ?>CSupervisor/filterCetak" class="btn btn-info" style="float: right;"><i class="icon-print"> Cetak Data</i></a>
                              <a href="<?= base_url(); ?>CSupervisor/filterExport" class="btn btn-warning" style="float: right;"><i class=" icon-share"> Export Data</i></a> <br><br> <br><br>
                          </div>
                      </div>
                      <table class="table" id="table" name="table">
                          <thead>
                              <!-- <tr class="filters">
                                  <th>No</th>
                                  <th><input type="date" class="form-control" placeholder="Tanggal Berangkat" disabled></th>
                                  <th><input type="date" class="form-control" placeholder="Tanggal Selesai" disabled></th>
                                  <th><input type="text" class="form-control" placeholder="Output" disabled></th>
                                  <th><input type="text" class="form-control" placeholder="Kegiatan" disabled></th>
                                  <th>Action</th>
                              </tr> -->
                              <tr>
                                  <th> No</th>
                                  <th style="width: 13%;"> Nama</th>
                                  <th style="width: 13%;"> Tanggal Berangkat</th>
                                  <th style="width: 13%;"> Tanggal Selesai</th>
                                  <th> Kegiatan</th>
                                  <th> Output</th>
                                  <th> Aksi</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                $no = 1;
                                foreach ($rencana as $r) { ?>
                                  <tr>
                                      <td><?php echo $no ?></td>
                                      <td><?php echo $r->nama ?></td>
                                      <td><?php echo date("l, d M Y", strtotime($r->tanggal_berangkat)); ?></td>
                                      <td><?php echo date("l, d M Y", strtotime($r->tanggal_pulang)); ?></td>
                                      <td><?php echo $r->kegiatan ?></td>
                                      <td><?php echo $r->output ?></td>
                                      <td>
                                          <a href="<?= base_url(); ?>CSupervisor/detail_riwayat/<?= $r->id_rencana; ?>" class="btn btn-success">
                                              <i class="icon-medium icon-eye-open"></i></a>
                                      </td>
                                  </tr>
                              <?php
                                    $no++;
                                }
                                ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!-- /container -->
      </div>
      <!-- /main-inner -->
  </div>