<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 50%;
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
        <div class="head">
            <table cellspacing=" 0" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 60%;"><b><?= indo_date($penjualan->fd_tgl_penjualan) ?></b></td>
                        <td style="width: 15%;">Kasir</td>
                        <td style="width: 5%;">:</td>
                        <td style="text-align: right;"><b><?= ucfirst($penjualan->username) ?></b></td>
                    </tr>
                    <tr>
                        <td style="width: 60%;"> <b><?= $penjualan->fs_kd_penjualan ?></b></td>
                        <td style="width: 15%;">Pasien</td>
                        <td style="width: 5%;">:</td>
                        <td style="text-align: right;"><b><?= $penjualan->fs_kd_registrasi == null ? 'Umum' : $penjualan->fs_kd_registrasi ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="">
            <table cellspacing="0" cellpadding="0">
                <tr>
                    <td><b> Barang</b></td>
                    <td width="5%" align="right"><b> Qty|</b></td>
                    <td width="15%" align="right"><b> Hrg*|</b></td>
                    <td width="15%" align="right"><b> Disc*|</b></td>
                    <td width="15%" align="right"><b> Total*</b></td>
                </tr>
                <?php foreach ($penjualan_detail as $key => $data) { ?>
                    <tr>
                        <td><?= $data->fs_nm_barang ?></td>
                        <td align="right" style="vertical-align: top;"><?= $data->fn_qty ?>|</td>
                        <td align="right" style="vertical-align: top;"><?= indo_currency2($data->harga_jual) ?>|</td>
                        <td align="right" style="vertical-align: top;"><?= indo_currency2($data->fn_diskon_harga_jual) ?>|</td>
                        <td align="right" style="vertical-align: top;"><?= indo_currency2($data->fn_total_harga_jual) ?></td>
                    </tr>
                <?php } ?>
                <?php foreach ($racik as $rc => $data_racik) { ?>
                    <tr valign="top">
                        <td><?= $data_racik->fs_nm_racik ?><?php $id = $data_racik->fs_id_racik;
                                                            $detail_racik = $this->racik_m->get_racik_detail($id)->result();
                                                            foreach ($detail_racik as $dr => $d) { ?><br> - <?= $d->fs_nm_barang ?> x <?= $d->fn_qty ?> <?php }                                                                                                                                                                ?><br></td>
                        <td align="right"><?= $data_racik->fn_qty_racik ?>|</td>
                        <td align="right">0|</td>
                        <td align="right">0|</td>
                        <td align="right"><?= indo_currency2($data_racik->fn_nilai_jual_racik) ?></td>
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
            <b>-- Terima Kasih --</b> <br>
            <b>Atas Kunjungan Anda</b>
        </div>
    </div>
</body>

</html>