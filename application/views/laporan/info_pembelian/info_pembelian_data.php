<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Pembelian</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Pembelian</a></li>
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
                <span id="data_pembelian"></span>
            </div>
        </div>
    </div>
</div>



<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Pembelian</h4>
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
                                    <td style="width: 40%;">Kode Pembelian </td>
                                    <td style="width: 5%;">:</td>
                                    <th><strong><span id="fs_kd_pembelian"></span></strong></th>
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
                                    <td style="width: 40%;">Petugas </td>
                                    <td style="width: 5%;">:</td>
                                    <th><strong><span id="user_name"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_pembelian"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Bayar </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_bayar"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_jenis_bayar"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_pembelian"></span>
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
                                    <td>Subtotal </td>
                                    <td>:</td>
                                    <th><strong><span id="fn_nilai_beli"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Discount Global</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_diskon"></span></strong></th>
                                </tr>
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
        $('#fs_kd_pembelian').text($(this).data('fs_kd_pembelian'));
        $('#fs_nm_distributor').text($(this).data('fs_nm_distributor'));
        $('#fs_alamat_distributor').text($(this).data('fs_alamat_distributor'));
        $('#fs_telp_distributor').text($(this).data('fs_telp_distributor'));
        $('#user_name').text($(this).data('user_name'));
        $('#fn_nilai_beli').text($(this).data('fn_nilai_beli'));
        $('#fn_diskon').text($(this).data('fn_diskon'));
        $('#fn_total_nilai_beli').text($(this).data('fn_total_nilai_beli'));
        $('#fs_keterangan').text($(this).data('fs_keterangan'));
        $('#fn_jenis_bayar').text($(this).data('fn_jenis_bayar'));
        $('#fd_tgl_pembelian').text($(this).data('fd_tgl_pembelian'));
        $('#fd_tgl_bayar').text($(this).data('fd_tgl_bayar'));

        var detail_pembelian = '<table class="table table-bordered table-sm">'
        detail_pembelian += '<tr><th>Kode</th><th>Nama Barang</th><th>HPP</th><th>QTY</th><th>Diskon @</th><th>PPN %</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_pembelian/detail/') ?>' + $(this).data('fs_id_pembelian'), function(data) {
            $.each(data, function(key, val) {
                detail_pembelian += '<tr><td>' +
                    val.fs_kd_barang + '</td><td>' +
                    val.fs_nm_barang + '</td><td>' +
                    currencyFormat(val.fn_harga_beli) + '</td><td>' +
                    val.fn_qty + '</td><td>' +
                    currencyFormat(val.harga_beli) + '</td><td>' +
                    currencyFormat(val.fn_pajak_beli) + '</td><td>' +
                    currencyFormat(val.fn_total_harga_beli) + '</td></tr>'
            })
            detail_pembelian += '</table>'
            $('#detail_pembelian').html(detail_pembelian)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var awal = $('#awal').val()
        var akhir = $('#akhir').val()
        var i = 0;
        var data_pembelian = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode pembelian</th>' +
            '<th>Tgl pembelian</th>' +
            '<th>Distributor</th>' +
            '<th>Total Harga</th>' +
            '<th>Status Pembayaran</th>' +
            '<th>Tgl Bayar</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_pembelian += '<tbody>'
        $.getJSON('<?= site_url('info_pembelian/data_pembelian/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_pembelian += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_pembelian + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_pembelian) + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '<td>' + currencyFormat(val.fn_nilai_beli) + '</td>' +
                    '<td><span class="btn btn-sm btn-'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_pembelian += 'success'
                } else {
                    data_pembelian += 'danger'
                }
                data_pembelian += '">'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_pembelian += 'Lunas'
                } else {
                    data_pembelian += 'Hutang'
                }
                data_pembelian += '</td>' +
                    '<td><span class="btn btn-sm btn-'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_pembelian += 'success'
                } else {
                    data_pembelian += 'danger'
                }
                data_pembelian += '">' + dateFormat(val.fd_tgl_bayar) + '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_pembelian="' + val.fs_id_pembelian +
                    '" data-fs_kd_pembelian="' + val.fs_kd_pembelian +
                    '"data-fs_nm_distributor="' + val.fs_nm_distributor +
                    '"data-fs_alamat_distributor="' + val.fs_alamat_distributor +
                    '"data-fs_telp_distributor="' + val.fs_telp_distributor +
                    '"data-user_name="' + val.name +
                    '"data-fn_nilai_beli="' + currencyFormat(val.fn_nilai_beli) +
                    '"data-fn_diskon="' + currencyFormat(val.fn_diskon) +
                    '"data-fn_total_nilai_beli="' + currencyFormat(val.fn_total_nilai_beli) +
                    '"data-fs_keterangan="' + val.fs_keterangan +
                    '"data-fn_jenis_bayar="'
                if (parseInt(val.fn_jenis_bayar) === 1) {
                    data_pembelian += 'Lunas'
                } else {
                    data_pembelian += 'Hutang'
                }
                data_pembelian += '"data-fd_tgl_pembelian="' + dateFormat(val.fd_tgl_pembelian) +
                    '"data-fd_tgl_bayar="' + dateFormat(val.fd_tgl_bayar) +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('pembelian/cetak_pdf/') ?>' + val.fs_id_pembelian + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    ' <a href="<?= site_url('info_pembelian/update_pembayaran/') ?>' + val.fs_id_pembelian + '" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Update Pembayaran">' +
                    ' <i class="fas fa-pen"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('info_pembelian/delete/') ?>' + val.fs_id_pembelian + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_pembelian += '</tbody></table>'
            $('#data_pembelian').html(data_pembelian)
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
        var awal = $('#awal').val()
        var akhir = $('#akhir').val()
        var i = 0;
        var data_pembelian = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode pembelian</th>' +
            '<th>Tgl pembelian</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>HPP</th>' +
            '<th>Tax %</th>' +
            '<th>HNA</th>' +
            '<th>QTY</th>' +
            '<th>Total</th>' +
            '<th>Distributor</th>' +
            '</thead>'
        data_pembelian += '<tbody>'
        $.getJSON('<?= site_url('info_pembelian/data_pembelian_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_pembelian += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_pembelian + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_pembelian) + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.hpp) + '</td>' +
                    '<td>' + val.fn_pajak_beli + ' %</td>' +
                    '<td>' + currencyFormat(val.hna) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_harga_beli) + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '</tr>'
            })
            data_pembelian += '</tbody></table>'
            $('#data_pembelian').html(data_pembelian)
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