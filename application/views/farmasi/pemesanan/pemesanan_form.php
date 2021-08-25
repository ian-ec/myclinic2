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
                        <input type="date" id="fd_tgl_pemesanan" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right" style="padding-left: 1px;">Kode Transaksi</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_kd_pemesanan" value="<?= $no_pemesanan ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Layanan Order</label>
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
                    <label class="col-sm-4 col-form-label text-right">Distributor</label>
                    <div class="col-sm-8">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_distributor">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_distributor" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-distributor">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Keterangan</label>
                    <div class="col-sm-8">
                        <textarea class="form-control" id="fs_keterangan" rows="2"></textarea>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Barang</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_barang">
                        <input type="hidden" id="fn_harga_beli">
                        <input type="hidden" id="fn_stok">
                        <input type="text" id="fs_kd_barang" class="form-control" readonly style="background-color: lavender;">
                        <span class="input-group-btn">
                            <button type="button" id="barang" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
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
                        <button type="button" id="add_cart" class="btn btn-primary">
                            <i class="fas fa-angle-double-right"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="sub_total" value="" class="form-control" readonly>
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
                        <button id="process_payment" class="btn btn-flat btn-success">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <button id="cancel_payment" class="btn btn-flat btn-danger">
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
                            <th>Nama Barang</th>
                            <th class="text-center" width="10%">HPP</th>
                            <th class="text-center" width="5%">Qty</th>
                            <th class="text-center" width="10%">Diskon</th>
                            <th class="text-center" width="7%">PPN %</th>
                            <th class="text-center" width="10%">Total</th>
                            <th class="text-center" width="10%%"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                        <?php $this->view('farmasi/pemesanan/cart_data') ?>
                    </tbody>
                </table>
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

<!-- Modal Distributor -->
<div class="modal fade" id="modal-distributor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Distributor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-distributor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Distributor</th>
                            <th>Nama Distributor</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($distributor as $data) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $data->fs_kd_distributor ?></td>
                                <td><?= $data->fs_nm_distributor ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_distributor" data-id_distributor="<?= $data->fs_id_distributor ?>" data-kode_distributor="<?= $data->fs_kd_distributor ?>" data-nama_distributor="<?= $data->fs_nm_distributor ?>">
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
    <div class="modal-dialog modal-lg">
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

<!-- Modal Edit Product Barang -->
<div class="modal fade" id="modal-barang-edit">
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
                            <label for="">HPP</label>
                            <input type="number" id="fn_harga_beli_edit" min="0" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="">Qty</label>
                            <input type="number" id="fn_qty_edit" min="0" class="form-control">
                        </div>
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
                    <label for="discount_item">PPN %</label>
                    <input type="number" id="fn_pajak_edit" min="0" class="form-control">
                </div>
                <div class="form-group">
                    <label for="total_item">Total</label>
                    <input type="number" style="background-color: lavender;" id="fn_total_edit" min="0" class="form-control" readonly>
                </div>
            </div>
            <div class="modal-footer bg-soft-info">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success"><i class="fa fa-paper-airplane"></i>Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
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

    $(document).on('click', '#select_distributor', function() {
        $('#fs_id_distributor').val($(this).data('id_distributor'))
        $('#fs_kd_distributor').val($(this).data('kode_distributor'))
        $('#fs_nm_distributor').val($(this).data('nama_distributor'))
        $('#modal-distributor').modal('hide')
    })

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

    $(document).on('click', '#barang', function() {
        var i = 0;
        var data_barang = '<table class="table table-bordered table-striped table-sm" id="tabel-barang">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode barang</th>' +
            '<th>Nama barang</th>' +
            '<th>Satuan</th>' +
            '<th>HPP</th>' +
            '<th>Stok</th>' +
            '<th>Pilih</th>' +
            '</thead>'
        data_barang += '<tbody>'
        $.getJSON('<?= site_url('pemesanan/stok_barang/') ?>' + $('#fs_id_layanan').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_barang += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + val.fs_nm_satuan + '</td>' +
                    '<td>' + currencyFormat(val.fn_hpp) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-info" id="select" ' +
                    'data-fs_id_barang="' + val.fs_id_barang + '" ' +
                    'data-fs_nm_barang="' + val.fs_nm_barang + '" ' +
                    'data-fs_kd_barang="' + val.fs_kd_barang + ' / ' + val.fs_nm_barang + '" ' +
                    'data-fn_harga_beli="' + val.fn_hpp + '" ' +
                    'data-fn_stok="' + val.fn_qty + '" >' +
                    '<i class="fa fa-check"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>'
            })
            data_barang += '</tbody></table>'
            $('#data_barang').html(data_barang)
            $('#tabel-baranf').DataTable({
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
        $('#fs_nm_barang').val($(this).data('fs_nm_barang'))
        $('#fs_kd_barang').val($(this).data('fs_kd_barang'))
        $('#fn_harga_beli').val($(this).data('fn_harga_beli'))
        $('#fn_stok').val($(this).data('fn_stok'))
        $('#modal-barang').modal('hide')
    })

    $(document).on('click', '#add_cart', function() {
        var fs_id_barang = $('#fs_id_barang').val()
        var fs_kd_barang = $('#fs_kd_barang').val()
        var fn_harga_beli = $('#fn_harga_beli').val()
        var fn_stok = $('#fn_stok').val()
        var fn_qty = $('#fn_qty').val()
        if (fs_kd_barang == '') {
            Swal.fire({
                icon: 'error',
                title: 'Barang belum di pilih!',
                text: 'Silahkan pilih barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('pemesanan/process') ?>',
                data: {
                    'add_cart': true,
                    'fs_id_barang': fs_id_barang,
                    'fs_kd_barang': fs_kd_barang,
                    'fn_harga_beli': fn_harga_beli,
                    'fn_stok': fn_stok,
                    'fn_qty': fn_qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('pemesanan/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#fs_id_barang').val('')
                        $('#fs_kd_barang').val('')
                        $('#fn_qty').val('1')
                        $('#fs_kd_barang').focus()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal tambah barang kedalam chart!',
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
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var fs_id_cart_pemesanan = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('pemesanan/process') ?>',
                    data: {
                        'del_cart': true,
                        'fs_id_cart_pemesanan': fs_id_cart_pemesanan
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('pemesanan/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal hapus chart!',
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
        $('#fn_harga_beli_edit').val($(this).data('cartharga'))
        $('#fn_qty_edit').val($(this).data('cartqty'))
        $('#fn_subtotal_edit').val($(this).data('cartharga') * $(this).data('cartqty'))
        $('#fn_diskon_edit').val($(this).data('cartdiskon'))
        $('#fn_pajak_edit').val($(this).data('cartpajak'))
        $('#fn_total_edit').val($(this).data('carttotal'))
        $('#modal-barang-edit').modal('hide')
    })

    function count_edit_modal() {
        var fn_harga_beli_edit = $('#fn_harga_beli_edit').val()
        var fn_qty_edit = $('#fn_qty_edit').val()
        var fn_diskon_edit = $('#fn_diskon_edit').val()
        var fn_pajak_edit = $('#fn_pajak_edit').val()

        fn_subtotal_edit = fn_harga_beli_edit * fn_qty_edit
        $('#fn_subtotal_edit').val(fn_subtotal_edit)

        total_sebelum_ppn = (fn_harga_beli_edit - fn_diskon_edit) * fn_qty_edit

        fn_total_edit = (total_sebelum_ppn * fn_pajak_edit / 100) + parseInt(total_sebelum_ppn)
        $('#fn_total_edit').val(fn_total_edit)

        if (fn_diskon_edit == '') {
            $('#fn_diskon_edit').val(0)
        }
        if (fn_pajak_edit == '') {
            $('#fn_pajak_edit').val(0)
        }
    }

    $(document).on('keyup mouseup', '#fn_harga_beli_edit, #fn_qty_edit, #fn_diskon_edit, #fn_pajak_edit', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var fs_id_barang = $('#fs_id_barang_edit').val()
        var fn_harga_beli = $('#fn_harga_beli_edit').val()
        var fn_qty = $('#fn_qty_edit').val()
        var fn_diskon = $('#fn_diskon_edit').val()
        var fn_pajak = $('#fn_pajak_edit').val()
        var fn_total = $('#fn_total_edit').val()
        if (fn_harga_beli == '' || fn_harga_beli < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Harga barang tidak boleh kosong!',
                text: 'Silahkan isi harga barang terlebih dahulu!',
            })
            $('#fn_harga_beli_edit').focus()
        } else if (fn_qty == '' || fn_qty < 1) {
            Swal.fire({
                icon: 'error',
                title: 'QTY barang tidak boleh kosong!',
                text: 'Silahkan isi qty barang terlebih dahulu!',
            })
            $('#fn_qty_edit').focus()
        } else if (fn_pajak == '' || fn_qty < 1) {
            Swal.fire({
                icon: 'error',
                title: 'PPN barang tidak boleh kosong!',
                text: 'Silahkan isi PPN barang terlebih dahulu!',
            })
            $('#fn_pajak_edit').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('pemesanan/process') ?>',
                data: {
                    'edit_cart': true,
                    'fs_id_barang': fs_id_barang,
                    'fn_harga_beli': fn_harga_beli,
                    'fn_qty': fn_qty,
                    'fn_diskon': fn_diskon,
                    'fn_pajak': fn_pajak,
                    'fn_total': fn_total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('pemesanan/cart_data') ?>', function() {
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
                            text: 'Data barang tidak terupdate!',
                        })
                    }
                }
            })
        }
    })

    function calculate() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total').val())
        })
        isNaN(subtotal) ? $('#sub_total').val(0) : $('#sub_total').val(subtotal)

        var discount = $('#discount').val()
        var grand_total = subtotal - discount
        if (isNaN(grand_total)) {
            $('#grand_total').val(0)
        } else {
            $('#grand_total').val(grand_total)
        }

        if (discount == '') {
            $('#discount').val(0)
        }
    }

    $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })

    //process payment
    $(document).on('click', '#process_payment', function() {
        var fs_kd_pemesanan = $('#fs_kd_pemesanan').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_id_distributor = $('#fs_id_distributor').val()
        var fs_keterangan = $('#fs_keterangan').val()
        var fn_subtotal = $('#sub_total').val()
        var fn_diskon = $('#discount').val()
        var fn_grandtotal = $('#grand_total').val()
        var fd_tgl_pemesanan = $('#fd_tgl_pemesanan').val()

        if (fn_subtotal < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Cart Pebelian masih kosong!',
                text: 'Silahkan masukan barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else if (fs_id_layanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan order masih kosong!',
                text: 'Silahkan pilih layanan order!',
            })
            $('#fs_nm_layanan').focus()
        } else if (fs_id_distributor == '') {
            Swal.fire({
                icon: 'error',
                title: 'Distirbutor masih kosong!',
                text: 'Silahkan pilih distributor!',
            })
            $('#fs_nm_distributor').focus()
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
                        url: '<?= site_url('pemesanan/process') ?>',
                        data: {
                            'process_payment': true,
                            'fs_kd_pemesanan': fs_kd_pemesanan,
                            'fs_id_layanan': fs_id_layanan,
                            'fs_id_distributor': fs_id_distributor,
                            'fs_keterangan': fs_keterangan,
                            'fn_subtotal': fn_subtotal,
                            'fn_diskon': fn_diskon,
                            'fn_grandtotal': fn_grandtotal,
                            'fd_tgl_pemesanan': fd_tgl_pemesanan
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.pemesanan_id,
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
                                            location.href = '<?= site_url('pemesanan') ?>'
                                            window.open('<?= site_url('pemesanan/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('pemesanan') ?>'
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
                    url: '<?= site_url('pemesanan/process') ?>',
                    dataType: 'json',
                    data: {
                        'cancel_payment': true
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('pemesanan/cart_data') ?>', function() {
                                calculate()
                            })
                        }
                    }
                })
                $('#discount').val(0)
                $('#cash').val(0)
                $('#customer').val(0).change()
                $('#barcode').val('')
                $('#barcode').focus()
            }
        })
    })
</script>