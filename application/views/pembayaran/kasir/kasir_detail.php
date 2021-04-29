<style type="text/css">
    /* .scroll{
    display:block;
    border: 1px solid red;
    padding:5px;
    margin-top:5px;
    width:300px;
    height:50px;
    overflow:scroll;
} */
    .auto {
        display: block;
        padding: 5px;
        /* margin-top: 5px; */
        width: 100%;
        height: 485px;
        overflow: auto;
    }
</style>

<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Tanggal</label>
                    <div class="col-sm-8">
                        <input type="date" id="fd_tgl_regout" value="<?= date('Y-m-d') ?>" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Kode Reg</label>
                    <div class="col-sm-8">
                        <input type="hidden" id="fs_id_registrasi" value="<?= $row->id_registrasi ?>">
                        <input type="text" id="fs_kd_registrasi" value="<?= $row->fs_kd_registrasi ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Kode RM</label>
                    <div class="col-sm-8">
                        <input type="hidden" id="fs_id_rm" value="<?= $row->id_rm ?>" class="form-control">
                        <input type="text" id="fs_kd_rm" value="<?= $row->fs_kd_rm ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Nama</label>
                    <div class="col-sm-8">
                        <input type="text" id="fs_nm_pasien" value="<?= $row->fs_nm_pasien ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Alamat</label>
                    <div class="col-sm-8">
                        <input type="text" id="fs_alamat_pasien" value="<?= $row->alamat_pasien ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Jaminan</label>
                    <div class="col-sm-8">
                        <input type="text" id="fs_nm_jaminan" value="<?= $row->fs_nm_jaminan ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Layanan</label>
                    <div class="col-sm-8">
                        <input type="text" id="fs_nm_layanan" value="<?= $row->fs_nm_layanan ?>" class="form-control" readonly style="background-color: lavender;">
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Subtotal</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: lavender;" indo_currency3 value="<?= indo_currency3($row->subtotal) ?>" class="form-control text-right" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Diskon</label>
                    <div class="col-sm-8">
                        <input type="text" indo_currency3 value="<?= indo_currency3($row->diskon) ?>" min="0" class="form-control  text-right" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-4 col-form-label text-right">Grand Total</label>
                    <div class="col-sm-8">
                        <input type="text" style="background-color: aqua;" value="<?= indo_currency3($row->grandtotal) ?>" indo_currency3 class="form-control  text-right" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <div class="col-sm-12 text-right">
                        <button id="bayar" data-toggle="modal" data-target="#modal-bayar" class="btn btn-flat btn-success">
                            <i class="fas fa-dollar-sign"></i> Bayar
                        </button>
                        <a href="<?= site_url('kasir') ?>" class="btn btn-warning"><i class="fa fa-undo"></i> Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#rekap" role="tab">
                            <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                            <span class="d-none d-sm-block">Rekap Bill</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#detail" role="tab">
                            <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                            <span class="d-none d-sm-block">Detail Bill</span>
                        </a>
                    </li>
                </ul>

                <!-- Tab panes -->
                <div class="tab-content p-3 text-muted">
                    <div class="tab-pane active auto" id="rekap" role="tabpanel">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr style="background-color: lavender;">
                                    <th>No</th>
                                    <th>Rekap Cetak</th>
                                    <th style="text-align: right;">Subtotal</th>
                                    <th style="text-align: right;">Diskon</th>
                                    <th style="text-align: right;">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($billing->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $data->rekapcetak ?></td>
                                        <td style="text-align: right;"><?= indo_currency3($data->subtotal) ?></td>
                                        <td style="text-align: right;"><?= indo_currency3($data->diskon) ?></td>
                                        <td style="text-align: right;"><?= indo_currency3($data->grandtotal) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane auto" id="detail" role="tabpanel">
                        <table class="table table-bordered table-sm">
                            <thead>
                                <tr style="background-color: lavender;">
                                    <th>No</th>
                                    <th>Transaksi</th>
                                    <th>Detail Transaksi</th>
                                    <th>Subtotal</th>
                                    <th>Diskon</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($detail_reg->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><b><?= $data->fs_kd_registrasi ?></b></td>
                                        <td><b><?= $data->fs_nm_layanan ?></b> / <?= $data->fs_nm_karcis ?> </td>
                                        <td style="text-align: right;"><?= indo_currency3($data->fn_subtotal) ?></td>
                                        <td style="text-align: right;"><?= indo_currency3($data->fn_diskon) ?></td>
                                        <td style="text-align: right;"><?= indo_currency3($data->fn_grandtotal) ?></td>
                                    </tr>
                                <?php } ?>
                                <?php
                                foreach ($detail_tindakan->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><b><?= $data->fs_kd_trs_tindakan ?></b></td>
                                        <td colspan="4"><b><?= $data->fs_nm_layanan ?></b></td>
                                    </tr>
                                    <?php
                                    $id_tindakan = $data->fs_id_trs_tindakan;
                                    $detail_tindakan = $this->tindakan_m->get_tindakan_detail($id_tindakan)->result();
                                    foreach ($detail_tindakan as $tindakan => $tdk) { ?>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>
                                                <li><?= $tdk->fs_nm_tarif ?> x <?= $tdk->fn_qty ?></li>
                                            </td>
                                            <td style="text-align: right;"><?= indo_currency3($tdk->fn_nilai_tarif * $tdk->fn_qty) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3($tdk->fn_diskon * $tdk->fn_qty) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3($tdk->fn_total) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                                <?php
                                foreach ($detail_penjualan->result() as $key => $data) { ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><b><?= $data->fs_kd_penjualan ?></b></td>
                                        <td colspan="4"><b>Apotek</b></td>
                                    </tr>
                                    <?php
                                    $id_penjualan = $data->fs_id_penjualan;
                                    $detail_penjualan = $this->penjualan_m->get_penjualan_detail($id_penjualan)->result();
                                    foreach ($detail_penjualan as $penjualan => $jual) { ?>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>
                                                <li><?= $jual->fs_nm_barang ?> x <?= $jual->fn_qty ?></li>
                                            </td>
                                            <td style="text-align: right;"><?= indo_currency3($jual->harga_jual * $jual->fn_qty) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3($jual->fn_diskon_harga_jual * $jual->fn_qty) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3($jual->fn_total_harga_jual) ?></td>
                                        </tr>
                                    <?php } ?>
                                    <?php
                                    $detail_racik = $this->racik_m->get_racik($id_penjualan)->result();
                                    foreach ($detail_racik as $racik => $rc) { ?>
                                        <tr>
                                            <td colspan="2"></td>
                                            <td>
                                                <li><?= $rc->fs_nm_racik ?> x <?= $rc->fn_qty_racik ?> :</li>
                                                <?php
                                                $id_racik = $rc->fs_id_racik;
                                                $data_racik = $this->racik_m->get_racik_detail($id_racik)->result();
                                                foreach ($data_racik as $dtrck => $dt) { ?>
                                                    - <?= $dt->fs_nm_barang ?> x <?= $dt->fn_qty ?><br>
                                                <?php } ?>
                                            </td>
                                            <td style="text-align: right;"><?= indo_currency3($rc->fn_nilai_jual_racik) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3(0) ?></td>
                                            <td style="text-align: right;"><?= indo_currency3($rc->fn_nilai_jual_racik) ?></td>
                                        </tr>
                                    <?php } ?>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>


<!-- Modal Bayar -->
<div class="modal modal-primary fade" id="modal-bayar">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header bg-soft-success">
                <h4 class="modal-title">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Grand Total</label>
                    <div class="col-sm-9">
                        <input type="text" style="background-color: aqua;" id="fn_grandtotal" value="<?= $row->grandtotal ?>" class="form-control" readonly>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Tunai</label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_cash" id="fn_cash" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Debit Card</label>
                    <div class="col-sm-4">
                        <select name="fs_id_bank_debit" id="fs_id_bank_debit" class="form-control select2" style="width: 100%;">
                            <option value="">-- Pilih Bank --</option>
                            <?php foreach ($debit as $db) { ?>
                                <option value="<?= $db->fs_id_bank ?>"><?= $db->fs_nm_bank ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="fn_no_debit" id="fn_no_debit" class="form-control" placeholder="No. Kartu Debit">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_debit" id="fn_debit" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Credit Card</label>
                    <div class="col-sm-4">
                        <select name="fs_id_bank_credit" id="fn_id_bank_credit" class="form-control select2" style="width: 100%;">
                            <option value="">-- Pilih Bank --</option>
                            <?php foreach ($credit as $cc) { ?>
                                <option value="<?= $cc->fs_id_bank ?>"><?= $cc->fs_nm_bank ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="col-sm-5">
                        <input type="text" name="fn_no_credit" id="fn_no_credit" class="form-control" placeholder="No. Kartu Kredit">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_credit" id="fn_credit" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Klaim</label>
                    <div class="col-sm-9">
                        <select name="fs_id_jaminan" id="fs_id_jaminan" class="form-control select2" style="width: 100%;">
                            <option value="">-- Pilih Jaminan --</option>
                            <?php foreach ($jaminan as $jm) { ?>
                                <option value="<?= $jm->fs_id_jaminan ?>" <?= $row->id_jaminan == $jm->fs_id_jaminan ? 'selected' : '' ?>><?= $jm->fs_nm_jaminan ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_klaim" id="fn_klaim" class="form-control" value="0">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Diskon</label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_diskon_regout" id="fn_diskon_regout" class="form-control">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right">Hutang</label>
                    <div class="col-sm-9">
                        <input type="number" name="fn_hutang" class="form-control" id="fn_hutang" value="" readonly style="background-color: lavender;">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-sm-3 col-form-label text-right"></label>
                    <div class="col-sm-9 text-right">
                        <button name="process_payment" id="process_payment" class="btn btn-flat btn-primary pull-right">
                            <i class="fa fa-paper-plane"></i> Simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="modal-footer bg-soft-success"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script>
    function count_bayar_modal() {
        var fn_grandtotal = $('#fn_grandtotal').val();
        var fn_cash = $('#fn_cash').val();
        var fn_debit = $('#fn_debit').val();
        var fn_credit = $('#fn_credit').val();
        var fn_klaim = $('#fn_klaim').val();
        var fn_diskon_regout = $('#fn_diskon_regout').val();
        $('#fn_hutang').val(fn_grandtotal);
        fn_cash != 0 || fn_debit != 0 || fn_credit != 0 || fn_klaim != 0 || fn_diskon_regout != 0 ? $('#fn_hutang').val(parseInt(fn_grandtotal) - (parseInt(fn_cash) + parseInt(fn_debit) + parseInt(fn_credit) + parseInt(fn_klaim) + parseInt(fn_diskon_regout))) : $('#hutang').val(fn_grandtotal);

        if (fn_cash == '') {
            $('#fn_cash').val(0)
        }
        if (fn_debit == '') {
            $('#fn_debit').val(0)
        }
        if (fn_credit == '') {
            $('#fn_credit').val(0)
        }
        if (fn_klaim == '') {
            $('#fn_klaim').val(0)
        }
        if (fn_diskon_regout == '') {
            $('#fn_diskon_regout').val(0)
        }
    }

    $(document).on('keyup mouseup', '#fn_grandtotal, #fn_cash, #fn_debit, #fn_credit, #fn_hutang, #fn_klaim, #fn_diskon_regout', function() {
        count_bayar_modal()
    })

    $(document).ready(function() {
        count_bayar_modal()
    })

    $(document).on('click', '#process_payment', function() {
        var fs_id_registrasi = $('#fs_id_registrasi').val()
        var fs_id_rm = $('#fs_id_rm').val()
        var fn_grandtotal = $('#fn_grandtotal').val()
        var fn_cash = $('#fn_cash').val()
        var fs_id_bank_debit = $('#fs_id_bank_debit').val()
        var fn_no_debit = $('#fn_no_debit').val()
        var fn_debit = $('#fn_debit').val()
        var fs_id_bank_credit = $('#fn_id_bank_credit').val()
        var fn_no_credit = $('#fn_no_credit').val()
        var fn_credit = $('#fn_credit').val()
        var fs_id_jaminan = $('#fs_id_jaminan').val()
        var fn_klaim = $('#fn_klaim').val()
        var fn_diskon_regout = $('#fn_diskon_regout').val()
        var fn_hutang = $('#fn_hutang').val()
        var fd_tgl_regout = $('#fd_tgl_regout').val()

        if (fn_hutang < 0) {
            Swal.fire({
                icon: 'error',
                title: 'Hutang tidak boleh minus!',
                text: 'Silahkan perbaiki nilai pembayaran!',
            })
            $('#fn_cash').focus()
        } else {
            Swal.fire({
                title: 'Yakin dengan transaksi ini?',
                text: "Data akan disimpan!",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#00a65a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, simpan!',
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
                        url: '<?= site_url('kasir/process') ?>',
                        data: {
                            'process_payment': true,
                            'fs_id_registrasi': fs_id_registrasi,
                            'fs_id_rm': fs_id_rm,
                            'fn_grandtotal': fn_grandtotal,
                            'fn_cash': fn_cash,
                            'fs_id_bank_debit': fs_id_bank_debit,
                            'fn_no_debit': fn_no_debit,
                            'fn_debit': fn_debit,
                            'fs_id_bank_credit': fs_id_bank_credit,
                            'fn_no_credit': fn_no_credit,
                            'fn_credit': fn_credit,
                            'fs_id_jaminan': fs_id_jaminan,
                            'fn_klaim': fn_klaim,
                            'fn_diskon_regout': fn_diskon_regout,
                            'fn_hutang': fn_hutang,
                            'fd_tgl_regout': fd_tgl_regout,
                        },
                        dataType: 'json',
                        success: function(result) {
                            if (result.success) {
                                kode = result.regout_id,
                                    Swal.fire({
                                        title: 'Apakah anda akan mencetak transksi ini?',
                                        icon: 'question',
                                        showDenyButton: true,
                                        showCancelButton: true,
                                        confirmButtonText: `Cetak Rekap`,
                                        denyButtonText: `Cetak Detail`,
                                        cancelButtonText: `Batal`,
                                        denyButtonColor: '#00a65a',
                                        cancelButtonColor: '#d33',
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            window.open('<?= site_url('kasir/cetak_rekap_pdf/') ?>' + fs_id_registrasi, '_blank')
                                            location.href = '<?= site_url('kasir') ?>'
                                        } else if (result.isDenied) {
                                            window.open('<?= site_url('kasir/cetak_detail_pdf/') ?>' + fs_id_registrasi, '_blank')
                                            location.href = '<?= site_url('kasir') ?>'
                                        } else {
                                            location.href = '<?= site_url('kasir') ?>'
                                        }
                                    })
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Gagal',
                                    text: 'Transaksi gagal di simpan',
                                })
                            }
                        }
                    })
                }
            })
        }
    })
</script>
<!-- <script>
    // function fnHitung() {
    //     var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
    //     if (document.getElementById('inputku').value == "") {
    //         alert("Jangan Dikosongi");
    //         document.getElementById('inputku').focus();
    //         return false;
    //     } else
    //     if (angka >= 1) {
    //         alert("angka aslinya : " + angka);
    //         document.getElementById('inputku').focus();
    //         document.getElementById('inputku').value = tandaPemisahTitik(angka);
    //         return false;
    //     }
    // }
    function tandaPemisahTitik(b) {
        var _minus = false;
        if (b < 0) _minus = true;
        b = b.toString();
        b = b.replace(".", "");
        b = b.replace("-", "");
        c = "";
        panjang = b.length;
        j = 0;
        for (i = panjang; i > 0; i--) {
            j = j + 1;
            if (((j % 3) == 1) && (j != 1)) {
                c = b.substr(i - 1, 1) + "." + c;
            } else {
                c = b.substr(i - 1, 1) + c;
            }
        }
        if (_minus) c = "-" + c;
        return c;
    }

    //onkeydown="return numbersonly(this, event);" onkeyup="javascript:tandaPemisahTitik(this);" *tambahkan kode ini pada input id

    function numbersonly(ini, e) {
        if (e.keyCode >= 49) {
            if (e.keyCode <= 57) {
                a = ini.value.toString().replace(".", "");
                b = a.replace(/[^\d]/g, "");
                b = (b == "0") ? String.fromCharCode(e.keyCode) : b + String.fromCharCode(e.keyCode);
                ini.value = tandaPemisahTitik(b);
                return false;
            } else if (e.keyCode <= 105) {
                if (e.keyCode >= 96) {
                    //e.keycode = e.keycode - 47;
                    a = ini.value.toString().replace(".", "");
                    b = a.replace(/[^\d]/g, "");
                    b = (b == "0") ? String.fromCharCode(e.keyCode - 48) : b + String.fromCharCode(e.keyCode - 48);
                    ini.value = tandaPemisahTitik(b);
                    //alert(e.keycode);
                    return false;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else if (e.keyCode == 48) {
            a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode);
            b = a.replace(/[^\d]/g, "");
            if (parseFloat(b) != 0) {
                ini.value = tandaPemisahTitik(b);
                return false;
            } else {
                return false;
            }
        } else if (e.keyCode == 95) {
            a = ini.value.replace(".", "") + String.fromCharCode(e.keyCode - 48);
            b = a.replace(/[^\d]/g, "");
            if (parseFloat(b) != 0) {
                ini.value = tandaPemisahTitik(b);
                return false;
            } else {
                return false;
            }
        } else if (e.keyCode == 8 || e.keycode == 46) {
            a = ini.value.replace(".", "");
            b = a.replace(/[^\d]/g, "");
            b = b.substr(0, b.length - 1);
            if (tandaPemisahTitik(b) != "") {
                ini.value = tandaPemisahTitik(b);
            } else {
                ini.value = "";
            }

            return false;
        } else if (e.keyCode == 9) {
            return true;
        } else if (e.keyCode == 17) {
            return true;
        } else {
            //alert (e.keyCode);
            return false;
        }

    }
</script> -->