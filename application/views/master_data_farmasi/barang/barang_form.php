<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Barang / Obat</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Barang / Obat</a></li>
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
                <form action="<?= site_url('barang/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode barang</label>
                                <input type="hidden" name="id" value="<?= $row->fs_id_barang ?>">
                                <input type="text" style="background-color: lavender;" name="fs_kd_barang" value="<?php
                                                                                                                    if ($page == 'add') {
                                                                                                                        echo $no_barang;
                                                                                                                    } else {
                                                                                                                        echo $row->fs_kd_barang;
                                                                                                                    }
                                                                                                                    ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Barcode</label>
                                <input type="text" name="fs_kd_barcode" value="<?= $row->fs_kd_barcode ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Nama barang</label>
                                <input type="text" name="fs_nm_barang" value="<?= $row->fs_nm_barang ?>" class="form-control" required>
                            </div>
                            <div class="form-group">
                                <label for="">Golongan</label>
                                <select name="fs_id_golongan" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($golongan->result() as $gol) { ?>
                                        <option value="<?= $gol->fs_id_golongan ?>" <?= $row->fs_id_golongan == $gol->fs_id_golongan ? 'selected' : '' ?>><?= $gol->fs_nm_golongan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Group</label>
                                <select name="fs_id_group" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($group->result() as $gr) { ?>
                                        <option value="<?= $gr->fs_id_group ?>" <?= $row->fs_id_group == $gr->fs_id_group ? 'selected' : '' ?>><?= $gr->fs_nm_group ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Satuan</label>
                                <select name="fs_id_satuan" class="form-control select2" required>
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($satuan->result() as $sat) { ?>
                                        <option value="<?= $sat->fs_id_satuan ?>" <?= $row->fs_id_satuan == $sat->fs_id_satuan ? 'selected' : '' ?>><?= $sat->fs_nm_satuan ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
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
                                <label for="">Etiket</label>
                                <select name="fs_id_etiket" class="form-control select2">
                                    <option value="">- Pilih -</option>
                                    <?php foreach ($etiket->result() as $etk) { ?>
                                        <option value="<?= $etk->fs_id_etiket ?>" <?= $row->fs_id_etiket == $etk->fs_id_etiket ? 'selected' : '' ?>><?= $etk->fs_nm_etiket ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">HPP</label>
                                    <input type="number" name="fn_harga_beli" value="<?= $row->fn_harga_beli ?>" class="form-control">
                                </div>
                                <div class="col-sm-6">
                                    <label for="">HNA</label>
                                    <input type="number" style="background-color: lavender;" name="fn_hna" value="<?= $row->fn_hna ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="">Profit % </label>
                                <spanr style="color: red ;">(Kosongkan bilang memakai harga bebas)</spanr>
                                <input type="number" name="fn_profit" value="<?= $row->fn_profit ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Harga Bebas</label>
                                <input type="number" name="fn_harga_jual" value="<?= $row->fn_harga_jual ?>" class="form-control">
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <label for="">Min*</label>
                                    <input type="number" name="fn_stok_min" value="<?= $row->fn_stok_min ?>" class="form-control" required>
                                </div>
                                <div class="col-sm-6">
                                    <label for="">Max*</label>
                                    <input type="number" name="fn_stok_max" value="<?= $row->fn_stok_max ?>" class="form-control" required>
                                </div>
                            </div>
                            <div class="form-group" style="padding-top: 43px;">
                                <button type="submit" name="<?= $page ?>" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                                <a href="<?= site_url('barang') ?>" class="btn btn-warning btn-flat float-right">
                                    <i class="fas fa-undo"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>