<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Retur Pembelian</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Retur Pembelian</a></li>
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
                <span id="data_retur"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail retur</h4>
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
                                    <td>Kode retur </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_retur"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Distributor </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_distributor"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Alamat </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_alamat_distributor"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Telp </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_telp_distributor"></span></strong></th>
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
                                    <td>Status Pembayaran</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_jenis_bayar"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_retur"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_retur"></span>
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
        $('#fs_kd_retur').text($(this).data('fs_kd_retur'));
        $('#fs_nm_distributor').text($(this).data('fs_nm_distributor'));
        $('#fs_alamat_distributor').text($(this).data('fs_alamat_distributor'));
        $('#fs_telp_distributor').text($(this).data('fs_telp_distributor'));
        $('#user_name').text($(this).data('user_name'));
        $('#fn_total_nilai_beli').text($(this).data('fn_total_nilai_beli'));
        $('#fs_keterangan').text($(this).data('fs_keterangan'));
        $('#fn_jenis_bayar').text($(this).data('fn_jenis_bayar'));
        $('#fd_tgl_retur').text($(this).data('fd_tgl_retur'));

        var detail_retur = '<table class="table table-bordered table-sm">'
        detail_retur += '<tr><th>Kode</th><th>Nama Barang</th><th>Nilai Retur</th><th>QTY</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_retur/detail/') ?>' + $(this).data('fs_id_retur'), function(data) {
            $.each(data, function(key, val) {
                detail_retur += '<tr><td>' +
                    val.fs_kd_barang + '</td><td>' +
                    val.fs_nm_barang + '</td><td>' +
                    currencyFormat(val.harga_beli) + '</td><td>' +
                    val.fn_qty + '</td><td>' +
                    currencyFormat(val.fn_total_harga_beli) + '</td></tr>'
            })
            detail_retur += '</table>'
            $('#detail_retur').html(detail_retur)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_retur = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode retur</th>' +
            '<th>Tgl retur</th>' +
            '<th>Distributor</th>' +
            '<th>Total Harga</th>' +
            '<th>Status Pembayaran</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_retur += '<tbody>'
        $.getJSON('<?= site_url('info_retur/data_retur/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_retur += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_retur + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_retur) + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_nilai_beli) + '</td>' +
                    '<td><span class="btn btn-sm btn-'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_retur += 'success'
                } else {
                    data_retur += 'warning'
                }
                data_retur += '">'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_retur += 'Tunai'
                } else {
                    data_retur += 'Potongan Pembelian'
                }
                data_retur += '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_retur="' + val.fs_id_retur +
                    '" data-fs_kd_retur="' + val.fs_kd_retur +
                    '"data-fs_nm_distributor="' + val.fs_nm_distributor +
                    '"data-fs_alamat_distributor="' + val.fs_alamat_distributor +
                    '"data-fs_telp_distributor="' + val.fs_telp_distributor +
                    '"data-user_name="' + val.name +
                    '"data-fn_total_nilai_beli="' + currencyFormat(val.fn_total_nilai_beli) +
                    '"data-fs_keterangan="' + val.fs_keterangan +
                    '"data-fn_jenis_bayar="'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_retur += 'Tunai'
                } else {
                    data_retur += 'Potongan Pembelian'
                }
                data_retur += '"data-fd_tgl_retur="' + dateFormat(val.fd_tgl_retur) +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('retur/cetak/') ?>' + val.fs_id_retur + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('info_retur/delete/') ?>' + val.fs_id_retur + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_retur += '</tbody></table>'
            $('#data_retur').html(data_retur)
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
        var data_retur = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode retur</th>' +
            '<th>Tgl retur</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>Nilai Retur</th>' +
            '<th>QTY</th>' +
            '<th>Total</th>' +
            '<th>Distributor</th>' +
            '</thead>'
        data_retur += '<tbody>'
        $.getJSON('<?= site_url('info_retur/data_retur_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_retur += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_retur + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_retur) + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.hpp) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_nilai_beli) + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '</tr>'
            })
            data_retur += '</tbody></table>'
            $('#data_retur').html(data_retur)
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