  <!-- INDEX -->
  <div class="main">
    <div class="main-inner">
      <div class="container">
        <div class="row">
          <div class="span6">
            <!-- /widget -->
            <div class="widget widget-nopad">
              <div class="widget-header"> <i class="icon-list-alt"></i>
                <h3> Jadwal Perjadin</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <div id='calendar'>
                </div>
              </div>
              <!-- /widget-content -->
            </div>
            <!-- /span6 -->
          </div>
          <div class="span6">
            <div class="widget widget-table action-table">
              <div class="widget-header"> <i class="icon-th-list"></i>
                <h3>Jadwal Perjadin Bulan ini</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content" style="overflow-y: auto; height: 210px;">
                <table class="table table-striped table-bordered">
                  <thead style="position:absolute;">
                    <tr>
                      <th style="width: 5.39cm;"> Nama </th>
                      <th style="width: 4.1cm;"> Tanggal Berangkat </th>
                      <th style="width: 3.75cm;"> Tanggal Pulang </th>
                    </tr>
                  </thead>
                  <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                  </tr>
                  <?php foreach ($rencana as $r) { ?>
                    <tr>
                      <td> <?php echo $r['nama']; ?></td>
                      <td><?php echo date("l, d M Y", strtotime($r['tanggal_berangkat'])); ?></td>
                      <td><?php echo date("l, d M Y", strtotime($r['tanggal_pulang'])); ?></td>
                    </tr>
                  <?php } ?>
                  <tbody>
                  </tbody>
                </table>
              </div>
              <!-- /widget-content -->
            </div>
            <!-- /widget -->
            <div class="widget">
              <div class="widget-header"> <i class="icon-signal"></i>
                <h3> Area Chart Example</h3>
              </div>
              <!-- /widget-header -->
              <div class="widget-content">
                <canvas id="area-chart" class="chart-holder" height="250" width="538"> </canvas>
                <!-- /area-chart -->
              </div>
              <!-- /widget-content -->
            </div>
            <!-- /widget -->
          </div>
          <!-- /span6 -->
        </div>
        <!-- /row -->
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
          <div class="span12"> &copy; 2021 <a href="#">POLITEKNIK NEGERI MALANG</a>. </div>
          <!-- /span12 -->
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
    </div>
    <!-- /footer-inner -->
  </div>
  <?php
  foreach ($bln as $row) {
    $bulan[] = (float) $row->total_volume;
  }
  ?>

  <?php
  foreach ($lapor as $rw) {
    $laporan[] = (float) $rw->total_volume;
  }
  ?>
  <!-- /footer -->
  <!-- Le javascript
================================================== -->
  <!-- Placed at the end of the document so the pages load faster -->
  <script src="<?php echo base_url(); ?>assets/js/jquery-1.7.2.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/excanvas.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/js/chart.min.js" type="text/javascript"></script>
  <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
  <script language="javascript" type="text/javascript" src="<?php echo base_url(); ?>assets/js/full-calendar/fullcalendar.min.js"></script>

  <script src="<?php echo base_url(); ?>assets/js/base.js"></script>

  <script>
    var ctx = document.getElementById('area-chart');
    var myChart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"],
        datasets: [{
            label: "Jumlah O-H",
            fillColor: "rgba(220,220,220,0.5)",
            strokeColor: "rgba(220,220,220,1)",
            pointColor: "rgba(220,220,220,1)",
            pointStrokeColor: "#fff",
            data: <?php echo json_encode($bulan); ?>
          },
          {
            label: "Laporan Terkumpul",
            fillColor: "rgba(151,187,205,0.5)",
            strokeColor: "rgba(151,187,205,1)",
            pointColor: "rgba(151,187,205,1)",
            pointStrokeColor: "#fff",
            data: <?php echo json_encode($laporan); ?>
          }
        ]
      },
      options: {
        legend: {
          display: true,
          position: 'bottom',
          labels: {
            fontColor: "#000080",
          }
        }
      }
    })
  </script>

  <script>
    var lineChartData = {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"],
      datasets: [{
          label: "Jumlah O-H",
          fillColor: "rgba(220,220,220,0.5)",
          strokeColor: "rgba(220,220,220,1)",
          pointColor: "rgba(220,220,220,1)",
          pointStrokeColor: "#fff",
          data: <?php echo json_encode($bulan); ?>
        },
        {
          fillColor: "rgba(151,187,205,0.5)",
          strokeColor: "rgba(151,187,205,1)",
          pointColor: "rgba(151,187,205,1)",
          pointStrokeColor: "#fff",
          data: <?php echo json_encode($laporan); ?>
        }
      ],
      options: {
        legend: {
          labels: {
            useLineStyle: true
          }
        }
      }
    }

    var myLine = new Chart(document.getElementById("area-chart").getContext("2d")).Line(lineChartData);


    var barChartData = {
      labels: ["Jan", "Feb", "Mar", "Apr", "Mei", "Jun", "Jul", "Aug", "Sept", "Okt", "Nov", "Des"],
      datasets: [{
          fillColor: "rgba(220,220,220,0.5)",
          strokeColor: "rgba(220,220,220,1)",
          data: $.ajax({
            url: "<?php echo base_url(); ?>CAdmin/getVolum",
            type: "POST",
            data: {},
            success: function(data) {
              var i;
              for (i = 0; i < data.length; i++) {
                $("#nama").val(data[i].nama);
                $("#kegiatan").val(data[i].kegiatan);
                $("#output").val(data[i].output);
                $("#tanggal_berangkat").val(data[i].tanggal_berangkat);
                $("#tanggal_pulang").val(data[i].tanggal_pulang);
              }
            }
          })
        },
        {
          fillColor: "rgba(151,187,205,0.5)",
          strokeColor: "rgba(151,187,205,1)",
          data: [28, 48, 40, 19, 96, 27, 100]
        }
      ]

    }

    $(document).ready(function() {
      var date = new Date();
      var d = date.getDate();
      var m = date.getMonth();
      var y = date.getFullYear();
      var calendar = $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
          var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
          var end = $.fullCalendar.formatDate(end, "Y-MM-DD");
          $.ajax({
            url: "<?php echo base_url(); ?>CAdmin",
            type: "POST",
            data: {
              title: title,
              start: start,
              end: end
            },
            success: function() {
              calendar.fullCalendar('refetchEvents');
              alert("Added Successfully");
            }
          })
        },
        editable: true,
        events: "<?php echo base_url(); ?>CAdmin/getTanggal"
      });
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
            for (i = 0; i < data.length; i++) {
              html += '<li><a href="javascript:;"><span style="font-size: 10pt; font-style: bold;">' + data[i].nama + '</span><br><span style="font-size: 8pt;">' + data[i].kegiatan + '</span></a></li>';
            }
            $('#list').html(html);
          }
        });
      }, 2000);
    })
  </script>
  </body>

  </html>