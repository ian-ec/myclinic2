<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Pelunasan Piutang</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Pelunasan Piutang</a></li>
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
                <span id="data_pelunasan_piutang"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail order_piutang -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Pelunasan Piutang</h4>
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
                                    <td>Kode Trs </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_pelunasan_piutang"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_pelunasan_piutang"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Jaminan </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_jaminan"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Nama Bank</td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_bank_group"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Kode Rek </td>
                                    <td>:</td>
                                    <th><strong><span id="fn_no_rekening"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Petugas </td>
                                    <td>:</td>
                                    <th><strong><span id="name"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_pelunasan_piutang"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8">
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Subtotal</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_subtotal"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Diskon</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_diskon"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Grandtotal</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_grandtotal"></span></strong></th>
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
        $('#fs_kd_pelunasan_piutang').text($(this).data('fs_kd_pelunasan_piutang'));
        $('#fd_tgl_pelunasan_piutang').text($(this).data('fd_tgl_pelunasan_piutang'));
        $('#fs_nm_jaminan').text($(this).data('fs_nm_jaminan'));
        $('#fs_nm_bank_group').text($(this).data('fs_nm_bank_group'));
        $('#fn_no_rekening').text($(this).data('fn_no_rekening'));
        $('#name').text($(this).data('name'));
        $('#fn_subtotal').text($(this).data('fn_subtotal'));
        $('#fn_diskon').text($(this).data('fn_diskon'));
        $('#fn_grandtotal').text($(this).data('fn_grandtotal'));

        var a = 0;
        var detail_pelunasan_piutang = '<table class="table table-bordered table-sm">'
        detail_pelunasan_piutang += '<th>No</th>' +
            '<th>Kode Reg</th>' +
            '<th>Nama Pasien</th>' +
            '<th>No Polis</th>' +
            '<th>Tgl Keluar</th>' +
            '<th>Piutang</th>' +
            '<th>Pelunasan</th>'
        $.getJSON('<?= site_url('info_pelunasan_piutang/detail/') ?>' + $(this).data('fs_id_pelunasan_piutang'), function(data) {
            $.each(data, function(key, val) {
                a += 1
                detail_pelunasan_piutang += '<tr><td>' +
                    a + '</td><td>' +
                    val.fs_kd_registrasi + '</td><td>' +
                    val.fs_nm_pasien + '</td><td>' +
                    val.fn_no_polis + '</td><td>' +
                    dateFormat(val.fd_tgl_keluar) + '</td><td>' +
                    currencyFormat(val.fn_piutang) + '</td><td>' +
                    currencyFormat(val.fn_nilai_pelunasan) + '</td><td>'
            })
            detail_pelunasan_piutang += '</table>'
            $('#detail_pelunasan_piutang').html(detail_pelunasan_piutang)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_pelunasan_piutang = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode Pelunasan</th>' +
            '<th>Tgl Pelunasan</th>' +
            '<th>Jaminan</th>' +
            '<th>Subtotal</th>' +
            '<th>Diskon</th>' +
            '<th>Grandtotal</th>' +
            '<th class="text-center"><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_pelunasan_piutang += '<tbody>'
        $.getJSON('<?= site_url('info_pelunasan_piutang/data_pelunasan_piutang/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_pelunasan_piutang += '<tr>' +
                    '<td style="width: 1%;">' + i + '</td>' +
                    '<td>' + val.fs_kd_pelunasan_piutang + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_pelunasan_piutang) + '</td>' +
                    '<td>' + val.fs_nm_jaminan + '</td>' +
                    '<td>' + currencyFormat(val.fn_subtotal) + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon) + '</td>' +
                    '<td>' + currencyFormat(val.fn_grandtotal) + '</td>' +
                    '<td style="width: 10%;">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_pelunasan_piutang="' + val.fs_id_pelunasan_piutang +
                    '" data-fs_kd_pelunasan_piutang="' + val.fs_kd_pelunasan_piutang +
                    '"data-fd_tgl_pelunasan_piutang="' + dateFormat(val.fd_tgl_pelunasan_piutang) +
                    '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                    '"data-fs_alamat="' + val.fs_alamat +
                    '"data-fs_telp="' + val.fs_telp +
                    '"data-name="' + val.name +
                    '"data-fn_subtotal="' + currencyFormat(val.fn_subtotal) +
                    '"data-fn_diskon="' + currencyFormat(val.fn_diskon) +
                    '"data-fn_grandtotal="' + currencyFormat(val.fn_grandtotal) +
                    '"data-fs_nm_bank_group="' + val.fs_nm_bank_group +
                    '"data-fn_no_rekening="' + val.fn_no_rekening +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('pelunasan_piutang/cetak_pdf/') ?>' + val.fs_id_pelunasan_piutang + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('pelunasan_piutang/del/') ?>' + val.fs_id_pelunasan_piutang + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_pelunasan_piutang += '</tbody></table>'
            $('#data_pelunasan_piutang').html(data_pelunasan_piutang)
            $('#table1').DataTable({
                dom: 'Bfrtip',
                buttons: [
                    'colvis', 'copy', 'excel', 'pdf', 'print'
                ],
                columnDefs: [{
                    "targets": [0, -1],
                    "className": 'text-left',
                    "orderable": false
                }, ],
            });
            hide_loading()
        })
    })

    $(document).on('click', '#get_detail', function() {
        show_loading()
        var i = 0;
        var data_pelunasan_piutang = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode Pelunasan</th>' +
            '<th>Tgl Pelunasan</th>' +
            '<th>Jaminan</th>' +
            '<th>Kode Reg</th>' +
            '<th>Nama Pasien</th>' +
            '<th>No Polis</th>' +
            '<th>Layanan</th>' +
            '<th>Tgl Keluar</th>' +
            '<th>Piutang</th>' +
            '<th>Pelunasan</th>' +
            '</thead>'
        data_pelunasan_piutang += '<tbody>'
        $.getJSON('<?= site_url('info_pelunasan_piutang/data_pelunasan_piutang_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_pelunasan_piutang += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_pelunasan_piutang + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_pelunasan_piutang) + '</td>' +
                    '<td>' + val.fs_nm_jaminan + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '<td>' + val.fn_no_polis + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_keluar) + '</td>' +
                    '<td>' + currencyFormat(val.fn_piutang) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_pelunasan) + '</td>' +
                    '</tr>'
            })
            data_pelunasan_piutang += '</tbody></table>'
            $('#data_pelunasan_piutang').html(data_pelunasan_piutang)
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