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
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Registrasti Keluar</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Registrasti Keluar</a></li>
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
                    <button class="btn btn-primary mb-2" id="get" name="process">Proses</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_regout"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Tindakan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Registrasi Keluar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td style="width: 30%;">Tgl. Keluar</td>
                                            <td style="width: 5%;">:</td>
                                            <td><strong><span id="fd_tgl_regout"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kode Reg</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_kd_registrasi"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kode RM</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_kd_rm"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Nama</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_nm_pasien"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Alamat</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_alamat"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jaminan</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_nm_jaminan"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Layanan</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_nm_layanan"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Dokter</td>
                                            <td>:</td>
                                            <td><strong><span id="fs_nm_pegawai"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tagihan</td>
                                            <td>:</td>
                                            <td style="background-color: aqua;"><strong><span id="fn_grandtotal"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Terbayar</td>
                                            <td>:</td>
                                            <td style="background-color: greenyellow;"><strong><span id="fn_terbayar"></span></strong></td>
                                        </tr>
                                        <tr>
                                            <td>Hutang</td>
                                            <td>:</td>
                                            <td style="background-color: pink;"><strong><span id="fn_hutang"></span></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#rekap" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                            <span class="d-none d-sm-block">Rekap</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#detil" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                            <span class="d-none d-sm-block">Detail</span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#pembayaran" role="tab">
                                            <span class="d-block d-sm-none"><i class="far fa-envelope"></i></span>
                                            <span class="d-none d-sm-block">Riwayat Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content p-3 text-muted">
                                    <div class="tab-pane active auto" id="rekap" role="tabpanel">
                                        <span id="rekap_billing"></span>
                                    </div>
                                    <div class="tab-pane auto" id="detil" role="tabpanel">
                                        <table class="table table-bordered table-sm">
                                            <thead>
                                                <tr style="background-color: lavender;">
                                                    <th>Transaksi</th>
                                                    <th>Detail Transaksi</th>
                                                    <th style="text-align: right;">Subtotal</th>
                                                    <th style="text-align: right;">Diskon</th>
                                                    <th style="text-align: right;">Grandtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody id="detail_reg"></tbody>
                                            <tbody id="detail_tindakan"></tbody>
                                            <tbody id="detail_penjualan"></tbody>
                                        </table>
                                    </div>
                                    <div class="tab-pane auto" id="pembayaran" role="tabpanel">
                                        <span id="riwayat_pembayaran"></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="modal-footer bg-soft-info">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).on('click', '#detail', function() {
        $('#fd_tgl_regout').text($(this).data('fd_tgl_regout'));
        $('#fs_kd_registrasi').text($(this).data('fs_kd_registrasi'));
        $('#fs_id_registrasi').text($(this).data('fs_id_registrasi'));
        $('#fs_kd_rm').text($(this).data('fs_kd_rm'));
        $('#fs_nm_pasien').text($(this).data('fs_nm_pasien'));
        $('#fs_alamat').text($(this).data('fs_alamat'));
        $('#fs_nm_jaminan').text($(this).data('fs_nm_jaminan'));
        $('#fs_nm_layanan').text($(this).data('fs_nm_layanan'));
        $('#fs_nm_pegawai').text($(this).data('fs_nm_pegawai'));
        $('#fn_grandtotal').text($(this).data('fn_grandtotal'));
        $('#fn_terbayar').text($(this).data('fn_terbayar'));
        $('#fn_hutang').text($(this).data('fn_hutang'));

        var detail_reg = null
        $.getJSON('<?= site_url('info_registrasi_keluar/detail_reg/') ?>' + $(this).data('fs_id_registrasi'), function(data) {
            $.each(data, function(key, val) {
                detail_reg += '<tr>' +
                    '<td><b>' + val.fs_kd_registrasi + '</b></td>' +
                    '<td><b>' + val.fs_nm_layanan + '</b> / ' + val.fs_nm_karcis + '</td>' +
                    '<td style="text-align: right;">' + currencyFormat(val.fn_subtotal) + '</td>' +
                    '<td style="text-align: right;">' + currencyFormat(val.fn_diskon) + '</td>' +
                    '<td style="text-align: right;">' + currencyFormat(val.fn_grandtotal) + '</td></tr>'
            })
            $('#detail_reg').html(detail_reg)
        })

        var detail_tindakan = ''
        $.getJSON('<?= site_url('info_registrasi_keluar/detail_tindakan/') ?>' + $(this).data('fs_id_registrasi'), function(data) {
            $.each(data, function(key, val) {
                detail_tindakan += '<tr>' +
                    '<td><b>' + val.fs_kd_trs_tindakan + '</b></td>' +
                    '<td colspan="4"><b>' + val.fs_nm_layanan + '</b></td></tr>' +
                    '<tr>' +
                    '<td></td>' +
                    '<td><span id="data_tindakan_' + val.fs_id_trs_tindakan + '"></span></td>' +
                    '<td style="text-align: right;"><span id="data_subtotal_' + val.fs_id_trs_tindakan + '"></span></td>' +
                    '<td style="text-align: right;"><span id="data_diskon_' + val.fs_id_trs_tindakan + '"></span></td>' +
                    '<td style="text-align: right;"><span id="data_total_' + val.fs_id_trs_tindakan + '"></span></td>' +
                    '</tr>'

                var data_tindakan = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_tindakan/') ?>' + val.fs_id_trs_tindakan, function(data) {
                    $.each(data, function(key, val) {
                        data_tindakan += '<li>' + val.fs_nm_tarif + ' x ' + val.fn_qty + '</li>'
                    })
                    $('#data_tindakan_' + val.fs_id_trs_tindakan).html(data_tindakan)
                })

                var data_subtotal = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_tindakan/') ?>' + val.fs_id_trs_tindakan, function(data) {
                    $.each(data, function(key, val) {
                        data_subtotal += currencyFormat(val.fn_nilai_tarif * val.fn_qty) + '<br> '
                    })
                    $('#data_subtotal_' + val.fs_id_trs_tindakan).html(data_subtotal)
                })

                var data_diskon = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_tindakan/') ?>' + val.fs_id_trs_tindakan, function(data) {
                    $.each(data, function(key, val) {
                        data_diskon += currencyFormat(val.fn_diskon * val.fn_qty) + '<br> '
                    })
                    $('#data_diskon_' + val.fs_id_trs_tindakan).html(data_diskon)
                })

                var data_total = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_tindakan/') ?>' + val.fs_id_trs_tindakan, function(data) {
                    $.each(data, function(key, val) {
                        data_total += currencyFormat(val.fn_total) + '<br> '
                    })
                    $('#data_total_' + val.fs_id_trs_tindakan).html(data_total)
                })
            })
            detail_tindakan += '</tbody></table>'
            $('#detail_tindakan').html(detail_tindakan)
        })

        var detail_penjualan = ''
        $.getJSON('<?= site_url('info_registrasi_keluar/detail_penjualan/') ?>' + $(this).data('fs_id_registrasi'), function(data) {
            $.each(data, function(key, val) {
                detail_penjualan += '<tr>' +
                    '<td><b>' + val.fs_kd_penjualan + '</b></td>' +
                    '<td colspan="4"><b>Apotek</b></td></tr>' +
                    '<tr>' +
                    '<td></td>' +
                    '<td>' +
                    '<span id="data_penjualan_' + val.fs_id_penjualan + '"></span>' +
                    '<span id="detail_racik_' + val.fs_id_penjualan + '"></span>' +
                    '</td>' +
                    '<td style="text-align: right;"><span id="data_penjualan_subtotal_' + val.fs_id_penjualan + '"></span><span id="detail_racik_subtotal_' + val.fs_id_penjualan + '"></span></td>' +
                    '<td style="text-align: right;"><span id="data_penjualan_diskon_' + val.fs_id_penjualan + '"></span><span id="detail_racik_diskon_' + val.fs_id_penjualan + '"></span></td>' +
                    '<td style="text-align: right;"><span id="data_penjualan_total_' + val.fs_id_penjualan + '"></span><span id="detail_racik_total_' + val.fs_id_penjualan + '"></span></td>' +
                    '</tr>'

                var data_penjualan = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_penjualan/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        data_penjualan += '<li>' + val.fs_nm_barang + ' x ' + val.fn_qty + '</li>'
                    })
                    $('#data_penjualan_' + val.fs_id_penjualan).html(data_penjualan)
                })

                var data_penjualan_subtotal = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_penjualan/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        data_penjualan_subtotal += currencyFormat(val.harga_jual * val.fn_qty) + '<br> '
                    })
                    $('#data_penjualan_subtotal_' + val.fs_id_penjualan).html(data_penjualan_subtotal)
                })

                var data_penjualan_diskon = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_penjualan/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        data_penjualan_diskon += currencyFormat(val.fn_diskon_harga_jual * val.fn_qty) + '<br> '
                    })
                    $('#data_penjualan_diskon_' + val.fs_id_penjualan).html(data_penjualan_diskon)
                })

                var data_penjualan_total = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/data_penjualan/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        data_penjualan_total += currencyFormat(val.fn_total_harga_jual * val.fn_qty) + '<br> '
                    })
                    $('#data_penjualan_total_' + val.fs_id_penjualan).html(data_penjualan_total)
                })

                var detail_racik = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/detail_racik/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        detail_racik += '<li>' + val.fs_nm_racik + ' x ' + val.fn_qty_racik + ':</li><span id="data_racik_' + val.fs_id_racik + '"></span>'

                        var data_racik = ''
                        $.getJSON('<?= site_url('info_registrasi_keluar/data_racik/') ?>' + val.fs_id_racik, function(data) {
                            $.each(data, function(key, val) {
                                data_racik += '- ' + val.fs_nm_barang + '<br>'
                            })
                            $('#data_racik_' + val.fs_id_racik).html(data_racik)
                        })
                    })
                    $('#detail_racik_' + val.fs_id_penjualan).html(detail_racik)
                })

                var detail_racik_subtotal = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/detail_racik/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        detail_racik_subtotal += currencyFormat(val.fn_nilai_jual_racik) + '<span id="data_racik_subtotal_' + val.fs_id_racik + '"></span><br> '

                        var data_racik_subtotal = ''
                        $.getJSON('<?= site_url('info_registrasi_keluar/data_racik/') ?>' + val.fs_id_racik, function(data) {
                            $.each(data, function(key, val) {
                                data_racik_subtotal += '<br>'
                            })
                            $('#data_racik_subtotal_' + val.fs_id_racik).html(data_racik_subtotal)
                        })
                    })
                    $('#detail_racik_subtotal_' + val.fs_id_penjualan).html(detail_racik_subtotal)
                })

                var detail_racik_diskon = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/detail_racik/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        detail_racik_diskon += currencyFormat(0) + '<span id="data_racik_diskon_' + val.fs_id_racik + '"></span><br> '

                        var data_racik_diskon = ''
                        $.getJSON('<?= site_url('info_registrasi_keluar/data_racik/') ?>' + val.fs_id_racik, function(data) {
                            $.each(data, function(key, val) {
                                data_racik_diskon += '<br>'
                            })
                            $('#data_racik_diskon_' + val.fs_id_racik).html(data_racik_diskon)
                        })
                    })
                    $('#detail_racik_diskon_' + val.fs_id_penjualan).html(detail_racik_diskon)
                })

                var detail_racik_total = ''
                $.getJSON('<?= site_url('info_registrasi_keluar/detail_racik/') ?>' + val.fs_id_penjualan, function(data) {
                    $.each(data, function(key, val) {
                        detail_racik_total += currencyFormat(val.fn_nilai_jual_racik) + '<span id="data_racik_total_' + val.fs_id_racik + '"></span><br>'

                        var data_racik_total = ''
                        $.getJSON('<?= site_url('info_registrasi_keluar/data_racik/') ?>' + val.fs_id_racik, function(data) {
                            $.each(data, function(key, val) {
                                data_racik_total += '<br>'
                            })
                            $('#data_racik_total_' + val.fs_id_racik).html(data_racik_total)
                        })
                    })
                    $('#detail_racik_total_' + val.fs_id_penjualan).html(detail_racik_total)
                })
            })
            $('#detail_penjualan').html(detail_penjualan)
        })

        var aa = 0;
        var rekap_billing = '<table class="table table-bordered table-sm">' +
            '<thead>' +
            '<tr style="background-color: lavender;">' +
            '<th>No</th>' +
            '<th>Rekap Cetak</th>' +
            '<th style="text-align: right;">Subtotal</th>' +
            '<th style="text-align: right;">Diskon</th>' +
            '<th style="text-align: right;">Total</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>'
        $.getJSON('<?= site_url('info_registrasi_keluar/billing_rekap/') ?>' + $(this).data('fs_id_registrasi'), function(data) {
            $.each(data, function(key, val) {
                aa += 1
                rekap_billing += '<tr>' +
                    '<td>' + aa + '</td>' +
                    '<td>' + val.rekapcetak + '</td>' +
                    '<td  style="text-align: right;">' + currencyFormat(val.subtotal) + '</td>' +
                    '<td  style="text-align: right;">' + currencyFormat(val.diskon) + '</td>' +
                    '<td  style="text-align: right;">' + currencyFormat(val.grandtotal) + '</td></tr>'
            })
            rekap_billing += '</tbody></table>'
            $('#rekap_billing').html(rekap_billing)
        })

        var bb = 0;
        var riwayat_pembayaran = '<table class="table table-bordered table-sm">' +
            '<thead>' +
            '<tr style="background-color: lavender;">' +
            '<th>No.</th>' +
            '<th>Kode Trs</th>' +
            '<th colspan="3">Rincian Pembayaran</th>' +
            '<th class="text-center">Print</th>' +
            '</tr>' +
            '</thead>' +
            '<tbody>'
        $.getJSON('<?= site_url('info_registrasi_keluar/riwayat_pembayaran/') ?>' + $(this).data('fs_id_registrasi'), function(data) {
            $.each(data, function(key, val) {
                bb += 1
                riwayat_pembayaran += '<tr>' +
                    '<td>' + bb + '</td>' +
                    '<td>' + val.fs_kd_regout2 + '</td>' +
                    '<td>Tunai</td>' +
                    '<td colspan="2">' + currencyFormat(val.fn_cash) + '</td>' +
                    '<td rowspan="5" class="text-center">' +
                    '<a href="<?= site_url('info_piutang_pasien/cetak_pdf/') ?>' + val.fs_id_regout2 + '" class="btn btn-sm btn-primary" target="_blank"><i class="fa fa-print"></i></a>' +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td></td>' +
                    '<td>' + dateFormat(val.fd_tgl_bayar) + '</td>' +
                    '<td>Debit Card</td>' +
                    '<td>' + currencyFormat(val.fn_debit) + '</td>' +
                    '<td>No. DC: ' + val.fn_no_debit + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td>Credit Card</td>' +
                    '<td>' + currencyFormat(val.fn_credit) + '</td>' +
                    '<td>No. CC: ' + val.fn_no_credit + '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td>Klaim</td>' +
                    '<td>' + currencyFormat(val.fn_klaim) + '</td>' +
                    '<td>Jaminan : '
                if (val.fs_nm_jaminan === null) {
                    riwayat_pembayaran += '-----'
                } else {
                    riwayat_pembayaran += val.fs_nm_jaminan
                }
                riwayat_pembayaran += '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td colspan="2"></td>' +
                    '<td>Diskon</td>' +
                    '<td colspan="2">' + currencyFormat(val.fn_diskon_regout) + '</td>' +
                    '</tr>'
            })
            riwayat_pembayaran += '</tbody></table>'
            $('#riwayat_pembayaran').html(riwayat_pembayaran)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_regout = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
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
        data_regout += '<tbody>'
        $.getJSON('<?= site_url('info_registrasi_keluar/data_registrasi_keluar/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_regout += '<tr>' +
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
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_registrasi="' + val.id_reg +
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
                    '"data-fn_hutang="' + currencyFormat(val.fn_hutang) +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a class="btn btn-primary btn-sm" id="cetak_regout" data-fs_id_registrasi="' + val.id_reg + '" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('info_registrasi_keluar/batal/') ?>' + val.id_reg + '/' + val.fs_id_rm + '" id="btn-hapus" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Batal">' +
                    '<i class="fas fa-times-circle"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_regout += '</tbody></table>'
            $('#data_regout').html(data_regout)
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

    $(document).on('click', '#cetak_regout', function(e) {
        var fs_id_registrasi = $(this).data('fs_id_registrasi')
        Swal.fire({
            title: 'Apakah anda akan mencetak transksi ini?',
            icon: 'question',
            showDenyButton: true,
            showCancelButton: true,
            confirmButtonText: `Cetak Rekap`,
            denyButtonText: `Cetak Detail`,
            cancelButtonText: `Batal`,
            denyButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
        }).then((result) => {
            if (result.isConfirmed) {
                window.open('<?= site_url('kasir/cetak_rekap_pdf/') ?>' + fs_id_registrasi, '_blank')
            } else if (result.isDenied) {
                window.open('<?= site_url('kasir/cetak_detail_pdf/') ?>' + fs_id_registrasi, '_blank')
            }
        })
    })
</script>