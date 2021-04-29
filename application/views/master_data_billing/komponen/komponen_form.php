<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Komponen Tarif</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Komponen Tarif</a></li>
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
                <form action="<?= site_url('komponen/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode komponen</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_komponen ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_komponen" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_komponen;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_komponen;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama komponen</label>
                        <input type="text" name="fs_nm_komponen" value="<?= $row->fs_nm_komponen ?>" class="form-control">
                    </div>
                    <div class="custom-control custom-checkbox custom-checkbox-outline custom-checkbox-primary mb-3">
                        <input type="hidden" name="fb_medis" value="0">
                        <input type="checkbox" name="fb_medis" class="custom-control-input" id="customCheckcolor1" value="1" <?= $row->fb_medis == '1' ? 'checked' : NULL ?>>
                        <label class="custom-control-label" for="customCheckcolor1">Medis</label>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('komponen') ?>" class="btn btn-warning btn-flat">
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