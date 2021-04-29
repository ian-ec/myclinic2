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

        .pembelian {
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
        <div class="pembelian">
            <table class="transaction-table" cellspacing="5" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode pembelian</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $pembelian->fs_kd_pembelian ?></strong></td>
                        <td style="width: 20%;">Petugas</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= ucfirst($pembelian->name) ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Distributor</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $pembelian->fs_nm_distributor ?></strong></td>
                        <td style="width: 20%;">Tgl Transaksi</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= indo_date($pembelian->fd_tgl_pembelian) ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Alamat</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $pembelian->fs_alamat_distributor ?></strong></td>
                        <td style="width: 20%;">Tgl Bayar</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= indo_date($pembelian->fd_tgl_bayar) ?></strong></td>
                    </tr>
                    <tr>
                        <td style="width: 20%;">Telp</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $pembelian->fs_telp_distributor ?></strong></td>
                        <td style="width: 20%;">Status Pembayaran</td>
                        <td style="width: 1%;">:</td>
                        <td><strong><?= $pembelian->fn_jenis_bayar == 1 ? 'Lunas' : 'Hutang' ?></strong></td>
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
                        <th style="text-align: right;">QTY</th>
                        <th style="text-align: right;">Diskon @</th>
                        <th style="text-align: right;">PPN %</th>
                        <th style="text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pembelian_detail as $key => $data) { ?>
                        <tr>
                            <td align="center"><?= $no++ ?>.</td>
                            <td><?= $data->fs_kd_barang ?></td>
                            <td><?= $data->fs_nm_barang ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_harga_beli) ?></td>
                            <td style="text-align: right;"><?= $data->fn_qty ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_diskon_harga_beli) ?></td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_pajak_beli) ?> %</td>
                            <td style="text-align: right;"><?= indo_currency2($data->fn_total_harga_beli) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table cellspacing="5" cellpadding="0">
            <tbody style="text-align: right;">
                <tr>
                    <td colspan="9" rowspan="3" align="left" valign="top"><strong> Note: <br> <?= $pembelian->fs_keterangan ?></strong></td>
                    <td>Subtotal</td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($pembelian->fn_nilai_beli) ?></td>
                </tr>
                <tr>
                    <td>Diskon</td>
                    <td>:</td>
                    <td><?= indo_currency2($pembelian->fn_diskon) ?></td>
                </tr>
                <tr>
                    <td>Grand Total</td>
                    <td>:</td>
                    <td><?= indo_currency2($pembelian->fn_total_nilai_beli) ?></td>
                </tr>
                <tr>
                    <td colspan="12"><br><br><br></td>
                </tr>
                <tr>
                    <td colspan="9"><br><br></td>
                    <td colspan="3" align="center">
                        Mengetahui
                        <br>
                        <br>
                        <br>
                        <b>(<?= ucfirst($pembelian->name) ?>)</b>
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