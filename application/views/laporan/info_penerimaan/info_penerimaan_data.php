<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Penerimaan Barang</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Penerimaan Barang</a></li>
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
                <span id="data_penerimaan"></span>
            </div>
        </div>
    </div>
</div>



<!-- Modal Detail penerimaan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail penerimaan Barang</h4>
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
                                    <td style="width: 40%;">Kode penerimaan </td>
                                    <td style="width: 5%;">:</td>
                                    <th><strong><span id="fs_kd_penerimaan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal Transaksi </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_penerimaan"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Layanan Order </td>
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
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_penerimaan"></span>
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
                                    <th><strong><span id="fn_subtotal"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Discount Global</td>
                                    <td>:</td>
                                    <th><strong><span id="fn_diskon"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Total</td>
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
    $(document).ready(function() {
        $('#get').click();
    })

    $(document).on('click', '#detail', function() {
        $('#fs_kd_penerimaan').text($(this).data('fs_kd_penerimaan'));
        $('#fs_nm_layanan').text($(this).data('fs_nm_layanan'));
        $('#fs_nm_distributor').text($(this).data('fs_nm_distributor'));
        $('#fs_alamat_distributor').text($(this).data('fs_alamat_distributor'));
        $('#fs_telp_distributor').text($(this).data('fs_telp_distributor'));
        $('#fn_subtotal').text($(this).data('fn_subtotal'));
        $('#fn_diskon').text($(this).data('fn_diskon'));
        $('#fn_grandtotal').text($(this).data('fn_grandtotal'));
        $('#fs_keterangan').text($(this).data('fs_keterangan'));
        $('#fd_tgl_penerimaan').text($(this).data('fd_tgl_penerimaan'));

        var detail_penerimaan = '<table class="table table-bordered table-sm">'
        detail_penerimaan += '<tr><th>Kode</th><th>Nama Barang</th><th>HPP</th><th>QTY PO</th><th>QTY DO</th><th>Diskon @</th><th>PPN %</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_penerimaan/detail/') ?>' + $(this).data('fs_id_penerimaan'), function(data) {
            $.each(data, function(key, val) {
                detail_penerimaan += '<tr><td>' +
                    val.fs_kd_barang + '</td><td>' +
                    val.fs_nm_barang + '</td><td>' +
                    currencyFormat(val.fn_hpp) + '</td><td>' +
                    val.fn_qty_po + '</td><td>' +
                    val.fn_qty_do + '</td><td>' +
                    currencyFormat(val.diskon) + '</td><td>' +
                    currencyFormat(val.fn_ppn) + '</td><td>' +
                    currencyFormat(val.fn_total) + '</td></tr>'
            })
            detail_penerimaan += '</table>'
            $('#detail_penerimaan').html(detail_penerimaan)
        })
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var awal = $('#awal').val()
        var akhir = $('#akhir').val()
        var i = 0;
        var data_penerimaan = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode penerimaan</th>' +
            '<th>Kode pemesanan</th>' +
            '<th>Tgl penerimaan</th>' +
            '<th>Layanan Order</th>' +
            '<th>Distributor</th>' +
            '<th>Subtotal</th>' +
            '<th>Diskon</th>' +
            '<th>Grandtotal</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_penerimaan += '<tbody>'
        $.getJSON('<?= site_url('info_penerimaan/data_penerimaan/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_penerimaan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_penerimaan + '</td>' +
                    '<td>' + val.fs_kd_pemesanan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_penerimaan) + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '<td>' + currencyFormat(val.fn_subtotal) + '</td>' +
                    '<td>' + currencyFormat(val.fn_diskon) + '</td>' +
                    '<td>' + currencyFormat(val.fn_grandtotal) + '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_penerimaan="' + val.fs_id_penerimaan +
                    '" data-fs_kd_penerimaan="' + val.fs_kd_penerimaan +
                    '"data-fs_nm_distributor="' + val.fs_nm_distributor +
                    '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                    '"data-fs_alamat_distributor="' + val.fs_alamat_distributor +
                    '"data-fs_telp_distributor="' + val.fs_telp_distributor +
                    '"data-user_name="' + val.name +
                    '"data-fn_subtotal="' + currencyFormat(val.fn_subtotal) +
                    '"data-fn_diskon="' + currencyFormat(val.fn_diskon) +
                    '"data-fn_grandtotal="' + currencyFormat(val.fn_grandtotal) +
                    '"data-fs_keterangan="' + val.fs_keterangan +
                    '"data-fd_tgl_penerimaan="' + dateFormat(val.fd_tgl_penerimaan) +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('penerimaan/cetak_pdf/') ?>' + val.fs_id_penerimaan + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('info_penerimaan/delete/') ?>' + val.fs_id_penerimaan + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_penerimaan += '</tbody></table>'
            $('#data_penerimaan').html(data_penerimaan)
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
        var data_penerimaan = '<table id="table1" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode penerimaan</th>' +
            '<th>Kode pemesanan</th>' +
            '<th>Tgl penerimaan</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>HPP</th>' +
            '<th>Tax %</th>' +
            '<th>QTY PO</th>' +
            '<th>QTY DO</th>' +
            '<th>Total</th>' +
            '<th>Layanan</th>' +
            '<th>Distributor</th>' +
            '</thead>'
        data_penerimaan += '<tbody>'
        $.getJSON('<?= site_url('info_penerimaan/data_penerimaan_detail/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_penerimaan += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_penerimaan + '</td>' +
                    '<td>' + val.fs_kd_pemesanan + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_penerimaan) + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.hpp) + '</td>' +
                    '<td>' + val.fn_ppn + ' %</td>' +
                    '<td>' + val.fn_qty_po + '</td>' +
                    '<td>' + val.fn_qty_do + '</td>' +
                    '<td>' + currencyFormat(val.fn_total) + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + val.fs_nm_distributor + '</td>' +
                    '</tr>'
            })
            data_penerimaan += '</tbody></table>'
            $('#data_penerimaan').html(data_penerimaan)
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