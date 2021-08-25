<style type="text/css">
    /* .scroll{
    display:block;
    border: 1px solid red;
    padding:5px;
    margin-top:5px;
    width:300px;
    height:50px;
    overflow:scroll;
} */
    .auto {
        display: block;
        padding: 5px;
        /* margin-top: 5px; */
        width: 100%;
        height: 400px;
        overflow: auto;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" id="fd_tgl_penjualan" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right" style="padding-left: 1px;">Kode Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_kd_penjualan" value="<?= $no_penjualan ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">No Reg</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_registrasi" value="">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_registrasi" value="" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-registrasi">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nama Pasien</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_pasien" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Layanan Stok</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_layanan">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_layanan" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-layanan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Barcode</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_barang">
                        <input type="hidden" id="fs_kd_barcode">
                        <input type="hidden" id="fn_harga_beli">
                        <input type="hidden" id="fn_harga_jual">
                        <input type="hidden" id="fn_stok">
                        <input type="text" id="fs_kd_barang" class="form-control" readonly style="background-color: lavender;">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" id="barang" data-toggle="modal" data-target="#modal-barang">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nama Barang</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_barang" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Etiket</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_etiket" value="">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_etiket" value="" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-etiket">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Qty</label>
                    <div class="col-sm-8">
                        <input type="number" id="fn_qty" value="1" min="1" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right"></label>
                    <div class="col-sm-8">
                        <button type="button" id="add_cart" class="btn btn-primary btn-flat">
                            <i class="fa fa-cart-plus"></i> Tambah
                        </button>
                        <button type="button" data-toggle="modal" data-target="#modal-racik" class="btn btn-warning btn-flat">
                            <i class="fas fa-capsules"></i> Racik
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="sub_total" value="" class="form-control" readonly>
                        <input type="hidden" id="sub_total_beli" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Diskon</label>
                    <div class="col-sm-8">
                        <input type="number" id="discount" value="0" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Grand Total</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="grand_total" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-12 text-right">
                        <button id="bayar" data-toggle="modal" data-target="#modal-bayar" class="btn btn-flat btn-success">
                            <i class="fa fa-paper-plane"></i> Bayar
                        </button>
                        <button id="cancel_payment" class="btn btn-flat btn-danger">
                            <i class="fa fa-ban"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body auto">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th width="4%">#</th>
                            <th width="15%">Barcode</th>
                            <th>Nama Barang</th>
                            <th>Etiket</th>
                            <th class="text-center" width="10%">Harga</th>
                            <th class="text-center" width="10%">Qty</th>
                            <th class="text-center" width="10%">Diskon</th>
                            <th class="text-center" width="10%">Total</th>
                            <th class="text-center" width="10%"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                        <?php $this->view('farmasi/penjualan/cart_data') ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-8 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-4">
                        <input type="number" style="background-color: lavender;" id="sub_total" value="" class="form-control" readonly>
                        <input type="hidden" id="sub_total_beli" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-8 col-form-label text-right">Diskon</label>
                    <div class="col-sm-4">
                        <input type="number" id="discount" value="0" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-8 col-form-label text-right">Grand Total</label>
                    <div class="col-sm-4">
                        <input type="number" style="background-color: lavender;" id="grand_total" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-12 text-right">
                        <button id="process_payment" class="btn btn-flat btn-success">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <!-- <button id="bayar" data-toggle="modal" data-target="#modal-bayar" class="btn btn-flat btn-success">
                                <i class="fa fa-paper-plane"></i> Bayar
                            </button> -->
                        <button id="cancel_payment" class="btn btn-flat btn-danger">
                            <i class="fa fa-ban"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Modal Racik -->
<div class="modal modal-primary fade" id="modal-racik">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-soft-warning">
                <h4 class="modal-title">Racikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <!-- <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right" style="padding-left: 1px;">Kode Racik</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: lavender;" id="fs_kd_racik" value="<?= $no_racik ?>" class="form-control" readonly>
                                </div>
                            </div> -->
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Nama Racik</label>
                                <div class="col-sm-8">
                                    <input type="text" id="fs_nm_racik" value="" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Satuan Racik</label>
                                <div class="col-sm-8">
                                    <select id="fs_id_satuan_racik" class="form-control select2" required style="width: 100%;">
                                        <option value="">- Pilih -</option>
                                        <?php foreach ($satuan as $sat) { ?>
                                            <option value="<?= $sat->fs_id_satuan ?>"><?= $sat->fs_nm_satuan ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Qty Racik</label>
                                <div class="col-sm-8">
                                    <input type="number" id="fn_qty_racik" value="1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Etiket</label>
                                <div class="col-sm-8 input-group">
                                    <input type="hidden" id="fs_id_etiket_racik" value="">
                                    <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_etiket_racik" value="" readonly>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-etiket_racik">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Kode Obat</label>
                                <div class="col-sm-8 input-group">
                                    <input type="hidden" id="fs_id_barang_racik">
                                    <input type="hidden" id="fs_kd_barcode_racik">
                                    <input type="hidden" id="fn_harga_beli_racik">
                                    <input type="hidden" id="fn_harga_jual_racik">
                                    <input type="hidden" id="fn_stok_racik">
                                    <input type="text" id="fs_kd_barang_racik" class="form-control" autofocus>
                                    <span class="input-group-btn">
                                        <button type="button" id="barang-racik" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang_racik">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Nama Barang</label>
                                <div class="col-sm-8">
                                    <input type="text" style="background-color: lavender;" id="fs_nm_barang_racik" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Qty</label>
                                <div class="col-sm-8">
                                    <input type="number" id="fn_qty_obat" value="1" class="form-control">
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right"></label>
                                <div class="col-sm-8 text-right">
                                    <button type="button" id="add_cart_racik" class="btn btn-primary btn-flat">
                                        <i class="fas fa-plus"></i> Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="form-group row mb-2">
                                <label class="col-sm-4 col-form-label text-right">Total</label>
                                <div class="col-sm-8">
                                    <input type="number" style="background-color: lavender;" id="sub_total_racik" value="" class="form-control" readonly>
                                    <input type="hidden" id="sub_total_beli_racik" value="" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="form-group row mb-2">
                                <div class="col-sm-12 text-right">
                                    <button type="button" id="simpan_racik" class="btn btn-success btn-flat">
                                        <i class="fas fa-paper-plane"></i> Simpan
                                    </button>
                                    <button type="button" id="batal_racik" class="btn btn-danger btn-flat">
                                        <i class="fas fa-times"></i> Batal
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-bordered table-striped table-sm">
                                <thead>
                                    <tr>
                                        <th width="5%">No.</th>
                                        <th width="15%">Kode</th>
                                        <th>Nama</th>
                                        <th class="text-center" width="15%">Harga</th>
                                        <th class="text-center" width="10%">Qty</th>
                                        <th class="text-center" width="15%">Total</th>
                                        <th class="text-center" width="5%"><i class="fas fa-cog"></th>
                                    </tr>
                                </thead>
                                <tbody id="cart_racik">
                                    <?php $this->view('farmasi/penjualan/cart_data_racik') ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-warning">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- Modal Racik Detail-->
<div class="modal fade" id="modal-racik-detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-soft-primary">
                <h4 class="modal-title">Detail Racikan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Kode</th>
                                        <th>:</th>
                                        <th><span id="fs_kd_racik_detail"></span></th>
                                    </tr>
                                    <tr>
                                        <th>Nama Racikan</th>
                                        <th>:</th>
                                        <th><span id="fs_nm_racik_detail"></span></th>
                                    </tr>
                                    <tr>
                                        <th>Qty</th>
                                        <th>:</th>
                                        <th><span id="fn_qty_racik_detail"></span> <span id="fs_nm_satuan_detail"></th>
                                    </tr>
                                    <tr>
                                        <th>Etiket</th>
                                        <th>:</th>
                                        <th><span id="fs_nm_etiket_detail"></span></th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Racikan</th>
                                        <th>:</th>
                                        <th><span id="fn_nilai_jual_racik_detail"></span></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <span id="data_detail_racik"></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-primary">
            </div>
        </div>
    </div>
</div>

<!-- Modal Registrasi -->
<div class="modal fade" id="modal-registrasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Registtasi</th>
                            <th>Nama Pasien</th>
                            <th>Jaminan</th>
                            <th>Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($registrasi as $reg) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $reg->fs_kd_registrasi ?></td>
                                <td><?= $reg->fs_nm_pasien ?></td>
                                <td><?= $reg->fs_nm_jaminan ?></td>
                                <td><?= $reg->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_register" data-id="<?= $reg->fs_id_registrasi ?>" data-kode="<?= $reg->fs_kd_registrasi ?>" data-nama="<?= $reg->fs_nm_pasien ?>" data-jaminan="<?= $reg->fs_nm_jaminan ?>" data-layanan="<?= $reg->fs_nm_layanan ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-soft-info">
            </div>
        </div>
    </div>
</div>

<!-- Modal Layanan -->
<div class="modal fade" id="modal-layanan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-layanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Layanan</th>
                            <th>Nama Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($layanan->result() as $ly) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $ly->fs_kd_layanan ?></td>
                                <td><?= $ly->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_layanan" data-id_layanan="<?= $ly->fs_id_layanan ?>" data-kode_layanan="<?= $ly->fs_kd_layanan ?>" data-nama_layanan="<?= $ly->fs_nm_layanan ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-soft-info"></div>
        </div>
    </div>
</div>

<!-- Modal Add Product Barang -->
<div class="modal fade" id="modal-barang">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <span id="data_barang"></span>
            </div>
            <div class="modal-footer bg-soft-info"></div>
        </div>
    </div>
</div>

<!-- Modal Add Product Barang Racik-->
<div class="modal fade" id="modal-barang_racik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Barang Racik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <span id="data_barang_racik"></span>
                <!-- <table class="table table-bordered table-striped  table-sm" id="tabel-barang_racik">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Barcode</th>
                            <th>Barang</th>
                            <th>Satuan</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $brg => $data) { ?>
                            <tr>
                                <td><?= $data->fs_kd_barang ?></td>
                                <td><?= $data->fs_kd_barcode ?></td>
                                <td><?= $data->fs_nm_barang ?></td>
                                <td><?= $data->fs_nm_satuan ?></td>
                                <td class="text-right">
                                    <?php
                                    $harga_jual_profit = ($data->fn_hna * $data->fn_profit / 100) + $data->fn_hna;
                                    $harga_jual = $data->fn_harga_jual;
                                    $profit = $data->fn_profit;
                                    echo indo_currency($profit == 0 ? $harga_jual : round($harga_jual_profit));
                                    ?>
                                </td>
                                <td class="text-right"><?= $data->fn_stok ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" id="select_racik" data-fs_nm_etiket="<?= $data->fs_nm_etiket ?>" data-fs_id_barang="<?= $data->fs_id_barang ?>" data-fs_kd_barcode="<?= $data->fs_kd_barcode ?>" data-fs_id_etiket="<?= $data->fs_id_etiket ?>" data-fs_nm_barang="<?= $data->fs_nm_barang ?>" data-fs_kd_barang="<?= $data->fs_kd_barang ?>" data-fn_harga_beli="<?= $data->fn_harga_beli ?>" data-fn_harga_jual="<?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                            $harga_jual_profit = ($data->fn_hna * $data->fn_profit / 100) + $data->fn_hna;
                                                                                                                                                                                                                                                                                                                                                                                                                                                            $harga_jual = $data->fn_harga_jual;
                                                                                                                                                                                                                                                                                                                                                                                                                                                            $profit = $data->fn_profit;
                                                                                                                                                                                                                                                                                                                                                                                                                                                            echo $profit == 0 ? $harga_jual : round($harga_jual_profit);
                                                                                                                                                                                                                                                                                                                                                                                                                                                            ?>" data-fn_stok="<?= $data->fn_stok ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table> -->
            </div>
            <div class="modal-footer bg-soft-info">
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit Product Barang -->
<div class="modal fade" id="modal-barang-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-primary">
                <h4 class="modal-title">Update Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fs_id_barang_edit">
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Kode Barang</label>
                            <input type="text" style="background-color: lavender;" id="fs_kd_barang_edit" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Nama Barang</label>
                            <input type="text" style="background-color: lavender;" id="fs_nm_barang_edit" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-6">
                            <label for="">Harga Jual</label>
                            <input type="number" style="background-color: lavender;" id="fn_harga_jual_edit" min="0" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <label for="">Qty</label>
                            <input type="number" id="fn_qty_edit" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Etiket</label>
                    <div class="input-group">
                        <input type="hidden" id="fs_id_etiket_edit" value="">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_etiket_edit" value="" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-etiket-edit">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Subtotal</label>
                    <input type="number" style="background-color: lavender;" id="fn_subtotal_edit" min="0" class="form-control" readonly>
                </div>
                <div class="form-group">
                    <label for="discount_item">Diskon</label>
                    <input type="number" id="fn_diskon_edit" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_item">Total</label>
                    <input type="number" style="background-color: lavender;" id="fn_total_edit" min="0" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success"><i class="fa fa-paper-plane"></i> Simpan</button>
                </div>
            </div>
            <div class="modal-footer bg-soft-primary">
            </div>
        </div>
    </div>
</div>

<!-- Modal Etiket -->
<div class="modal fade" id="modal-etiket">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Etiket</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-etiket">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Etiket</th>
                            <th>Nama Etiket</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($etiket as $etk) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $etk->fs_kd_etiket ?></td>
                                <td><?= $etk->fs_nm_etiket ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_etiket" data-fs_id_etiket="<?= $etk->fs_id_etiket ?>" data-fs_kd_etiket="<?= $etk->fs_kd_etiket ?>" data-fs_nm_etiket="<?= $etk->fs_nm_etiket ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer bg-soft-info">
            </div>
        </div>
    </div>
</div>

<!-- Modal Etiket Racik-->
<div class="modal fade" id="modal-etiket_racik">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header  bg-soft-info">
                <h4 class="modal-title">Pilih Etiket Racik</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-etiket_racik">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Etiket</th>
                            <th>Nama Etiket</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($etiket as $etk) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $etk->fs_kd_etiket ?></td>
                                <td><?= $etk->fs_nm_etiket ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_etiket_racik" data-fs_id_etiket_racik="<?= $etk->fs_id_etiket ?>" data-fs_kd_etiket_racik="<?= $etk->fs_kd_etiket ?>" data-fs_nm_etiket_racik="<?= $etk->fs_nm_etiket ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer  bg-soft-info">
            </div>
        </div>
    </div>
</div>

<!-- Modal Etiket Edit-->
<div class="modal fade" id="modal-etiket-edit">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Etiket Edit</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-etiket">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Etiket</th>
                            <th>Nama Etiket</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($etiket as $etk) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $etk->fs_kd_etiket ?></td>
                                <td><?= $etk->fs_nm_etiket ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_etiket_edit" data-fs_id_etiket_edit="<?= $etk->fs_id_etiket ?>" data-fs_kd_etiket_edit="<?= $etk->fs_kd_etiket ?>" data-fs_nm_etiket_edit="<?= $etk->fs_nm_etiket ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer  bg-soft-info">
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '#pilih_register', function() {
        $('#fs_id_registrasi').val($(this).data('id'))
        $('#fs_kd_registrasi').val($(this).data('kode'))
        $('#fs_nm_pasien').val($(this).data('nama'))
        $('#fs_nm_jaminan').val($(this).data('jaminan'))
        // $('#fs_nm_layanan').val($(this).data('layanan'))
        $('#modal-registrasi').modal('hide')
    })

    $(document).on('click', '#select_layanan', function() {
        $('#fs_id_layanan').val($(this).data('id_layanan'))
        $('#fs_kd_layanan').val($(this).data('kode_layanan'))
        $('#fs_nm_layanan').val($(this).data('nama_layanan'))
        $('#modal-layanan').modal('hide')
    })

    $(document).ready(function() {
        $('#tabel-layanan').DataTable({
            columnDefs: [{
                    "targets": [-1],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [0, -1],
                    "orderable": false
                },
            ],
        })
    })

    $(document).on('click', '#pilih_etiket', function() {
        $('#fs_id_etiket').val($(this).data('fs_id_etiket'))
        $('#fs_kd_etiket').val($(this).data('fs_kd_etiket'))
        $('#fs_nm_etiket').val($(this).data('fs_nm_etiket'))
        $('#modal-etiket').modal('hide')
    })

    $(document).on('click', '#pilih_etiket_racik', function() {
        $('#fs_id_etiket_racik').val($(this).data('fs_id_etiket_racik'))
        $('#fs_kd_etiket_racik').val($(this).data('fs_kd_etiket_racik'))
        $('#fs_nm_etiket_racik').val($(this).data('fs_nm_etiket_racik'))
        $('#modal-etiket_racik').modal('hide')
    })

    $(document).on('click', '#pilih_etiket_edit', function() {
        $('#fs_id_etiket_edit').val($(this).data('fs_id_etiket_edit'))
        $('#fs_kd_etiket_edit').val($(this).data('fs_kd_etiket_edit'))
        $('#fs_nm_etiket_edit').val($(this).data('fs_nm_etiket_edit'))
        $('#modal-etiket-edit').modal('hide')
    })

    $(document).ready(function() {
        $('#tabel-etiket').DataTable({
            columnDefs: [{
                    "targets": [-1],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [0, -1],
                    "orderable": false
                },
            ],
        })
    })

    $(document).ready(function() {
        $('#tabel-etiket_racik').DataTable({
            columnDefs: [{
                    "targets": [-1],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [0, -1],
                    "orderable": false
                },
            ],
        })
    })

    $(document).on('click', '#barang', function() {
        var i = 0;
        var data_barang = '<table class="table table-bordered table-striped table-sm" id="tabel-barang">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode</th>' +
            '<th>Nama</th>' +
            '<th>Satuan</th>' +
            '<th>Harga Jual</th>' +
            '<th>Stok</th>' +
            '<th>Pilih</th>' +
            '</thead>'
        data_barang += '<tbody>'
        $.getJSON('<?= site_url('penjualan/stok_barang/') ?>' + $('#fs_id_layanan').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_barang += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + val.fs_nm_satuan + '</td>'
                if (val.fn_profit == 0) {
                    data_barang += '<td>' + currencyFormat(val.fn_harga_jual) + '</td>'
                } else {
                    data_barang += '<td>' + currencyFormat(parseInt(val.fn_hna * val.fn_profit / 100) + parseInt(val.fn_hna)) + '</td>'
                }

                data_barang += '<td>' + val.fn_qty + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-info" id="select" ' +
                    'data-fs_nm_etiket="' + val.fs_nm_etiket + '" ' +
                    'data-fs_id_barang="' + val.fs_id_barang + '" ' +
                    'data-fs_nm_barang="' + val.fs_nm_barang + '" ' +
                    'data-fs_kd_barang="' + val.fs_kd_barang + ' / ' + val.fs_nm_barang + '" ' +
                    'data-fs_id_etiket="' + val.fs_id_etiket + '" ' +
                    'data-fn_harga_beli="' + val.fn_hpp + '" '
                if (val.fn_profit == 0) {
                    data_barang += 'data-fn_harga_jual="' + val.fn_harga_jual + '" '
                } else {
                    data_barang += 'data-fn_harga_jual="' + (parseInt(val.fn_hna * val.fn_profit / 100) + parseInt(val.fn_hna)) + '" '
                }
                data_barang += 'data-fn_stok="' + val.fn_qty + '" >' +
                    '<i class="fa fa-check"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>'
            })
            data_barang += '</tbody></table>'
            $('#data_barang').html(data_barang)
            $('#tabel-barang').DataTable({
                columnDefs: [{
                        "targets": [-1],
                        "className": 'text-center',
                        "orderable": false
                    },
                    {
                        "targets": [0, -1],
                        "orderable": false
                    },
                ],
            })
        })
    })

    $(document).on('click', '#barang-racik', function() {
        var i = 0;
        var data_barang_racik = '<table class="table table-bordered table-striped table-sm" id="tabel-barang-racik">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode</th>' +
            '<th>Nama</th>' +
            '<th>Satuan</th>' +
            '<th>Harga Jual</th>' +
            '<th>Stok</th>' +
            '<th>Pilih</th>' +
            '</thead>'
        data_barang_racik += '<tbody>'
        $.getJSON('<?= site_url('penjualan/stok_barang/') ?>' + $('#fs_id_layanan').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_barang_racik += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + val.fs_nm_satuan + '</td>'
                if (val.fn_profit == 0) {
                    data_barang_racik += '<td>' + currencyFormat(val.fn_harga_jual) + '</td>'
                } else {
                    data_barang_racik += '<td>' + currencyFormat(parseInt(val.fn_hna * val.fn_profit / 100) + parseInt(val.fn_hna)) + '</td>'
                }

                data_barang_racik += '<td>' + val.fn_qty + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-info" id="select_racik" ' +
                    'data-fs_nm_etiket="' + val.fs_nm_etiket + '" ' +
                    'data-fs_id_barang="' + val.fs_id_barang + '" ' +
                    'data-fs_nm_barang="' + val.fs_nm_barang + '" ' +
                    'data-fs_kd_barang="' + val.fs_kd_barang + ' / ' + val.fs_nm_barang + '" ' +
                    'data-fs_id_etiket="' + val.fs_id_etiket + '" ' +
                    'data-fn_harga_beli="' + val.fn_hpp + '" '
                if (val.fn_profit == 0) {
                    data_barang_racik += 'data-fn_harga_jual="' + val.fn_harga_jual + '" '
                } else {
                    data_barang_racik += 'data-fn_harga_jual="' + (parseInt(val.fn_hna * val.fn_profit / 100) + parseInt(val.fn_hna)) + '" '
                }
                data_barang_racik += 'data-fn_stok="' + val.fn_qty + '" >' +
                    '<i class="fa fa-check"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>'
            })
            data_barang_racik += '</tbody></table>'
            $('#data_barang_racik').html(data_barang_racik)
            $('#tabel-barang-racik').DataTable({
                columnDefs: [{
                        "targets": [-1],
                        "className": 'text-center',
                        "orderable": false
                    },
                    {
                        "targets": [0, -1],
                        "orderable": false
                    },
                ],
            })
        })
    })

    $(document).on('click', '#select', function() {
        $('#fs_id_barang').val($(this).data('fs_id_barang'))
        $('#fs_kd_barang').val($(this).data('fs_kd_barang'))
        $('#fs_kd_barcode').val($(this).data('fs_kd_barcode'))
        $('#fs_nm_barang').val($(this).data('fs_nm_barang'))
        $('#fs_id_etiket').val($(this).data('fs_id_etiket'))
        $('#fs_nm_etiket').val($(this).data('fs_nm_etiket'))
        $('#fn_harga_beli').val($(this).data('fn_harga_beli'))
        $('#fn_harga_jual').val($(this).data('fn_harga_jual'))
        $('#fn_stok').val($(this).data('fn_stok'))
        $('#modal-barang').modal('hide')
    })

    $(document).on('click', '#select_racik', function() {
        $('#fs_id_barang_racik').val($(this).data('fs_id_barang'))
        $('#fs_kd_barang_racik').val($(this).data('fs_kd_barang'))
        $('#fs_kd_barcode_racik').val($(this).data('fs_kd_barcode'))
        $('#fs_nm_barang_racik').val($(this).data('fs_nm_barang'))
        // $('#fs_id_etiket_racik').val($(this).data('fs_id_etiket'))
        // $('#fs_nm_etiket_racik').val($(this).data('fs_nm_etiket'))
        $('#fn_harga_beli_racik').val($(this).data('fn_harga_beli'))
        $('#fn_harga_jual_racik').val($(this).data('fn_harga_jual'))
        $('#fn_stok_racik').val($(this).data('fn_stok'))
        $('#modal-barang_racik').modal('hide')
    })

    $(document).ready(function() {
        $('#tabel-barang').DataTable({
            columnDefs: [{
                    "targets": [-1],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [0, -1],
                    "orderable": false
                },
            ],
        })
    })

    $(document).ready(function() {
        $('#tabel-barang_racik').DataTable({
            columnDefs: [{
                    "targets": [-1],
                    "className": 'text-center',
                    "orderable": false
                },
                {
                    "targets": [0, -1],
                    "orderable": false
                },
            ],
        })
    })

    $(document).on('click', '#add_cart', function() {
        var fs_id_barang = $('#fs_id_barang').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_kd_barang = $('#fs_kd_barang').val()
        var fs_id_etiket = $('#fs_id_etiket').val()
        var fn_harga_beli = $('#fn_harga_beli').val()
        var fn_harga_jual = $('#fn_harga_jual').val()
        var fn_stok = $('#fn_stok').val()
        var fn_qty = $('#fn_qty').val()
        if (fs_kd_barang == '') {
            Swal.fire({
                icon: 'error',
                title: 'Barang belum di pilih!',
                text: 'Silahkan pilih barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        }
        if (fn_qty == '') {
            Swal.fire({
                icon: 'error',
                title: 'Qty masih kosong!',
                text: 'Silahkan isi qty barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/process') ?>',
                data: {
                    'add_cart': true,
                    'fs_id_layanan': fs_id_layanan,
                    'fs_id_barang': fs_id_barang,
                    'fs_kd_barang': fs_kd_barang,
                    'fs_id_etiket': fs_id_etiket,
                    'fn_harga_beli': fn_harga_beli,
                    'fn_harga_jual': fn_harga_jual,
                    'fn_stok': fn_stok,
                    'fn_qty': fn_qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#fs_id_barang').val('')
                        $('#fs_kd_barcode').val('')
                        $('#fs_kd_barang').val('')
                        $('#fs_id_etiket').val('')
                        $('#fs_nm_etiket').val('')
                        $('#fs_nm_barang').val('')
                        $('#fn_harga_beli').val('')
                        $('#fn_harga_jual').val('')
                        $('#fn_qty').val('1')
                        $('#fs_kd_barang').focus()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal tambah barang ke dalam cart',
                        })
                    }
                }
            })
        }
    })

    $(document).on('click', '#add_cart_racik', function() {
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_id_barang = $('#fs_id_barang_racik').val()
        var fs_kd_barang = $('#fs_kd_barang_racik').val()
        var fs_id_etiket = $('#fs_id_etiket_racik').val()
        var fn_harga_beli = $('#fn_harga_beli_racik').val()
        var fn_harga_jual = $('#fn_harga_jual_racik').val()
        var fn_stok = $('#fn_stok_racik').val()
        var fn_qty = $('#fn_qty_obat').val()
        if (fs_kd_barang == '') {
            Swal.fire({
                icon: 'error',
                title: 'Barang belum di pilih!',
                text: 'Silahkan pilih barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        }
        if (fn_qty == '') {
            Swal.fire({
                icon: 'error',
                title: 'Qty masih kosong!',
                text: 'Silahkan isi qty barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/process') ?>',
                data: {
                    'add_cart_racik': true,
                    'fs_id_layanan': fs_id_layanan,
                    'fs_id_barang': fs_id_barang,
                    'fs_kd_barang': fs_kd_barang,
                    'fs_id_etiket': fs_id_etiket,
                    'fn_harga_beli': fn_harga_beli,
                    'fn_harga_jual': fn_harga_jual,
                    'fn_stok': fn_stok,
                    'fn_qty': fn_qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_racik').load('<?= site_url('penjualan/cart_data_racik') ?>', function() {
                            calculate_racik()
                        })
                        $('#fs_id_barang_racik').val('')
                        $('#fs_kd_barcode_racik').val('')
                        $('#fs_kd_barang_racik').val('')
                        $('#fs_nm_barang_racik').val('')
                        $('#fn_harga_beli_racik').val('')
                        $('#fn_harga_jual_racik').val('')
                        $('#fn_qty_obat').val('1')
                        $('#fs_kd_barang_racik').focus()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal tambah barang ke dalam cart',
                        })
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_cart', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var fs_id_cart_penjualan = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    data: {
                        'del_cart': true,
                        'fs_id_cart_penjualan': fs_id_cart_penjualan
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal menghapus cart',
                            })
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#del_racik', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Racikan akan di hapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var fs_id_racik = $(this).data('id_racik')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    data: {
                        'del_racik': true,
                        'fs_id_racik': fs_id_racik
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal menghapus racik',
                            })
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#del_cart_racik', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var fs_id_cart_racik = $(this).data('cartidracik')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    data: {
                        'del_cart_racik': true,
                        'fs_id_cart_racik': fs_id_cart_racik
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_racik').load('<?= site_url('penjualan/cart_data_racik') ?>', function() {
                                calculate_racik()
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal menghapus cart',
                            })
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#update_cart', function() {
        $('#fs_id_barang_edit').val($(this).data('cartidbarang'))
        $('#fs_kd_barang_edit').val($(this).data('cartkode'))
        $('#fs_nm_barang_edit').val($(this).data('cartnama'))
        $('#fs_id_etiket_edit').val($(this).data('cartidetiket'))
        $('#fs_nm_etiket_edit').val($(this).data('cartnmetiket'))
        $('#fn_harga_jual_edit').val($(this).data('cartharga'))
        $('#fn_qty_edit').val($(this).data('cartqty'))
        $('#fn_subtotal_edit').val($(this).data('cartharga') * $(this).data('cartqty'))
        $('#fn_diskon_edit').val($(this).data('cartdiskon'))
        $('#fn_total_edit').val($(this).data('carttotal'))
        $('#modal-barang-edit').modal('hide')
    })

    $(document).on('click', '#detail_racik', function() {
        $('#id_racik_detail').text($(this).data('id_racik_detail'))
        $('#fs_kd_racik_detail').text($(this).data('fs_kd_racik_detail'))
        $('#fs_nm_racik_detail').text($(this).data('fs_nm_racik_detail'))
        $('#fs_nm_satuan_detail').text($(this).data('fs_nm_satuan_detail'))
        $('#fs_nm_etiket_detail').text($(this).data('fs_nm_etiket_detail'))
        $('#fn_qty_racik_detail').text($(this).data('fn_qty_racik_detail'))
        $('#fn_nilai_jual_racik_detail').text(currencyFormat($(this).data('fn_nilai_jual_racik_detail')))
        // $('#modal-racik-detail').modal('hide')

        var i = 0;
        var data_detail_racik = '<table class="table table-bordered table-sm">'
        data_detail_racik += '<tr><th>No</th><th>Kode</th><th>Nama Barang</th><th>Harga</th><th>QTY</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('penjualan/racik_detail/') ?>' + $(this).data('id_racik_detail'), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_detail_racik += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.harga_jual) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_total) + '</td></tr>'
            })
            data_detail_racik += '</table>'
            $('#data_detail_racik').html(data_detail_racik)
        })
    })


    function count_edit_modal() {
        var fn_harga_jual_edit = $('#fn_harga_jual_edit').val()
        var fn_qty_edit = $('#fn_qty_edit').val()
        var fn_diskon_edit = $('#fn_diskon_edit').val()

        fn_subtotal_edit = fn_harga_jual_edit * fn_qty_edit
        $('#fn_subtotal_edit').val(fn_subtotal_edit)

        fn_total_edit = (fn_harga_jual_edit - fn_diskon_edit) * fn_qty_edit
        $('#fn_total_edit').val(fn_total_edit)

        if (fn_diskon_edit == '') {
            $('#fn_diskon_edit').val(0)
        }
    }

    $(document).on('keyup mouseup', '#fn_harga_beli_edit, #fn_qty_edit, #fn_diskon_edit', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var fs_id_barang = $('#fs_id_barang_edit').val()
        var fs_id_etiket = $('#fs_id_etiket_edit').val()
        var fn_harga_jual = $('#fn_harga_jual_edit').val()
        var fn_qty = $('#fn_qty_edit').val()
        var fn_diskon = $('#fn_diskon_edit').val()
        var fn_total = $('#fn_total_edit').val()
        if (fn_harga_jual == '' || fn_harga_jual < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Harga barang tidak boleh kosong!',
                text: 'Silahkan isi harga barang terlebih dahulu!',
            })
            $('#fn_harga_jual_edit').focus()
        } else if (fn_qty == '' || fn_qty < 1) {
            Swal.fire({
                icon: 'error',
                title: 'QTY barang tidak boleh kosong!',
                text: 'Silahkan isi qty barang terlebih dahulu!',
            })
            $('#fn_qty_edit').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/process') ?>',
                data: {
                    'edit_cart': true,
                    'fs_id_barang': fs_id_barang,
                    'fs_id_etiket': fs_id_etiket,
                    'fn_harga_jual': fn_harga_jual,
                    'fn_qty': fn_qty,
                    'fn_diskon': fn_diskon,
                    'fn_total': fn_total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                            calculate()
                        })
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data barang berhasil di update',
                            showClass: {
                                popup: 'animate__animated animate__zoomInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__zoomOutDown'
                            }
                        })
                        $('#modal-barang-edit').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Data barang tidak terupdate',
                        })
                    }
                }
            })
        }
    })

    function calculate() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total').text())
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var subtotal_beli = 0
        $('#cart_table tr').each(function() {
            subtotal_beli += parseInt($(this).find('#total_beli').text())
        })
        isNaN(subtotal_beli) ? $('#sub_total_beli').val(0) : $('#sub_total_beli').val(subtotal_beli)

        var discount = $('#discount').val()
        var grand_total = subtotal - discount
        if (isNaN(grand_total)) {
            $('#grand_total').val(0)
            $('#grand_total2').val(0)
        } else {
            $('#grand_total').val(grand_total)
            $('#grand_total2').val(grand_total)
        }

    }

    function calculate_racik() {
        var subtotal_racik = 0;
        $('#cart_racik tr').each(function() {
            subtotal_racik += parseInt($(this).find('#total_racik').text())
        })
        isNaN(subtotal_racik) ? $('#sub_total_racik').val(0) : $('#sub_total_racik').val(subtotal_racik)

        var subtotal_beli_racik = 0
        $('#cart_racik tr').each(function() {
            subtotal_beli_racik += parseInt($(this).find('#total_beli_racik').text())
        })
        isNaN(subtotal_beli_racik) ? $('#sub_total_beli_racik').val(0) : $('#sub_total_beli_racik').val(subtotal_beli_racik)

    }

    $(document).on('keyup mouseup', '#discount, #cash, #fn_debet, #fn_credit', function() {
        calculate()
    })

    $(document).on('keyup mouseup', '#sub_total_racik', function() {
        calculate_racik()
    })

    $(document).ready(function() {
        calculate()
        calculate_racik()
    })

    $(document).on('click', '#simpan_racik', function() {
        var fs_kd_racik = $('#fs_kd_racik').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_nm_racik = $('#fs_nm_racik').val()
        var fs_id_satuan = $('#fs_id_satuan_racik').val()
        var fn_qty_racik = $('#fn_qty_racik').val()
        var fs_id_etiket = $('#fs_id_etiket_racik').val()
        var fn_nilai_beli_racik = $('#sub_total_beli_racik').val()
        var fn_nilai_jual_racik = $('#sub_total_racik').val()
        var fd_tgl_racik = $('#fd_tgl_penjualan').val()

        if (fn_nilai_jual_racik < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Cart racik masih kosong!',
                text: 'Silahkan masukan obat terlebih dahulu!',
            })
            $('#fs_kd_barang_racik').focus()
        } else if (fs_nm_racik == '') {
            Swal.fire({
                icon: 'error',
                title: 'Nama racikan masih kosong!',
                text: 'Silahkan isi nama racikan terlebih dahulu!',
            })
            $('#fs_kd_barang_racik').focus()
        } else if (fs_id_satuan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Satuan racikan masih kosong!',
                text: 'Silahkan isi satuan racikan terlebih dahulu!',
            })
            $('#fs_kd_barang_racik').focus()
        } else if (fn_qty_racik < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Qty racikan masih kosong!',
                text: 'Silahkan isi qty racikan terlebih dahulu!',
            })
            $('#fs_kd_barang_racik').focus()
        } else if (fs_id_etiket == '') {
            Swal.fire({
                icon: 'error',
                title: 'Etiket racikan masih kosong!',
                text: 'Silahkan isi qty racikan terlebih dahulu!',
            })
            $('#fs_kd_barang_racik').focus()
        } else {
            Swal.fire({
                title: 'Yakin dengan racikan ini?',
                text: "Data akan disimpan!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                showClass: {
                    popup: 'animate__animated animate__bounceIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutDown'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('penjualan/process') ?>',
                        data: {
                            'simpan_racik': true,
                            'fs_id_layanan': fs_id_layanan,
                            'fs_kd_racik': fs_kd_racik,
                            'fs_nm_racik': fs_nm_racik,
                            'fs_id_satuan': fs_id_satuan,
                            'fn_qty_racik': fn_qty_racik,
                            'fs_id_etiket': fs_id_etiket,
                            'fn_nilai_beli_racik': fn_nilai_beli_racik,
                            'fn_nilai_jual_racik': fn_nilai_jual_racik,
                            'fd_tgl_racik': fd_tgl_racik
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                $('#cart_racik').load('<?= site_url('penjualan/cart_data_racik') ?>', function() {
                                    calculate_racik()
                                })
                                $('#fs_nm_racik').val('')
                                $('#fs_id_satuan_racik').val('')
                                $('#fn_qty_obat').val('')
                                $('#fs_id_etiket_racik').val('')
                                $('#fs_nm_etiket_racik').val('')
                                $('#fs_id_barang_racik').val('')
                                $('#fs_kd_barcode_racik').val('')
                                $('#fs_kd_barang_racik').val('')
                                $('#fs_nm_barang_racik').val('')
                                $('#fn_harga_beli_racik').val('')
                                $('#fn_harga_jual_racik').val('')
                                $('#fn_qty_obat').val('1')
                                $('#modal-racik').modal('hide')
                                $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                                    calculate()
                                })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Transaksi gagal di simpan',
                                })
                            }
                        }
                    })
                }
            })
        }
    })

    $(document).on('click', '#process_payment', function() {
        var fs_kd_penjualan = $('#fs_kd_penjualan').val()
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fn_nilai_beli = $('#sub_total_beli').val()
        var fn_nilai_jual = $('#sub_total').val()
        var fn_diskon = $('#discount').val()
        var fn_total_nilai_jual = $('#grand_total').val()
        var fd_tgl_penjualan = $('#fd_tgl_penjualan').val()

        if (fn_nilai_jual < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Cart pembelian masih kosong!',
                text: 'Silahkan masukan barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else if (fs_id_layanan = '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan masih kosong',
                text: 'Silahkan pilih layanan stok terlebih dahulu!',
            })
            $('#fs_kd_registrasi').focus()
        } else if (fs_id_registrasi == '') {
            Swal.fire({
                icon: 'error',
                title: 'No Registrasi masih kosong',
                text: 'Silahkan pilih pasien terlebih dahulu!',
            })
            $('#fs_kd_registrasi').focus()
        } else {
            Swal.fire({
                title: 'Yakin dengan transaksi ini?',
                text: "Data akan disimpan!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                showClass: {
                    popup: 'animate__animated animate__bounceIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutDown'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('penjualan/process') ?>',
                        data: {
                            'process_payment': true,
                            'fs_kd_penjualan': fs_kd_penjualan,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_id_layanan': fs_id_layanan,
                            'fn_nilai_beli': fn_nilai_beli,
                            'fn_nilai_jual': fn_nilai_jual,
                            'fn_diskon': fn_diskon,
                            'fn_total_nilai_jual': fn_total_nilai_jual,
                            'fd_tgl_penjualan': fd_tgl_penjualan
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.penjualan_id,
                                    Swal.fire({
                                        title: 'Cetak transaksi ini?',
                                        icon: 'info',
                                        showCancelButton: true,
                                        confirmButtonColor: '#00a65a',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Cetak!',
                                        showClass: {
                                            popup: 'animate__animated animate__bounceIn'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__backOutDown'
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.open('<?= site_url('penjualan/cetak_pdf/') ?>' + kode, '_blank')
                                            Swal.fire({
                                                title: 'Cetak etiket?',
                                                icon: 'info',
                                                showCancelButton: true,
                                                confirmButtonColor: '#00a65a',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, Cetak!',
                                                showClass: {
                                                    popup: 'animate__animated animate__bounceIn'
                                                },
                                                hideClass: {
                                                    popup: 'animate__animated animate__backOutDown'
                                                }
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    location.href = '<?= site_url('penjualan') ?>'
                                                    window.open('<?= site_url('penjualan/cetak_etiket/') ?>' + kode, '_blank')
                                                } else {
                                                    location.href = '<?= site_url('penjualan') ?>'
                                                }
                                            })
                                        } else {
                                            Swal.fire({
                                                title: 'Cetak etiket?',
                                                icon: 'info',
                                                showCancelButton: true,
                                                confirmButtonColor: '#00a65a',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Ya, Cetak!',
                                                showClass: {
                                                    popup: 'animate__animated animate__bounceIn'
                                                },
                                                hideClass: {
                                                    popup: 'animate__animated animate__backOutDown'
                                                }
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    location.href = '<?= site_url('penjualan') ?>'
                                                    window.open('<?= site_url('penjualan/cetak_etiket/') ?>' + kode, '_blank')
                                                } else {
                                                    location.href = '<?= site_url('penjualan') ?>'
                                                }
                                            })
                                        }
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Transaksi gagal di simpan',
                                })
                            }
                        }
                    })
                }
            })
        }
    })

    $(document).on('click', '#cancel_payment', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    dataType: 'json',
                    data: {
                        'cancel_payment': true
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('penjualan/cart_data') ?>', function() {
                                calculate()
                            })
                        }
                    }
                })
                $('#discount').val(0)
                $('#cash').val(0)
                $('#registrasi').val(0).change()
                $('#barcode').val('')
                $('#barcode').focus()
            }
        })
    })

    $(document).on('click', '#batal_racik', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('penjualan/process') ?>',
                    dataType: 'json',
                    data: {
                        'batal_racik': true
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_racik').load('<?= site_url('penjualan/cart_data_racik') ?>', function() {
                                calculate_racik()
                            })
                            $('#modal-racik').modal('hide')
                        }
                    }
                })
            }
        })
    })

    $('#fs_kd_barcode').keypress(function(e) {
        var key = e.which;
        var fs_kd_barcode = $(this).val();
        if (key == 13) {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('penjualan/get_barang') ?>',
                data: {
                    'fs_kd_barcode': fs_kd_barcode
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#fs_id_barang').val(result.barang.fs_id_barang)
                        $('#fs_kd_barang').val(result.barang.fs_kd_barang)
                        $('#fs_kd_barcode').val(fs_kd_barcode)
                        $('#fn_harga_beli').val(result.barang.fn_harga_beli)
                        $('#fn_harga_jual').val(result.harga_jual)
                        $('#fn_stok').val(result.barang.fn_stok)

                        $('#add_cart').click();
                        $('#fs_kd_barcode').val('');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Barang tidak di temukan',
                        });
                        $('#fs_kd_barcode').val('');
                    }
                }
            })
        }
    })
</script>