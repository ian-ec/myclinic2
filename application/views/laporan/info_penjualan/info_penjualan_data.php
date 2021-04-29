<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Penjualan</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Penjualan</a></li>
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
                    <button class="btn btn-primary mb-2 mr-sm-3" id="get">Proses Rekap</button>
                    <button class="btn btn-success mb-2 mr-sm-3" id="get_detail">Proses Detail</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_penjualan"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail penjualan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Kode penjualan </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_penjualan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Pasien </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_pasien"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Petugas </td>
                                    <td>:</td>
                                    <th><strong><span id="user_name"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_penjualan"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama Barang</th>
                                    <th>HPP</th>
                                    <th>Harga Jual</th>
                                    <th>QTY</th>
                                    <th>Diskon @</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody id="detail_penjualan"></tbody>
                            <tbody id="data_racik"></tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Subtotal </td>
                                    <td>:</td>
                                    <th><strong><span id="fn_nilai_jual"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Discount Global</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_diskon"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_total_nilai_jual"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
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
        $('#fs_kd_penjualan').text($(this).data('fs_kd_penjualan'));
        $('#fs_nm_pasien').text($(this).data('fs_nm_pasien'));
        $('#user_name').text($(this).data('user_name'));
        $('#fn_nilai_beli').text($(this).data('fn_nilai_beli'));
        $('#fn_nilai_jual').text($(this).data('fn_nilai_jual'));
        $('#fn_diskon').text($(this).data('fn_diskon'));
        $('#fn_total_nilai_jual').text($(this).data('fn_total_nilai_jual'));
        $('#fd_tgl_penjualan').text($(this).data('fd_tgl_penjualan'));


        var detail_penjualan = null
        $.getJSON('<?= site_url('info_penjualan/detail/') ?>' + $(this).data('fs_id_penjualan'), function(data) {
            $.each(data, function(key, val) {
                detail_penjualan += '<tr>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.fn_harga_beli) + '</td>' +
                    '<td>' + currencyFormat(val.harga_jual) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon_harga_jual) + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_harga_jual) + '</td>' +
                    '</tr>'
            })
            $('#detail_penjualan').html(detail_penjualan)
        })
        var data_racik = '<span></span>'
        $.getJSON('<?= site_url('info_penjualan/racik/') ?>' + $(this).data('fs_id_penjualan'), function(data) {
            $.each(data, function(key, val) {
                data_racik += '<tr>' +
                    '<td>' + val.fs_kd_racik + '</td>' +
                    '<td>' + val.fs_nm_racik + '<span id="detail_racik_' + val.fs_id_racik + '"></span></td>' +
                    '<td>' + currencyFormat(val.fn_nilai_beli_racik) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_jual_racik) + '</td>' +
                    '<td>' + val.fn_qty_racik + '</td>' +
                    '<td>' + currencyFormat(0) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_jual_racik) + '</td>' +
                    '</tr>'

                var detail_racik = ' :'
                $.getJSON('<?= site_url('info_penjualan/racik_detail/') ?>' + val.fs_id_racik, function(data) {
                    $.each(data, function(key, val) {
                        detail_racik += '<br>- ' + val.fs_nm_barang + ' x ' + val.fn_qty
                    })
                    $('#detail_racik_' + val.fs_id_racik).html(detail_racik)
                })
            })
            $('#data_racik').html(data_racik)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_penjualan = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode penjualan</th>' +
            '<th>Tgl penjualan</th>' +
            '<th>Pasien</th>' +
            '<th>HPP</th>' +
            '<th>Subtotal</th>' +
            '<th>Diskon</th>' +
            '<th>Grandtotal</th>' +
            '<th class="text-center"><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_penjualan += '<tbody>'
        $.getJSON('<?= site_url('info_penjualan/data_penjualan/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_penjualan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_penjualan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_penjualan) + '</td>' +
                    '<td>'
                if (val.fs_id_rm === null) {
                    data_penjualan += 'Umum'
                } else {
                    data_penjualan += val.fs_nm_pasien
                }
                data_penjualan += '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_beli) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_jual) + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon) + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_nilai_jual) + '</td>' +
                    '<td style="width: 5%;">'
                if (val.fd_tgl_keluar === '3000-01-01') {
                    data_penjualan += '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                        '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                        'data-fs_id_penjualan="' + val.fs_id_penjualan +
                        '" data-fs_kd_penjualan="' + val.fs_kd_penjualan +
                        '"data-fs_nm_pasien="'
                    if (val.fs_id_rm === null) {
                        data_penjualan += 'Umum'
                    } else {
                        data_penjualan += val.fs_nm_pasien
                    }
                    data_penjualan += '"data-user_name="' + val.name +
                        '"data-fn_nilai_beli="' + currencyFormat(val.fn_nilai_beli) +
                        '"data-fn_nilai_jual="' + currencyFormat(val.fn_nilai_jual) +
                        '"data-fn_diskon="' + currencyFormat(val.fn_diskon) +
                        '"data-fn_total_nilai_jual="' + currencyFormat(val.fn_total_nilai_jual) +
                        '"data-fd_tgl_penjualan="' + dateFormat(val.fd_tgl_penjualan) +
                        '" >' +
                        '<i class="fa fa-eye"></i></button></a>' +
                        ' <a href="<?= site_url('penjualan/cetak_pdf/') ?>' + val.fs_id_penjualan + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                        ' <i class="fa fa-print"></i></a>' +
                        '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                        ' <a href="<?= site_url('info_penjualan/delete/') ?>' + val.fs_kd_penjualan + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                        '<i class="fa fa-trash"></i></a>' +
                        '<?php } ?>'
                } else {
                    data_penjualan += '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                        '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                        'data-fs_id_penjualan="' + val.fs_id_penjualan +
                        '" data-fs_kd_penjualan="' + val.fs_kd_penjualan +
                        '"data-fs_nm_pasien="'
                    if (val.fs_id_rm === null) {
                        data_penjualan += 'Umum'
                    } else {
                        data_penjualan += val.fs_nm_pasien
                    }
                    data_penjualan += '"data-user_name="' + val.name +
                        '"data-fn_nilai_beli="' + currencyFormat(val.fn_nilai_beli) +
                        '"data-fn_nilai_jual="' + currencyFormat(val.fn_nilai_jual) +
                        '"data-fn_diskon="' + currencyFormat(val.fn_diskon) +
                        '"data-fn_total_nilai_jual="' + currencyFormat(val.fn_total_nilai_jual) +
                        '"data-fd_tgl_penjualan="' + dateFormat(val.fd_tgl_penjualan) +
                        '" >' +
                        '<i class="fa fa-eye"></i></button></a>' +
                        ' <a href="<?= site_url('penjualan/cetak_pdf/') ?>' + val.fs_id_penjualan + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                        ' <i class="fa fa-print"></i></a>'
                }
                data_penjualan += '</td></tr>'

            })
            data_penjualan += '</tbody></table>'
            $('#data_penjualan').html(data_penjualan)
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

    $(document).on('click', '#get_detail', function() {
        show_loading()
        var i = 0;
        var data_penjualan = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode penjualan</th>' +
            '<th>Tgl penjualan</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>Status</th>' +
            '<th>HPP</th>' +
            '<th>Harga Jual</th>' +
            '<th>QTY</th>' +
            '<th>Diskon</th>' +
            '<th>Total</th>' +
            '<th>Kode Reg</th>' +
            '<th>Nama Pasien</th>' +
            '</thead>'
        data_penjualan += '<tbody>'
        $.getJSON('<?= site_url('info_penjualan/data_penjualan_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_penjualan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_penjualan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_penjualan) + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>'
                if (val.fs_id_racik === '0') {
                    data_penjualan += 'Obat Satuan'
                } else {
                    data_penjualan += 'Komponen Racik'
                }
                data_penjualan += '</td>' +
                    '<td>' + currencyFormat(val.hpp) + '</td>' +
                    '<td>' + currencyFormat(val.harga_jual) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon_harga_jual) + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_harga_jual) + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '</tr>'
            })
            data_penjualan += '</tbody></table>'
            $('#data_penjualan').html(data_penjualan)
            $('#table1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'colvis', 'copy', 'excel', 'pdf', 'print'
                ],
                columnDefs: [{
                    "targets": [0],
                    "orderable": false
                }, ],
            });
            hide_loading()
        })
    })
</script>