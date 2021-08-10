<style type="text/css">
    .auto {
        display: block;
        padding: 5px;
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
                        <input type="date" id="fd_tgl_penerimaan" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right" style="padding-left: 1px;">Kode Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_kd_penerimaan" value="<?= $no_penerimaan ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">No Pemesanan</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_pemesanan">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_pemesanan" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-pemesanan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Layanan</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_layanan" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Distributor</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_distributor" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="fs_keterangan" rows="2"></textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="fn_subtotal" value="" class="form-control" readonly>
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
                        <input type="number" style="background-color: lavender;" id="fn_grandtotal" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-12 text-right">
                        <button id="simpan" class="btn btn-flat btn-success">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button id="batal" class="btn btn-flat btn-danger">
                            <i class="fa fa-ban"></i> Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body auto">
                <table class="table table-sm table-bordered table-striped">
                    <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="15%">Kode Barang</th>
                            <th width="15%">Nama Barang</th>
                            <th>Expired Date</th>
                            <th class="text-center" width="10%">HPP</th>
                            <th class="text-center" width="5%">Qty Order</th>
                            <th class="text-center" width="5%">Qty Terima</th>
                            <th class="text-center" width="10%">Diskon</th>
                            <th class="text-center" width="7%">PPN %</th>
                            <th class="text-center" width="10%">Total</th>
                            <th class="text-center"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody id="data_penerimaan">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Pemesanan -->
<div class="modal fade" id="modal-pemesanan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Kode Pemesanan Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-pemesanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pemesanan</th>
                            <th>Nama Layanan</th>
                            <th>Nama Distributor</th>
                            <th>Total</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pemesanan as $data) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="25%"><?= $data->fs_kd_pemesanan ?></td>
                                <td><?= $data->fs_nm_layanan ?></td>
                                <td><?= $data->fs_nm_distributor ?></td>
                                <td><?= indo_currency($data->fn_grandtotal) ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_pemesanan" data-fs_id_pemesanan="<?= $data->fs_id_pemesanan ?>" data-fs_kd_pemesanan="<?= $data->fs_kd_pemesanan ?>" data-fs_nm_layanan="<?= $data->fs_nm_layanan ?>" data-fs_nm_distributor="<?= $data->fs_nm_distributor ?>" data-fn_grandtotal="<?= $data->fn_grandtotal ?>" data-fs_id_user="<?= $this->session->userdata('userid') ?>">
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

<!-- Modal Edit Barang -->
<div class="modal fade" id="modal-edit">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Update Barang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="fs_id_barang_edit">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Kode Barang</label>
                    <div class="col-sm-9">
                        <input type="hidden" style="background-color: lavender;" id="fs_id_cart_penerimaan" class="form-control">
                        <input type="hidden" style="background-color: lavender;" id="fs_id_barang" class="form-control">
                        <input type="hidden" style="background-color: lavender;" id="fs_id_user" class="form-control">
                        <input type="text" style="background-color: lavender;" id="fs_kd_barang" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Nama Barang</label>
                    <div class="col-sm-9">
                        <input type="text" style="background-color: lavender;" id="fs_nm_barang" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Expired Date</label>
                    <div class="col-sm-9">
                        <input type="date" id="fd_tgl_expired" value="3000-01-01" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">QTY PO</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_qty_po" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">QTY DO</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_qty_do" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">HPP</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_hpp" min="0" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Diskon</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_diskon" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">PPN %</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_ppn" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Total</label>
                    <div class="col-sm-9">
                        <input type="number" style="background-color: lavender;" id="fn_total" min="0" class="form-control" readonly>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-info">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-warning"><i class="fa fa-paper-airplane"></i>Update</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).on('click', '#select_pemesanan', function() {
        $('#fs_id_pemesanan').val($(this).data('fs_id_pemesanan'))
        $('#fs_kd_pemesanan').val($(this).data('fs_kd_pemesanan'))
        $('#fs_nm_layanan').val($(this).data('fs_nm_layanan'))
        $('#fs_nm_distributor').val($(this).data('fs_nm_distributor'))
        $('#fn_subtotal').val($(this).data('fn_grandtotal'))
        $('#fn_grandtotal').val($(this).data('fn_grandtotal'))
        $('#modal-pemesanan').modal('hide')

        var fs_id_pemesanan = $(this).data('fs_id_pemesanan')
        var fs_id_user = $(this).data('fs_id_user')

        $.ajax({
            type: 'POST',
            url: '<?= site_url('penerimaan/process') ?>',
            data: {
                'select_pemesanan': true,
                'fs_id_pemesanan': fs_id_pemesanan
            },
            dataType: 'json',
            success: function(result) {
                if (result.success == true) {
                    show_loading()
                    var i = 0;
                    var data_penerimaan = null
                    $.getJSON('<?= site_url('penerimaan/cart_data/') ?>' + fs_id_user, function(data) {
                        $.each(data, function(key, val) {
                            i += 1
                            data_penerimaan += '<tr>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + i + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + val.fs_kd_barang + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + val.fs_nm_barang + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + dateFormat(val.fd_tgl_expired) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_hpp) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + val.fn_qty_po + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + val.fn_qty_do + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_diskon) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;" class="fn_ppn">' + val.fn_ppn + ' %</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_total) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;" id="total" hidden>' + val.fn_total + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' +
                                '<a data-toggle="tooltip" data-placement="top" title="Edit">' +
                                '<button class="btn btn-warning btn-sm" id="detail" data-target="#modal-edit" data-toggle="modal" ' +
                                'data-fs_id_user="' + val.fs_id_user + '"' +
                                'data-fs_id_cart_penerimaan="' + val.fs_id_cart_penerimaan + '"' +
                                'data-fs_kd_barang="' + val.fs_kd_barang + '"' +
                                'data-fs_id_barang="' + val.fs_id_barang + '"' +
                                'data-fs_nm_barang="' + val.fs_nm_barang + '"' +
                                'data-fd_tgl_expired="' + val.fd_tgl_expired + '"' +
                                'data-fn_hpp="' + val.fn_hpp + '"' +
                                'data-fn_qty_po="' + val.fn_qty_po + '"' +
                                'data-fn_qty_do="' + val.fn_qty_do + '"' +
                                'data-fn_diskon="' + val.fn_diskon + '"' +
                                'data-fn_ppn="' + val.fn_ppn + '"' +
                                'data-fn_total="' + val.fn_total + '"' +
                                '>' +
                                '<i class="fas fa-pen"></i></button></a>' +
                                '</td>' +
                                '</tr>'
                        })
                        $('#data_penerimaan').html(data_penerimaan)
                        calculate()
                    })
                    hide_loading()
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal tambah barang kedalam chart!',
                    })
                }
            }
        })
    })

    $(document).ready(function() {
        $('#tabel-pemesanan').DataTable({
            columnDefs: [{
                "targets": [0],
                "orderable": false
            }, ],
        })
    })

    $(document).on('click', '#detail', function() {
        $('#fs_id_cart_penerimaan').val($(this).data('fs_id_cart_penerimaan'))
        $('#fs_id_barang').val($(this).data('fs_id_barang'))
        $('#fs_kd_barang').val($(this).data('fs_kd_barang'))
        $('#fs_nm_barang').val($(this).data('fs_nm_barang'))
        $('#fd_tgl_expired').val($(this).data('fd_tgl_expired'))
        $('#fn_hpp').val($(this).data('fn_hpp'))
        $('#fn_qty_po').val($(this).data('fn_qty_po'))
        $('#fn_qty_do').val($(this).data('fn_qty_do'))
        $('#fn_diskon').val($(this).data('fn_diskon'))
        $('#fn_diskon').val($(this).data('fn_diskon'))
        $('#fn_ppn').val($(this).data('fn_ppn'))
        $('#fn_total').val($(this).data('fn_total'))
    })

    $(document).on('click', '#edit_cart', function() {
        var fs_id_cart_penerimaan = $('#fs_id_cart_penerimaan').val()
        var fd_tgl_expired = $('#fd_tgl_expired').val()
        var fn_qty_do = $('#fn_qty_do').val()
        var fn_total = $('#fn_total').val()
        var fs_id_user = <?= $this->session->userdata('userid') ?>

        $.ajax({
            type: 'POST',
            url: '<?= site_url('penerimaan/process') ?>',
            data: {
                'edit_cart': true,
                'fs_id_cart_penerimaan': fs_id_cart_penerimaan,
                'fd_tgl_expired': fd_tgl_expired,
                'fn_qty_do': fn_qty_do,
                'fn_total': fn_total
            },
            dataType: 'json',
            success: function(result) {
                if (result.success == true) {
                    $('#modal-edit').modal('hide');
                    show_loading()
                    var i = 0;
                    var data_penerimaan = null
                    $.getJSON('<?= site_url('penerimaan/cart_data/') ?>' + fs_id_user, function(data) {
                        $.each(data, function(key, val) {
                            i += 1
                            data_penerimaan += '<tr>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + i + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + val.fs_kd_barang + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + val.fs_nm_barang + '</td>' +
                                '<td style="text-align: left;  vertical-align: middle;">' + dateFormat(val.fd_tgl_expired) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_hpp) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + val.fn_qty_po + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + val.fn_qty_do + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_diskon) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;" class="fn_ppn">' + val.fn_ppn + ' %</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' + currencyFormat(val.fn_total) + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;" id="total" hidden>' + val.fn_total + '</td>' +
                                '<td style="text-align: right;  vertical-align: middle;">' +
                                '<a data-toggle="tooltip" data-placement="top" title="Edit">' +
                                '<button class="btn btn-warning btn-sm" id="detail" data-target="#modal-edit" data-toggle="modal" ' +
                                'data-fs_id_user="' + val.fs_id_user + '"' +
                                'data-fs_id_cart_penerimaan="' + val.fs_id_cart_penerimaan + '"' +
                                'data-fs_kd_barang="' + val.fs_kd_barang + '"' +
                                'data-fs_id_barang="' + val.fs_id_barang + '"' +
                                'data-fs_nm_barang="' + val.fs_nm_barang + '"' +
                                'data-fd_tgl_expired="' + val.fd_tgl_expired + '"' +
                                'data-fn_hpp="' + val.fn_hpp + '"' +
                                'data-fn_qty_po="' + val.fn_qty_po + '"' +
                                'data-fn_qty_do="' + val.fn_qty_do + '"' +
                                'data-fn_diskon="' + val.fn_diskon + '"' +
                                'data-fn_ppn="' + val.fn_ppn + '"' +
                                'data-fn_total="' + val.fn_total + '"' +
                                '>' +
                                '<i class="fas fa-pen"></i></button></a>' +
                                '</td>' +
                                '</tr>'
                        })
                        $('#data_penerimaan').html(data_penerimaan)
                        calculate()
                    })
                    hide_loading()
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
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Gagal!',
                        text: 'Gagal tambah barang kedalam chart!',
                    })
                }
            }
        })
    })

    function count_edit_cart() {
        var fn_hpp = $('#fn_hpp').val()
        var fn_qty_do = $('#fn_qty_do').val()
        var fn_diskon = $('#fn_diskon').val()
        var fn_ppn = $('#fn_ppn').val()

        fn_subtotal = (fn_hpp - fn_diskon) * fn_qty_do
        fn_total = (parseInt(fn_subtotal)) + (fn_subtotal * fn_ppn / 100)
        $('#fn_total').val(fn_total)

    }

    $(document).on('keyup mouseup', '#fn_qty_do', function() {
        count_edit_cart()
    })

    function calculate() {
        var fn_subtotal = 0;
        $('#data_penerimaan tr').each(function() {
            fn_subtotal += parseInt($(this).find('#total').text())
        })
        isNaN(fn_subtotal) ? $('#fn_subtotal').val(0) : $('#fn_subtotal').val(fn_subtotal)

        var discount = $('#discount').val()
        var fn_grandtotal = fn_subtotal - discount
        if (isNaN(fn_grandtotal)) {
            $('#fn_grandtotal').val(0)
        } else {
            $('#fn_grandtotal').val(fn_grandtotal)
        }

    }

    $(document).on('keyup mouseup', '#discount', function() {
        calculate()
    })

    $(document).ready(function() {
        count_edit_cart()
        calculate()
    })

    $(document).on('click', '#simpan', function() {
        var fs_id_pemesanan = $('#fs_id_pemesanan').val()
        var fs_keterangan = $('#fs_keterangan').val()
        var fd_tgl_penerimaan = $('#fd_tgl_penerimaan').val()
        var fn_subtotal = $('#fn_subtotal').val()
        var fn_diskon = $('#discount').val()
        var fn_grandtotal = $('#fn_diskon').val()

        if (fs_id_pemesanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'No pemesanan masih kosong!',
                text: 'Silahkan pilih no pemersanan terlebih dahulu!',
            })
            $('#fs_kd_pemesanan').focus()
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
                        url: '<?= site_url('penerimaan/process') ?>',
                        data: {
                            'simpan': true,
                            'fs_id_pemesanan': fs_id_pemesanan,
                            'fs_keterangan': fs_keterangan,
                            'fd_tgl_penerimaan': fd_tgl_penerimaan,
                            'fn_subtotal': fn_subtotal,
                            'fn_diskon': fn_diskon,
                            'fn_grandtotal': fn_grandtotal
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.pembelian_id,
                                    Swal.fire({
                                        title: 'Cetak transaksi ini?',
                                        icon: 'info',
                                        showCancelButton: true,
                                        confirmButtonColor: '#00a65a',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Ya, cetak!',
                                        showClass: {
                                            popup: 'animate__animated animate__bounceIn'
                                        },
                                        hideClass: {
                                            popup: 'animate__animated animate__backOutDown'
                                        }
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            location.href = '<?= site_url('penerimaan') ?>'
                                            window.open('<?= site_url('penerimaan/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('penerimaan') ?>'
                                        }
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Transaksi gagal disimpan!',
                                })
                            }
                        }
                    })
                }
            })
        }
    })
</script>