<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Catatan Pasien</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Catatan Pasien</a></li>
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
                <span id="data_soap"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Detail soap -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Catatan Pasien</h4>
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
                                    <td>Kode soap </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_kd_soap"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>:</td>
                                    <th><strong><span id="fd_tgl_soap"></span></strong></th>
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
                                    <td>Nama Pasien</td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_pasien"></span></strong></th>
                                </tr>
                                <tr>
                                    <td>Petugas Medis </td>
                                    <td>:</td>
                                    <th><strong><span id="fs_nm_pegawai"></span></strong></th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th colspan="2">SOAP</th>
                                    <th>KETERANGAN</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="width: 15%;">Subjective</td>
                                    <td style="width: 1%;">:</td>
                                    <td><span id="fs_subjective"></span></td>
                                </tr>
                                <tr>
                                    <td>Objective</td>
                                    <td>:</td>
                                    <td><span id="fs_objective"></span></td>
                                </tr>
                                <tr>
                                    <td>Assesment</td>
                                    <td>:</td>
                                    <td><span id="fs_assesment"></span></td>
                                </tr>
                                <tr>
                                    <td>Planing</td>
                                    <td>:</td>
                                    <td><span id="fs_planing"></span></td>
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
        $('#fs_kd_soap').text($(this).data('fs_kd_soap'));
        $('#fd_tgl_soap').text($(this).data('fd_tgl_soap'));
        $('#fs_nm_layanan').text($(this).data('fs_nm_layanan'));
        $('#fs_kd_registrasi').text($(this).data('fs_kd_registrasi'));
        $('#fs_nm_pasien').text($(this).data('fs_nm_pasien'));
        $('#fs_nm_jaminan').text($(this).data('fs_nm_jaminan'));
        $('#fs_nm_pegawai').text($(this).data('fs_nm_pegawai'));
        $('#fs_subjective').text($(this).data('fs_subjective'));
        $('#fs_objective').text($(this).data('fs_objective'));
        $('#fs_assesment').text($(this).data('fs_assesment'));
        $('#fs_planing').text($(this).data('fs_planing'));
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_soap = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th style="width: 5%;">No</th>' +
            '<th>Kode soap</th>' +
            '<th>Tgl soap</th>' +
            '<th>Petugas Medis</th>' +
            '<th>Kode reg</th>' +
            '<th>Nama Pasien</th>' +
            '<th>Layanan</th>' +
            '<th><i class="fas fa-cog"></i></th></tr>' +
            '</thead>'
        data_soap += '<tbody>'
        $.getJSON('<?= site_url('info_soap/data_soap/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_soap += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_soap + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_soap) + '</td>' +
                    '<td>' + val.name + '</td>' +
                    '<td>' + val.fs_kd_registrasi + '</td>' +
                    '<td>' + val.fs_nm_pasien + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td  class="text-center" width="160px">' +
                    '<a data-toggle="tooltip" data-placement="top" title="Detail">' +
                    '<button class="btn btn-success btn-sm" id="detail" data-target="#modal-detail" data-toggle="modal" ' +
                    'data-fs_id_soap="' + val.fs_id_soap +
                    '" data-fs_kd_soap="' + val.fs_kd_soap +
                    '"data-fd_tgl_soap="' + dateFormat(val.fd_tgl_soap) +
                    '"data-fs_nm_layanan="' + val.fs_nm_layanan +
                    '"data-fs_kd_registrasi="' + val.fs_kd_registrasi +
                    '"data-fs_nm_pasien="' + val.fs_nm_pasien +
                    '"data-fs_nm_jaminan="' + val.fs_nm_jaminan +
                    '"data-fs_nm_pegawai="' + val.name +
                    '"data-fs_subjective="' + val.fs_subjective +
                    '"data-fs_objective="' + val.fs_objective +
                    '"data-fs_assesment="' + val.fs_assesment +
                    '"data-fs_planing="' + val.fs_planing +
                    '" >' +
                    '<i class="fa fa-eye"></i></button></a>' +
                    ' <a href="<?= site_url('soap/cetak_pdf/') ?>' + val.fs_id_soap + '" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">' +
                    ' <i class="fa fa-print"></i></a>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    ' <a href="<?= site_url('soap/del/') ?>' + val.fs_id_soap + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>'
            })
            data_soap += '</tbody></table>'
            $('#data_soap').html(data_soap)
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