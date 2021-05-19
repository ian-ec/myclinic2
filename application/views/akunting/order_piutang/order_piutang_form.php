<style type="text/css">
    .auto {
        display: block;
        padding: 5px;
        /* margin-top: 5px; */
        width: 100%;
        height: 423px;
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
                        <input type="date" id="fd_tgl_order_piutang" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Kode Order</label>
                    <div class="col-sm-9">
                        <input type="text" id="fs_kd_order_piutang" value="<?= $no_order_piutang ?>" class="form-control" style="background-color: lavender;" readonly>
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
                                <input type="date" id="awal" class="form-control mb-2 mr-2" value="<?= date('Y-m-01') ?>" style="width: 45%;"><span> - </span>
                                <input type="date" id="akhir" class="form-control mb-2 ml-2" value="<?= date('Y-m-d') ?>" style="width: 45%;">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button id="proses" class="btn btn-info">Proses Data</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Grandtotal</label>
                    <div class="col-sm-9">
                        <input type="number" id="fn_grandtotal" value="0" class="form-control" style="background-color: lavender;" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button class="btn btn-success" id="simpan">Simpan</button>
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
                            <th>Tgl Piutang</th>
                            <th style="text-align: right;">Klaim</th>
                            <th style="width: 5%; text-align: center;"><i class="fas fa-cog"></th>
                        </tr>
                    </thead>
                    <tbody id="data_piutang">
                    </tbody>
                </table>
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

    $(document).on('click', '#proses', function() {
        var fs_id_jaminan = $('#fs_id_jaminan').val()
        var awal = $('#awal').val()
        var akhir = $('#akhir').val()

        if (fs_id_jaminan == '') {
            Swal.fire({
                icon: 'error',
                title: 'Jaminan belum di pilih!',
                text: 'Silahkan pilih jaminan terlebih dahulu!',
            })
            $('#fs_nm_jaminan').focus()
        } else {

            show_loading()
            var i = 0;
            var data_piutang = null
            $.getJSON('<?= site_url('order_piutang/data_piutang/') ?>' + fs_id_jaminan + '/' + awal + '/' + akhir, function(data) {
                $.each(data, function(key, val) {
                    i += 1
                    data_piutang += '<tr>' +
                        '<td>' + i + '</td>' +
                        '<td>' + val.fs_kd_registrasi + '</td>' +
                        '<td>' + val.fs_nm_pasien + '</td>' +
                        '<td>' + dateFormat(val.fd_tgl_bayar) + '</td>' +
                        '<td style="text-align: right;">' + currencyFormat(val.fn_klaim) + '</td>' +
                        '<td style="text-align: center;"><input type="checkbox" value="' + val.fn_klaim + '" ' +
                        'data-fs_id_registrasi="' + val.id_registrasi + '"' +
                        'data-fn_klaim="' + val.fn_klaim + '"/></td></tr>'
                })
                $('#data_piutang').html(data_piutang)
            })
            $('#fn_grandtotal').val(0)
            hide_loading()
        }
    })

    $(document).on("click", "input[type='checkbox']", function() {
        var fs_id_registrasi = $(this).data('fs_id_registrasi')
        var fn_klaim = $(this).data('fn_klaim')

        $.ajax({
            type: 'POST',
            url: "<?= base_url('order_piutang/add_cart_order'); ?>",
            data: {
                'fs_id_registrasi': fs_id_registrasi,
                'fn_klaim': fn_klaim
            },
            dataType: 'json',
            success: function(result) {
                total = 0;
                $("input[type='checkbox']:checked").each(function() {
                    total += parseInt($(this).val())
                })
                $("#fn_grandtotal").val(total)
            }
        });
    })

    $(document).on('click', '#simpan', function() {
        var fs_id_jaminan = $('#fs_id_jaminan').val()
        var fn_nilai_order = $('#fn_grandtotal').val()
        var fd_tgl_order_piutang = $('#fd_tgl_order_piutang').val()

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
                    url: '<?= site_url('order_piutang/process') ?>',
                    data: {
                        'simpan': true,
                        'fs_id_jaminan': fs_id_jaminan,
                        'fn_nilai_order': fn_nilai_order,
                        'fd_tgl_order_piutang': fd_tgl_order_piutang
                    },
                    dataType: 'json',
                    success: function(result) {
                        if (result.success) {
                            kode = result.fs_id_order_piutang,
                                Swal.fire({
                                    title: 'Cetak transaksi ini?',
                                    icon: 'info',
                                    showCancelButton: true,
                                    confirmButtonColor: '#00a65a',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Ya, Cetak!',
                                    cancelButtonText: 'Batal',
                                    showClass: {
                                        popup: 'animate__animated animate__bounceIn'
                                    },
                                    hideClass: {
                                        popup: 'animate__animated animate__backOutDown'
                                    }
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        location.href = '<?= site_url('order_piutang') ?>'
                                        window.open('<?= site_url('order_piutang/cetak_pdf/') ?>' + kode, '_blank')
                                    } else {
                                        location.href = '<?= site_url('order_piutang') ?>'
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