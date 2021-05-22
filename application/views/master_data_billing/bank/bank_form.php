<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Bank</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bank</a></li>
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
                <form action="<?= site_url('bank/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="form-group">
                        <label for="">Kode Kartu</label>
                        <input type="hidden" name="id" value="<?= $row->fs_id_bank ?>">
                        <input type="text" name="fs_kd_bank" style="background-color: lavender;" value="<?php if ($page == 'add') {
                                                                                                            echo  $no_bank;
                                                                                                        } else {
                                                                                                            echo $row->fs_kd_bank;
                                                                                                        } ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Kartu</label>
                        <input type="text" name="fs_nm_bank" value="<?= $row->fs_nm_bank ?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Jenis Kartu</label>
                        <select name="fs_kd_jenis_kartu" id="" class="form-control select2" style="width: 100%;" required>
                            <option value="">-- Pilih Jenis Kartu --</option>
                            <option value="1" <?= $row->fs_kd_jenis_kartu == '1' ? 'selected' : null ?>>Debit Card</option>
                            <option value="2" <?= $row->fs_kd_jenis_kartu == '2' ? 'selected' : null ?>>Credit Card</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Bank Group</label>
                        <select name="fs_id_bank_group" class="form-control select2" required>
                            <option value="">- Pilih Bank Group -</option>
                            <?php foreach ($bank_group->result() as $bg) { ?>
                                <option value="<?= $bg->fs_id_bank_group ?>" <?= $row->fs_id_bank_group == $bg->fs_id_bank_group ? 'selected' : '' ?>><?= $bg->fs_nm_bank_group ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('bank') ?>" class="btn btn-warning btn-flat">
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