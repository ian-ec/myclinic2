<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between" style="padding: 5px;">
            <h3>Catatan Pasien</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Catatan Pasien</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="form-inline">
                    <div class="input-group mb-2 mr-sm-3">
                        <label style="margin-right: 10px;">No Reg</label>
                        <input type="hidden" id="fs_id_registrasi">
                        <input type="hidden" id="fs_id_rm">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_registrasi" value="" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-registrasi">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <div class="form-group mb-2 mr-sm-3">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_pasien" value="" readonly placeholder="Nama Pasien">
                    </div>
                    <div class="form-group mb-2 mr-sm-3">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_layanan" value="" readonly placeholder="Layanan">
                    </div>
                    <div class="form-group mb-2 mr-sm-3">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_jaminan" value="" readonly placeholder="Jaminan">
                    </div>
                    <div class="form-group mb-2 mr-sm-3">
                        <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_soap" value="<?= $no_soap ?>" readonly>
                        <input type="hidden" id="fs_id_soap">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card" style="margin-bottom: 5px;">
            <div class="bg-soft-primary">
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="padding: 10px; padding-bottom: 1px;"><b>Subjective</b></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <textarea name="fs_subjective" id="fs_subjective" rows="5" class="form-control" placeholder="Ketik disini ...."></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="margin-bottom: 5px;">
            <div class=" bg-soft-warning">
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="padding: 10px; padding-bottom: 1px;"><b>Objective</b></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <textarea name="fs_objective" id="fs_objective" rows="5" class="form-control" placeholder="Ketik disini ....">
TB : 
BB : 
ST :
TD :
                        </textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="margin-bottom: 5px;">
            <div class="bg-soft-success">
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="padding: 10px; padding-bottom: 1px;"><b>Assesment</b></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <textarea name="fs_assesment" id="fs_assesment" rows="5" class="form-control" placeholder="Ketik disini ...."></textarea>
                    </div>
                </form>
            </div>
        </div>
        <div class="card" style="margin-bottom: 5px;">
            <div class="bg-soft-danger">
                <div class="row">
                    <div class="col-md-12">
                        <h6 style="padding: 10px; padding-bottom: 1px;"><b>Planing</b></h6>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <textarea name="fs_planing" id="fs_planing" rows="5" class="form-control" placeholder="Ketik disini ...."></textarea>
                    </div>
                </form>
            </div>
        </div>
        <span id="tombol"></span>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <span id="soap"></span>
            </div>
        </div>
    </div>
</div>

<!-- Modal Registrasi -->
<div class="modal fade" id="modal-registrasi">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Registtasi</th>
                            <th>Nama Pasien</th>
                            <th>Jaminan</th>
                            <th>Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($registrasi as $reg) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $reg->fs_kd_registrasi ?></td>
                                <td><?= $reg->fs_nm_pasien ?></td>
                                <td><?= $reg->fs_nm_jaminan ?></td>
                                <td><?= $reg->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="pilih_register" data-id="<?= $reg->fs_id_registrasi ?>" data-kode="<?= $reg->fs_kd_registrasi ?>" data-rm="<?= $reg->fs_id_rm ?>" data-nama="<?= $reg->fs_nm_pasien ?>" data-jaminan="<?= $reg->fs_nm_jaminan ?>" data-layanan="<?= $reg->fs_nm_layanan ?>">
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


<script type='text/javascript'>
    $(document).on('click', '#pilih_register', function() {
        $('#fs_id_registrasi').val($(this).data('id'))
        $('#fs_id_rm').val($(this).data('rm'))
        $('#fs_kd_registrasi').val($(this).data('kode'))
        $('#fs_nm_pasien').val($(this).data('nama'))
        $('#fs_nm_jaminan').val($(this).data('jaminan'))
        $('#fs_nm_layanan').val($(this).data('layanan'))

        var i = 0;
        var soap = '<table class="table table-bordered table-sm" id="table_soap">' +
            '<thead>' +
            '<tr>' +
            '<th width="1%">No</th>' +
            '<th width="25%">Info</th>' +
            '<th>CPPT</th>' +
            '<th width="5%"><i class="fas fa-cog"></i></th>' +
            '</tr>' +
            '</thead>'
        var detail_soap = '<tbody>'
        $.getJSON('<?= site_url('soap/detail/') ?>' + $(this).data('rm'), function(data) {
            $.each(data, function(key, val) {
                i += 1
                detail_soap += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' +
                    '<table style="width: 100%;" class="table table-bordered">' +
                    '<tbody>' +
                    '<tr><td>' +
                    '<button style="width: 100%; text-align: left;" type="button" class="btn btn-sm btn-primary waves-effect btn-label waves-light"><i class="fas fa-file-medical-alt label-icon "></i> ' + val.fs_kd_soap + '</button>' +
                    '</td></tr>' +
                    '<tr><td>' +
                    '<button style="width: 100%; text-align: left;" type="button" class="btn btn-sm btn-danger waves-effect btn-label waves-light"><i class="fas fa-calendar-alt label-icon "></i> ' + dateFormat(val.fd_tgl_soap) + '</button>' +
                    '</td></tr>' +
                    '<tr><td>' +
                    '<button style="width: 100%; text-align: left;" type="button" class="btn btn-sm btn-success waves-effect btn-label waves-light"><i class="fas fa-notes-medical label-icon "></i> ' + val.fs_kd_registrasi + '</button>' +
                    '</td></tr>' +
                    '<tr><td>' +
                    '<button style="width: 100%; text-align: left;" type="button" class="btn btn-sm btn-warning waves-effect btn-label waves-light"><i class="far fa-hospital label-icon "></i> ' + val.fs_nm_layanan + '</button>' +
                    '</td></tr>' +
                    '<tr><td>' +
                    '<button style="width: 100%; text-align: left;" type="button" class="btn btn-sm btn-info waves-effect btn-label waves-light"><i class="fas fa-stethoscope label-icon "></i> ' + val.name + '</button>' +
                    '</td></tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</td>' +
                    '<td>' +
                    '<table style="width: 100%;" class="table table-bordered">' +
                    '<tbody>' +
                    '<tr>' +
                    '<td  style="width: 5%;">' +
                    '<div class="btn btn-sm btn-flat bg-soft-primary"><b>S</b></div>' +
                    '</td>' +
                    '<td>' +
                    nl2br(val.fs_subjective) +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="btn btn-sm btn-flat bg-soft-warning"><b>O</b></div>' +
                    '</td>' +
                    '<td>' +
                    nl2br(val.fs_objective) +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="btn btn-sm btn-flat bg-soft-success"><b>A</b></div>' +
                    '</td>' +
                    '<td>' +
                    nl2br(val.fs_assesment) +
                    '</td>' +
                    '</tr>' +
                    '<tr>' +
                    '<td>' +
                    '<div class="btn btn-sm btn-flat bg-soft-danger"><b>P</b></div>' +
                    '</td>' +
                    '<td>' +
                    nl2br(val.fs_planing) +
                    '</td>' +
                    '</tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</td>' +
                    '<td>' +
                    '<table style="width: 100%;" class="table table-bordered">' +
                    '<tbody>' +
                    '<tr><td>' +
                    '<a class="btn btn-sm btn-success" id="edit_soap"' +
                    'data-fs_id_soap="' + val.fs_id_soap + '"' +
                    'data-fs_subjective="' + val.fs_subjective + '"' +
                    'data-fs_objective="' + val.fs_objective + '"' +
                    'data-fs_assesment="' + val.fs_assesment + '"' +
                    'data-fs_planing="' + val.fs_planing + '"' +
                    '><i class="fas fa-pen"></i></a>' +
                    '<tr><td>' +
                    '<a href="<?= site_url('soap/cetak_pdf/') ?>' + val.fs_id_soap + '"  target="_blank" class="btn btn-sm btn-primary"><i class="fas fa-print"></i></a>' +
                    '<tr><td>' +
                    '<?php if ($this->fungsi->user_login()->level == 1) { ?>' +
                    '<a href="<?= site_url('soap/del/') ?>' + val.fs_id_soap + '" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">' +
                    '<i class="fa fa-trash"></i></a>' +
                    '<?php } ?>' +
                    '</td></tr>' +
                    '</tbody>' +
                    '</table>' +
                    '</td>' +
                    '</tr>'
            })
            soap += detail_soap + '</tbody></table>'
            $('#soap').html(soap)
            $('#table_soap').DataTable({
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
        $('#modal-registrasi').modal('hide')


        var tombol = '<div class="card">' +
            '<div class="card-body text-right" style="padding: 10px;">' +
            '<button class="btn btn-md btn-success" id="add">Simpan</button>' +
            '</div>' +
            '</div>'
        $('#tombol').html(tombol)
    })

    $(document).on('click', '#add', function() {
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_id_rm = $('#fs_id_rm').val()
        var fs_subjective = $('#fs_subjective').val()
        var fs_objective = $('#fs_objective').val()
        var fs_assesment = $('#fs_assesment').val()
        var fs_planing = $('#fs_planing').val()

        if (fs_id_registrasi == '') {
            Swal.fire({
                icon: 'error',
                title: 'Belum ada pasien!',
                text: 'Silahkan pilih pasien terlebih dahulu!',
            })
            $('#fs_kd_registrasi').focus()
        } else {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan disimpan!",
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
                cancelButtonText: 'Batal',
                showClass: {
                    popup: 'animate__animated animate__bounceIn'
                },
                hideClass: {
                    popup: 'animate__animated animate__backOutDown'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        type: 'POST',
                        url: '<?= site_url('soap/process') ?>',
                        data: {
                            'add': true,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_id_rm': fs_id_rm,
                            'fs_subjective': fs_subjective,
                            'fs_objective': fs_objective,
                            'fs_assesment': fs_assesment,
                            'fs_planing': fs_planing,
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                location.href = '<?= site_url('soap') ?>'
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Transaksi gagal tersimpan!',
                                })
                            }
                        }
                    })
                }
            })
        }
    })

    $(document).on('click', '#edit_soap', function() {
        $('#fs_id_soap').val($(this).data('fs_id_soap'))
        $('#fs_subjective').val($(this).data('fs_subjective'))
        $('#fs_objective').val($(this).data('fs_objective'))
        $('#fs_assesment').val($(this).data('fs_assesment'))
        $('#fs_planing').val($(this).data('fs_planing'))

        var tombol = '<div class="card">' +
            '<div class="card-body text-right" style="padding: 10px;">' +
            '<button class="btn btn-md btn-info" id="edit">Simpan Edit</button>' +
            '</div>' +
            '</div>'
        $('#tombol').html(tombol)
    })

    $(document).on('click', '#edit', function() {
        var fs_id_soap = $('#fs_id_soap').val()
        var fs_subjective = $('#fs_subjective').val()
        var fs_objective = $('#fs_objective').val()
        var fs_assesment = $('#fs_assesment').val()
        var fs_planing = $('#fs_planing').val()

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan disimpan!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, simpan!',
            cancelButtonText: 'Batal',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('soap/process') ?>',
                    data: {
                        'edit': true,
                        'fs_id_soap': fs_id_soap,
                        'fs_subjective': fs_subjective,
                        'fs_objective': fs_objective,
                        'fs_assesment': fs_assesment,
                        'fs_planing': fs_planing,
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            location.href = '<?= site_url('soap') ?>'
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Transaksi gagal tersimpan!',
                            })
                        }
                    }
                })
            }
        })
    })
</script>