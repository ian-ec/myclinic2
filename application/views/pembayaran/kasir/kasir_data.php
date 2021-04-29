<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Registrasi Keluar</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Registrasi Keluar</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <table id="table1" class="table table-striped table-bordered dt-responsive nowrap table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Registrasi</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Layanan</th>
                            <th>Jaminan</th>
                            <th>Status</th>
                            <th>Nilai Bill</th>
                            <th class="text-center" style="width: 5%;"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width:5%;"><?= $no++ ?></td>
                                <td><?= $data->fs_kd_registrasi ?></td>
                                <td><?= $data->fs_kd_rm ?></td>
                                <td><?= $data->fs_nm_pasien ?></td>
                                <td><?= $data->fs_nm_layanan ?></td>
                                <td><?= $data->fs_nm_jaminan ?></td>
                                <td>
                                    <div class="btn btn-<?= $data->fs_id_status_pasien == 1 ? 'primary' : null ?><?= $data->fs_id_status_pasien == 2 ? 'success' : null ?><?= $data->fs_id_status_pasien == 3 ? 'pink' : null ?><?= $data->fs_id_status_pasien == 4 ? 'warning' : null ?>
                                    btn-sm waves-effect btn-label waves-light"><i class="
                                    <?= $data->fs_id_status_pasien == 1 ? 'fas fa-clipboard-list' : null ?>
                                    <?= $data->fs_id_status_pasien == 2 ? 'fas fa-syringe' : null ?>
                                    <?= $data->fs_id_status_pasien == 3 ? 'fas fa-capsules' : null ?>
                                    <?= $data->fs_id_status_pasien == 4 ? 'fas fa-undo' : null ?>
                                    label-icon"></i>
                                        <?= $data->fs_id_status_pasien == 1 ? 'Pendaftaran' : null ?>
                                        <?= $data->fs_id_status_pasien == 2 ? 'Tindakan Medis' : null ?>
                                        <?= $data->fs_id_status_pasien == 3 ? 'Pemberian Obat' : null ?>
                                        <?= $data->fs_id_status_pasien == 4 ? 'Batal Keluar' : null ?>
                                    </div>
                                </td>
                                <td><?= indo_currency($data->grandtotal) ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('kasir/bayar/' . $data->id_registrasi) ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Bayar">
                                        <i class="far fa-money-bill-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>