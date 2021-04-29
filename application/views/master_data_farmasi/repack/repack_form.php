<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Transaksi Repack</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Transaksi Repack</a></li>
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
                <form action="<?= site_url('repack/process') ?>" method="POST" class="needs-validation" novalidate>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Kode Repack</label>
                                <input type="text" style="background-color: lavender;" name="fs_kd_repack" value="<?= $no_repack ?>" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Tgl Repack</label>
                                <input type="date" name="fd_tgl_repack" value="<?= date('Y-m-d') ?>" class="form-control">
                            </div>
                            <label for="">Material Repack</label>
                            <div class="form-group input-group">
                                <input type="hidden" name="fs_id_material" id="fs_id_material">
                                <input type="text" style="background-color: lavender;" name="fs_kd_material" id="fs_kd_material" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-material">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Material</label>
                                <input type="text" style="background-color: lavender;" name="fs_nm_material" id="fs_nm_material" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Qty Material</label>
                                <input type="number" name="fn_qty_material" id="fn_qty_material" value="1" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Total HPP Material</label>
                                <input type="hidden" name="fn_hpp_material" id="fn_hpp_material" value="" class="form-control" readonly>
                                <input type="number" style="background-color: lavender;" name="fn_total_hpp_material" id="fn_total_hpp_material" value="0" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="">Hasil Repack</label>
                            <div class="form-group input-group">
                                <input type="hidden" id="fn_id_hasil" name="fn_id_hasil">
                                <input type="text" style="background-color: lavender;" id="fs_kd_hasil" class="form-control" readonly>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-hasil">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <div class="form-group">
                                <label for="">Nama Hasil</label>
                                <input type="text" style="background-color: lavender;" name="fs_nm_hasil" id="fs_nm_hasil" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Qty Hasil</label>
                                <input type="number" name="fn_qty_hasil" id="fn_qty_hasil" value="1" min="1" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">HPP Hasil</label>
                                <input type="number" style="background-color: lavender;" name="fn_hpp_hasil" id="fn_hpp_hasil" value="" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="fs_keterangan_repack" id="fs_keterangan_repack" class="form-control"></textarea>
                            </div>
                            <div class="form-group" style="padding-top: 6px;">
                                <button type="submit" name="process" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                                <button type="reset" class="btn btn-info btn-flat"> Reset</button>
                                <div class="float-right">
                                    <a href="<?= site_url('repack') ?>" class="btn btn-warning btn-flat">
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

<!-- Modal material -->
<div class="modal fade" id="modal-material">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Material Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Barang</th>
                            <th>Satuan</th>
                            <th>HPP</th>
                            <th>Stok</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $brg => $data) { ?>
                            <tr>
                                <td><?= $data->fs_kd_barang ?></td>
                                <td><?= $data->fs_nm_barang ?></td>
                                <td><?= $data->fs_nm_satuan ?></td>
                                <td class="text-right"><?= indo_currency($data->fn_harga_beli) ?></td>
                                <td class="text-right"><?= $data->fn_stok ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" id="select_material" data-fs_id_barang="<?= $data->fs_id_barang ?>" data-fs_nm_barang="<?= $data->fs_nm_barang . " (" . $data->fs_nm_satuan . ")"  ?>" data-fs_kd_barang="<?= $data->fs_kd_barang ?>" data-fn_harga_beli="<?= $data->fn_harga_beli ?>" data-fn_stok="<?= $data->fn_stok ?>">
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

<!-- Modal hasil -->
<div class="modal fade" id="modal-hasil">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Hasil Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-sm table-bordered table-striped" id="table_hasil">
                    <thead>
                        <tr>
                            <th>Kode</th>
                            <th>Barang</th>
                            <th>Satuan</th>
                            <th>HPP</th>
                            <th>Stok</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($barang as $brg => $data) { ?>
                            <tr>
                                <td><?= $data->fs_kd_barang ?></td>
                                <td><?= $data->fs_nm_barang ?></td>
                                <td><?= $data->fs_nm_satuan ?></td>
                                <td class="text-right"><?= indo_currency($data->fn_harga_beli) ?></td>
                                <td class="text-right"><?= $data->fn_stok ?></td>
                                <td class="text-center">
                                    <button class="btn btn-sm btn-info" id="select_hasil" data-fs_id_barang_hasil="<?= $data->fs_id_barang ?>" data-fs_nm_barang_hasil="<?= $data->fs_nm_barang . " (" . $data->fs_nm_satuan . ")" ?>" data-fs_kd_barang_hasil="<?= $data->fs_kd_barang ?>" data-fn_harga_beli_hasil="<?= $data->fn_harga_beli ?>" data-fn_stok="<?= $data->fn_stok ?>">
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


<script>
    $(document).on('click', '#select_material', function() {
        $('#fs_id_material').val($(this).data('fs_id_barang'))
        $('#fs_nm_material').val($(this).data('fs_nm_barang'))
        $('#fs_kd_material').val($(this).data('fs_kd_barang'))
        $('#fn_hpp_material').val($(this).data('fn_harga_beli'))
        $('#modal-material').modal('hide')
    })

    $(document).on('click', '#select_hasil', function() {
        $('#fn_id_hasil').val($(this).data('fs_id_barang_hasil'))
        $('#fs_nm_hasil').val($(this).data('fs_nm_barang_hasil'))
        $('#fs_kd_hasil').val($(this).data('fs_kd_barang_hasil'))
        $('#modal-hasil').modal('hide')
    })

    $(document).ready(function() {
        $('#table_hasil').DataTable({
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

    function count_repack() {
        var fn_qty_material = $('#fn_qty_material').val()
        var fn_hpp_material = $('#fn_hpp_material').val()
        var fn_qty_hasil = $('#fn_qty_hasil').val()

        fn_total_hpp_material = fn_qty_material * fn_hpp_material
        $('#fn_total_hpp_material').val(fn_total_hpp_material)

        fn_hpp_hasil = fn_total_hpp_material / fn_qty_hasil
        $('#fn_hpp_hasil').val(fn_hpp_hasil)

    }

    $(document).on('keyup mouseup', '#fn_qty_material, #fn_hpp_material, #fn_qty_hasil, #fn_total_hpp_material, #fn_hpp_hasil', function() {
        count_repack()
    })
</script>