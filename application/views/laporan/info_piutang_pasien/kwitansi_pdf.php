<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 100%;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .piutang {
            text-align: center;
            font-size: 25px;
            padding-bottom: 2px;
            border-bottom: 1px dashed;
        }

        .transaction {
            padding-bottom: 5px;
            border-bottom: 1px dashed;
        }

        .head {
            margin-top: 5px;
            margin-bottom: 10px;
            padding-bottom: 10px;
            border-bottom: 1px solid;
        }

        table {
            width: 100%;
            font-size: 12px;
        }

        .thanks {
            margin-top: 10px;
            padding-top: 10px;
            text-align: center;
            border-top: 1px dashed;
        }

        @media print {
            @page {
                width: 80mm;
                margin: 0mm;
            }
        }
    </style>
</head>

<body>
    <div class="content">
        <div class="title">
            <strong>
                <?= $parameter->aplication_name ?><br>
                <?= $parameter->address ?><br>
                <?= $parameter->telp ?><br>
            </strong>
        </div>
        <div class="piutang">
            KWITANSI PEMBAYARAN
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 25%;">Sudah diterima dari</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $piutang->fs_nm_pasien ?></b></td>
                    </tr>
                    <tr>
                        <td>Uang Sebesar</td>
                        <td>:</td>
                        <td><b><u><?= terbilang($piutang->fn_cash +  $piutang->fn_debit +  $piutang->fn_credit) ?> RUPIAH</u></b></td>
                    </tr>
                    <tr>
                        <td>Untuk Pembayaran</td>
                        <td>:</td>
                        <td><b>Pembayaran biaya pengobatan</b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table class="transaction-table" cellspacing="10" cellpadding="0">
            <tbody>
                <tr>
                    <td style="vertical-align: top;">Terbilang : <b><u><?= indo_currency($piutang->fn_cash +  $piutang->fn_debit +  $piutang->fn_credit) ?></u></b></td>
                    <td style="text-align: center;">
                        Denpasar, <?= indo_date($piutang->fd_tgl_bayar) ?>
                        <br>
                        <br>
                        <br>
                        <br>
                        <b>(<?= ucfirst($this->fungsi->user_login()->username) ?>)</b>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
        </div>
    </div>
</body>

</html>