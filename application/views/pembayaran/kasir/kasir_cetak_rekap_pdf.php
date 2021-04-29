<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 100%;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .row {
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .transaction {
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            margin-top: 10px;
            padding-top: 10px;
            text-align: center;
            border-top: 1px dashed;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <strong>
                <?= $parameter->aplication_name ?><br>
                <?= $parameter->address ?><br>
                <?= $parameter->telp ?><br>
            </strong>
        </div>
        <div class="row">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode Reg</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $row->fs_kd_registrasi ?></b></td>
                        <td style="width: 20%;">Kode RM</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $row->fs_kd_rm ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><b><?= indo_date($row->fd_tgl_keluar) ?></b></td>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><b><?= $row->fs_nm_pasien ?></b></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><b><?= $row->fs_nm_layanan ?></b></td>
                        <td>Jaminan</td>
                        <td>:</td>
                        <td><b><?= $row->fs_nm_jaminan ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width:5%;">No.</th>
                        <th>Rekap Cetak</th>
                        <th style="width:20%; text-align: right;">Subtotal</th>
                        <th style="width:20%; text-align: right;">Diskon</th>
                        <th style="width:20%; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($billing->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $data->rekapcetak ?></td>
                            <td style="text-align: right;"><?= indo_currency3($data->subtotal) ?></td>
                            <td style="text-align: right;"><?= indo_currency3($data->diskon) ?></td>
                            <td style="text-align: right;"><?= indo_currency3($data->grandtotal) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table cellspacing="10" cellpadding="0">
            <tbody style="text-align: right;">
                <tr>
                    <td><b>Tagihan</b></td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency3($row->grandtotal) ?></td>
                </tr>
                <tr>
                    <td><b>Terbayar</b></td>
                    <td>:</td>
                    <td><?= indo_currency3($row->grandtotal - $row->fn_hutang) ?></td>
                </tr>
                <tr>
                    <td><b>Hutang</b></td>
                    <td>:</td>
                    <td><?= indo_currency3($row->fn_hutang) ?></td>
                </tr>
            </tbody>
        </table>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
            <b>Semoga lekas sembuh</b>
        </div>
    </div>
</body>

</html>