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
                <h3><?= $row->fs_nm_barang ?></h3>
                <?php
                $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->fs_kd_barcode, $generator::TYPE_CODE_128)) . '"  style="width:250px; height:50px">';
                ?>
                <br>
                <h4><b><?= $row->fs_kd_barcode ?></b></h4>
                <br>
                <a href="<?= site_url('barang/barcode_print/' . $row->fs_id_barang) ?>" target="_blank" class="btn btn-info">
                    <i class="fa fa-print"></i> Print
                </a>
                <a href="<?= site_url('barang/') ?>" class="btn btn-warning">
                    <i class="fa fa-undo"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-3"></div>
</div>