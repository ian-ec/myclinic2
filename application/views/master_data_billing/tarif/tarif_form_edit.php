<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Tarif</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Tarif</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Edit Tarif</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="fs_id_tarif" name="fs_id_tarif" value="<?= $row->fs_id_tarif ?>">
                        <input type="text" style="background-color: lavender;" id="fs_kd_tarif" name="fs_kd_tarif" value="<?php
                                                                                                                            if ($page == 'add') {
                                                                                                                                echo $no_tarif;
                                                                                                                            } else {
                                                                                                                                echo $row->fs_kd_tarif;
                                                                                                                            }
                                                                                                                            ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nama Tarif</label>
                    <div class="col-sm-9">
                        <input type="text" id="fs_nm_tarif" value="<?= $row->fs_nm_tarif ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Rekap Cetak</label>
                    <div class="col-sm-9">
                        <select id="fs_id_rekapcetak" name="fs_id_rekapcetak" class="form-control select2" required>
                            <option value="">- Pilih -</option>
                            <?php foreach ($rekapcetak->result() as $key => $rc) { ?>
                                <option value="<?= $rc->fs_id_rekapcetak ?>" <?= $row->fs_id_rekapcetak == $rc->fs_id_rekapcetak ? 'selected' : '' ?>><?= $rc->fs_nm_rekapcetak ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Nilai Tarif</label>
                    <div class="col-sm-9">
                        <input type="text" id="fn_nilai_tarif" value="<?= $row->fn_nilai_tarif ?>" class="form-control" required>
                    </div>
                </div>
                <div class="form-group row mb-4 float-right">
                    <div class="col-sm-12">
                        <button id="simpan_edit_tarif" class="btn btn-info btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <a href="<?= site_url('tarif') ?>" class="btn btn-warning btn-flat">
                            <i class="fa fa-undo"></i> Kembali
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#layanan" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-hospital-alt"></i></span>
                            <span class="d-none d-sm-block">Layanan</span>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="layanan">
                        <div class="card-body table-responsive">
                            <table style="width: 100%;">
                                <tr>
                                    <td>
                                        <div class="form-group row mb-4 input-group">
                                            <label for="horizontal-firstname-input" class="col-sm-2 col-form-label">Layanan</label>
                                            <div class="col-sm-5 form-group input-group">
                                                <input type="hidden" id="fs_id_layanan">
                                                <input type="hidden" id="fs_kd_layanan">
                                                <input type="text" id="fs_nm_layanan" class="form-control" autofocus>
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-layanan">
                                                        <i class="fa fa-search"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="col-sm-5 form-group input-group">
                                                <button type="button" id="edit_cart_layanan" class="btn btn-primary btn-sm">
                                                    <i class="fa fa-paper-plane"></i> Tambah
                                                </button>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </table>
                            <table class="table table-bordered table-sm table-striped" style="width: 100%;">
                                <thead>
                                    <tr>
                                        <td width="5%">No.</td>
                                        <td width="20%">Kode Layanan</td>
                                        <td>Nama Layanan</td>
                                        <td width="5%" align="center"><i class="fas fa-cog"></td>
                                    </tr>
                                </thead>
                                <tbody id="cart_table_layanan">
                                    <?php $this->view('master_data_billing/tarif/tarif_layanan') ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.tab-pane -->
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal Layanan -->
<div class="modal fade" id="modal-layanan">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Pilih Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($layanan as $i => $ly) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $ly->fs_kd_layanan ?></td>
                                <td><?= $ly->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="selectly" data-idlayanan="<?= $ly->fs_id_layanan ?>" data-layanan="<?= $ly->fs_nm_layanan ?>" data-kdlayanan="<?= $ly->fs_kd_layanan ?>">
                                        <i class="fa fa-check"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).on('click', '#selectly', function() {
        $('#fs_id_layanan').val($(this).data('idlayanan'))
        $('#fs_nm_layanan').val($(this).data('layanan'))
        $('#fs_kd_layanan').val($(this).data('kdlayanan'))
        $('#modal-layanan').modal('hide')
    })

    $(document).on('click', '#edit_cart_layanan', function() {
        var fs_id_tarif = $('#fs_id_tarif').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        if (fs_id_layanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan belum di pilih!',
                text: 'Silahkan pilih layanan terlebih dahulu!',
            })
            $('#fs_nm_layanan').focus()
        } else {
            $.ajax({
                type: 'POST',
                url: '<?= site_url('tarif/process') ?>',
                data: {
                    'edit_cart_layanan': true,
                    'fs_id_tarif': fs_id_tarif,
                    'fs_id_layanan': fs_id_layanan
                },
                dataType: 'json',
                success: function(result) {
                    if (result.success == true) {
                        $('#cart_table_layanan').load('<?= site_url('tarif/layanan_tarif/') . $row->fs_id_tarif ?>')
                        $('#fs_id_layanan').val('')
                        $('#fs_kode_layanan').val('')
                        $('#fs_nm_layanan').val('')
                        $('#fs_nm_layanan').focus()
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: 'Gagal menambah layanan tarif!',
                        })
                    }
                }
            })
        }
    })

    $(document).on('click', '#del_layanan', function() {
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan dihapus!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal',
            showClass: {
                popup: 'animate__animated animate__bounceIn'
            },
            hideClass: {
                popup: 'animate__animated animate__backOutDown'
            }
        }).then((result) => {
            if (result.isConfirmed) {
                var fs_id_tarif = $('#fs_id_tarif').val()
                var fs_id_tarif_layanan = $(this).data('idly')
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url('tarif/process') ?>',
                    data: {
                        'del_layanan': true,
                        'fs_id_tarif': fs_id_tarif,
                        'fs_id_tarif_layanan': fs_id_tarif_layanan
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success == true) {
                            $('#cart_table_layanan').load('<?= site_url('tarif/layanan_tarif/') . $row->fs_id_tarif ?>')
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Gagal!',
                                text: 'Gagal menghapus layanan tarif!',
                            })
                        }
                    }

                })
            }
        })
    })

    $(document).on('click', '#simpan_edit_tarif', function() {
        var fs_kd_tarif = $('#fs_kd_tarif').val()
        var fs_nm_tarif = $('#fs_nm_tarif').val()
        var fn_nilai_tarif = $('#fn_nilai_tarif').val()
        var fs_id_rekapcetak = $('#fs_id_rekapcetak').val()

        if (fs_nm_tarif == '') {
            Swal.fire({
                icon: 'error',
                title: 'Nama Tarif masih kosong!',
                text: 'Silahkan isi nama tarif!',
            })
            $('#fs_nm_tarif').focus()
        } else {
            Swal.fire({
                title: 'Apakah anda yakin?',
                text: "Data akan sisimpan!",
                icon: 'info',
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
                        url: '<?= site_url('tarif/process') ?>',
                        data: {
                            'simpan_edit_tarif': true,
                            'fs_kd_tarif': fs_kd_tarif,
                            'fs_nm_tarif': fs_nm_tarif,
                            'fn_nilai_tarif': fn_nilai_tarif,
                            'fs_id_rekapcetak': fs_id_rekapcetak
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                location.href = '<?= site_url('tarif') ?>'
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal!',
                                    text: 'Tarif gagal di simpan!',
                                })
                            }
                        }
                    })
                }
            })
        }
    })
</script>