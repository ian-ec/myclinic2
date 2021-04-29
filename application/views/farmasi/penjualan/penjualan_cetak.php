<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 100mm;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
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
        <div class="head">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td style="width: 200px;">
                        <strong><?= indo_date($penjualan->fd_tgl_penjualan) ?></strong>
                    </td>
                    <td>Kasir</td>
                    <td style="text-align: center; width: 10px;">:</td>
                    <td style="text-align: right;">
                        <strong><?= ucfirst($penjualan->username) ?></strong>
                    </td>
                </tr>
                <tr>
                    <td>
                        <strong><?= $penjualan->fs_kd_penjualan ?></strong>
                    </td>
                    <td>Pasien</td>
                    <td style="text-align: center; width: 10px;">:</td>
                    <td style="text-align: right;">
                        <strong><?= $penjualan->fs_kd_registrasi == null ? 'Umum' : $penjualan->fs_kd_registrasi ?>
                    </td>
                </tr>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="0" cellpadding="0">
                <tr>
                    <td width="40%"><b> Barang</b></td>
                    <td width="5%"><b> Qty</b></td>
                    <td width="10%" align="right"><b> Hrg*</b></td>
                    <td width="5%" align="right"><b> Disc*</b></td>
                    <td width="10%" align="right"><b> Total*</b></td>
                </tr>
                <?php foreach ($penjualan_detail as $key => $data) { ?>
                    <tr>
                        <td><?= $data->fs_nm_barang ?></td>
                        <td><?= $data->fn_qty ?></td>
                        <td align="right"><?= indo_currency2($data->harga_jual) ?></td>
                        <td align="right"><?= indo_currency2($data->fn_diskon_harga_jual) ?></td>
                        <td align="right"><?= indo_currency2($data->fn_total_harga_jual) ?></td>
                    </tr>
                <?php } ?>
                <tr>
                    <td colspan="5" style="border-bottom: 1px dashed; padding-top: 5px;"></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-top: 5px;" colspan="4"><b> Sub Total :</b></td>
                    <td style="text-align: right; padding-top: 5px;" colspan="1"><?= indo_currency2($penjualan->fn_nilai_jual) ?></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-top: 5px;" colspan="4"><b> Disc :</b></td>
                    <td style="text-align: right; padding-top: 5px;" colspan="1"><?= indo_currency2($penjualan->fn_diskon) ?></td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-top: 5px;" colspan="4"><b> Total :</b></td>
                    <td style="text-align: right; padding-top: 5px;" colspan="1"><?= indo_currency2($penjualan->fn_total_nilai_jual) ?></td>
                </tr>

            </table>
        </div>
        <div class="thanks">
            -- Terima Kasih -- <br>
            Atas Kunjungan Anda
        </div>
    </div>
</body>

</html>