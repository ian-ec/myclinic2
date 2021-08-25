<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Stok Barang</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Stok Barang</a></li>
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
                    <div class="input-group mb-2 mr-sm-3">
                        <input type="hidden" id="fs_id_layanan" value="0">
                        <input type="text" style="background-color: lavender;" class="form-control input-group" id="fs_nm_layanan" value="--Pilih Layanan--" readonly>
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#modal-layanan">
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
                <span id="data_stok"></span>
            </div>
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
                        foreach ($layanan as $ly) { ?>
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


<script>
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

    $(document).on('click', '#select_layanan', function() {
        $('#fs_id_layanan').val($(this).data('id_layanan'))
        $('#fs_kd_layanan').val($(this).data('kode_layanan'))
        $('#fs_nm_layanan').val($(this).data('nama_layanan'))
        $('#modal-layanan').modal('hide')
    })

    $(document).on('click', '#reset', function() {
        $('#fs_id_layanan').val(0)
        $('#fs_nm_layanan').val('--Pilih Layanan--')
    })


    $(document).ready(function() {
        $('#get').click();
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var i = 0;
        var data_stok = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Nama Layanan</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>HPP</th>' +
            '<th>Stok</th>' +
            '<th>Stok Minimal</th>' +
            '</thead>'
        data_stok += '<tbody>'
        $.getJSON('<?= site_url('info_stok/data_stok/') ?>' + $('#fs_id_layanan').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_stok += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.fn_hpp) + '</td>' +
                    '<td>' + val.fn_qty + '</td>' +
                    '<td>' + val.fn_stok_min + '</td>' +
                    '</tr>'
            })
            data_stok += '</tbody></table>'
            $('#data_stok').html(data_stok)
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