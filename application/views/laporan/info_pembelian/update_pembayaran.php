<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Pembelian</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Pembelian</a></li>
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
                <form action="<?= site_url('info_pembelian/process') ?>" method="POST">
                    <div class="form-group">
                        <label for="">Kode Pembelian</label>
                        <input type="hidden" name="fs_id_pembelian" value="<?= $pembelian->fs_id_pembelian ?>">
                        <input type="text" style="background-color: lavender;" name="fs_kd_pembelian" value="<?= $pembelian->fs_kd_pembelian ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Distirbutor</label>
                        <input type="text" style="background-color: lavender;" name="fs_nm_distributor" value="<?= $pembelian->fs_nm_distributor ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Total Harga Pembelian</label>
                        <input type="text" style="background-color: lavender;" name="fn_total_nilai_beli" value="<?= indo_currency($pembelian->fn_total_nilai_beli) ?>" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="jns_bayar">Jenis Bayar</label>
                        <select name="fn_jenis_bayar" class="form-control select2" style="width: 100%;">
                            <option value="1" <?= $pembelian->fn_jenis_bayar == '1' ? 'selected' : null ?>>Lunas</option>
                            <option value="2" <?= $pembelian->fn_jenis_bayar == '2' ? 'selected' : null ?>>Hutang</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tgl Pembayaran</label>
                        <input type="date" name="fd_tgl_bayar" value="<?= $pembelian->fd_tgl_bayar ?>" class="form-control" id="datepicker">
                    </div>
                    <div class="form-group">
                        <button type="submit" name="update" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button type="reset" class="btn btn-primary btn-flat">Reset</button>
                        <div class="float-right">
                            <a href="<?= site_url('info_pembelian') ?>" class="btn btn-warning btn-flat">
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