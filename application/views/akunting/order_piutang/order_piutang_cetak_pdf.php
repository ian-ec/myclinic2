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

        .order_piutang {
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
        <div class="order_piutang">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode Trs</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $order_piutang->fs_kd_order_piutang ?></b></td>
                        <td style="width: 20%;">Jaminan</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $order_piutang->fs_nm_jaminan ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><b><?= indo_date($order_piutang->fd_tgl_order_piutang) ?></b></td>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><b><?= $order_piutang->fs_alamat ?></b></td>
                    </tr>
                    <tr>
                        <td>Petugas</td>
                        <td>:</td>
                        <td><b><?= $order_piutang->name ?></b></td>
                        <td>Telp</td>
                        <td>:</td>
                        <td><b><?= $order_piutang->fs_telp ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width:5%;">No.</th>
                        <th style="width:15%;">Kode Reg</th>
                        <th>Nama Pasien</th>
                        <th>No Polis</th>
                        <th>Tgl Keluar</th>
                        <th style="width:10%; text-align: right;">Klaim</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($order_piutang_detail->result() as $td => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td style="width:15%;"><?= $data->fs_kd_registrasi ?></td>
                            <td><?= $data->fs_nm_pasien ?></td>
                            <td><?= $data->fn_no_polis ?></td>
                            <td><?= indo_date($data->fd_tgl_keluar) ?></td>
                            <td style="width:10%; text-align: right;"><?= indo_currency2($data->fn_nilai_piutang) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table cellspacing="10" cellpadding="0">
            <tbody style="text-align: right;">
                <tr>
                    <td><b>Grand Total</b></td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($order_piutang->fn_nilai_order) ?></td>
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