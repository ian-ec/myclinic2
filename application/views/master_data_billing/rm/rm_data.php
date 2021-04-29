<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Rekam Medis</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Rekam Medis</a></li>
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
                    <a href="<?= site_url('rm/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <br>
                <br>
                <table id="table1" class="table table-striped table-sm table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode RM</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Umur</th>
                            <th>Alamat</th>
                            <th>Phone</th>
                            <th><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width:5%;"><?= $no++ ?></td>
                                <td><?= $data->fs_kd_rm ?></td>
                                <td><?= $data->fs_nm_pasien ?></td>
                                <td><?= $data->fs_nm_kelamin ?></td>
                                <td>
                                    <?php
                                    $tanggal = new DateTime($data->fd_tgl_lahir);
                                    $today = new DateTime('today');
                                    $y = $today->diff($tanggal)->y;
                                    echo $y . " tahun ";
                                    ?>
                                </td>
                                <td><?= $data->fs_alamat ?></td>
                                <td><?= $data->fs_telp ?></td>
                                <td class="text-center" width="160px">
                                    <a data-toggle="tooltip" data-placement="top" title="Detail">
                                        <button class="btn btn-success btn-sm" data-toggle="modal" id="detail" data-target="#modal-detail" data-fs_kd_rm="<?= $data->fs_kd_rm ?>" data-fs_nm_pasien="<?= $data->fs_nm_pasien ?>" data-fs_nm_kelamin="<?= $data->fs_nm_kelamin ?>" data-fs_tmpt_tgl_lahir="<?php $tmp = $data->fs_tmpt_lahir;
                                                                                                                                                                                                                                                                                                            $tgllhr = indo_date($data->fd_tgl_lahir);
                                                                                                                                                                                                                                                                                                            echo $tmp . ", " . $tgllhr ?>" data-fs_alamat="<?= $data->fs_alamat ?>" data-fs_telp="<?= $data->fs_telp ?>" data-fs_identitas="<?= $data->fs_identitas ?>" data-fs_nm_agama="<?= $data->fs_nm_agama ?>">
                                            <i class="fas fa-eye"></i>
                                        </button>
                                    </a>
                                    <a href="<?= site_url('rm/edit/' . $data->fs_id_rm) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('rm/del/' . $data->fs_id_rm) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
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

<div class="modal modal-primary fade" id="modal-detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-soft-info">
                <h5 class="modal-title mt-0" id="myModalLabel">Detail Rekam Medis</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody>
                        <tr>
                            <td width="30%">Kode RM</td>
                            <td width="2%">:</td>
                            <td id="kode"></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td>:</td>
                            <td id="nama_pasien"></td>
                        </tr>
                        <tr>
                            <td>Jenis Kelamin</td>
                            <td>:</td>
                            <td id="kelamin"></td>
                        </tr>
                        <tr>
                            <td>Tempat/Tgl lahir</td>
                            <td>:</td>
                            <td id="tmpt_tgl_lhr"></td>
                        </tr>
                        <tr>
                            <td>Agama</td>
                            <td>:</td>
                            <td id="agama"></td>
                        </tr>
                        <tr>
                            <td>Telephon</td>
                            <td>:</td>
                            <td id="telp"></td>
                        </tr>
                        <tr>
                            <td>No Identitas</td>
                            <td>:</td>
                            <td id="identitas"></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="alamat"></td>
                        </tr>

                    </tbody>
                </table>
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
        $(document).on('click', '#detail', function() {
            var fs_kd_rm = $(this).data('fs_kd_rm');
            var fs_nm_pasien = $(this).data('fs_nm_pasien');
            var fs_nm_kelamin = $(this).data('fs_nm_kelamin');
            var fs_tmpt_tgl_lahir = $(this).data('fs_tmpt_tgl_lahir');
            var fs_alamat = $(this).data('fs_alamat');
            var fs_telp = $(this).data('fs_telp');
            var fs_identitas = $(this).data('fs_identitas');
            var fs_nm_agama = $(this).data('fs_nm_agama');
            $('#kode').text(fs_kd_rm);
            $('#nama_pasien').text(fs_nm_pasien);
            $('#kelamin').text(fs_nm_kelamin);
            $('#tmpt_tgl_lhr').text(fs_tmpt_tgl_lahir);
            $('#alamat').text(fs_alamat);
            $('#telp').text(fs_telp);
            $('#identitas').text(fs_identitas);
            $('#agama').text(fs_nm_agama);
        })
    })
</script>