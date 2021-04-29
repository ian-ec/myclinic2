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
                        <th style="width: 15%;">Transaksi</th>
                        <th>Detail Transaksi</th>
                        <th style="width:10%; text-align: right;">Subtotal</th>
                        <th style="width:10%; text-align: right;">Diskon</th>
                        <th style="width:10%; text-align: right;">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    foreach ($detail_reg->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data->fs_kd_registrasi ?></b></td>
                            <td><b><?= $data->fs_nm_layanan ?></b> / <?= $data->fs_nm_karcis ?> </td>
                            <td style="text-align: right;"><?= indo_currency3($data->fn_subtotal) ?></td>
                            <td style="text-align: right;"><?= indo_currency3($data->fn_diskon) ?></td>
                            <td style="text-align: right;"><?= indo_currency3($data->fn_grandtotal) ?></td>
                        </tr>
                    <?php } ?>
                    <?php
                    foreach ($detail_tindakan->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data->fs_kd_trs_tindakan ?></b></td>
                            <td colspan="4"><b><?= $data->fs_nm_layanan ?></b></td>
                        </tr>
                        <?php
                        $id_tindakan = $data->fs_id_trs_tindakan;
                        $detail_tindakan = $this->tindakan_m->get_tindakan_detail($id_tindakan)->result();
                        foreach ($detail_tindakan as $tindakan => $tdk) { ?>
                            <tr>
                                <td colspan="2"></td>
                                <td>
                                    <li><?= $tdk->fs_nm_tarif ?> x <?= $tdk->fn_qty ?></li>
                                </td>
                                <td style="text-align: right;"><?= indo_currency3($tdk->fn_nilai_tarif * $tdk->fn_qty) ?></td>
                                <td style="text-align: right;"><?= indo_currency3($tdk->fn_diskon * $tdk->fn_qty) ?></td>
                                <td style="text-align: right;"><?= indo_currency3($tdk->fn_total) ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>
                    <?php
                    foreach ($detail_penjualan->result() as $key => $data) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><b><?= $data->fs_kd_penjualan ?></b></td>
                            <td colspan="4"><b>Apotek</b></td>
                        </tr>
                        <?php
                        $id_penjualan = $data->fs_id_penjualan;
                        $detail_penjualan = $this->penjualan_m->get_penjualan_detail($id_penjualan)->result();
                        foreach ($detail_penjualan as $penjualan => $jual) { ?>
                            <tr>
                                <td colspan="2"></td>
                                <td>
                                    <li><?= $jual->fs_nm_barang ?> x <?= $jual->fn_qty ?></li>
                                </td>
                                <td style="text-align: right;"><?= indo_currency3($jual->harga_jual * $jual->fn_qty) ?></td>
                                <td style="text-align: right;"><?= indo_currency3($jual->fn_diskon_harga_jual * $jual->fn_qty) ?></td>
                                <td style="text-align: right;"><?= indo_currency3($jual->fn_total_harga_jual) ?></td>
                            </tr>
                        <?php } ?>
                        <?php
                        $detail_racik = $this->racik_m->get_racik($id_penjualan)->result();
                        foreach ($detail_racik as $racik => $rc) { ?>
                            <?php
                            $id_racik = $rc->fs_id_racik;
                            $data_racik = $this->racik_m->get_racik_detail($id_racik)->result();
                            ?>
                            <tr>
                                <td colspan="2"></td>
                                <td>
                                    <li><?= $rc->fs_nm_racik ?> x <?= $rc->fn_qty_racik ?> :</li>
                                    <a></a><?php foreach ($data_racik as $dtrck => $dt) { ?>
                                        <br>- <?= $dt->fs_nm_barang ?> x <?= $dt->fn_qty ?>
                                        <a></a><?php } ?>
                                </td>
                                <td style="text-align: right;"><?= indo_currency3($rc->fn_nilai_jual_racik) ?></td>
                                <td style="text-align: right;"><?= indo_currency3(0) ?></td>
                                <td style="text-align: right;"><?= indo_currency3($rc->fn_nilai_jual_racik) ?></td>
                            </tr>
                        <?php } ?>
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