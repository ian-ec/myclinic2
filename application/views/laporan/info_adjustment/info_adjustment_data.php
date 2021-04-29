<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Adjustment</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Adjustment</a></li>
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
                <span id="data_adjustment"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail adjustment</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%;">Kode adjustment </td>
                                    <td style="width: 5%;">:</td>
                                    <th><strong><span id="fs_kd_adjustment"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Disetujui </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_disetujui"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-6">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td style="width: 40%;">Petugas </td>
                                    <td style="width: 5%;">:</td>
                                    <th><strong><span id="user_name"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_adjustment"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_adjustment"></span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td><strong>Note : <br> <span id="fs_keterangan"></span></strong></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-md-4">
                    </div>
                    <div class="col-md-4">
                        <table class="table table-bordered table-sm">
                            <tbody>
                                <tr>
                                    <td>Total</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_total_nilai_beli"></span></strong></th>
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
        $('#fs_kd_adjustment').text($(this).data('fs_kd_adjustment'));
        $('#fs_nm_disetujui').text($(this).data('fs_nm_disetujui'));
        $('#user_name').text($(this).data('user_name'));
        $('#fn_total_nilai_beli').text($(this).data('fn_total_nilai_beli'));
        $('#fs_keterangan').text($(this).data('fs_keterangan'));
        $('#fd_tgl_adjustment').text($(this).data('fd_tgl_adjustment'));

        var detail_adjustment = '<table class="table table-bordered table-sm">'
        detail_adjustment += '<tr><th>Kode</th><th>Nama Barang</th><th>HPP</th><th>Stok Awal</th><th>QTY</th><th>Stok Akhir</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_adjustment/detail/') ?>' + $(this).data('fs_id_adjustment'), function(data) {
            $.each(data, function(key, val) {
                detail_adjustment += '<tr><td>' +
                    val.fs_kd_barang + '</td><td>' +
                    val.fs_nm_barang + '</td><td>' +
                    currencyFormat(val.harga_beli) + '</td><td>' +
                    val.fn_stok_awal + '</td><td>' +
                    val.fn_qty + '</td><td>' +
                    val.fn_stok_akhir + '</td><td>' +
                    currencyFormat(val.fn_total_harga_beli) + '</td></tr>'
            })
            detail_adjustment += '</table>'
            $('#detail_adjustment').html(detail_adjustment)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_adjustment = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode adjustment</th>' +
            '<th>Tgl adjustment</th>' +
            '<th>Total Nilai</th>' +
            '<th>Disetujui</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_adjustment += '<tbody>'
        $.getJSON('<?= site_url('info_adjustment/data_adjustment/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_adjustment += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_adjustment + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_adjustment) + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_nilai_beli) + '</td>' +
                    '<td>' + val.fs_nm_pegawai + '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_adjustment="' + val.fs_id_adjustment +
                    '" data-fs_kd_adjustment="' + val.fs_kd_adjustment +
                    '"data-fs_nm_disetujui="' + val.fs_nm_pegawai +
                    '"data-user_name="' + val.name +
                    '"data-fn_total_nilai_beli="' + currencyFormat(val.fn_total_nilai_beli) +
                    '"data-fs_keterangan="' + val.fs_keterangan +
                    '"data-fd_tgl_adjustment="' + dateFormat(val.fd_tgl_adjustment) +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('adjustment/cetak/') ?>' + val.fs_id_adjustment + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('info_adjustment/delete/') ?>' + val.fs_id_adjustment + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_adjustment += '</tbody></table>'
            $('#data_adjustment').html(data_adjustment)
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

    $(document).on('click', '#get_detail', function() {
        show_loading()
        var i = 0;
        var data_adjustment = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode adjustment</th>' +
            '<th>Tgl adjustment</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>HPP</th>' +
            '<th>Stok Awal</th>' +
            '<th>QTY Adjust</th>' +
            '<th>Stok Akhir</th>' +
            '<th>Nilai Total</th>' +
            '</thead>'
        data_adjustment += '<tbody>'
        $.getJSON('<?= site_url('info_adjustment/data_adjustment_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_adjustment += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_adjustment + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_adjustment) + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.hpp) + '</td>' +
                    '<td>' + val.fn_stok_awal + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + val.fn_stok_akhir + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_harga_beli) + '</td>' +
                    '</tr>'
            })
            data_adjustment += '</tbody></table>'
            $('#data_adjustment').html(data_adjustment)
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
</script>