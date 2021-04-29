<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Golongan</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Golongan</a></li>
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
                <form action="<?= site_url('golongan/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode golongan</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_golongan ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_golongan" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_golongan;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_golongan;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama golongan</label>
                        <input type="text" name="fs_nm_golongan" value="<?= $row->fs_nm_golongan ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('golongan') ?>" class="btn btn-warning btn-flat">
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