<script>
    function printContent(el) /*el di sini sebagai perwakilan dari id-id di bawah */ {
        var restorepage = document.body.innerHTML;
        var printcontent = document.getElementById(el).innerHTML;
        document.body.innerHTML = printcontent;
        window.print(); /*fungsi untuk mencetak*/
        location.href = '<?= site_url('info_kas') ?>';
    }
</script>

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Kas
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Kas</a></li>
    </ol>
</section>
<section class="content">
    <div class="box">
        <div class="box-header">
            <div class="row">
                <form action="<?= site_url('info_kas') ?>" method="POST">
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="awal" value="<?= date('Y-m-01') ?>" autocomplete="off">
                    </div>
                    <div class="col-md-2">
                        <input type="date" class="form-control" name="akhir" value="<?= date('Y-m-d') ?>" autocomplete="off">
                    </div>
                    <div class="col-md-1">
                        <input type="submit" class="btn btn-info btn-flat" name="proses" value="Proses">
                    </div>
                    <div class="col-md-1">
                        <button onclick="printContent('cetak')" class="btn btn-success btn-flat">Cetak</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="box-body" id="cetak">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td align="center"><strong>
                                        <h3> Laporan Kas <?= $parameter->aplication_name ?></h3>
                                    </strong> </td>
                            </tr>
                            <tr>
                                <td align="center"><strong>Periode : <?= indo_date($tglawal) ?> - <?= indo_date($tglakhir) ?> </strong></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <td width="20%"><strong>Saldo Awal</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="background-color:aqua">
                                    <strong>
                                        <?php
                                        $pembelian = $saldo_awal_pembelian->saldo_awal_pembelian;
                                        $penjualan = $saldo_awal_penjualan->saldo_awal_penjualan;
                                        $kas_out = $saldo_awal_kas_out->saldo_awal_kas_out;
                                        $kas_in = $saldo_awal_kas_in->saldo_awal_kas_in;
                                        $saldo_awal = $penjualan + $kas_in - $pembelian + $kas_out;
                                        echo indo_currency($saldo_awal);
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%"><strong>Pemasukan</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Transaksi Penjualan</td>
                                <td><?= indo_currency($nilai_penjualan->nilai_penjualan) ?></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <?php foreach ($nilai_kas_in as $ki) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $ki->fs_nm_jenis ?></td>
                                    <td><?= indo_currency($ki->kas_in) ?></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td><strong>Pengeluaran</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>Transaksi Pembelian</td>
                                <td></td>
                                <td><?= indo_currency($nilai_pembelian->nilai_pembelian) ?></td>
                                <td></td>
                            </tr>
                            <?php foreach ($nilai_kas_out as $ko) { ?>
                                <tr>
                                    <td></td>
                                    <td><?= $ko->fs_nm_jenis ?></td>
                                    <td></td>
                                    <td><?= indo_currency($ko->kas_out) ?></td>
                                    <td></td>
                                </tr>
                            <?php } ?>
                            <tr>
                                <td><strong>Total Kas</strong></td>
                                <td></td>
                                <td><strong> <?= indo_currency($nilai_penjualan->nilai_penjualan + $nilai_kas_in_total->kas_in_total) ?></strong></td>
                                <td><strong> <?= indo_currency($nilai_pembelian->nilai_pembelian + $nilai_kas_out_total->kas_out_total) ?></strong></td>
                                <td style="background-color:aqua">
                                    <strong>
                                        <?php
                                        $pemasukan = $nilai_penjualan->nilai_penjualan + $nilai_kas_in_total->kas_in_total;
                                        $pengeluaran = $nilai_pembelian->nilai_pembelian + $nilai_kas_out_total->kas_out_total;
                                        $total = $pemasukan - $pengeluaran;
                                        echo indo_currency($total)
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Saldo akhir</strong></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td style="background-color:aqua">
                                    <strong>
                                        <?php
                                        $saldo_akhir = $saldo_awal + $total;
                                        echo indo_currency($saldo_akhir)
                                        ?>
                                    </strong>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>