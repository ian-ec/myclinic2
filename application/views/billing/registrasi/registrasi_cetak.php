<html moznomarginboxes mozdisallowselectionprint>

<head>
    <title><?= $parameter->aplication_name ?></title>
    <style type="text/css">
        html {
            font-family: 'Courier New', Courier, monospace;
        }

        .content {
            width: 100mm;
            font-size: 12px;
            padding: 5px;
        }

        .title {
            text-align: center;
            font-size: 13px;
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

<body onload="window.print()">
    <div class="content">
        <div class="title">
            <strong>
                <?= $parameter->aplication_name ?><br>
                <?= $parameter->address ?><br>
                <?= $parameter->telp ?><br>
            </strong>
        </div>
        <div class="transaction">
            <table class="transaction-table" cellspacing="10" cellpadding="0">
                <tbody>
                    <tr>
                        <td>Tanggal</td>
                        <td>:</td>
                        <td><?= $registrasi->fd_tgl_registrasi ?></td>
                    </tr>
                    <tr>
                        <td>Kode Reg</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_kd_registrasi ?></td>
                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_nm_pasien ?></td>
                    </tr>
                    <tr>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_nm_kelamin ?></td>
                    </tr>
                    <tr>
                        <td>Tempat / Tgl Lahir</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_tmpt_lahir  . ", " . indo_date($registrasi->tanggal_lahir) ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_alamat ?></td>
                    </tr>
                    <tr>
                        <td>Layanan</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_nm_layanan ?></td>
                    </tr>
                    <tr>
                        <td>Dokter</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_nm_pegawai ?></td>
                    </tr>
                    <tr>
                        <td>Jaminan</td>
                        <td>:</td>
                        <td><?= $registrasi->fs_nm_jaminan ?></td>
                    </tr>
                    <tr>
                        <td>Karcis</td>
                        <td>:</td>
                        <td><?= indo_currency($registrasi->nilai_karcis) ?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="thanks">
            <b>-- Terima Kasih --</b> <br>
            <b>Silahkan tunjukan bukti registrasi kepada perawat</b>
        </div>
    </div>
</body>

</html>