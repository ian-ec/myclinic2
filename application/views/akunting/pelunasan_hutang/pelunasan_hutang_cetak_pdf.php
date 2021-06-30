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

        .pelunasan_hutang {
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
        <div class="pelunasan_hutang">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode Trs</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $pelunasan_hutang->fs_kd_pelunasan_hutang ?></b></td>
                        <td style="width: 20%;">Nama Bank</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $pelunasan_hutang->fs_nm_bank_group ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><b><?= indo_date($pelunasan_hutang->fd_tgl_pelunasan_hutang) ?></b></td>
                        <td>Kode Rekening</td>
                        <td>:</td>
                        <td><b><?= $pelunasan_hutang->fn_no_rekening ?></b></td>
                    </tr>
                    <tr>
                        <td>Distributor</td>
                        <td>:</td>
                        <td><b><?= $pelunasan_hutang->fs_nm_distributor ?></b></td>
                        <td>Petugas</td>
                        <td>:</td>
                        <td><b><?= $pelunasan_hutang->name ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <thead>
                    <tr>
                        <th style="width:5%;">No.</th>
                        <th style="width:25%;">Kode Pembelian</th>
                        <th>Tgl Hutang</th>
                        <th style="width:10%; text-align: right;">Hutang</th>
                        <th style="width:10%; text-align: right;">Pelunasan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($pelunasan_hutang_detail->result() as $td => $data) { ?>
                        <tr>
                            <td style="width:5%;"><?= $no++ ?></td>
                            <td style="width:15%;"><?= $data->fs_kd_pembelian ?></td>
                            <td><?= indo_date($data->fd_tgl_pembelian) ?></td>
                            <td style="width:30%; text-align: right;"><?= indo_currency2($data->fn_hutang) ?></td>
                            <td style="width:20%; text-align: right;"><?= indo_currency2($data->fn_nilai_pelunasan) ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
        <table cellspacing="10" cellpadding="0">
            <tbody style="text-align: right;">
                <tr>
                    <td><b>Subtotal</b></td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($pelunasan_hutang->fn_subtotal) ?></td>
                </tr>
                <tr>
                    <td><b>Diskon</b></td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($pelunasan_hutang->fn_diskon) ?></td>
                </tr>
                <tr>
                    <td><b>Grand Total</b></td>
                    <td style="width: 1%;">:</td>
                    <td style="width: 10%;"><?= indo_currency2($pelunasan_hutang->fn_grandtotal) ?></td>
                </tr>
            </tbody>
        </table>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
        </div>
    </div>
</body>

</html>