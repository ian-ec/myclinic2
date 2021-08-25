<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Barcode</h3>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Barcode</a></li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md 3"></div>
    <div class="col-lg-6">
        <div class="card">
            <div class="card-body text-center">
                <?php
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->fs_kd_barcode, $generator::TYPE_CODE_128)) . '"  style="width:250px; height:50px">';
                ?>
                <br>
                <span style="font-size: 15px;"><b><?= $row->fs_nm_barang ?></b></span><br>
                <?php
                $harga_jual_profit = ($row->fn_hna * $row->fn_profit / 100) + $row->fn_hna;
                $harga_jual = $row->fn_harga_jual;
                $profit = $row->fn_profit;
                echo '<span style="font-size: 20px">' . indo_currency($profit == 0 ? $harga_jual : round($harga_jual_profit)) . '</span>';
                ?>
                <br>
                <a href="<?= site_url('barang/barcode_print/' . $row->fs_id_barang) ?>" target="_blank" class="btn btn-info">
                    <i class="fa fa-print"></i> Print (55mm x 25mm)
                </a>
                <a href="<?= site_url('barang/barcode_print/' . $row->fs_id_barang) ?>" target="_blank" class="btn btn-info">
                    <i class="fa fa-print"></i> Print (55mm x 15mm)
                </a>
                <a href="<?= site_url('barang/') ?>" class="btn btn-warning">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>