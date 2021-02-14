  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Tambah Rencana Perjadin</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo validation_errors(); ?>
                          </div>
                      <?php endif; ?>
                      <form action="<?= base_url('CAdmin/tambah_rencana_perjadin') ?>" method="post" enctype="multipart/form-data" style="margin-left: 10px; padding: 10px;">
                          <div class="form-group">
                              <input type="hidden" class="form-control" id="id_user" name="id_user" style=" width:25%;" value="<?php echo $this->session->userdata('id_user'); ?>">
                              <label for="output">Output</label>
                              <select class="col-md-6 form-control bo-rad-10 select" name="output" id="output" style="width: 70%;">
                                  <option value="0"> - Output - </option>
                                  <?php
                                    foreach ($output as $o) { ?>
                                      <option value="<?= $o->output; ?>"><?= $o->output; ?></option>
                                  <?php } ?>
                              </select>
                          </div>
                          <div class="form-group" id="div_options">

                          </div>
                          <br>
                          <div class="form-group">
                              <label for="tanggal_berangkat">Tanggal Berangkat</label>
                              <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" style=" width:25%;">
                          </div>
                          <div class="form-group">
                              <label for="tanggal_pulang">Tanggal Pulang</label>
                              <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" style=" width:25%;">
                          </div>
                          <div class="form-group" id="div_volume">

                          </div>
                          <div class="form-group">
                              <label for="volume_diajukan">Volume Diajukan</label>
                              <input type="text" class="form-control" id="total_volume" name="total_volume" style=" width:25%;" readonly>

                              <input type="hidden" class="form-control" id="tanggal_pengumpulan" name="tanggal_pengumpulan" value="<?php echo date("Y-m-d") ?>">
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
  <!-- /extra -->
  <div class="footer">
      <div class="footer-inner">
          <div class="container">
              <div class="row">
                  <div class="span12"> &copy; 2013 <a href="#">Bootstrap Responsive Admin Template</a>. </div>
                  <!-- /span12 -->
              </div>
              <!-- /row -->
          </div>
          <!-- /container -->
      </div>
      <!-- /footer-inner -->
  </div>
  <!-- /footer -->
  <!-- Le javascript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.13/js/dataTables.bootstrap.min.js"></script>
  <script type="text/javascript">
      $(document).ready(function() {
          $('#table').DataTable();

          $('#output').change(function() {
              var id = $(this).val();
              $.ajax({
                  url: "<?php echo base_url(); ?>CAdmin/select_kegiatan_output",
                  method: "POST",
                  data: {
                      id: id
                  },
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                      var html = '<label class="col-md-6" for="kegiatan">Kegiatan</label>';
                      var i;
                      for (i = 0; i < data.length; i++) {
                          if (data[i].volume > 0) {
                              html += '<div class="col-md-6 p-t-5 form-check"><input type="radio" name="kegiatan" id="kegiatan" value="' + data[i].id_kegiatan + '" class="form-check-input" onclick="setVolume()">' + data[i].kegiatan + '(' + data[i].volume + ')</div>';
                          } else {
                              //   html += 'Maaf, kegiatan ini tidak bisa dipilih karena kuota sudah penuh !'
                          }
                      }
                      $('#div_options').html(html);
                      $('#total_volume').val("");
                      $('#volume').val("");
                      $('#tanggal_berangkat').val("");
                      $('#tanggal_pulang').val("");
                  }
              });
          });
      });
  </script>
  <script>
      function setVolume() {
          var v1 = $("input[type='radio'][name='kegiatan']:checked").val();
          $.ajax({
              method: "post",
              url: "<?php echo base_url(); ?>CAdmin/select_kegiatan_id", // url nya arahin ke function durasi
              data: {
                  v1: v1
              },
              async: false,
              dataType: 'json',
              success: function(data) {
                  var html = '<label class="col-md-6" for="volume">Volume Tersedia</label>';
                  html += '<input type="text" class="form-control" id="volume" name="volume" style=" width:25%;" value="' + data[0].volume + '" readonly>';
                  html += '<label class="col-md-6" for="volume">Tanggal Mulai</label>';
                  html += '<input type="text" class="form-control" id="tgl_m" name="tgl_m" style=" width:25%;" value="' + data[0].tanggal_mulai + '" readonly>';
                  html += '<label class="col-md-6" for="volume">Tanggal Selesai</label>';
                  html += '<input type="text" class="form-control" id="tgl_s" name="tgl_s" style=" width:25%;" value="' + data[0].tanggal_selesai + '" readonly>';
                  html += '<input type="hidden" class="form-control" id="tmp_volume" name="tmp_volume" style=" width:25%;" value="' + data[0].tmp_volume + '" readonly>';
                  $('#div_volume').html(html);
              }
          });
      }
  </script>
  <script type="text/javascript">
      $('#tanggal_pulang').change(function() {
          var tanggal_berangkat = $('#tanggal_berangkat').val();
          var tanggal_pulang = $('#tanggal_pulang').val();
          var tgl_s1 = $('#tgl_s').val();

          var tgb = new Date(tanggal_pulang);
          var dd = tgb.getDate();
          var mm = tgb.getMonth() + 1;
          var yyyy = tgb.getFullYear();

          if (dd < 10) {
              dd = '0' + dd;
          }
          if (mm < 10) {
              mm = '0' + mm;
          }
          tgb = yyyy + '-' + mm + '-' + dd;
          console.log(tgb);

          if (tanggal_pulang < tanggal_berangkat) {
              alert('Maaf, Hari tidak dapat terulang kembali');
              $('#tanggal_pulang').val("");
              $('#total_volume').val("");
          }
          if (tgb > tgl_s1) {
              alert('Maaf, Perjadin anda melebihi batas waktu');
              $('#tanggal_pulang').val("");
              $('#total_volume').val("");
          } else {
              $.ajax({
                  method: "post",
                  url: "<?php echo base_url(); ?>CAdmin/hitung_volume_rencana", // url nya arahin ke function durasi
                  data: {
                      tanggal_berangkat: tanggal_berangkat,
                      tanggal_pulang: tanggal_pulang
                  },
                  success: function(data) {
                      var vol = $('#volume').val();
                      if (vol >= data) {
                          $('#total_volume').val(data);
                      }
                      if (vol < data) {
                          $('#total_volume').val("");
                          $('#tanggal_pulang').val("");
                          alert('Maaf volume yang anda ajukan ' + data);
                      }

                  }
              });
          }
      });
      $('#tanggal_berangkat').change(function() {
          var tanggal_berangkat = $(this).val();
          var tgl_m1 = $('#tgl_m').val();
          var tgl_s1 = $('#tgl_s').val();

          var tgb = new Date(tanggal_berangkat);
          var dd = tgb.getDate();
          var mm = tgb.getMonth() + 1;
          var yyyy = tgb.getFullYear();

          if (dd < 10) {
              dd = '0' + dd;
          }
          if (mm < 10) {
              mm = '0' + mm;
          }

          var today = new Date();
          var dd1 = today.getDate();
          var mm1 = today.getMonth() + 1;
          var yyyy1 = today.getFullYear();

          if (dd1 < 10) {
              dd1 = '0' + dd1;
          }
          if (mm1 < 10) {
              mm1 = '0' + mm1;
          }

          tgb = yyyy + '-' + mm + '-' + dd;
          console.log(tgb);
          today = yyyy1 + '-' + mm1 + '-' + dd1;
          console.log(today);

          if (tgb < tgl_m1) {
              alert('Maaf, Kegiatan belum dapat dimulai');
              $('#tanggal_berangkat').val("");
              $('#total_volume').val("");
          }
          if (tgb > tgl_s1) {
              alert('Maaf, Kegiatan telah expired');
              $('#tanggal_berangkat').val("");
              $('#total_volume').val("");
          }
          if (tgb < today) {
              alert('Maaf, hari telah terlewat');
              $('#tanggal_berangkat').val("");
              $('#total_volume').val("");
          }
      });

      $('#total_volume').change(function() {
          var v1 = $('#volume').val();
          var v2 = $('#total_volume').val();

          if (v1 >= v2) {
              $('#total_volume').val(v2);
          } else {
              $('#total_volume').val("");
              $('#tanggal_pulang').val("");
              alert('Maaf volume yang anda ajukan ' + v2);
          }
      });
  </script>
  <script type="text/javascript">
      $(document).ready(function() {

          setInterval(() => {
              $.ajax({
                  url: "<?php echo base_url(); ?>CAdmin/notif",
                  method: "POST",
                  data: {

                  },
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                      $("#notif").val(data.notif);
                  }
              });
          }, 2000);
      })
  </script>
  <script type="text/javascript">
      $(document).ready(function() {

          setInterval(() => {
              $.ajax({
                  url: "<?php echo base_url(); ?>CAdmin/notif1",
                  method: "POST",
                  data: {

                  },
                  async: false,
                  dataType: 'json',
                  success: function(data) {
                      $("#notif").val(data.notif);
                      var html = '';
                      var i;
                      if (data.length == 0) {
                          html += '<li><span style="font-size: 10pt; font-style: bold;">TIDAK ADA NOTIFIKASI TERBARU</span></li>';
                      }
                      for (i = 0; i < data.length; i++) {
                          if (data[i].notif == 1) {
                              html += '<li><a href="<?= base_url() ?>CAdmin/klikNotif/' + data[i].id_rencana + '"><span style="font-size: 10pt; font-style: bold;">' + data[i].nama + '</span><br><span style="font-size: 8pt;">Mengajukan Rencana Perjadin Baru</span></a></li>';
                          }
                          if (data[i].notif == 2) {
                              html += '<li><a href="<?= base_url() ?>CAdmin/klikNotif/' + data[i].id_rencana + '"><span style="font-size: 10pt; font-style: bold;">' + data[i].nama + '</span><br><span style="font-size: 8pt;">Merubah Rencana Perjadin</span></a></li>';
                          }
                      }
                      $('#list').html(html);
                  }
              });
          }, 2000);
      })
  </script>
  </body>

  </html>