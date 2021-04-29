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
        height: 250px;
        overflow: auto;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" id="fd_tgl_retur" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">User</label>
                    <div class="col-sm-9">
                        <input type="text" style="background-color: lavender;" id="fs_id_user" value="<?= $this->fungsi->user_login()->name ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Supplier</label>
                    <div class="col-sm-9">
                        <select id="fs_id_distributor" class="form-control select2">
                            <option value="">-- Pilih Distributor--</option>
                            <?php foreach ($distributor as $dist => $value) {
                                echo '<option value="' . $value->fs_id_distributor . '">' . $value->fs_nm_distributor . '</option>';
                            } ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Barang</label>
                    <div class="col-sm-9 input-group">
                        <input type="hidden" id="fs_id_barang">
                        <input type="hidden" id="fn_harga_beli">
                        <input type="hidden" id="fn_stok">
                        <input type="text" id="fs_kd_barang" class="form-control" autofocus>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-barang">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">QTY</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_qty" value="1" min="1" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <button type="button" id="add_cart" class="btn btn-primary">
                            <i class="fa fa-cart-plus"></i> Tambah
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body" style="padding-bottom: 40px;">
                <div>
                    <input type="hidden" id="fs_kd_retur" value="<?= $no_retur ?>">
                    <h3 style="padding-bottom: 40px;"><b><span class="float-right"><?= $no_retur; ?></span></b></h3>
                    <h1><b><span id="grand_total2" style="font-size:40pt" class="float-right">0</span></b></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body auto">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th width="2%">#</th>
                            <th width="10%">Kode Barang</th>
                            <th>Nama Barang</th>
                            <th class="text-center" width="15%">HPP</th>
                            <th class="text-center" width="10%">Qty</th>
                            <th class="text-center" width="15%">Total</th>
                            <th class="text-center" width="10%%"><i class="fas fa-cog"></i></th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                        <?php $this->view('farmasi/retur/cart_data') ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Grand Total</label>
                    <div class="col-sm-9">
                        <input type="number" style="background-color: lavender;" id="grand_total" value="" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Pembayaran</label>
                    <div class="col-sm-9">
                        <select id="fn_jenis_bayar" class="form-control select2">
                            <option value="1">Tunai</option>
                            <option value="2">Potongan Pembelian</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-5">
        <div class="card">
            <div class="card-body" style="padding-bottom: 28px;">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Keterangan</label>
                    <div class="col-sm-9">
                        <textarea id="fs_keterangan" rows="3" class="form-control"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-2">
        <div class="form-group row mb-2" style="padding-top: 10px;">
            <div class="col-sm-12">
                <button id="process_payment" class="btn btn-primary btn-lg btn-block waves-effect waves-light mb-2">
                    <i class="fas fa-paper-plane"></i> Simpan
                </button>
                <button id="cancel_payment" class="btn btn-danger btn-lg btn-block waves-effect waves-light mb-2">
                    <i class="fa fa-ban"></i> Batal
                </button>
            </div>
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
                                    <button class="btn btn-sm btn-info" id="select" data-fs_id_barang="<?= $data->fs_id_barang ?>" data-fs_nm_barang="<?= $data->fs_nm_barang ?>" data-fs_kd_barang="<?= $data->fs_kd_barang ?>" data-fn_harga_beli="<?= $data->fn_harga_beli ?>" data-fn_stok="<?= $data->fn_stok ?>">
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
                url: '<?= site_url('retur/process') ?>',
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
                        $('#cart_table').load('<?= site_url('retur/cart_data') ?>', function() {
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
                var fs_id_cart_retur = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('retur/process') ?>',
                    data: {
                        'del_cart': true,
                        'fs_id_cart_retur': fs_id_cart_retur
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('retur/cart_data') ?>', function() {
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
        $('#fn_total_edit').val($(this).data('carttotal'))
        $('#modal-barang-edit').modal('hide')
    })


    function count_edit_modal() {
        var fn_harga_beli_edit = $('#fn_harga_beli_edit').val()
        var fn_qty_edit = $('#fn_qty_edit').val()

        fn_subtotal_edit = fn_harga_beli_edit * fn_qty_edit
        $('#fn_total_edit').val(fn_subtotal_edit)

    }

    $(document).on('keyup mouseup', '#fn_harga_beli_edit, #fn_qty_edit', function() {
        count_edit_modal()
    })


    $(document).on('click', '#edit_cart', function() {
        var fs_id_barang = $('#fs_id_barang_edit').val()
        var fn_harga_beli = $('#fn_harga_beli_edit').val()
        var fn_qty = $('#fn_qty_edit').val()
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
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('retur/process') ?>',
                data: {
                    'edit_cart': true,
                    'fs_id_barang': fs_id_barang,
                    'fn_harga_beli': fn_harga_beli,
                    'fn_qty': fn_qty,
                    'fn_total': fn_total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('retur/cart_data') ?>', function() {
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
        var grand_total = 0;
        $('#cart_table tr').each(function() {
            grand_total += parseInt($(this).find('#total').text())
        })
        isNaN(grand_total) ? $('#grand_total').val(0) : $('#grand_total').val(grand_total)
        isNaN(grand_total) ? $('#grand_total2').text(0) : $('#grand_total2').text(grand_total)

        // var discount = $('#discount').val()
        // var grand_total = subtotal - discount
        // if (isNaN(grand_total)) {
        //     $('#grand_total').val(0)
        //     $('#grand_total2').text(0)
        // } else {
        //     $('#grand_total').val(grand_total)
        //     $('#grand_total2').text(grand_total)
        // }

        // var cash = $('#cash').val();
        // cash != 0 ? $('#change').val(cash - grand_total) : $('#change').val(0)

        // if (discount == '') {
        //     $('#discount').val(0)
        // }
    }



    $(document).on('keyup mouseup', '#discount, #cash', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })

    //process payment
    $(document).on('click', '#process_payment', function() {
        var fs_kd_retur = $('#fs_kd_retur').val()
        var fs_id_distributor = $('#fs_id_distributor').val()
        var fn_diskon = $('#discount').val()
        var fn_total_nilai_beli = $('#grand_total').val()
        var fn_jenis_bayar = $('#fn_jenis_bayar').val()
        var fd_tgl_retur = $('#fd_tgl_retur').val()
        var fs_keterangan = $('#fs_keterangan').val()

        if (fn_total_nilai_beli < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Cart Retur masih kosong!',
                text: 'Silahkan masukan barang terlebih dahulu!',
            })
            $('#fs_kd_barang').focus()
        } else if (fs_id_distributor == '') {
            Swal.fire({
                icon: 'error',
                title: 'Distirbutor masih kosong!',
                text: 'Silahkan pilih distributor!',
            })
            $('#fs_kd_barang').focus()
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
                        url: '<?= site_url('retur/process') ?>',
                        data: {
                            'process_payment': true,
                            'fs_kd_retur': fs_kd_retur,
                            'fs_id_distributor': fs_id_distributor,
                            'fn_total_nilai_beli': fn_total_nilai_beli,
                            'fn_jenis_bayar': fn_jenis_bayar,
                            'fd_tgl_retur': fd_tgl_retur,
                            'fs_keterangan': fs_keterangan
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.retur_id,
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
                                            location.href = '<?= site_url('retur') ?>'
                                            window.open('<?= site_url('retur/cetak/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('retur') ?>'
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
                    url: '<?= site_url('retur/process') ?>',
                    dataType: 'json',
                    data: {
                        'cancel_payment': true
                    },
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('retur/cart_data') ?>', function() {
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