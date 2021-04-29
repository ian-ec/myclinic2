<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Tarif</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tarif</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="float-right">
            <a href="<?= site_url('tarif') ?>" class="btn btn-warning btn-flat btn-sm">
                <i class="fa fa-undo"></i> Kembali
            </a>
            <br>
            <br>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Kode Tarif</td>
                            <td>:</td>
                            <td><?= $tarif->fs_kd_tarif ?></td>
                        </tr>
                        <tr>
                            <td>Nama Tarif</td>
                            <td>:</td>
                            <td><?= $tarif->fs_nm_tarif ?></td>
                        </tr>
                        <tr>
                            <td>Rekap Cetak</td>
                            <td>:</td>
                            <td><?= $tarif->fs_nm_rekapcetak ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">Komponen tarif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($komponen as $kp) { ?>
                            <tr>
                                <td style="width: 10%;"><?= $no++ ?></td>
                                <td><?= $kp->fs_nm_komponen ?></td>
                                <td><?= indo_currency($kp->fn_nilai) ?></td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <td colspan="2" align="right">Nilai tarif :</td>
                            <td><?= indo_currency($tarif->fn_nilai_tarif) ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2">Layanan tarif</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($layanan as $ly) { ?>
                            <tr>
                                <td style="width: 10%;"><?= $no++ ?></td>
                                <td><?= $ly->fs_nm_layanan ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>