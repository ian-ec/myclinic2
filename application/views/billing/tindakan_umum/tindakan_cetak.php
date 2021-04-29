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

        .tindakan {
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

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <strong>
                <?= $parameter->aplication_name ?><br>
                <?= $parameter->address ?><br>
                <?= $parameter->telp ?><br>
            </strong>
        </div>
        <div class="tindakan">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode Tindakan</td>
                        <td style="width: 1%;">:</td>
                        <td><?= $tindakan->fs_kd_trs_tindakan ?></td>
                        <td style="width: 20%;">Kode Registrasi</td>
                        <td style="width: 1%;">:</td>
                        <td><?= $tindakan->fs_kd_registrasi ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?= indo_date($tindakan->fd_tgl_trs) ?></td>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><?= $tindakan->fs_nm_pasien ?></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><?= $tindakan->fs_nm_layanan ?></td>
                        <td>Jaminan</td>
                        <td>:</td>
                        <td><?= $tindakan->fs_nm_jaminan ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama Tarif</th>
                        <th>Nilai</th>
                        <th>Qty</th>
                        <th>Diskon</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($tindakan_detail->result() as $td => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td style="width:15%;"><?= $data->fs_kd_tarif ?></td>
                            <td><?= $data->fs_nm_tarif ?></td>
                            <td style="width:10%; text-align: right;"><?= indo_currency2($data->fn_nilai_tarif) ?></td>
                            <td style="width:10%; text-align: right;"><?= $data->fn_qty ?></td>
                            <td style="width:10%; text-align: right;"><?= indo_currency2($data->fn_diskon) ?></td>
                            <td style="width:10%; text-align: right;"><?= indo_currency2($data->fn_total) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <table cellspacing="10" cellpadding="0">
                <tbody style="text-align: right;">
                    <tr>
                        <td>Subtotal</td>
                        <td style="width: 1%;">:</td>
                        <td style="width: 10%;"><?= indo_currency2($tindakan->fn_subtotal_tindakan) ?></td>
                    </tr>
                    <tr>
                        <td>Diskon</td>
                        <td>:</td>
                        <td><?= indo_currency2($tindakan->fn_diskon_tindakan) ?></td>
                    </tr>
                    <tr>
                        <td>Grand Total</td>
                        <td>:</td>
                        <td><?= indo_currency2($tindakan->fn_nilai_tindakan) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
            <b>Semoga lekas sembuh</b>
        </div>
    </div>
</body>

</html>