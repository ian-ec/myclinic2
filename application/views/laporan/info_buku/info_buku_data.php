<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Info Buku Barang</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Info Buku Barang</a></li>
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
                    <input type="date" class="form-control mb-2 mr-sm-3" id="awal" name="awal" value="<?= date('Y-m-01') ?>" autocomplete="off">
                    <input type="date" class="form-control mb-2 mr-sm-3" id="akhir" name="akhir" value="<?= date('Y-m-d') ?>" autocomplete="off">
                    <button class="btn btn-primary mb-2 mr-sm-3" id="get">Proses</button>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <span id="data_buku"></span>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#get').click();
    })

    $(document).on('click', '#get', function() {
        show_loading()
        var awal = $('#awal').val()
        var akhir = $('#akhir').val()
        var i = 0;
        var data_buku = '<table id="table1" class="table table-sm table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">' +
            '<thead>' +
            '<tr>' +
            '<th>No</th>' +
            '<th>Kode Barang</th>' +
            '<th>Nama Barang</th>' +
            '<th>HPP</th>' +
            '<th>Stok In</th>' +
            '<th>Stok Out</th>' +
            '<th>Layanan</th>' +
            '<th>Kode Mutasi</th>' +
            '<th>Tgl Expired</th>' +
            '<th>Tgl Mutasi</th>' +
            '</thead>'
        data_buku += '<tbody>'
        $.getJSON('<?= site_url('info_buku/data_buku/') ?>' + $('#awal').val() + '/' + $('#akhir').val(), function(data) {
            $.each(data, function(key, val) {
                i += 1
                data_buku += '<tr>' +
                    '<td>' + i + '</td>' +
                    '<td>' + val.fs_kd_barang + '</td>' +
                    '<td>' + val.fs_nm_barang + '</td>' +
                    '<td>' + currencyFormat(val.fn_hpp) + '</td>' +
                    '<td>' + val.fn_stok_in + '</td>' +
                    '<td>' + val.fn_stok_out + '</td>' +
                    '<td>' + val.fs_nm_layanan + '</td>' +
                    '<td>' + val.fs_kd_mutasi + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_expired) + '</td>' +
                    '<td>' + dateFormat(val.fd_tgl_mutasi) + '</td>' +
                    '</tr>'
            })
            data_buku += '</tbody></table>'
            $('#data_buku').html(data_buku)
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