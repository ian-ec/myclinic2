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

        .soap {
            padding-bottom: 5px;
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
        <div class="soap">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%;">Kode CPPT</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $soap->fs_kd_soap ?></b></td>
                        <td style="width: 20%;">Kode Registrasi</td>
                        <td style="width: 1%;">:</td>
                        <td><b><?= $soap->fs_kd_registrasi ?></b></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><b><?= indo_date($soap->fd_tgl_soap) ?></b></td>
                        <td>Nama Pasien</td>
                        <td>:</td>
                        <td><b><?= $soap->fs_nm_pasien ?></b></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><b><?= $soap->fs_nm_layanan ?></b></td>
                        <td>Jaminan</td>
                        <td>:</td>
                        <td><b><?= $soap->fs_nm_jaminan ?></b></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td style="width: 20%; vertical-align: top;"><b>Subjective</b></td>
                        <td style="width: 5%; vertical-align: top;">:</td>
                        <td><?= nl2br($soap->fs_subjective) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; vertical-align: top;"><b>Objective</b></td>
                        <td style="width: 5%; vertical-align: top;">:</td>
                        <td><?= nl2br($soap->fs_objective) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; vertical-align: top;"><b>Assesment</b></td>
                        <td style="width: 5%; vertical-align: top;">:</td>
                        <td><?= nl2br($soap->fs_assesment) ?></td>
                    </tr>
                    <tr>
                        <td style="width: 20%; vertical-align: top;"><b>Planing</b></td>
                        <td style="width: 5%; vertical-align: top;">:</td>
                        <td><?= nl2br($soap->fs_planing) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <table>
            <tbody>
                <tr>
                    <td style="text-align: center;">
                        Pasien
                        <br>
                        <br>
                        <br>
                        <br>
                        (<b><?= $soap->fs_nm_pasien ?></b>)
                    </td>
                    <td style="text-align: center;">
                        Medis
                        <br>
                        <br>
                        <br>
                        <br>
                        (<b><?= $soap->name ?></b>)
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
            <b>Semoga lekas sembuh</b>
        </div>
    </div>
</body>

</html>