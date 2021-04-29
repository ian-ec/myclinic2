<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Repack Barang</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Repack Barang</a></li>
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
                <div class="col-md-12">
                    <div class="form-inline">
                        <input type="date" class="form-control mb-2 mr-sm-3" id="awal" name="awal" value="<?= date('Y-m-01') ?>" autocomplete="off">
                        <input type="date" class="form-control mb-2 mr-sm-3" id="akhir" name="akhir" value="<?= date('Y-m-d') ?>" autocomplete="off">
                        <div class="form-group">
                            <button class="btn btn-primary waves-effect waves-light mb-2 mr-2" id="get" name="">Proses</button>
                            <a href="<?= site_url('repack/add') ?>" class="btn btn-success mb-2" name="process">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_repack"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Detail repack</h4>
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
                                    <td>Kode repack </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_repack"></span></strong></th>
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
                                    <th><strong><span id="fd_tgl_repack"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <span id="detail_repack"></span>
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
            <div class="modal-footer">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).on('click', '#detail', function() {
        $('#fs_kd_repack').text($(this).data('fs_kd_repack'));
        $('#fs_nm_distributor').text($(this).data('fs_nm_distributor'));
        $('#fs_alamat_distributor').text($(this).data('fs_alamat_distributor'));
        $('#fs_telp_distributor').text($(this).data('fs_telp_distributor'));
        $('#user_name').text($(this).data('user_name'));
        $('#fn_total_nilai_beli').text($(this).data('fn_total_nilai_beli'));
        $('#fs_keterangan').text($(this).data('fs_keterangan'));
        $('#fn_jenis_bayar').text($(this).data('fn_jenis_bayar'));
        $('#fd_tgl_repack').text($(this).data('fd_tgl_repack'));

        var detail_repack = '<table class="table table-bordered table-sm">'
        detail_repack += '<tr><th>Kode</th><th>Nama Barang</th><th>Nilai repack</th><th>QTY</th><th>Total</th></tr>'
        $.getJSON('<?= site_url('info_repack/detail/') ?>' + $(this).data('fs_id_repack'), function(data) {
            $.each(data, function(key, val) {
                detail_repack += '<tr><td>' +
                    val.fs_kd_barang + '</td><td>' +
                    val.fs_nm_barang + '</td><td>' +
                    currencyFormat(val.harga_beli) + '</td><td>' +
                    val.fn_qty + '</td><td>' +
                    currencyFormat(val.fn_total_harga_beli) + '</td></tr>'
            })
            detail_repack += '</table>'
            $('#detail_repack').html(detail_repack)
        })
    })

    $(document).on('click', '#get', function() {
        var i = 0;
        var data_repack = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode repack</th>' +
            '<th>Tgl repack</th>' +
            '<th>Material</th>' +
            '<th>Qty Material</th>' +
            '<th>HPP Total Material</th>' +
            '<th>Hasil</th>' +
            '<th>QTY Hasil</th>' +
            '<th>HPP Hasil</th>' +
            '<th>Keterangan</th>' +
            '</tr></thead>'
        data_repack += '<tbody>'
        $.getJSON('<?= site_url('repack/data_repack/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_repack += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_repack + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_repack) + '</td>' +
                    '<td>' + val.material + '</td>' +
                    '<td>' + val.fn_qty_material + '</td>' +
                    '<td>' + currencyFormat(val.fn_total_hpp_material) + '</td>' +
                    '<td>' + val.hasil + '</td>' +
                    '<td>' + val.fn_qty_hasil + '</td>' +
                    '<td>' + currencyFormat(val.fn_hpp_hasil) + '</td>' +
                    '<td>' + val.fs_keterangan_repack + '</td>' +
                    '</tr>'
            })
            data_repack += '</tbody></table>'
            $('#data_repack').html(data_repack)
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
        })
    })
</script>