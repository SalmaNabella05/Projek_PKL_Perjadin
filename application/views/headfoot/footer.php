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
<script type="text/javascript">
    $(document).ready(function() {
        $('#select_nama').change(function() {
            var id = $(this).val();
            $.ajax({
                url: "<?php echo base_url(); ?>CAdmin/selectByNama",
                method: "POST",
                data: {
                    id: id
                },
                async: false,
                dataType: 'json',
                success: function(data) {
                    var i;
                    for (i = 0; i < data.length; i++) {
                        $('#nama').val(data[i].nama);
                        $('#tanggal_berangkat').val(data[i].tanggal_berangkat);
                        $('#tanggal_selesai').val(data[i].tanggal_selesai);
                        $('#kegiatan').val(data[i].kegiatan);
                        $('#output').val(data[i].output);
                    }
                }
            });
        });
    })
</script>
</body>

</html>