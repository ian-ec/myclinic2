<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Piutang Jaminan</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Piutang Jaminan</a></li>
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
                    <div class="input-group mb-2 mr-sm-3">
                        <input type="hidden" id="fs_id_jaminan" value="0">
                        <input type="text" style="background-color: lavender;" class="form-control input-group" id="fs_nm_jaminan" value="--Pilih Jaminan--" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-jaminan">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <button class="btn btn-primary mb-2 mr-sm-3" id="get">Proses</button>
                    <button class="btn btn-danger mb-2 mr-sm-3" id="reset">Reset</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_piutang_jaminan"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Jaminan -->
<div class="modal fade" id="modal-jaminan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Jaminan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-jaminan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jaminan</th>
                            <th>Nama Jaminan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jaminan as $jm) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $jm->fs_kd_jaminan ?></td>
                                <td><?= $jm->fs_nm_jaminan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_jaminan" data-id_jaminan="<?= $jm->fs_id_jaminan ?>" data-kode_jaminan="<?= $jm->fs_kd_jaminan ?>" data-nama_jaminan="<?= $jm->fs_nm_jaminan ?>">
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
        $('#tabel-jaminan').DataTable({
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

    $(document).on('click', '#select_jaminan', function() {
        $('#fs_id_jaminan').val($(this).data('id_jaminan'))
        $('#fs_kd_jaminan').val($(this).data('kode_jaminan'))
        $('#fs_nm_jaminan').val($(this).data('nama_jaminan'))
        $('#modal-jaminan').modal('hide')
    })

    $(document).on('click', '#reset', function() {
        $('#fs_id_jaminan').val(0)
        $('#fs_nm_jaminan').val('--Pilih jaminan--')
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_piutang_jaminan = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Tgl Keluar</th>' +
            '<th>Kode Registrasi</th>' +
            '<th>Nama </th>' +
            '<th>Jaminan</th>' +
            '<th>Layanan Reg</th>' +
            '<th>Total Bill</th>' +
            '<th>Piutang</th>' +
            '<th>Sisa Piutang</th>' +
            // '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_piutang_jaminan += '<tbody>'
        $.getJSON('<?= site_url('info_piutang_jaminan/data_piutang_jaminan/') ?>' + $('#awal').val() + '/' + $('#akhir').val() + '/' + $('#fs_id_jaminan').val(),
            function(data) {
                $.each(data, function(key, val) {
                    i += 1
                    data_piutang_jaminan += '<tr>' +
                        '<td>' + i + '</td>' +
                        '<td>' + dateFormat(val.fd_tgl_keluar) + '</td>' +
                        '<td>' + val.fs_kd_registrasi + '</td>' +
                        '<td>' + val.fs_nm_pasien + '</td>' +
                        '<td>' + val.fs_nm_jaminan + '</td>' +
                        '<td>' + val.fs_nm_layanan + '</td>' +
                        '<td>' + currencyFormat(val.fn_grandtotal) + '</td>' +
                        '<td>' + currencyFormat(val.fn_piutang) + '</td>' +
                        '<td>' + currencyFormat(val.fn_sisa_piutang) + '</td>' +
                        // '<td  class="text-center" width="160px">' +
                        // '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                        // '<button class="btn btn-info btn-sm" id="bayar" data-target="#modal-bayar" data-toggle="modal" ' +
                        // 'data-fs_id_registrasi="' + val.id_reg +
                        // '" data-fs_id_regout="' + val.fs_id_regout +
                        // '" data-fs_kd_registrasi="' + val.fs_kd_registrasi +
                        // '"data-fd_tgl_regout="' + dateFormat(val.fd_tgl_regout) +
                        // '"data-fs_kd_rm="' + val.fs_kd_rm +
                        // '"data-fs_nm_pasien="' + val.fs_nm_pasien +
                        // '"data-fs_alamat="' + val.fs_alamat +
                        // '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                        // '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                        // '"data-fs_nm_pegawai="' + val.fs_nm_pegawai +
                        // '"data-fn_grandtotal="' + currencyFormat(val.fn_grandtotal) +
                        // '"data-fn_terbayar="' + currencyFormat(val.fn_grandtotal - val.fn_hutang) +
                        // '"data-fn_hutang="' + val.fn_hutang +
                        // '" >' +
                        // '<i class="far fa-eye"></i></button></a>' +
                        // '</td>' +
                        '</tr>'
                })
                data_piutang_jaminan += '</tbody></table>'
                $('#data_piutang_jaminan').html(data_piutang_jaminan)
                $('#table1').DataTable({
                    dom: 'Bfrtip',
                    buttons: [
                        'colvis', 'copy', 'excel', 'pdf', 'print'
                    ],
                    columnDefs: [{
                            "targets": [-1],
                            "className": 'text-left',
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