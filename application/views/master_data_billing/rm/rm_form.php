<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Rekam Medis</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Rekam Medis</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <form action="<?= site_url('rm/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode RM *</label>
                                <input type="hidden" name="id" value="<?= $row->fs_id_rm ?>">
                                <input style="background-color: lavender;" type="text" name="fs_kd_rm" value="<?php
                                                                                                                if ($page == 'add') {
                                                                                                                    echo $no_rm;
                                                                                                                } else {
                                                                                                                    echo $row->fs_kd_rm;
                                                                                                                }
                                                                                                                ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Pasien *</label>
                                <input type="text" name="fs_nm_pasien" value="<?= $row->fs_nm_pasien ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <select name="fs_kd_kelamin" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($kelamin->result() as $key => $sex) { ?>
                                        <option value="<?= $sex->fs_kd_kelamin ?>" <?= $row->fs_kd_kelamin == $sex->fs_kd_kelamin ? 'selected' : '' ?>><?= $sex->fs_nm_kelamin ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir *</label>
                                <input type="text" name="fs_tmpt_lahir" value="<?= $row->fs_tmpt_lahir ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir *</label>
                                <input type="date" name="fd_tgl_lahir" value="<?= $row->fd_tgl_lahir ?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alamat *</label>
                                <input type="text" name="fs_alamat" value="<?= $row->fs_alamat ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Telp *</label>
                                <input type="text" name="fs_telp" value="<?= $row->fs_telp ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">No Identitas *</label>
                                <input type="text" name="fs_identitas" value="<?= $row->fs_identitas ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Agama</label>
                                <select name="fs_kd_agama" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($agama->result() as $key => $aa) { ?>
                                        <option value="<?= $aa->fs_kd_agama ?>" <?= $row->fs_kd_agama == $aa->fs_kd_agama ? 'selected' : '' ?>><?= $aa->fs_nm_agama ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group" style="padding-top: 28px;">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                                <div class="float-right">
                                    <a href="<?= site_url('rm') ?>" class="btn btn-warning btn-flat">
                                        <i class="fas fa-undo"></i> Kembali
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>