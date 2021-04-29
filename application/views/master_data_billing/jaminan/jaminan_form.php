<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Jaminan</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Jaminan</a></li>
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
                <form action="<?= site_url('jaminan/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode Jaminan</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_jaminan ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_jaminan" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_jaminan;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_jaminan;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama jaminan</label>
                        <input type="text" name="fs_nm_jaminan" value="<?= $row->fs_nm_jaminan ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="fs_alamat" class="form-control"><?= $row->fs_alamat ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">No Telephon</label>
                        <input type="text" name="fs_telp" value="<?= $row->fs_telp ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary   btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('jaminan') ?>" class="btn btn-warning btn-flat">
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