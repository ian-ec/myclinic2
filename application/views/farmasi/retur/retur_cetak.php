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

        .retur {
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
        <div class="retur">
            <table class="transaction-table" cellspacing="5" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode retur</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $retur->fs_kd_retur ?></strong></td>
                        <td style="width: 20%;">Petugas</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= ucfirst($retur->name) ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Distributor</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $retur->fs_nm_distributor ?></strong></td>
                        <td style="width: 20%;">Tgl Transaksi</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= indo_date($retur->fd_tgl_retur) ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Alamat</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $retur->fs_alamat_distributor ?></strong></td>
                        <td style="width: 20%;">Status Pembayaran</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $retur->fn_jenis_bayar == 1 ? 'Lunas' : 'Hutang' ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Telp</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $retur->fs_telp_distributor ?></strong></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="5" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width:3%;" align="center">No</th>
                        <th style="width:15%;">Kode</th>
                        <th>Nama Barang</th>
                        <th style="text-align: right; width: 15%;">HPP</th>
                        <th style="text-align: right; width: 10%;">QTY</th>
                        <th style="text-align: right; width: 15%;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($retur_detail as $key => $data) { ?>
                        <tr>
                            <td align="center"><?= $no++ ?>.</td>
                            <td><?= $data->fs_kd_barang ?></td>
                            <td><?= $data->fs_nm_barang ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_harga_beli) ?></td>
                            <td style="text-align: right;"><?= $data->fn_qty ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_total_harga_beli) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <div>
            <table rules="" cellspacing="5" cellpadding="0">
                <tbody style="text-align: right;">
                    <tr>
                        <td align="left" valign="top"><strong> Note: <br> <?= $retur->fs_keterangan ?></strong></td>
                        <td>Grand Total : <?= indo_currency2($retur->fn_total_nilai_beli) ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><br><br></td>
                    </tr>
                    <tr>
                        <td style="width: 80%;">
                        </td>
                        <td align="center">
                            Mengetahui
                            <br>
                            <br>
                            <br>
                            <b>(<?= ucfirst($retur->name) ?>)</b>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
        </div>
    </div>
</body>

</html>