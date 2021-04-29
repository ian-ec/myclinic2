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

<?php $this->view('messages') ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="float-right">
                    <a href="<?= site_url('tarif/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <br>
                <br>
                <table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode tarif</th>
                            <th>Nama tarif</th>
                            <th>Rekap Cetak</th>
                            <th>Nilai tarif</th>
                            <th><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width:5%;"><?= $no++ ?></td>
                                <input type="hidden" id="fs_id_tarif" value="<?= $data->fs_id_tarif ?>">
                                <td><?= $data->fs_kd_tarif ?></td>
                                <td><?= $data->fs_nm_tarif ?></td>
                                <td><?= $data->fs_nm_rekapcetak ?></td>
                                <td><?= indo_currency($data->fn_nilai_tarif) ?></td>
                                <td class="text-center" width="160px">
                                    <a data-toggle="tooltip" data-placement="top" title="Detail">
                                        <button class="btn btn-success btn-sm" data-target="#modal-detail" data-toggle="modal" id="detail" data-fs_id_tarif="<?= $data->fs_id_tarif ?>" data-fs_kd_tarif="<?= $data->fs_kd_tarif ?>" data-fs_nm_tarif="<?= $data->fs_nm_tarif ?>" data-fs_nm_rekapcetak="<?= $data->fs_nm_rekapcetak ?>" data-fn_nilai_tarif="<?= indo_currency($data->fn_nilai_tarif) ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= site_url('tarif/edit/' . $data->fs_id_tarif) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('tarif/del/' . $data->fs_id_tarif) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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


<!-- Modal Detail Taruf -->
<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header  bg-soft-info">
                <h4 class="modal-title">Detail Tarif</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Kode tarif</td>
                                            <td>:</td>
                                            <td><span id="fs_kd_tarif"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Nama tarif</td>
                                            <td>:</td>
                                            <td><span id="fs_nm_tarif"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Rekap Cetak</td>
                                            <td>:</td>
                                            <td><span id="fs_nm_rekapcetak"></span></td>
                                        </tr>
                                        <tr>
                                            <td>Nilai tarif</td>
                                            <td>:</td>
                                            <td><span id="fn_nilai_tarif"></span></td>
                                        </tr>
                                    </tbody>
                                </table>
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
                                            <span id="layanan_tarif"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer  bg-soft-info">
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>


<script>
    $(document).on('click', '#detail', function() {
        $('#fs_id_tarif').text($(this).data('fs_id_tarif'));
        $('#fs_kd_tarif').text($(this).data('fs_kd_tarif'));
        $('#fs_nm_tarif').text($(this).data('fs_nm_tarif'));
        $('#fs_nm_rekapcetak').text($(this).data('fs_nm_rekapcetak'));
        $('#fn_nilai_tarif').text($(this).data('fn_nilai_tarif'));

        var i = 0;
        var layanan_tarif = '<table class="table table-bordered table-sm">'
        layanan_tarif += '<tr><th>No</th><th>Kode Layanan</th><th>Nama Layanan</th></tr>'
        $.getJSON('<?= site_url('tarif/detail_layanan/') ?>' + $(this).data('fs_id_tarif'), function(data) {
            $.each(data, function(key, val) {
                i += 1
                layanan_tarif += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_layanan + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td><td>' +
                    '</tr>'
            })
            layanan_tarif += '</table>'
            $('#layanan_tarif').html(layanan_tarif)
        })
    })
</script>