<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Hutang</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Hutang</a></li>
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
                        <input type="hidden" id="fs_id_distributor" value="0">
                        <input type="text" style="background-color: lavender;" class="form-control input-group" id="fs_nm_distributor" value="--Pilih Distributor--" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-distributor">
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
                <span id="data_piutang_distributor"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal distributor -->
<div class="modal fade" id="modal-distributor">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih distributor</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-distributor">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode distributor</th>
                            <th>Nama distributor</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($distributor as $ds) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $ds->fs_kd_distributor ?></td>
                                <td><?= $ds->fs_nm_distributor ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_distributor" data-id_distributor="<?= $ds->fs_id_distributor ?>" data-kode_distributor="<?= $ds->fs_kd_distributor ?>" data-nama_distributor="<?= $ds->fs_nm_distributor ?>">
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

<!-- Modal Detail Penjualan -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Hutang</h4>
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
                                    <th><strong><span id="nm_distributor"></span></strong></th>
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
                                    <td>Discount</td>
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
    $(document).ready(function() {
        $('#tabel-distributor').DataTable({
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

    $(document).on('click', '#select_distributor', function() {
        $('#fs_id_distributor').val($(this).data('id_distributor'))
        $('#fs_kd_distributor').val($(this).data('kode_distributor'))
        $('#fs_nm_distributor').val($(this).data('nama_distributor'))
        $('#modal-distributor').modal('hide')
    })

    $(document).on('click', '#reset', function() {
        $('#fs_id_distributor').val(0)
        $('#fs_nm_distributor').val('--Pilih distributor--')
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_piutang_distributor = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Tgl Hutang</th>' +
            '<th>Kode Pembelian</th>' +
            '<th>Distributor</th>' +
            '<th>Hutang</th>' +
            '<th>Sisa Hutang</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_piutang_distributor += '<tbody>'
        $.getJSON('<?= site_url('info_hutang/data_hutang/') ?>' + $('#awal').val() + '/' + $('#akhir').val() + '/' + $('#fs_id_distributor').val(),
            function(data) {
                $.each(data, function(key, val) {
                    i += 1
                    data_piutang_distributor += '<tr>' +
                        '<td>' + i + '</td>' +
                        '<td>' + dateFormat(val.fd_tgl_hutang) + '</td>' +
                        '<td>' + val.fs_kd_pembelian + '</td>' +
                        '<td>' + val.fs_nm_distributor + '</td>' +
                        '<td>' + currencyFormat(val.fn_hutang) + '</td>' +
                        '<td>' + currencyFormat(val.fn_sisa_hutang) + '</td>' +
                        '<td  class="text-center" width="50px">' +
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
                        data_piutang_distributor += 'Lunas'
                    } else {
                        data_piutang_distributor += 'Hutang'
                    }
                    data_piutang_distributor += '"data-fd_tgl_pembelian="' + dateFormat(val.fd_tgl_pembelian) +
                        '"data-fd_tgl_bayar="' + dateFormat(val.fd_tgl_bayar) +
                        '" >' +
                        '<i class="fa fa-eye"></i></button></a>' +
                        '</td>' +
                        '</tr>'
                })
                data_piutang_distributor += '</tbody></table>'
                $('#data_piutang_distributor').html(data_piutang_distributor)
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

    $(document).on('click', '#detail', function() {
        $('#fs_kd_pembelian').text($(this).data('fs_kd_pembelian'));
        $('#nm_distributor').text($(this).data('fs_nm_distributor'));
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
</script>