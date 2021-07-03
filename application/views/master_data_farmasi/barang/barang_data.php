<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Barang / Obat</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Barang / Obat</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <a href="<?= site_url('barang/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <br>
                <br>
                <table id="table1" class="table table-striped table-bordered dt-responsive nowrap table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode barang</th>
                            <th>Nama barang</th>
                            <th>Golongan</th>
                            <th>Group</th>
                            <th>Satuan</th>
                            <th>HPP</th>
                            <th>Harga Jual</th>
                            <th>Stok</th>
                            <th>Min</th>
                            <th>Max</th>
                            <th style="width: 5%;"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width:5%;"><?= $no++ ?></td>
                                <td><?= $data->fs_kd_barang ?></td>
                                <td><?= $data->fs_nm_barang ?></td>
                                <td><?= $data->fs_nm_golongan ?></td>
                                <td><?= $data->fs_nm_group ?></td>
                                <td><?= $data->fs_nm_satuan ?></td>
                                <td><?= indo_currency($data->fn_harga_beli) ?></td>
                                <td>
                                    <?php
                                    $harga_jual_profit = ($data->fn_hna * $data->fn_profit / 100) + $data->fn_hna;
                                    $harga_jual = $data->fn_harga_jual;
                                    $profit = $data->fn_profit;
                                    echo indo_currency($profit == 0 ? $harga_jual : round($harga_jual_profit));
                                    ?>
                                </td>
                                <td style="background-color: <?= $data->fn_stok < $data->fn_stok_min ? 'pink' : null ?>;"><?= $data->fn_stok ?></td>
                                <td><?= $data->fn_stok_min ?></td>
                                <td><?= $data->fn_stok_max ?></td>
                                <td class="text-center" width="160px">
                                    <a data-toggle="tooltip" data-placement="top" title="Detail">
                                        <button class="btn btn-success btn-sm" id="detail" data-target="#modal-barang" data-toggle="modal" data-fs_kd_barang="<?= $data->fs_kd_barang ?>" data-fs_kd_barcode="<?= $data->fs_kd_barcode ?>" data-fs_nm_barang="<?= $data->fs_nm_barang ?>" data-fs_nm_golongan=" <?= $data->fs_nm_golongan ?>" data-fs_nm_group=" <?= $data->fs_nm_group ?>" data-fs_nm_satuan=" <?= $data->fs_nm_satuan ?>" data-fs_nm_rekapcetak=" <?= $data->fs_nm_rekapcetak ?>" data-fs_nm_etiket=" <?= $data->fs_nm_etiket ?>" data-fn_harga_beli="<?= indo_currency($data->fn_harga_beli) ?>" data-fn_hna="<?= indo_currency($data->fn_hna) ?>" data-fn_profit=" <?= $data->fn_profit . ' %' ?>" data-fn_harga_jual="  <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $harga_jual_profit = ($data->fn_hna * $data->fn_profit / 100) + $data->fn_hna;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $harga_jual = $data->fn_harga_jual;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                $profit = $data->fn_profit;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                echo indo_currency($profit == 0 ? $harga_jual : $harga_jual_profit);
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                ?>" data-fn_stok=" <?= $data->fn_stok ?>" data-fn_stok_min=" <?= $data->fn_stok_min ?>" data-fn_stok_max=" <?= $data->fn_stok_max ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= site_url('barang/barcode/' . $data->fs_id_barang) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Barcode">
                                        <i class="fas fa-barcode"></i>
                                    </a>
                                    <a href="<?= site_url('barang/edit/' . $data->fs_id_barang) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('barang/del/' . $data->fs_id_barang) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-barang">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <table class="table table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%;">Kode Barang</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_kd_barang"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Barcode</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_kd_barcode"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Nama Barang</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_barang"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Golongan</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_golongan"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Group</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_group"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Satuan</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_satuan"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Rekap Cetak</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_rekapcetak"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Etiket</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_nm_etiket"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">HPP</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_harga_beli"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">HNA</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_hna"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Profit %</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_profit"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Harga Jual</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_harga_jual"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Stok</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_stok"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Stok Minimum</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_stok_min"></span></td>
                                </tr>
                                <tr>
                                    <td style="width: 40%;">Stok Maximum</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fn_stok_max"></span></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-info">
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
</div>

<script>
    $(document).on('click', '#detail', function() {
        $('#fs_kd_barang').text($(this).data('fs_kd_barang'));
        $('#fs_kd_barcode').text($(this).data('fs_kd_barcode'));
        $('#fs_nm_barang').text($(this).data('fs_nm_barang'));
        $('#fs_nm_golongan').text($(this).data('fs_nm_golongan'));
        $('#fs_nm_group').text($(this).data('fs_nm_group'));
        $('#fs_nm_satuan').text($(this).data('fs_nm_satuan'));
        $('#fs_nm_rekapcetak').text($(this).data('fs_nm_rekapcetak'));
        $('#fs_nm_etiket').text($(this).data('fs_nm_etiket'));
        $('#fn_harga_beli').text($(this).data('fn_harga_beli'));
        $('#fn_hna').text($(this).data('fn_hna'));
        $('#fn_profit').text($(this).data('fn_profit'));
        $('#fn_harga_jual').text($(this).data('fn_harga_jual'));
        $('#fn_stok').text($(this).data('fn_stok'));
        $('#fn_stok_min').text($(this).data('fn_stok_min'));
        $('#fn_stok_max').text($(this).data('fn_stok_max'));
    })
</script>