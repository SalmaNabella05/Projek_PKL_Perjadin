<!-- /navbar -->
<div class="subnavbar" style="margin-top:80px">
    <div class="subnavbar-inner">
        <div class="container">
            <ul class="mainnav">
                <!-- SUB MENU DASHBOARD -->
                <li <?php if ($title == 'Dashboard Operator') echo 'class="active"'; ?>>
                    <a href="<?php echo base_url(); ?>Operator"><i class="icon-dashboard"></i><span>Dashboard</span>
                    </a>
                </li>
                <!-- SUB MENU RENCANA PERJADIN -->
                <li <?php if ($title == 'Rencana Perjadin' || $title == 'Detail Rencana Perjadin' || $title == 'Tambah Rencana Perjadin') echo 'class="active"'; ?>>
                    <a href="<?php echo base_url(); ?>Operator/rencana_perjadin/<?= $this->session->userdata('id_user'); ?>"><i class="icon-calendar"></i><span>Rencana Perjadin</span>
                    </a>
                </li>
                <!-- SUB MENU RIWAYAT PERJADIN -->
                <li <?php if ($title == 'Riwayat Perjadin' || $title == 'Detail Riwayat Perjadin' || $title == 'Filter Export' || $title == 'Filter Cetak') echo 'class="active"'; ?>>
                    <a href="<?php echo base_url(); ?>Operator/riwayat_perjadin/<?= $this->session->userdata('id_user'); ?>"><i class="icon-time"></i><span>Riwayat Perjadin</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- /container -->
    </div>
    <!-- /subnavbar-inner -->
</div>
<!-- /subnavbar -->