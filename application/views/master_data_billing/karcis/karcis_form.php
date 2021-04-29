<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Karcis</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Karcis</a></li>
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
                <form action="<?= site_url('karcis/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode karcis</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_karcis ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_karcis" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_karcis;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_karcis;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama karcis</label>
                        <input type="text" name="fs_nm_karcis" value="<?= $row->fs_nm_karcis ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Rekap Cetak</label>
                        <select name="fs_id_rekapcetak" class="form-control select2" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($rekapcetak->result() as $rc) { ?>
                                <option value="<?= $rc->fs_id_rekapcetak ?>" <?= $row->fs_id_rekapcetak == $rc->fs_id_rekapcetak ? 'selected' : '' ?>><?= $rc->fs_nm_rekapcetak ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Nilai</label>
                        <input type="number" name="fn_nilai" value="<?= $row->fn_nilai ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('karcis') ?>" class="btn btn-warning btn-flat">
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