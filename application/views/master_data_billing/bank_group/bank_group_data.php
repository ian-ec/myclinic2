<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Bank Group</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Bank Group</a></li>
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
                    <a href="<?= site_url('bank_group/add') ?>" class="btn btn-primary btn-flat btn-sm">
                        <i class="fa fa-plus"></i> Tambah
                    </a>
                </div>
                <br>
                <br>
                <table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Bank Group</th>
                            <th>Nama Bank Group</th>
                            <th>No Rekening</th>
                            <th><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($row->result() as $key => $data) { ?>
                            <tr>
                                <td style="width:5%;"><?= $no++ ?></td>
                                <td><?= $data->fs_kd_bank_group ?></td>
                                <td><?= $data->fs_nm_bank_group ?></td>
                                <td><?= $data->fn_no_rekening ?></td>
                                <td class="text-center" width="160px">
                                    <a href="<?= site_url('bank_group/edit/' . $data->fs_id_bank_group) ?>" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Edit">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <a href="<?= site_url('bank_group/del/' . $data->fs_id_bank_group) ?>" id="btn-hapus" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete">
                                        <i class="fa fa-trash"></i>
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