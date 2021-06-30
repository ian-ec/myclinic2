<style type="text/css">
    .auto {
        display: block;
        padding: 5px;
        /* margin-top: 5px; */
        width: 100%;
        height: 423px;
        overflow: auto;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Pelunasan Hutang</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Pelunasan Hutang</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" id="fd_tgl_pelunasan_hutang" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Kode Trs</label>
                    <div class="col-sm-8">
                        <input type="text" id="fs_kd_pelunasan_hutang" value="<?= $no_pelunasan_hutang ?>" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Distributor</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_distributor" value="">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_distributor" value="" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-distributor">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">No Order</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_order_hutang" value="">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_order_hutang" value="" readonly>
                            <span class="input-group-btn">
                                <button type="button" id="order_hutang" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-order">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Rek Pelunasan</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_bank_group" value="">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_bank_group" value="" readonly>
                            <span class="input-group-btn">
                                <button type="button" id="bank_group" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-bank_group">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">No Rekening</label>
                    <div class="col-sm-8">
                        <input type="text" id="fn_no_rekening" value="" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-8">
                        <input type="number" id="fn_subtotal" value="0" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Diskon</label>
                    <div class="col-sm-8">
                        <input type="number" id="fn_diskon" value="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Grandtotal</label>
                    <div class="col-sm-8">
                        <input type="number" id="fn_grandtotal" value="0" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right"></label>
                    <div class="col-sm-8 text-right">
                        <button class="btn btn-success" id="simpan">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body auto">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap  table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Kode Pembelian</th>
                            <th>Tgl Hutang</th>
                            <th style="text-align: right; width: 15%;">Hutang</th>
                            <th style="text-align: right; width: 15%;">Terbayar</th>
                        </tr>
                    </thead>
                    <tbody id="data_hutang">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal distributor -->
<div class="modal fade" id="modal-distributor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih distributor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-distributor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode distributor</th>
                            <th>Nama distributor</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($distributor as $jm) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $jm->fs_kd_distributor ?></td>
                                <td><?= $jm->fs_nm_distributor ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_distributor" data-id_distributor="<?= $jm->fs_id_distributor ?>" data-kode_distributor="<?= $jm->fs_kd_distributor ?>" data-nama_distributor="<?= $jm->fs_nm_distributor ?>">
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

<!-- Modal Order hutang -->
<div class="modal fade" id="modal-order">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Order hutang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <span id="data_order_hutang"></span>
            </div>
            <div class="modal-footer bg-soft-info"></div>
        </div>
    </div>
</div>

<!-- Modal Bank Group -->
<div class="modal fade" id="modal-bank_group">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Bank</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-distributor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Bank</th>
                            <th>Nama Bank</th>
                            <th>No Rekening</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($bank as $bk) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $bk->fs_kd_bank_group ?></td>
                                <td><?= $bk->fs_nm_bank_group ?></td>
                                <td><?= $bk->fn_no_rekening ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_bank" data-fs_id_bank_group="<?= $bk->fs_id_bank_group ?>" data-fs_kd_bank_group="<?= $bk->fs_kd_bank_group ?>" data-fs_nm_bank_group="<?= $bk->fs_nm_bank_group ?>" data-fn_no_rekening="<?= $bk->fn_no_rekening ?>">
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

<script>
    $(document).ready(function() {
        $('#tabel-distributor').DataTable({
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

    $(document).on('click', '#select_distributor', function() {
        $('#fs_id_distributor').val($(this).data('id_distributor'))
        $('#fs_kd_distributor').val($(this).data('kode_distributor'))
        $('#fs_nm_distributor').val($(this).data('nama_distributor'))
        $('#modal-distributor').modal('hide')
    })

    $(document).on('click', '#select_bank', function() {
        $('#fs_id_bank_group').val($(this).data('fs_id_bank_group'))
        $('#fs_kd_bank_group').val($(this).data('fs_kd_bank_group'))
        $('#fs_nm_bank_group').val($(this).data('fs_nm_bank_group'))
        $('#fn_no_rekening').val($(this).data('fn_no_rekening'))
        $('#modal-bank_group').modal('hide')
    })

    $(document).on('click', '#order_hutang', function() {
        var i = 0;
        var data_order_hutang = '<table class="table table-bordered table-striped table-sm" id="tabel-order">' +
            '<thead>' +
            '<tr>' +
            '<th width="5%">No</th>' +
            '<th>Kode Order</th>' +
            '<th>Tanggal Order</th>' +
            '<th>Nilai Order</th>' +
            '<th width="5%">Pilih</th>' +
            '</thead>'
        data_order_hutang += '<tbody>'
        $.getJSON('<?= site_url('pelunasan_hutang/data_order/') ?>' + $('#fs_id_distributor').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_order_hutang += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_order_hutang + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_order_hutang) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_order) + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-info" id="pilih_order" data-fs_id_order_hutang="' + val.fs_id_order_hutang +
                    '" data-fs_kd_order_hutang="' + val.fs_kd_order_hutang +
                    '" data-fn_nilai_order="' + val.fn_nilai_order +
                    '">' +
                    '<i class="fa fa-check"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>'
            })
            data_order_hutang += '</tbody></table>'
            $('#data_order_hutang').html(data_order_hutang)
            $('#tabel-order').DataTable({
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

    $(document).on('click', '#pilih_order', function() {
        $('#fs_id_order_hutang').val($(this).data('fs_id_order_hutang'))
        $('#fs_kd_order_hutang').val($(this).data('fs_kd_order_hutang'))
        $('#fn_subtotal').val($(this).data('fn_nilai_order'))
        $('#fn_grandtotal').val($(this).data('fn_nilai_order'))
        $('#modal-order').modal('hide')

        show_loading()
        var i = 0;
        var data_hutang = null
        $.getJSON('<?= site_url('info_order_hutang/detail/') ?>' + $(this).data('fs_id_order_hutang'), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_hutang += '<tr>' +
                    '<td style="text-align: left;  vertical-align: middle;">' + i + '</td>' +
                    '<td style="text-align: left;  vertical-align: middle;">' + val.fs_kd_pembelian + '</td>' +
                    '<td style="text-align: left;  vertical-align: middle;">' + dateFormat(val.fd_tgl_pembelian) + '</td>' +
                    '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_nilai_hutang) + '</td>' +
                    '<td id="total"><input type="number" class="form-control text-right fn_nilai_pelunasan"  style="width: 100%;" value="' + val.fn_nilai_hutang + '">' +
                    '<input type="hidden" class="fs_id_hutang" value="' + val.fs_id_hutang + '">' +
                    '<input type="hidden" class="fs_id_pembelian" value="' + val.fs_id_pembelian + '">' +
                    '</td></tr>'
            })
            $('#data_hutang').html(data_hutang)
        })
        hide_loading()
    })

    function calculate() {
        var subtotal = 0;
        $('#data_hutang tr').each(function() {
            subtotal += parseInt($(this).find('.fn_nilai_pelunasan').val())
        })
        isNaN(subtotal) ? $('#fn_subtotal').val(0) : $('#fn_subtotal').val(subtotal)

        var discount = $('#fn_diskon').val()
        var grand_total = subtotal - discount
        if (isNaN(grand_total)) {
            $('#fn_grandtotal').val(0)
        } else {
            $('#fn_grandtotal').val(grand_total)
        }

        if (discount == '') {
            $('#fn_diskon').val(0)
        }
    }

    $(document).on('keyup mouseup', '.fn_nilai_pelunasan, #fn_subtotal, #fn_diskon', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })


    $(document).on('click', '#simpan', function() {
        var fd_tgl_pelunasan_hutang = $('#fd_tgl_pelunasan_hutang').val()
        var fs_kd_pelunasan_hutang = $('#fs_kd_pelunasan_hutang').val()
        var fs_id_distributor = $('#fs_id_distributor').val()
        var fs_id_order_hutang = $('#fs_id_order_hutang').val()
        var fs_id_bank_group = $('#fs_id_bank_group').val()
        var fn_subtotal = $('#fn_subtotal').val()
        var fn_diskon = $('#fn_diskon').val()
        var fn_grandtotal = $('#fn_grandtotal').val()
        var fs_id_hutang = [];
        $('.fs_id_hutang').each(function() {
            fs_id_hutang.push($(this).val());
        });
        var fs_id_pembelian = [];
        $('.fs_id_pembelian').each(function() {
            fs_id_pembelian.push($(this).val());
        });
        var fn_nilai_pelunasan = [];
        $('.fn_nilai_pelunasan').each(function() {
            fn_nilai_pelunasan.push($(this).val());
        });


        if (fs_id_distributor == '') {
            Swal.fire({
                icon: 'error',
                title: 'distributor masih kosong!',
                text: 'Silahkan pilih distributor terlebih dahulu!',
            })
        } else if (fs_id_order_hutang == '') {
            Swal.fire({
                icon: 'error',
                title: 'No order hutang masih kosong!',
                text: 'Silahkan pilih no order hutang terlebih dahulu!',
            })
        } else if (fs_id_bank_group == '') {
            Swal.fire({
                icon: 'error',
                title: 'Rekening pelunasan masih kosong!',
                text: 'Silahkan pilih rekening pelunasan terlebih dahulu!',
            })
        } else {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan disimpan!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal',
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
                        url: '<?= site_url('pelunasan_hutang/process') ?>',
                        data: {
                            'simpan': true,
                            'fd_tgl_pelunasan_hutang': fd_tgl_pelunasan_hutang,
                            'fs_kd_pelunasan_hutang': fs_kd_pelunasan_hutang,
                            'fs_id_distributor': fs_id_distributor,
                            'fs_id_order_hutang': fs_id_order_hutang,
                            'fs_id_bank_group': fs_id_bank_group,
                            'fn_subtotal': fn_subtotal,
                            'fn_diskon': fn_diskon,
                            'fn_grandtotal': fn_grandtotal,
                            'fs_id_hutang': fs_id_hutang,
                            'fs_id_pembelian': fs_id_pembelian,
                            'fn_nilai_pelunasan': fn_nilai_pelunasan
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.pelunasan_hutang_id,
                                    Swal.fire({
                                        title: 'Cetak transaksi ini?',
                                        icon: 'info',
                                        showCancelButton: true,
                                        confirmButtonColor: '#00a65a',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, Cetak!',
                                        cancelButtonText: 'Batal',
                                        showClass: {
                                            popup: 'animate__animated animate__bounceIn'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__backOutDown'
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.href = '<?= site_url('pelunasan_hutang') ?>'
                                            window.open('<?= site_url('pelunasan_hutang/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('pelunasan_hutang') ?>'
                                        }
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Transaksi gagal tersimpan!',
                                })
                            }
                        }
                    })
                }
            })

        }

    })
</script>