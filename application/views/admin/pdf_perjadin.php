<!DOCTYPE html>
<html>

<head>
    <title>Rekapitulasi Perjadin</title>
    <html>

    <head>
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <style type="text/css">
            body {
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
            }

            /* Table */
            table {
                margin: auto;
                font-family: "Lucida Sans Unicode", "Lucida Grande", "Segoe Ui";
                font-size: 14px;

            }

            .demo-table {
                border-collapse: collapse;
                font-size: 14px;
            }

            .demo-table th,
            .demo-table td {
                border-bottom: 1px solid #000;
                border-left: 1px solid #000;
                padding: 5px 10px;
            }

            .demo-table th,
            .demo-table td:last-child {
                border-right: 1px solid #000;
            }

            .demo-table td:first-child {
                border-top: 1px solid #000;
            }

            .demo-table td:last-child {
                border-bottom: 1px solid #000;
            }

            caption {
                caption-side: top;
                margin-bottom: 10px;
            }

            /* Table Header */
            .demo-table thead th {
                background-color: #0CC9C9;
                color: #000;
                border-color: #000 !important;
                text-transform: uppercase;
            }

            .kop-surat a {
                font-family: Arial, Helvetica, sans-serif;
                line-height: 50%;
                font-size: 20px;
            }

            /* Table Body */
        </style>
    </head>

<body>
    <table>
        <!-- <tr>
            <td>
                <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/28/Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg/1726px-Lambang_Badan_Pusat_Statistik_%28BPS%29_Indonesia.svg.png" style="width: 2.5cm; height:1.75cm;" />
            </td> -->
        <td>
            <div class="kop-surat">
                <center>
                    <a><b> REKAPITULASI PERJALANAN DINAS PEGAWAI </b> </a><br><br>
                    <a><b>BADAN PUSAT STATISTIK KOTA MALANG</b></a>
                </center>
            </div>
        </td>
        </tr>
    </table>
    <hr>
    </hr>
    <table>
        <?php foreach ($data as $dn) : ?>
            <tr>
                <td> Nama </td>
                <td>: <?= $dn['nama']; ?></td>
            </tr>
            <tr>
                <td> Bulan </td>
                <td>: <?= date("F", strtotime($dn['tanggal_berangkat'])); ?></td>
            </tr>
        <?php break;
        endforeach; ?>
    </table>
    <table class="demo-table responsive">
        <thead>
            <tr>
                <th class="normal">No</th>
                <th class="normal" style="width: 15%;">Tanggal Berangkat</th>
                <th class="normal" style="width: 15%;">Tanggal Selesai</th>
                <th class="normal" style="width: 15%;">Tanggal Laporan</th>
                <th class="normal" style="width: 35%;">Kegiatan</th>
                <th class="normal" style="width: 35%;">Output</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($data as $dn) : ?>
                <tr>
                    <td><?php echo $no; ?></td>
                    <td><?= date("l, d M Y", strtotime($dn['tanggal_berangkat'])); ?></td>
                    <td><?= date("l, d M Y", strtotime($dn['tanggal_pulang'])); ?></td>
                    <td><?php
                        if ($dn['laporan'] == NULL) {
                            echo 'Laporan Belum Dikumpulkan';
                        } else {
                            echo date("l, d M Y", strtotime($dn['tanggal_pengumpulan']));
                        }
                        ?></td>
                    <td><?php echo $dn['kegiatan']; ?></td>
                    <td><?php echo $dn['output']; ?></td>
                </tr>
                <?php $no++; ?>

            <?php endforeach; ?>
        </tbody>
        </div>
    </table>
</body>

</html>