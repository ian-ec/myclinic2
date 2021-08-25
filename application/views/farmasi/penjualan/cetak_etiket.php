<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 50mm;
            /* font-size: 12px; */
        }

        .etiket {
            text-align: center;
            /* margin-top: 15px; */
            /* margin-left: 3px; */
            /* font-size: 12px; */
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
        <?php foreach ($penjualan_detail as $key => $data) { ?>
            <div class="">
                <table border="0" cellspacing="0" cellpadding="0" style="width: 100%; padding-top: 0px; padding-bottom: 5px; margin-top: 10px;">
                    <tbody>
                        <tr style="text-align: center;">
                            <td style="border-bottom: 1px dashed; font-size: 7px;" colspan="2">
                                <!-- <?= $parameter->aplication_name ?><br> -->
                                <?= $parameter->address ?><br>
                                <?= $parameter->telp ?><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border-bottom: 1px dashed; font-size: 7px;"><?= $penjualan->fs_kd_penjualan ?></b></td>
                            <td style="text-align: right; border-bottom: 1px dashed; font-size: 7px;"><?= indo_date($penjualan->fd_tgl_penjualan) ?></td>
                        </tr>
                        <tr style="height: 40px;">
                            <td colspan="2" style="text-align: center;  border-bottom: 1px dashed;">
                                <span style="font-size: 7px;"><?= $data->fs_nm_barang ?></span>
                                <br>
                                <span style="font-size: 7px;"><b><?= $data->fs_nm_etiket ?></b></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center; font-size: 7px;">
                                <span>-- Terima Kasih</span>
                                <br>
                                <span>Semoga lekas sembuh</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
        <?php foreach ($racik as $key => $data) { ?>
            <div class="etiket">
                <table>
                    <tbody>
                        <tr style="text-align: center;">
                            <td style="border-bottom: 1px dashed;" colspan="2">
                                <?= $parameter->aplication_name ?><br>
                                <?= $parameter->address ?><br>
                                <?= $parameter->telp ?><br>
                            </td>
                        </tr>
                        <tr>
                            <td style="text-align: left; border-bottom: 1px dashed;"><?= $penjualan->fs_kd_penjualan ?></b></td>
                            <td style="text-align: right; border-bottom: 1px dashed;"><?= indo_date($penjualan->fd_tgl_penjualan) ?></td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;  border-bottom: 1px dashed;">
                                <span><?= $data->fs_nm_racik ?></span>
                                <br>
                                <span><?= $data->fs_nm_etiket ?></span>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" style="text-align: center;">
                                <span>-- Terima Kasih</span>
                                <br>
                                <span>Semoga lekas sembuh</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</body>

</html>

<!-- <script type="text/javascript">
    window.print();
    window.onfocus = function() {
        window.close();
    }
</script> -->