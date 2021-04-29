<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Pegawai</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pegawai</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md 3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body">
                <form action="<?= site_url('pegawai/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode pegawai</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_pegawai ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_pegawai" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_pegawai;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_pegawai;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama pegawai</label>
                        <input type="text" name="fs_nm_pegawai" value="<?= $row->fs_nm_pegawai ?>" class="form-control" required>
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
                        <label for="">Tgl Lahir</label>
                        <input type="date" name="fd_tgl_lahir" value="<?= $row->fd_tgl_lahir ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="fs_alamat" class="form-control"><?= $row->fs_alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Telephon</label>
                        <input type="text" name="fs_telp" value="<?= $row->fs_telp ?>" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan Tugas</label>
                        <select name="fs_id_satgas" class="form-control select2" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($satgas->result() as $key => $sat) { ?>
                                <option value="<?= $sat->fs_id_satgas ?>" <?= $row->fs_id_satgas == $sat->fs_id_satgas ? 'selected' : '' ?>><?= $sat->fs_nm_satgas ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('pegawai') ?>" class="btn btn-warning btn-flat">
                                <i class="fas fa-undo"></i> Kembali
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>