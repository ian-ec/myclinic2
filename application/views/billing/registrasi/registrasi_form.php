<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Registrasi Masuk</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Registrasi Masuk</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-9">
                        <input type="date" id="fd_tgl_registrasi" value="<?= $row->fd_tgl_registrasi ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Kode REG</label>
                    <div class="col-sm-9">
                        <input type="hidden" id="fs_id_registrasi" value="<?= $row->fs_id_registrasi ?>">
                        <input type="text" style="background-color: lavender;" id="fs_kd_registrasi" value="<?php
                                                                                                            if ($page == 'add') {
                                                                                                                echo $no_registrasi;
                                                                                                            } else {
                                                                                                                echo $row->fs_kd_registrasi;
                                                                                                            }
                                                                                                            ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">No RM</label>
                    <div class="col-sm-9">
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
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Nama Pasien</label>
                    <div class="col-sm-9">
                        <input type="text" style="background-color: lavender;" id="fs_nm_pasien" value="<?= $row->fs_nm_pasien ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Jns. Kelamin</label>
                    <div class="col-sm-9">
                        <input type="text" style="background-color: lavender;" id="fs_nm_kelamin" value="<?= $row->fs_nm_kelamin ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Layanan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_layanan" value="<?= $row->fs_id_layanan ?>">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_layanan" value="<?= $row->fs_nm_layanan ?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-layanan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Dokter</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_pegawai" value="<?= $row->fs_id_pegawai ?>">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_pegawai" value="<?= $row->fs_nm_pegawai ?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-pegawai">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Jaminan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_jaminan" value="<?= $row->fs_id_jaminan ?>">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_jaminan" value="<?= $row->fs_nm_jaminan ?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-jaminan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">No Polis</label>
                    <div class="col-sm-9">
                        <input type="text" id="fn_no_polis" value="<?= $row->fn_no_polis ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Karcis</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_karcis" value="<?= $row->fs_id_karcis ?>">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_karcis" value="<?= $page == 'edit' ? $row->fs_nm_karcis . " / " . indo_currency($row->fn_nilai) : null ?>" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-karcis">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                        <input type="hidden" id="fn_nilai">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <button id="<?= $page ?>" class="btn btn-success btn-flat">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                        <a href="<?= site_url('registrasi') ?>" class="btn btn-info btn-flat">
                            <i class="fa fa-undo"></i> Baru
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body">
                <table id="table1" class="table table-striped table-bordered dt-responsive nowrap  table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No.</th>
                            <th style="width: 10%;">Kode Reg</th>
                            <th>Nama</th>
                            <th style="width: 20%;">Layanan</th>
                            <th style="width: 5%;"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($reg->result() as $rg) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $rg->fs_kd_registrasi ?></td>
                                <td><?= $rg->fs_nm_pasien ?></td>
                                <td><?= $rg->fs_nm_layanan ?></td>
                                <td>
                                    <a data-toggle="tooltip" data-placement="top" title="Detail">
                                        <button class="btn btn-success btn-sm" data-toggle="modal" id="detail" data-target="#modal-detail" data-fs_kd_registrasi="<?= $rg->fs_kd_registrasi ?>" data-fs_kd_rm="<?= $rg->fs_kd_rm ?>" data-fs_nm_pasien="<?= $rg->fs_nm_pasien ?>" data-fs_nm_kelamin="<?= $rg->fs_nm_kelamin ?>" data-fs_tmpt_tgl_lahir="<?= $rg->fs_tmpt_lahir . ", " . indo_date($rg->tanggal_lahir) ?>" data-fs_alamat="<?= $rg->fs_alamat ?>" data-layanan="<?= $rg->fs_nm_layanan ?>" data-pegawai="<?= $rg->fs_nm_pegawai ?>" data-jaminan="<?= $rg->fs_nm_jaminan ?>" data-karcis="<?= $rg->fs_nm_karcis ?>" data-karcis_nilai="<?= indo_currency($rg->nilai_karcis) ?>">
                                            <i class=" fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= site_url('registrasi/cetak_pdf/' . $rg->fs_id_registrasi) ?>" target="_blank" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Print">
                                        <i class="fas fa-print"></i>
                                    </a>
                                    <a href="<?= site_url('registrasi/edit/' . $rg->fs_id_registrasi) ?>" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('registrasi/del/' . $rg->fs_kd_registrasi . "/" . $rg->fs_id_rm . "/" . $rg->fs_id_registrasi) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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
                            <th>Alamat</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($rm->result() as $mr) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $mr->fs_kd_rm ?></td>
                                <td><?= $mr->fs_nm_pasien ?></td>
                                <td><?= indo_date($mr->fd_tgl_lahir) ?></td>
                                <td><?= $mr->fs_alamat ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select" data-id="<?= $mr->fs_id_rm ?>" data-kode="<?= $mr->fs_kd_rm ?>" data-nama="<?= $mr->fs_nm_pasien ?>" data-kelamin="<?= $mr->fs_nm_kelamin ?>">
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

<!-- Modal Layanan -->
<div class="modal fade" id="modal-layanan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Layanan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-layanan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Layanan</th>
                            <th>Nama Layanan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($layanan->result() as $ly) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $ly->fs_kd_layanan ?></td>
                                <td><?= $ly->fs_nm_layanan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_layanan" data-id_layanan="<?= $ly->fs_id_layanan ?>" data-kode_layanan="<?= $ly->fs_kd_layanan ?>" data-nama_layanan="<?= $ly->fs_nm_layanan ?>">
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

<!-- Modal Pegawai -->
<div class="modal fade" id="modal-pegawai">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Dokter</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-pegawai">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Dokter</th>
                            <th>Nama Dokter</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pegawai->result() as $pg) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $pg->fs_kd_pegawai ?></td>
                                <td><?= $pg->fs_nm_pegawai ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_pegawai" data-id_pegawai="<?= $pg->fs_id_pegawai ?>" data-kode_pegawai="<?= $pg->fs_kd_pegawai ?>" data-nama_pegawai="<?= $pg->fs_nm_pegawai ?>">
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

<!-- Modal Jaminan -->
<div class="modal fade" id="modal-jaminan">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Jaminan</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-jaminan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Jaminan</th>
                            <th>Nama Jaminan</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jaminan->result() as $jm) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $jm->fs_kd_jaminan ?></td>
                                <td><?= $jm->fs_nm_jaminan ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_jaminan" data-id_jaminan="<?= $jm->fs_id_jaminan ?>" data-kode_jaminan="<?= $jm->fs_kd_jaminan ?>" data-nama_jaminan="<?= $jm->fs_nm_jaminan ?>">
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

<!-- Modal Karcis -->
<div class="modal fade" id="modal-karcis">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Pilih Karcis</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-bordered table-striped table-sm" id="tabel-karcis">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Karcis</th>
                            <th>Nama Karcis</th>
                            <th>Nilai Karcis</th>
                            <th>Pilih</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($karcis->result() as $kc) { ?>
                            <tr>
                                <td width="5%"><?= $no++ ?></td>
                                <td width="20%"><?= $kc->fs_kd_karcis ?></td>
                                <td><?= $kc->fs_nm_karcis ?></td>
                                <td><?= indo_currency($kc->fn_nilai) ?></td>
                                <td class="text-center" width="10%">
                                    <button class="btn btn-sm btn-info" id="select_karcis" data-id_karcis="<?= $kc->fs_id_karcis ?>" data-kode_karcis="<?= $kc->fs_kd_karcis ?>" data-nama_karcis="<?= $kc->fs_nm_karcis . " / " . indo_currency($kc->fn_nilai) ?>" data-nilai_karcis="<?= $kc->fn_nilai ?>">
                                        <i class=" fa fa-check"></i>
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

<!-- Modal Detail Register -->
<div class="modal fade" id="modal-detail">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h4 class="modal-title">Detail Register Pasien</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-sm">
                    <tbody>
                        <tr>
                            <td width="30%">Kode REG</td>
                            <td width="2%">:</td>
                            <td id="kode"></td>
                        </tr>
                        <tr>
                            <td width="30%">No RM</td>
                            <td width="2%">:</td>
                            <td id="rm"></td>
                        </tr>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td id="nama"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td id="kelamin"></td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl lahir</td>
                            <td>:</td>
                            <td id="fs_tmpt_tgl_lahir"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="fs_alamat"></td>
                        </tr>
                        <tr>
                            <td>Layanan</td>
                            <td>:</td>
                            <td id="layanan"></td>
                        </tr>
                        <tr>
                            <td>Dokter</td>
                            <td>:</td>
                            <td id="pegawai"></td>
                        </tr>
                        <tr>
                            <td>Jaminan</td>
                            <td>:</td>
                            <td id="jaminan"></td>
                        </tr>
                        <tr>
                            <td id="karcis"></td>
                            <td>:</td>
                            <td id="karcis_nilai"></td>
                        </tr>

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
        $('#modal-rm').modal('hide')
    })

    $(document).on('click', '#select_layanan', function() {
        $('#fs_id_layanan').val($(this).data('id_layanan'))
        $('#fs_kd_layanan').val($(this).data('kode_layanan'))
        $('#fs_nm_layanan').val($(this).data('nama_layanan'))
        $('#modal-layanan').modal('hide')
    })

    $(document).on('click', '#select_pegawai', function() {
        $('#fs_id_pegawai').val($(this).data('id_pegawai'))
        $('#fs_kd_pegawai').val($(this).data('kode_pegawai'))
        $('#fs_nm_pegawai').val($(this).data('nama_pegawai'))
        $('#modal-pegawai').modal('hide')
    })


    $(document).on('click', '#select_jaminan', function() {
        $('#fs_id_jaminan').val($(this).data('id_jaminan'))
        $('#fs_kd_jaminan').val($(this).data('kode_jaminan'))
        $('#fs_nm_jaminan').val($(this).data('nama_jaminan'))
        $('#modal-jaminan').modal('hide')
    })

    $(document).on('click', '#select_karcis', function() {
        $('#fs_id_karcis').val($(this).data('id_karcis'))
        $('#fs_kd_karcis').val($(this).data('kode_karcis'))
        $('#fs_nm_karcis').val($(this).data('nama_karcis'))
        $('#fn_nilai').val($(this).data('nilai_karcis'))
        $('#modal-karcis').modal('hide')
    })

    $(document).ready(function() {
        $('#tabel-layanan').DataTable({
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

    $(document).ready(function() {
        $('#tabel-pegawai').DataTable({
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

    $(document).ready(function() {
        $('#tabel-jaminan').DataTable({
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

    $(document).ready(function() {
        $('#tabel-karcis').DataTable({
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

    $(document).on('click', '#add', function() {
        var fs_kd_registrasi = $('#fs_kd_registrasi').val()
        var fs_id_rm = $('#fs_id_rm').val()
        var fs_nm_pasien = $('#fs_nm_pasien').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_id_pegawai = $('#fs_id_pegawai').val()
        var fs_id_jaminan = $('#fs_id_jaminan').val()
        var fn_no_polis = $('#fn_no_polis').val()
        var fs_id_karcis = $('#fs_id_karcis').val()
        var fn_nilai = $('#fn_nilai').val()
        var fd_tgl_registrasi = $('#fd_tgl_registrasi').val()

        if (fs_nm_pasien == '') {
            Swal.fire({
                icon: 'error',
                title: 'Belum ada pasien!',
                text: 'Silahkan pilih pasien terlebih dahulu!',
            })
            $('#fd_tgl_pasien').focus()
        } else if (fs_id_layanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan masih kosong!',
                text: 'Silahkan pilih layanan terlebih dahulu!',
            })
            $('#fs_id_layanan').focus()
        } else if (fs_id_pegawai == '') {
            Swal.fire({
                icon: 'error',
                title: 'Dokter masih kosong!',
                text: 'Silahkan pilih dokter terlebih dahulu!',
            })
            $('#fs_id_layanan').focus()
        } else if (fs_id_jaminan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Jaminan masih kosong!',
                text: 'Silahkan pilih jaminan terlebih dahulu!',
            })
            $('#fs_id_jaminan').focus()
        } else if (fs_id_karcis == '') {
            Swal.fire({
                icon: 'error',
                title: 'Karcis masih kosong!',
                text: 'Silahkan pilih karcis terlebih dahulu!',
            })
            $('#fs_id_karcis').focus()
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
                        url: '<?= site_url('registrasi/process') ?>',
                        data: {
                            'add': true,
                            'fs_kd_registrasi': fs_kd_registrasi,
                            'fs_id_rm': fs_id_rm,
                            'fs_id_layanan': fs_id_layanan,
                            'fs_id_pegawai': fs_id_pegawai,
                            'fs_id_jaminan': fs_id_jaminan,
                            'fn_no_polis': fn_no_polis,
                            'fs_id_karcis': fs_id_karcis,
                            'fn_nilai': fn_nilai,
                            'fd_tgl_registrasi': fd_tgl_registrasi
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.registrasi_id,
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
                                            window.location.assign("<?= site_url('registrasi') ?>")
                                            window.open('<?= site_url('registrasi/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('registrasi') ?>'
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
        }
    })

    $(document).on('click', '#edit', function() {
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_kd_registrasi = $('#fs_kd_registrasi').val()
        var fs_id_rm = $('#fs_id_rm').val()
        var fs_nm_pasien = $('#fs_nm_pasien').val()
        var fs_id_layanan = $('#fs_id_layanan').val()
        var fs_id_pegawai = $('#fs_id_pegawai').val()
        var fs_id_jaminan = $('#fs_id_jaminan').val()
        var fn_no_polis = $('#fn_no_polis').val()
        var fs_id_karcis = $('#fs_id_karcis').val()
        var fn_nilai = $('#fn_nilai').val()
        var fd_tgl_registrasi = $('#fd_tgl_registrasi').val()

        if (fs_nm_pasien == '') {
            Swal.fire({
                icon: 'error',
                title: 'Belum ada pasien!',
                text: 'Silahkan pilih pasien terlebih dahulu!',
            })
            $('#fd_tgl_pasien').focus()
        } else if (fs_id_layanan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Layanan masih kosong!',
                text: 'Silahkan pilih layanan terlebih dahulu!',
            })
            $('#fs_id_layanan').focus()
        } else if (fs_id_jaminan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Jaminan masih kosong!',
                text: 'Silahkan pilih jaminan terlebih dahulu!',
            })
            $('#fs_id_jaminan').focus()
        } else if (fs_id_pegawai == '') {
            Swal.fire({
                icon: 'error',
                title: 'Dokter masih kosong!',
                text: 'Silahkan pilih dokter terlebih dahulu!',
            })
            $('#fs_id_jaminan').focus()
        } else if (fs_id_karcis == '') {
            Swal.fire({
                icon: 'error',
                title: 'Karcis masih kosong!',
                text: 'Silahkan pilih karcis terlebih dahulu!',
            })
            $('#fs_id_karcis').focus()
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
                        url: '<?= site_url('registrasi/process') ?>',
                        data: {
                            'edit': true,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_kd_registrasi': fs_kd_registrasi,
                            'fs_id_rm': fs_id_rm,
                            'fs_id_layanan': fs_id_layanan,
                            'fs_id_pegawai': fs_id_pegawai,
                            'fs_id_jaminan': fs_id_jaminan,
                            'fn_no_polis': fn_no_polis,
                            'fs_id_karcis': fs_id_karcis,
                            'fn_nilai': fn_nilai,
                            'fd_tgl_registrasi': fd_tgl_registrasi
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.registrasi_id,
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
                                            location.href = '<?= site_url('registrasi') ?>'
                                            window.open('<?= site_url('registrasi/cetak_pdf/') ?>' + kode, '_blank')
                                        } else {
                                            location.href = '<?= site_url('registrasi') ?>'
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
        }
    })

    $(document).ready(function() {
        $(document).on('click', '#detail', function() {
            $('#kode').text($(this).data('fs_kd_registrasi'));
            $('#rm').text($(this).data('fs_kd_rm'));
            $('#nama').text($(this).data('fs_nm_pasien'));
            $('#kelamin').text($(this).data('fs_nm_kelamin'));
            $('#fs_tmpt_tgl_lahir').text($(this).data('fs_tmpt_tgl_lahir'));
            $('#fs_alamat').text($(this).data('fs_alamat'));
            $('#layanan').text($(this).data('layanan'));
            $('#pegawai').text($(this).data('pegawai'));
            $('#jaminan').text($(this).data('jaminan'));
            $('#karcis').text($(this).data('karcis'));
            $('#karcis_nilai').text($(this).data('karcis_nilai'));
        })
    })
</script>