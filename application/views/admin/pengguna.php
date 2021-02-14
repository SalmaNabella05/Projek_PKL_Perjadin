  <!-- INDEX -->
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="panel panel-primary filterable">
            <div class="panel-heading">
              <h3 class="panel-title">Data Pengguna</h3>
              <div class="pull-right">
                <!-- <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button> -->
                <a href="<?= base_url(); ?>CAdmin/tambah_pengguna" class="btn btn-info" style="float: right;">+ Tambah Data</a> <br><br>
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
                  <th> Nama </th>
                  <th> NIP</th>
                  <th> Jabatan</th>
                  <th> Email</th>
                  <th> Password</th>
                  <th> Pendidikan</th>
                  <th> Level</th>
                  <th style="width: 65px;"> Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $no = 1;
                foreach ($user as $u) { ?>
                  <tr>
                    <td><?php echo $no ?></td>
                    <td><?php echo $u->nama ?></td>
                    <td><?php echo $u->nip ?></td>
                    <td><?php echo $u->jabatan ?></td>
                    <td><?php echo $u->email ?></td>
                    <td><?php echo $u->password ?></td>
                    <td><?php echo $u->pendidikan ?></td>
                    <td><?php echo $u->level ?></td>
                    <td>
                      <a href="<?= base_url(); ?>CAdmin/edit_pengguna/<?= $u->id_user; ?>" class="btn btn-primary">
                        <i class="icon-medium icon-pencil"></i></a>
                      <a href="<?= base_url(); ?>CAdmin/hapus_pengguna/<?= $u->id_user; ?>" class="btn btn-danger" onclick="return confirm('Data Pegawai <?php echo $u->nama ?> akan dihapus? ?')">
                        <i class="icon-medium icon-trash"></i></a>
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
        <!-- </div> -->
      </div>
      <!-- /container -->
    </div>
    <!-- /main-inner -->
  </div>
  <!-- /main -->