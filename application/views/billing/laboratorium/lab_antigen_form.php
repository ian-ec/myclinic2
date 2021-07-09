<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h4 class="mb-0 font-size-18">Laboratorium</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Laboratorium</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No. RM</label>
                            <input type="hidden" id="fs_id_trs" value="<?= $row->fs_id_trs ?>" class="form-control" required>
                            <div class="input-group">
                                <input type="hidden" id="fs_id_rm" value="<?= $row->fs_id_rm ?>">
                                <input type="text" style="background-color: lavender;" class="form-control" id="fs_kd_rm" value="<?= $row->fs_kd_rm ?>" readonly>
                                <span class="input-group-btn">
                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-rm">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Pasien</label>
                            <input type="text" style="background-color: lavender;" id="fs_nm_pasien" value="<?= $row->fs_nm_pasien ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" style="background-color: lavender;" id="fd_tgl_lahir" value="<?= $row->fd_tgl_lahir ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Jenis Kelamin</label>
                            <input type="text" style="background-color: lavender;" id="fs_nm_kelamin" value="<?= $row->fs_nm_kelamin ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Identitas</label>
                            <input type="text" style="background-color: lavender;" id="fs_identitas" value="<?= $row->fs_identitas ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">No Telp/HP</label>
                            <input type="text" style="background-color: lavender;" id="fs_telp" value="<?= $row->fs_telp ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Alamat</label>
                            <input type="text" style="background-color: lavender;" id="fs_alamat" value="<?= $row->fs_alamat ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tipe Spesimen</label>
                            <input type="text" id="fs_tipe_spesimen" value="<?= $row->fs_tipe_spesimen ?>" class="form-control" required>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">No Spesimen</label>
                            <input type="number" id="fn_no_spesimen" value="<?= $row->fn_no_spesimen ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tgl. Pengambilan</label>
                            <input type="date" id="fd_tgl_ambil" value="<?= $page == 'add' ? date('Y-m-d') : $row->fd_tgl_ambil ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tgl. Diproses</label>
                            <input type="date" id="fd_tgl_proses" value="<?= $page == 'add' ? date('Y-m-d') : $row->fd_tgl_proses ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Tgl. Pelaporan</label>
                            <input type="date" id="fd_tgl_lapor" value="<?= $page == 'add' ? date('Y-m-d') : $row->fd_tgl_lapor ?>" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label>Waktu Pelaporan</label>
                            <div class="input-group">
                                <input id="timepicker2" type="text" class="form-control" value="<?= $row->fs_jam_lapor ?>" data-provide="timepicker" required>
                                <div class="input-group-append">
                                    <span class="input-group-text"><i class="mdi mdi-clock-outline"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Nama Test</label>
                            <input type="text" id="fs_nm_test" value="<?= $row->fs_nm_test ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="">Hasil Test</label>
                            <select id="fn_hasil_test" class="form-control select2" required>
                                <option value="">- Pilih -</option>
                                <option value="1" <?= $row->fn_hasil_test == '1' ? 'selected' : null ?>>Positif SARS-CoV2</option>
                                <option value="2" <?= $row->fn_hasil_test == '2' ? 'selected' : null ?>>Negatif SARS-CoV2</option>
                            </select>
                        </div>
                        <div class="form-group" style="padding-top: 28px;">
                            <?php
                            if ($page == 'add') { ?>
                                <button type="submit" id="simpan" class="btn btn-success btn-flat">
                                    <i class="fa fa-paper-plane"></i> Simpan
                                </button>
                            <?php } else { ?>
                                <button type="submit" id="update" class="btn btn-primary btn-flat">
                                    <i class="fa fa-paper-plane"></i> Update
                                </button>
                            <?php } ?>
                            <div class="float-right">
                                <a href="<?= site_url('laboratorium') ?>" class="btn btn-warning btn-flat">
                                    <i class="fas fa-undo"></i> Kembali
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-2"></div>
</div>

<!-- Modal Rekam Medis -->
<div class="modal fade" id="modal-rm">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="table2">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode RM</th>
                            <th>Nama Pasien</th>
                            <th>Tgl Lahir</th>
                            <th>No. Identitas</th>
                            <th>Alamat</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rm as $mr) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $mr->fs_kd_rm ?></td>
                                <td><?= $mr->fs_nm_pasien ?></td>
                                <td><?= indo_date($mr->fd_tgl_lahir) ?></td>
                                <td><?= $mr->fs_identitas ?></td>
                                <td><?= $mr->fs_alamat ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select" data-id="<?= $mr->fs_id_rm ?>" data-kode="<?= $mr->fs_kd_rm ?>" data-nama="<?= $mr->fs_nm_pasien ?>" data-kelamin="<?= $mr->fs_nm_kelamin ?>" data-fd_tgl_lahir="<?= indo_date($mr->fd_tgl_lahir) ?>" data-fs_identitas="<?= $mr->fs_identitas ?>" data-fs_telp="<?= $mr->fs_telp ?>" data-fs_alamat="<?= $mr->fs_alamat ?>">
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

<script>
    $(document).on('click', '#select', function() {
        $('#fs_id_rm').val($(this).data('id'))
        $('#fs_kd_rm').val($(this).data('kode'))
        $('#fs_nm_pasien').val($(this).data('nama'))
        $('#fs_nm_kelamin').val($(this).data('kelamin'))
        $('#fd_tgl_lahir').val($(this).data('fd_tgl_lahir'))
        $('#fs_identitas').val($(this).data('fs_identitas'))
        $('#fs_telp').val($(this).data('fs_telp'))
        $('#fs_alamat').val($(this).data('fs_alamat'))
        $('#modal-rm').modal('hide')
    })

    $(document).on('click', '#simpan', function() {
        var fs_id_rm = $('#fs_id_rm').val()
        var fs_tipe_spesimen = $('#fs_tipe_spesimen').val()
        var fs_no_id_lab = $('#fs_no_id_lab').val()
        var fn_no_spesimen = $('#fn_no_spesimen').val()
        var fd_tgl_ambil = $('#fd_tgl_ambil').val()
        var fd_tgl_proses = $('#fd_tgl_proses').val()
        var fd_tgl_lapor = $('#fd_tgl_lapor').val()
        var fs_jam_lapor = $('#timepicker2').val()
        var fs_nm_test = $('#fs_nm_test').val()
        var fn_hasil_test = $('#fn_hasil_test').val()

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
                    url: '<?= site_url('laboratorium/process') ?>',
                    data: {
                        'simpan': true,
                        'fs_id_rm': fs_id_rm,
                        'fs_tipe_spesimen': fs_tipe_spesimen,
                        'fn_no_spesimen': fn_no_spesimen,
                        'fd_tgl_ambil': fd_tgl_ambil,
                        'fd_tgl_proses': fd_tgl_proses,
                        'fd_tgl_lapor': fd_tgl_lapor,
                        'fs_jam_lapor': fs_jam_lapor,
                        'fs_nm_test': fs_nm_test,
                        'fn_hasil_test': fn_hasil_test
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            kode = result.fs_id_lab,
                                Swal.fire({
                                    title: 'Cetak transaksi ini?',
                                    icon: 'info',
                                    showCancelButton: true,
                                    confirmButtonColor: '#00a65a',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Cetak!',
                                    showClass: {
                                        popup: 'animate__animated animate__bounceIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__backOutDown'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = '<?= site_url('laboratorium') ?>'
                                        window.open('<?= site_url('laboratorium/cetak/') ?>' + kode, '_blank')
                                    } else {
                                        location.href = '<?= site_url('laboratorium') ?>'
                                    }
                                })
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

    $(document).on('click', '#update', function() {
        var fs_id_trs = $('#fs_id_trs').val()
        var fs_id_rm = $('#fs_id_rm').val()
        var fs_tipe_spesimen = $('#fs_tipe_spesimen').val()
        var fn_no_spesimen = $('#fn_no_spesimen').val()
        var fd_tgl_ambil = $('#fd_tgl_ambil').val()
        var fd_tgl_proses = $('#fd_tgl_proses').val()
        var fd_tgl_lapor = $('#fd_tgl_lapor').val()
        var fs_jam_lapor = $('#timepicker2').val()
        var fs_nm_test = $('#fs_nm_test').val()
        var fn_hasil_test = $('#fn_hasil_test').val()

        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data akan diupdate!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#00a65a',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, update!',
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
                    url: '<?= site_url('laboratorium/process') ?>',
                    data: {
                        'update': true,
                        'fs_id_trs': fs_id_trs,
                        'fs_id_rm': fs_id_rm,
                        'fs_tipe_spesimen': fs_tipe_spesimen,
                        'fn_no_spesimen': fn_no_spesimen,
                        'fd_tgl_ambil': fd_tgl_ambil,
                        'fd_tgl_proses': fd_tgl_proses,
                        'fd_tgl_lapor': fd_tgl_lapor,
                        'fs_jam_lapor': fs_jam_lapor,
                        'fs_nm_test': fs_nm_test,
                        'fn_hasil_test': fn_hasil_test
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            kode = result.fs_id_lab,
                                Swal.fire({
                                    title: 'Cetak transaksi ini?',
                                    icon: 'info',
                                    showCancelButton: true,
                                    confirmButtonColor: '#00a65a',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Cetak!',
                                    showClass: {
                                        popup: 'animate__animated animate__bounceIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__backOutDown'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = '<?= site_url('laboratorium') ?>'
                                        window.open('<?= site_url('laboratorium/cetak/') ?>' + kode, '_blank')
                                    } else {
                                        location.href = '<?= site_url('laboratorium') ?>'
                                    }
                                })
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