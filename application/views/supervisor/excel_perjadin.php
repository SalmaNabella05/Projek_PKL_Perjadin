<!DOCTYPE html>
<html>

<head>
    <title>Laporan Perjadin</title>
    <style type="text/css">
        #outtable {
            padding: 20px;
            border: 1px solid #e3e3e3;
            width: 900px;
            border-radius: 5px;
        }

        .short {
            width: 50px;
        }

        .normal {
            width: 150px;
        }

        table {
            border-collapse: collapse;
            font-family: arial;
            color: #5E5B5C;
        }

        thead th {
            text-align: left;
            padding: 10px;
        }

        tbody td {
            border-top: 1px solid #e3e3e3;
            padding: 10px;
        }

        tbody tr:nth-child(even) {
            background: #F6F5FA;
        }

        tbody tr:hover {
            background: #EAE9F5;
        }
    </style>
</head>

<body>
    <div id="outtable">
        <h1 style="text-align:center"> LAPORAN PERJADIN </h1>
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
        <table>
            <thead>
                <tr>
                <tr>
                    <th class="normal">No</th>
                    <th class="normal">Tanggal Berangkat</th>
                    <th class="normal">Tanggal Selesai</th>
                    <th class="normal">Kegiatan</th>
                    <th class="normal">Output</th>
                </tr>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach ($data as $dn) : ?>
                    <tr>
                        <td><?php echo $no; ?></td>
                        <td><?= date("l, d M Y", strtotime($dn['tanggal_berangkat'])); ?></td>
                        <td><?= date("l, d M Y", strtotime($dn['tanggal_pulang'])); ?></td>
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