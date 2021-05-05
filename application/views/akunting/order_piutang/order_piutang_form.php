<style type="text/css">
    .auto {
        display: block;
        padding: 5px;
        /* margin-top: 5px; */
        width: 100%;
        height: 510px;
        overflow: auto;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Order Piutang</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Order Piutang</a></li>
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
                        <input type="date" id="fd_tgl_registrasi" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Kode Order</label>
                    <div class="col-sm-9">
                        <input type="text" id="fs_kd_order_piutang" value="OP0000001" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Jaminan</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <input type="hidden" id="fs_id_jaminan" value="">
                            <input type="text" style="background-color: lavender;" class="form-control" id="fs_nm_jaminan" value="" readonly>
                            <span class="input-group-btn">
                                <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-jaminan">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Periode</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <div class="form-inline">
                                <input type="date" class="form-control mb-2 mr-2" value="<?= date('Y-m-01') ?>" style="width: 45%;"><span> - </span>
                                <input type="date" class="form-control mb-2 ml-2" value="<?= date('Y-m-d') ?>" style="width: 45%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button class="btn btn-info">Proses Data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-9">
                        <input type="text" id="" value="1.000.000" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Diskon</label>
                    <div class="col-sm-9">
                        <input type="text" id="" value="0" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Grandtotal</label>
                    <div class="col-sm-9">
                        <input type="text" id="" value="1.000.000" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button class="btn btn-success">Simpan</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card">
            <div class="card-body auto">
                <table id="" class="table table-striped table-bordered dt-responsive nowrap  table-sm" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th style="width: 5%;">No</th>
                            <th>Kode Reg</th>
                            <th>Nama</th>
                            <th>Klaim</th>
                            <th style="width: 5%;"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1.</td>
                            <td>RG0000001</td>
                            <td>Ian Ec</td>
                            <td>500.000</td>
                            <td>
                                <input type="checkbox">
                            </td>
                        </tr>
                        <tr>
                            <td>2.</td>
                            <td>RG0000001</td>
                            <td>Ian Ec</td>
                            <td>500.000</td>
                            <td>
                                <input type="checkbox">
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <label><input type="checkbox" value="2000" /> Nasi 2000</label><br>
                <label><input type="checkbox" value="2200" /> Nasi 2200</label><br>
                <label><input type="checkbox" value="2400" /> Nasi 2400</label><br>
                <label><input type="checkbox" value="2500" /> Nasi 2500</label><br>
                <br>
                <input name="total" />
            </div>
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
                        foreach ($jaminan as $jm) { ?>
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

<script>
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

    $(document).on('click', '#select_jaminan', function() {
        $('#fs_id_jaminan').val($(this).data('id_jaminan'))
        $('#fs_kd_jaminan').val($(this).data('kode_jaminan'))
        $('#fs_nm_jaminan').val($(this).data('nama_jaminan'))
        $('#modal-jaminan').modal('hide')
    })



    $(document).on("click", "input[type='checkbox']", function() {
        total = 0;
        $("input[type='checkbox']:checked").each(function() {
            total += parseInt($(this).val())
        })
        $("input[name='total']").val(total)
    })
</script>