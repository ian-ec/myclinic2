<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Registrasi Masuk</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Registrasi Masuk</a></li>
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
                <div class="float-right">
                    <a href="<?= site_url('registrasi/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <br>
                <br>
                <table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Registrasi</th>
                            <th>No RM</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Layanan</th>
                            <th>Jaminan</th>
                            <th><i class="fas fa-cog"></th>
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
                                <td><?= $data->fs_nm_kelamin ?></td>
                                <td>
                                    <?php
                                    $tanggal = new DateTime($data->fd_tgl_lahir);
                                    $today = new DateTime('today');
                                    $y = $today->diff($tanggal)->y;
                                    echo $y . " tahun ";
                                    ?>
                                </td>
                                <td><?= $data->fs_nm_layanan ?></td>
                                <td><?= $data->fs_nm_jaminan ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('registrasi/edit/' . $data->fs_id_registrasi) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('registrasi/del/' . $data->fs_id_registrasi) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
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