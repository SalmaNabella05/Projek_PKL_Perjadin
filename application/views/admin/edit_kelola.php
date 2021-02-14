  <!-- INDEX -->
  <div class="main">
      <div class="main-inner">
          <div class="container">
              <!-- <div class="span12"> -->
              <div class="widget widget-table action-table">
                  <div class="widget-header"> <i class="icon-th-list"></i>
                      <h3>Edit Data KRencana Perjadin</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">
                      <?php if (validation_errors()) : ?>
                          <div class="alert alert-danger" role="alert">
                              <?php echo validation_errors(); ?>
                          </div>
                      <?php endif; ?>
                      <form action="<?= base_url('CAdmin/edit_rencana1/' . $rencana['id_rencana']) ?>" method="post" enctype="multipart/form-data" style="margin-left: 10px; padding: 10px;">
                          <input type="hidden" name="id_rencana" value="<?= $rencana['id_rencana']; ?>">
                          <input type="hidden" name="id_kegiatan" value="<?= $rencana['id_kegiatan']; ?>">
                          <input type="hidden" name="id_user" value="<?= $rencana['id_user']; ?>">
                          <div class="form-group">
                              <label for="output">Output</label>
                              <input type="text" class="form-control" id="output" name="output" style=" width:50%;" value="<?= $rencana['output']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="kegiatan">Kegiatan</label>
                              <input type="text" class="form-control" id="kegiatan" name="kegiatan" style=" width:50%;" value="<?= $rencana['kegiatan']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="tanggal_berangkat">Tanggal Berangkat</label>
                              <input type="date" class="form-control" id="tanggal_berangkat" name="tanggal_berangkat" style=" width:25%; text-transform: uppercase;" value="<?= $rencana['tanggal_berangkat']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="tanggal_pulang">Tanggal Pulang</label>
                              <input type="date" class="form-control" id="tanggal_pulang" name="tanggal_pulang" style=" width:25%; text-transform: uppercase;" value="<?= $rencana['tanggal_pulang']; ?>">
                          </div>
                          <div class="form-group">
                              <label for="volume">Volume</label>
                              <input type="text" class="form-control" id="volume" name="volume" style=" width:25%;" value="<?= $rencana['volume']; ?>" readonly>
                          </div>
                          <div class="form-group">
                              <label for="total_volume">Volume Yang Diajukan</label>
                              <input type="text" class="form-control" id="total_volume" name="total_volume" style=" width:25%;" value="<?= $rencana['total_volume']; ?>" readonly>
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
                  $('#div_volume').html(html);
              }
          });
      }
  </script>
  <script type="text/javascript">
      $('#tanggal_pulang').change(function() {
          var tanggal_berangkat = $('#tanggal_berangkat').val();
          var tanggal_pulang = $('#tanggal_pulang').val();

          if (tanggal_pulang < tanggal_berangkat) {
              alert('HARI TIDAK DAPAT TERULANG KEMBALI');
              $('#tanggal_pulang').val("");
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
                      } else {
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
          var today = new Date();

          if (tanggal_berangkat < today) {
              alert('Hari telah terlewati');
              $('#tanggal_berangkat').val("");
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