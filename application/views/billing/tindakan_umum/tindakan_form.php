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
        height: 270px;
        overflow: auto;
    }
</style>


<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Tindakan Umum</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tindakan Umum</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" id="fd_tgl_trs" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Kode Tindakan</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_kd_trs_tindakan" value="<?= $no_tindakan ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">No Reg</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_registrasi">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_registrasi" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-registrasi">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_pasien" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Jaminan</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="fs_nm_jaminan" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Layanan</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_layanan">
                        <input type="text" style="background-color: lavender;" id="fs_nm_layanan" class="form-control" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-layanan">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Tindakan</label>
                    <div class="col-sm-8 input-group">
                        <input type="hidden" id="fs_id_tarif">
                        <input type="hidden" id="fs_kd_tarif">
                        <input type="hidden" id="fs_id_rekapcetak">
                        <input type="hidden" id="fs_nm_rekapcetak">
                        <input type="hidden" id="fn_nilai_tarif">
                        <input type="text" style="background-color: lavender;" id="fs_nm_tarif" class="form-control" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" id="tindakan" data-toggle="modal" data-target="#modal-tarif">
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
                        <button type="button" id="add_cart" class="btn btn-flat btn-primary" style="width: 45%;">
                            <i class="fa fa-cart-plus"></i> Tambah
                        </button>
                        <button type="button" id="batal_tindakan" class="btn btn-flat btn-danger float-right" style="width: 45%;">
                            <i class="fa fa-ban"></i> Batal
                        </button>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right"></label>
                    <div class="col-sm-8">
                        <button type="button" id="simpan_tindakan" class="btn btn-flat btn-success" style="width: 100%;">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body auto">
                <table class="table table-bordered table-striped table-sm">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode </th>
                            <th>Nama </th>
                            <th>Qty </th>
                            <th>Nilai</th>
                            <th>Disk.</th>
                            <th>Total</th>
                            <th class="text-center"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody id="cart_table">
                        <?php $this->view('billing/tindakan_umum/tindakan_cart') ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-7">
                    </div>
                    <div class="col-md-5">
                        <div class="form-group row mb-2">
                            <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-right" id="subtotal" readonly style="background-color: lavender;">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-4 col-form-label text-right">Diskon</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-right" id="discount">
                            </div>
                        </div>
                        <div class="form-group row mb-2">
                            <label class="col-sm-4 col-form-label text-right">Grand Total</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control text-right" id="grand_total" readonly style="background-color: lavender;">
                            </div>
                        </div>
                    </div>
                </div>
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
                                    <button class="btn btn-sm btn-info" id="pilih_register" data-id="<?= $reg->fs_id_registrasi ?>" data-kode="<?= $reg->fs_kd_registrasi ?>" data-nama="<?= $reg->fs_nm_pasien ?>" data-jaminan="<?= $reg->fs_nm_jaminan ?>" data-idlayanan="<?= $reg->idlayanan ?>" data-layanan="<?= $reg->fs_nm_layanan ?>">
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

<!-- Modal Layanan -->
<div class="modal fade" id="modal-layanan">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table_layanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($layanan as $ly) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $ly->fs_kd_layanan ?></td>
                                <td><?= $ly->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_layanan" data-fs_id_layanan="<?= $ly->fs_id_layanan ?>" data-fs_kd_layanan="<?= $ly->fs_kd_layanan ?>" data-fs_nm_layanan="<?= $ly->fs_nm_layanan ?>">
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

<!-- Modal Add Tarif -->
<div class="modal fade" id="modal-tarif">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Tindakan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <span id="data_tindakan"></span>
                </table>
            </div>
            <div class="modal-footer bg-soft-info"></div>
        </div>
    </div>
</div>

<!-- Modal Update Tarif -->
<div class="modal fade" id="modal-update_cart">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Edit Tindakan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id_tindakan">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Kode Tindakan</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="kd_tarif" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nama Tindakan</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" id="nm_tarif" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nilai Tindakan</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="nilai" min="0" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Jumlah</label>
                    <div class="col-sm-8">
                        <input type="number" id="qty" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Diskon</label>
                    <div class="col-sm-8">
                        <input type="number" id="diskon" min="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Total</label>
                    <div class="col-sm-8">
                        <input type="number" style="background-color: lavender;" id="total" min="0" class="form-control" readonly>
                    </div>
                </div>
                <!-- <div class="form-group">
                    <label for="">Tindakan</label>
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" style="background-color: lavender;" id="kd_tarif" class="form-control" readonly>
                        </div>
                        <div class="col-md-6">
                            <input type="text" style="background-color: lavender;" id="nm_tarif" class="form-control" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nilai</label>
                            <input type="number" style="background-color: lavender;" id="nilai" min="0" class="form-control" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Qty</label>
                            <input type="number" id="qty" min="0" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="number" id="diskon" min="0" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total</label>
                            <input type="number" style="background-color: lavender;" id="total" min="0" class="form-control" readonly>
                        </div>
                    </div>
                </div> -->
                <span id="komponen_tarif"></span>
            </div>
            <div class="modal-footer bg-soft-info">
                <div class="pull-right">
                    <button type="button" id="edit_cart" class="btn btn-flat btn-success"><i class="fa fa-paper-airplane"></i> Simpan</button>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#table_layanan').DataTable({
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

    $(document).on('click', '#pilih_register', function() {
        $('#fs_id_registrasi').val($(this).data('id'))
        $('#fs_kd_registrasi').val($(this).data('kode'))
        $('#fs_nm_pasien').val($(this).data('nama'))
        $('#fs_nm_jaminan').val($(this).data('jaminan'))
        $('#fs_id_layanan').val($(this).data('idlayanan'))
        $('#fs_nm_layanan').val($(this).data('layanan'))
        $('#modal-registrasi').modal('hide')
    })

    $(document).on('click', '#pilih_layanan', function() {
        $('#fs_id_layanan').val($(this).data('fs_id_layanan'))
        $('#fs_kd_layanan').val($(this).data('fs_kd_layanan'))
        $('#fs_nm_layanan').val($(this).data('fs_nm_layanan'))
        $('#modal-layanan').modal('hide')
    })

    $(document).on('click', '#pilih_tarif', function() {
        $('#fs_id_tarif').val($(this).data('id_tarif'))
        $('#fs_kd_tarif').val($(this).data('kode_tarif'))
        $('#fs_nm_tarif').val($(this).data('nama_tarif'))
        $('#fs_id_rekapcetak').val($(this).data('id_rekap'))
        $('#fs_nm_rekapcetak').val($(this).data('nama_rekap'))
        $('#fn_nilai_tarif').val($(this).data('nilai_tarif'))
        $('#modal-tarif').modal('hide')
    })

    $(document).on('click', '#tindakan', function() {
        var i = 0;
        var data_tindakan = '<table class="table table-bordered table-striped table-sm" id="tabel-tindakan">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode tarif</th>' +
            '<th>Nama tarif</th>' +
            '<th>Rekap cetak</th>' +
            '<th>Nilai Tarif</th>' +
            '<th>Pilih</th>' +
            '</thead>'
        data_tindakan += '<tbody>'
        $.getJSON('<?= site_url('tindakan/data_tarif/') ?>' + $('#fs_id_layanan').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_tindakan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_tarif + '</td>' +
                    '<td>' + val.fs_nm_tarif + '</td>' +
                    '<td>' + val.fs_nm_rekapcetak + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_tarif) + '</td>' +
                    '<td>' +
                    '<button class="btn btn-sm btn-info" id="pilih_tarif" data-id_tarif="' + val.fs_id_tarif + '" data-kode_tarif="' + val.fs_kd_tarif + '" data-nama_tarif="' + val.fs_nm_tarif + '" data-id_rekap="' + val.fs_id_rekapcetak + '" data-nama_rekap="' + val.fs_nm_rekapcetak + '" data-nilai_tarif="' + val.fn_nilai_tarif + '">' +
                    '<i class="fa fa-check"></i>' +
                    '</button>' +
                    '</td>' +
                    '</tr>'
            })
            data_tindakan += '</tbody></table>'
            $('#data_tindakan').html(data_tindakan)
            $('#tabel-tindakan').DataTable({
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

    $(document).on('click', '#update_cart', function() {
        $('#id_tindakan').val($(this).data('id_tindakan'))
        $('#kd_tarif').val($(this).data('kd_tarif'))
        $('#nm_tarif').val($(this).data('nm_tarif'))
        $('#nilai').val($(this).data('nilai'))
        $('#qty').val($(this).data('qty'))
        $('#diskon').val($(this).data('diskon'))
        $('#total').val($(this).data('total'))
        $('#modal-update_cart').modal('hide')


        // var komponen_tarif = '<table class="table table-bordered table-sm">'
        // komponen_tarif += '<tr><th>Kode</th><th>Komponen</th><th style="width: 10%;">Qty</th><th>QTY</th><th>Diskon</th><th>Pegawai</th><th>Total</th></tr>'
        // $.getJSON('<?= site_url('tindakan/komponen_tarif/') ?>' + $(this).data('id_tindakan'), function(data) {
        //     $.each(data, function(key, val) {
        //         komponen_tarif += '<tr><td>' +
        //             val.fs_kd_komponen + '</td><td>' +
        //             val.fs_nm_komponen + '</td><td><div class="form-group"><input type="number" class="form-control" id="qty" value="' +
        //             val.fn_qty + '"</div></td><td>' +
        //             currencyFormat(val.fn_nilai) + '</td><td>' +
        //             currencyFormat(val.fn_diskon) + '</td><td>'
        //         if (parseInt(val.fb_medis) === 1) {
        //             komponen_tarif += '<div class="form-group"><select  class="form-control select2">' +
        //                 '<option>--pilih--</option><?php foreach ($pegawai as $pg) { ?><option><?= $pg->fs_nm_pegawai ?></option>?> <?php } ?></select>' +
        //                 '</div>'
        //         }
        //         komponen_tarif += '</td><td>' +
        //             currencyFormat(val.fn_subtotal) + '</td></tr>'
        //     })
        //     komponen_tarif += '</table>'
        //     $('#komponen_tarif').html(komponen_tarif)
        // })
    })

    function count_edit_modal() {
        var nilai = $('#nilai').val()
        var qty = $('#qty').val()
        var diskon = $('#diskon').val()

        total = (nilai - diskon) * qty
        $('#total').val(total)

        if (discount == '') {
            $('#diskon').val(0)
        }
    }

    $(document).on('keyup mouseup', '#nilai, #qty, #diskon', function() {
        count_edit_modal()
    })

    $(document).on('click', '#edit_cart', function() {
        var fs_id_tindakan_cart = $('#id_tindakan').val()
        var fn_qty = $('#qty').val()
        var fn_diskon = $('#diskon').val()
        var fn_total = $('#total').val()
        if (fn_qty == '' || fn_qty < 1) {
            Swal.fire({
                icon: 'error',
                title: 'Jumlah tindakan tidak boleh kosong!',
                text: 'Silahkan isi jumlah tindakan terlebih dahulu!',
            })
            $('#qty').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('tindakan/process') ?>',
                data: {
                    'edit_cart': true,
                    'fs_id_tindakan_cart': fs_id_tindakan_cart,
                    'fn_qty': fn_qty,
                    'fn_diskon': fn_diskon,
                    'fn_total': fn_total
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('tindakan/cart_data') ?>', function() {
                            calculate()
                        })
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: 'Data tindakan berhasil di update',
                            showClass: {
                                popup: 'animate__animated animate__zoomInDown'
                            },
                            hideClass: {
                                popup: 'animate__animated animate__zoomOutDown'
                            }
                        })
                        $('#modal-update_cart').modal('hide');
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal update tindakan',
                        })
                    }
                }
            })
        }
    })

    $(document).on('click', '#add_cart', function() {
        var fs_id_tindakan = 0
        var fs_id_tarif = $('#fs_id_tarif').val()
        var fs_id_rekapcetak = $('#fs_id_rekapcetak').val()
        var fn_nilai_tarif = $('#fn_nilai_tarif').val()
        var fn_qty = $('#fn_qty').val()
        if (fs_id_tarif == '') {
            Swal.fire({
                icon: 'error',
                title: 'Tindakan tidak boleh kosong!',
                text: 'Silahkan pilih tindakan terlebih dahulu!',
            })
            $('#fs_id_tarif').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('tindakan/process') ?>',
                data: {
                    'add_cart': true,
                    'fs_id_tindakan': fs_id_tindakan,
                    'fs_id_tarif': fs_id_tarif,
                    'fs_id_rekapcetak': fs_id_rekapcetak,
                    'fn_nilai_tarif': fn_nilai_tarif,
                    'fn_qty': fn_qty
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table').load('<?= site_url('tindakan/cart_data') ?>', function() {
                            calculate()
                        })
                        $('#fs_id_tarif').val('')
                        $('#fs_kd_tarif').val('')
                        $('#fs_nm_tarif').val('')
                        $('#fs_id_rekapcetak').val('')
                        $('#fs_nm_rekpcetak').val('')
                        $('#fn_nilai_tarif').val('')
                        $('#fn_qty').val('1')
                        $('#fs_nm_tarif').focus()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Tindakan gagal di tambahkan',
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
                var fs_id_tindakan_cart = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('tindakan/process') ?>',
                    data: {
                        'del_cart': true,
                        'fs_id_tindakan_cart': fs_id_tindakan_cart,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('tindakan/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal hapus tindakan',
                            })
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#batal_tindakan', function() {
        Swal.fire({
            title: 'Yakin menghapus data ini?',
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
                var fs_id_tindakan_cart = $(this).data('cartid')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('tindakan/process') ?>',
                    data: {
                        'batal_tindakan': true,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table').load('<?= site_url('tindakan/cart_data') ?>', function() {
                                calculate()
                            })
                        } else {
                            alert('Gagal hapus cart');
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#simpan_tindakan', function() {
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fn_subtotal_tindakan = $('#subtotal').val()
        var fn_diskon_tindakan = $('#discount').val()
        var fn_nilai_tindakan = $('#grand_total').val()
        var fd_tgl_trs = $('#fd_tgl_trs').val()

        if (fs_id_registrasi == '') {
            Swal.fire({
                icon: 'error',
                title: 'Register masih kosong!',
                text: 'Silahkan pilih register terlebih dahulu!',
            })
            $('#fs_id_registrasi').focus()
        } else if (fs_id_layanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan masih kosong!',
                text: 'Silahkan pilih layanan terlebih dahulu!',
            })
            $('#fs_id_registrasi').focus()

        } else if (fn_subtotal_tindakan == 0) {
            Swal.fire({
                icon: 'error',
                title: 'Cart tindakan masih kosong!',
                text: 'Silahkan pilih tindakan terlebih dahulu!',
            })
            $('#fs_id_registrasi').focus()

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
                        url: '<?= site_url('tindakan/process') ?>',
                        data: {
                            'simpan_tindakan': true,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_id_layanan': fs_id_layanan,
                            'fn_subtotal_tindakan': fn_subtotal_tindakan,
                            'fn_diskon_tindakan': fn_diskon_tindakan,
                            'fn_nilai_tindakan': fn_nilai_tindakan,
                            'fd_tgl_trs': fd_tgl_trs
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success == true) {
                                kode = result.tindakan_id,
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
                                            location.href = '<?= site_url('tindakan') ?>'
                                            window.open('<?= site_url('tindakan/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('tindakan') ?>'
                                        }
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Tindakan gagal di simpan',
                                })
                            }
                        }

                    })
                }
            })
        }
    })

    function calculate() {
        var subtotal = 0;
        $('#cart_table tr').each(function() {
            subtotal += parseInt($(this).find('#total_tarif').text())
        })
        isNaN(subtotal) ? $('#subtotal').val(0) : $('#subtotal').val(subtotal)

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

    $(document).on('keyup mouseup', '#discount', function() {
        calculate()
    })

    $(document).ready(function() {
        calculate()
    })
</script>