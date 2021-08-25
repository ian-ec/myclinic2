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

        .penerimaan {
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
        <div class="penerimaan">
            <table class="transaction-table" cellspacing="5" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode penerimaan</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $penerimaan->fs_kd_penerimaan ?></strong></td>
                        <td style="width: 20%;">Distributor</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $penerimaan->fs_nm_distributor ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Tanggal Transaksi</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= indo_date($penerimaan->fd_tgl_penerimaan) ?></strong></td>
                        <td style="width: 20%;">Alamat</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $penerimaan->fs_alamat_distributor ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Layanan Order</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $penerimaan->fs_nm_layanan ?></strong></td>
                        <td style="width: 20%;">Telp</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $penerimaan->fs_telp_distributor ?></strong></td>
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
                        <th style="text-align: right;">HPP</th>
                        <th style="text-align: right;">QTY PO</th>
                        <th style="text-align: right;">QTY DO</th>
                        <th style="text-align: right;">Diskon @</th>
                        <th style="text-align: right;">PPN %</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($penerimaan_detail as $key => $data) { ?>
                        <tr>
                            <td align="center"><?= $no++ ?>.</td>
                            <td><?= $data->fs_kd_barang ?></td>
                            <td><?= $data->fs_nm_barang ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_hpp) ?></td>
                            <td style="text-align: right;"><?= $data->fn_qty_po ?></td>
                            <td style="text-align: right;"><?= $data->fn_qty_do ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_diskon) ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_ppn) ?> %</td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_total) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table cellspacing="5" cellpadding="0">
            <tbody style="text-align: right;">
                <tr>
                    <td colspan="9" rowspan="3" align="left" valign="top"><strong> Note: <br> <?= $penerimaan->fs_keterangan ?></strong></td>
                    <td>Subtotal</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($penerimaan->fn_subtotal) ?></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td><?= indo_currency2($penerimaan->fn_diskon) ?></td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>:</td>
                    <td><?= indo_currency2($penerimaan->fn_grandtotal) ?></td>
                </tr>
                <tr>
                    <td colspan="12"><br></td>
                </tr>
                <tr>
                    <td colspan="9"><br><br></td>
                    <td colspan="3" align="center">
                        Mengetahui
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b><u>(<?= ucfirst($penerimaan->name) ?>)</u></b>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
        </div>
    </div>
</body>

</html>