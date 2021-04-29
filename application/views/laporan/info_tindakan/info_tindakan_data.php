<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Tindakan</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Tindakan</a></li>
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
                <span id="data_tindakan"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Tindakan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Tindakan</h4>
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
                                    <td>Kode tindakan </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_trs_tindakan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_trs"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Layanan </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_layanan"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Kode Reg</td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_registrasi"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Nama </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_pasien"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Jaminan </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_jaminan"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_tindakan"></span>
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
                                    <th><strong><span id="fn_subtotal_tindakan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Diskon</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_diskon_tindakan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Grand Total</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_nilai_tindakan"></span></strong></th>
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
        $('#fs_kd_trs_tindakan').text($(this).data('fs_kd_trs_tindakan'));
        $('#fd_tgl_trs').text($(this).data('fd_tgl_trs'));
        $('#fs_nm_layanan').text($(this).data('fs_nm_layanan'));
        $('#fs_kd_registrasi').text($(this).data('fs_kd_registrasi'));
        $('#fs_nm_pasien').text($(this).data('fs_nm_pasien'));
        $('#fs_nm_jaminan').text($(this).data('fs_nm_jaminan'));
        $('#fn_subtotal_tindakan').text($(this).data('fn_subtotal_tindakan'));
        $('#fn_diskon_tindakan').text($(this).data('fn_diskon_tindakan'));
        $('#fn_nilai_tindakan').text($(this).data('fn_nilai_tindakan'));

        var detail_tindakan = '<table class="table table-bordered table-sm">'
        detail_tindakan += '<tr><th>Kode</th><th>Nama Tarif</th><th>Nilai Tarif</th><th>QTY</th><th>Diskon</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_tindakan/detail/') ?>' + $(this).data('fs_id_trs_tindakan'), function(data) {
            $.each(data, function(key, val) {
                detail_tindakan += '<tr><td>' +
                    val.fs_kd_tarif + '</td><td>' +
                    val.fs_nm_tarif + '</td><td>' +
                    currencyFormat(val.fn_nilai_tarif) + '</td><td>' +
                    val.fn_qty + '</td><td>' +
                    currencyFormat(val.fn_diskon) + '</td><td>' +
                    currencyFormat(val.fn_total) + '</td></tr>'
            })
            detail_tindakan += '</table>'
            $('#detail_tindakan').html(detail_tindakan)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_tindakan = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode tindakan</th>' +
            '<th>Tgl tindakan</th>' +
            '<th>Kode reg</th>' +
            '<th>Nama Pasien</th>' +
            '<th>Subtotal</th>' +
            '<th>Diskon</th>' +
            '<th>Grandtotal</th>' +
            '<th class="text-center"><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_tindakan += '<tbody>'
        $.getJSON('<?= site_url('info_tindakan/data_tindakan/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_tindakan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_trs_tindakan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_trs) + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '<td>' + currencyFormat(val.fn_subtotal_tindakan) + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon_tindakan) + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_tindakan) + '</td>' +
                    '<td style="width: 10%;">'
                if (val.fd_tgl_keluar === '3000-01-01') {
                    data_tindakan += '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                        '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                        'data-fs_id_trs_tindakan="' + val.fs_id_trs_tindakan +
                        '" data-fs_kd_trs_tindakan="' + val.fs_kd_trs_tindakan +
                        '"data-fd_tgl_trs="' + dateFormat(val.fd_tgl_trs) +
                        '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                        '"data-fs_kd_registrasi="' + val.fs_kd_registrasi +
                        '"data-fs_nm_pasien="' + val.fs_nm_pasien +
                        '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                        '"data-fn_subtotal_tindakan="' + currencyFormat(val.fn_subtotal_tindakan) +
                        '"data-fn_diskon_tindakan="' + currencyFormat(val.fn_diskon_tindakan) +
                        '"data-fn_nilai_tindakan="' + currencyFormat(val.fn_nilai_tindakan) +
                        '" >' +
                        '<i class="fa fa-eye"></i></button></a>' +
                        ' <a href="<?= site_url('tindakan/cetak_pdf/') ?>' + val.fs_id_trs_tindakan + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                        ' <i class="fa fa-print"></i></a>' +
                        ' <a href="<?= site_url('tindakan/edit/') ?>' + val.fs_id_trs_tindakan + '" target="_blank" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                        ' <i class="fa fa-pen"></i></a>' +
                        '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                        ' <a href="<?= site_url('info_tindakan/delete/') ?>' + val.fs_kd_trs_tindakan + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                        '<i class="fa fa-trash"></i></a>' +
                        '<?php } ?>'
                } else {
                    data_tindakan += '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                        '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                        'data-fs_id_trs_tindakan="' + val.fs_id_trs_tindakan +
                        '" data-fs_kd_trs_tindakan="' + val.fs_kd_trs_tindakan +
                        '"data-fd_tgl_trs="' + dateFormat(val.fd_tgl_trs) +
                        '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                        '"data-fs_kd_registrasi="' + val.fs_kd_registrasi +
                        '"data-fs_nm_pasien="' + val.fs_nm_pasien +
                        '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                        '"data-fn_subtotal_tindakan="' + currencyFormat(val.fn_subtotal_tindakan) +
                        '"data-fn_diskon_tindakan="' + currencyFormat(val.fn_diskon_tindakan) +
                        '"data-fn_nilai_tindakan="' + currencyFormat(val.fn_nilai_tindakan) +
                        '" >' +
                        '<i class="fa fa-eye"></i></button></a>' +
                        ' <a href="<?= site_url('tindakan/cetak_pdf/') ?>' + val.fs_id_trs_tindakan + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                        ' <i class="fa fa-print"></i></a>'
                }
                data_tindakan += '</td></tr>'
            })
            data_tindakan += '</tbody></table>'
            $('#data_tindakan').html(data_tindakan)
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
        var data_tindakan = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode tindakan</th>' +
            '<th>Tgl tindakan</th>' +
            '<th>Kode Tarif</th>' +
            '<th>Nama Tarif</th>' +
            '<th>Nilai Tarif</th>' +
            '<th>QTY</th>' +
            '<th>Diskon Tarif</th>' +
            '<th>Total Tarif</th>' +
            '<th>Layanan</th>' +
            '<th>Kode reg</th>' +
            '<th>Nama Pasien</th>' +
            '<th>Jaminan</th>' +
            '</thead>'
        data_tindakan += '<tbody>'
        $.getJSON('<?= site_url('info_tindakan/data_tindakan_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_tindakan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_trs_tindakan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_trs) + '</td>' +
                    '<td>' + val.fs_kd_tarif + '</td>' +
                    '<td>' + val.fs_nm_tarif + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_tarif) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon) + '</td>' +
                    '<td>' + currencyFormat(val.fn_total) + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '<td>' + val.fs_nm_jaminan + '</td>' +
                    '</tr>'
            })
            data_tindakan += '</tbody></table>'
            $('#data_tindakan').html(data_tindakan)
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