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
            <table style="width: 100%;">
                <tbody>
                    <tr>
                        <td style="text-align: center;">
                            <?php
                            $generator = new \Picqer\Barcode\BarcodeGeneratorPNG();
                            echo '<img src="data:image/png;base64,' . base64_encode($generator->getBarcode($row->fs_kd_barcode, $generator::TYPE_CODE_128)) . '"  style="width:230px; height:50px; margin-top: 10px;">';
                            ?>
                            <p style="margin: 1px; font-size: 10px;"><b><?= $row->fs_nm_barang ?></b></p>
                            <?php
                            $harga_jual_profit = ($row->fn_hna * $row->fn_profit / 100) + $row->fn_hna;
                            $harga_jual = $row->fn_harga_jual;
                            $profit = $row->fn_profit;
                            echo  indo_currency($profit == 0 ? $harga_jual : round($harga_jual_profit));
                            ?>
                        </td>
                    </tr>
                </tbody>
            </table>
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