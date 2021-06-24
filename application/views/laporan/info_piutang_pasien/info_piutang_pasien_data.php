<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Piutang Umum</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Piutang Umum</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<?php $this->view('messages') ?>


<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-inline">
                    <input type="date" class="form-control mb-2 mr-sm-3" id="awal" name="awal" value="<?= date('Y-m-01') ?>" autocomplete="off">
                    <input type="date" class="form-control mb-2 mr-sm-3" id="akhir" name="akhir" value="<?= date('Y-m-d') ?>" autocomplete="off">
                    <button class="btn btn-primary mb-2 mr-sm-3" id="get">Proses</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_piutang_pasien"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Bayar -->
<div class="modal modal-primary fade" id="modal-bayar">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-success">
                <h4 class="modal-title">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Tanggal Bayar</label>
                    <div class="col-sm-9">
                        <input type="date" id="fd_tgl_bayar" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Sisa Hutang</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="fs_id_regout">
                        <input type="hidden" id="fs_id_registrasi">
                        <input type="text" style="background-color: pink;" id="fn_sisa_hutang" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Tunai</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_cash" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Debit Card</label>
                    <div class="col-sm-4">
                        <select id="fs_id_bank_debit" class="form-control select2" style="width: 100%;">
                            <option value="">-- Pilih Bank --</option>
                            <?php foreach ($debit as $db) { ?>
                                <option value="<?= $db->fs_id_bank ?>"><?= $db->fs_nm_bank ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" id="fn_no_debit" class="form-control" placeholder="No. Kartu Debit">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_debit" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Credit Card</label>
                    <div class="col-sm-4">
                        <select id="fn_id_bank_credit" class="form-control select2" style="width: 100%;">
                            <option value="">-- Pilih Bank --</option>
                            <?php foreach ($credit as $cc) { ?>
                                <option value="<?= $cc->fs_id_bank ?>"><?= $cc->fs_nm_bank ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" id="fn_no_credit" class="form-control" placeholder="No. Kartu Kredit">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_credit" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Diskon</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_diskon_regout" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Hutang</label>
                    <div class="col-sm-9">
                        <input type="number" class="form-control" id="fn_hutang" value="" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button id="process_payment" class="btn btn-flat btn-primary pull-right">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-success"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    $(document).on('click', '#bayar', function() {
        $('#fn_sisa_hutang').val($(this).data('fn_hutang'));
        $('#fn_hutang').val($(this).data('fn_hutang'));
        $('#fs_id_regout').val($(this).data('fs_id_regout'));
        $('#fs_id_registrasi').val($(this).data('fs_id_registrasi'));
    })

    function hitung_bayar() {
        var fn_sisa_hutang = $('#fn_sisa_hutang').val();
        var fn_cash = $('#fn_cash').val();
        var fn_debit = $('#fn_debit').val();
        var fn_credit = $('#fn_credit').val();
        var fn_diskon_regout = $('#fn_diskon_regout').val();

        $('#fn_hutang').val(fn_sisa_hutang);
        fn_cash != 0 || fn_debit != 0 || fn_credit != 0 || fn_diskon_regout != 0 ? $('#fn_hutang').val(parseInt(fn_sisa_hutang) - (parseInt(fn_cash) + parseInt(fn_debit) + parseInt(fn_credit) + parseInt(fn_diskon_regout))) : $('#fn_hutang').val(fn_sisa_hutang);

        if (fn_cash == '') {
            $('#fn_cash').val(0)
        }
        if (fn_debit == '') {
            $('#fn_debit').val(0)
        }
        if (fn_credit == '') {
            $('#fn_credit').val(0)
        }
        if (fn_diskon_regout == '') {
            $('#fn_diskon_regout').val(0)
        }
    }

    $(document).on('keyup mouseup', '#bayar, #fn_cash, #fn_debit, #fn_credit, #fn_diskon_regout', function() {
        hitung_bayar()
    })

    $(document).ready(function() {
        hitung_bayar()
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_piutang_pasien = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Tgl Keluar</th>' +
            '<th>Kode Registrasi</th>' +
            '<th>Nama </th>' +
            '<th>Jaminan</th>' +
            '<th>Tagihan</th>' +
            '<th>Terbayar</th>' +
            '<th>Hutang</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_piutang_pasien += '<tbody>'
        $.getJSON('<?= site_url('info_piutang_pasien/data_piutang_pasien/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_piutang_pasien += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_regout) + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '<td>' + val.fs_nm_jaminan + '</td>' +
                    '<td>' + currencyFormat(val.fn_grandtotal) + '</td>' +
                    '<td>' + currencyFormat(val.fn_grandtotal - val.fn_hutang) + '</td>' +
                    '<td>' + currencyFormat(val.fn_hutang) + '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="bayar" data-target="#modal-bayar" data-toggle="modal" ' +
                    'data-fs_id_registrasi="' + val.id_reg +
                    '" data-fs_id_regout="' + val.fs_id_regout +
                    '" data-fs_kd_registrasi="' + val.fs_kd_registrasi +
                    '"data-fd_tgl_regout="' + dateFormat(val.fd_tgl_regout) +
                    '"data-fs_kd_rm="' + val.fs_kd_rm +
                    '"data-fs_nm_pasien="' + val.fs_nm_pasien +
                    '"data-fs_alamat="' + val.fs_alamat +
                    '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                    '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                    '"data-fs_nm_pegawai="' + val.fs_nm_pegawai +
                    '"data-fn_grandtotal="' + currencyFormat(val.fn_grandtotal) +
                    '"data-fn_terbayar="' + currencyFormat(val.fn_grandtotal - val.fn_hutang) +
                    '"data-fn_hutang="' + val.fn_hutang +
                    '" >' +
                    '<i class="far fa-money-bill-alt"></i></button></a>' +
                    '</td></tr>'
            })
            data_piutang_pasien += '</tbody></table>'
            $('#data_piutang_pasien').html(data_piutang_pasien)
            $('#table1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'colvis', 'copy', 'excel', 'pdf', 'print'
                ],
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
            });
            hide_loading()
        })
    })

    $(document).on('click', '#process_payment', function() {
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_id_regout = $('#fs_id_regout').val()
        var fn_cash = $('#fn_cash').val()
        var fs_id_bank_debit = $('#fs_id_bank_debit').val()
        var fn_no_debit = $('#fn_no_debit').val()
        var fn_debit = $('#fn_debit').val()
        var fs_id_bank_credit = $('#fn_id_bank_credit').val()
        var fn_no_credit = $('#fn_no_credit').val()
        var fn_credit = $('#fn_credit').val()
        var fn_diskon_regout = $('#fn_diskon_regout').val()
        var fn_hutang = $('#fn_hutang').val()
        var fd_tgl_bayar = $('#fd_tgl_bayar').val()

        if (fn_hutang < 0) {
            Swal.fire({
                icon: 'error',
                title: 'Hutang tidak boleh minus!',
                text: 'Silahkan perbaiki nilai pembayaran!',
            })
            $('#fn_cash').focus()
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
                        url: '<?= site_url('info_piutang_pasien/process') ?>',
                        data: {
                            'process_payment': true,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_id_regout': fs_id_regout,
                            'fn_cash': fn_cash,
                            'fs_id_bank_debit': fs_id_bank_debit,
                            'fn_no_debit': fn_no_debit,
                            'fn_debit': fn_debit,
                            'fs_id_bank_credit': fs_id_bank_credit,
                            'fn_no_credit': fn_no_credit,
                            'fn_credit': fn_credit,
                            'fn_diskon_regout': fn_diskon_regout,
                            'fn_hutang': fn_hutang,
                            'fd_tgl_bayar': fd_tgl_bayar,
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.fs_id_regout2,
                                    Swal.fire({
                                        title: 'Apakah anda akan mencetak transksi ini?',
                                        icon: 'question',
                                        showCancelButton: true,
                                        confirmButtonText: `Cetak Kwitansi`,
                                        cancelButtonText: `Batal`,
                                        confirmButtonColor: '#00a65a',
                                        cancelButtonColor: '#d33',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.open('<?= site_url('info_piutang_pasien/cetak_pdf/') ?>' + kode, '_blank')
                                            location.href = '<?= site_url('info_piutang_pasien') ?>'
                                        } else {
                                            location.href = '<?= site_url('info_piutang_pasien') ?>'
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
</script>