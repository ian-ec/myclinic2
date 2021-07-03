<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: Verdana, Arial;
        }

        .content {
            width: 70mm;
            font-size: 12px;
        }

        .barcode {
            text-align: center;
            /* margin-top: 1px; */
            /* margin-left: 3px; */
            font-size: 15px;
        }

        @media print {
            @page {
                width: 2.5cm;
                margin: 0cm;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="barcode">
            <p style="margin-bottom: 5px;"><b><?= $row->fs_nm_barang ?></b></p>
            <?php
            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->fs_kd_barcode, $generator::TYPE_CODE_128)) . '"  style="width:200px; height:30px">';
            ?>
            <p style="margin-top: 5px;"><b><?= $row->fs_kd_barcode ?></b></h3>
        </div>
    </div>
</body>

</html>

<script type="text/javascript">
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script>