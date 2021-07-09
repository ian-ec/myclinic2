<style type="text/css">
    html {
        font-family: 'Courier New', Courier, monospace;
    }

    .content {
        font-size: 15px;
    }
</style>

<div class="row">
    <div class="col-12">
        <div class="page-title-box d-flex align-items-center justify-content-between">
            <h3>Data Laboratorium</h3>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="javascript: void(0);">Data Laboratorium</a></li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row content">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div class="card">
            <div class="card-body">
                <table style="width: 100%;">
                    <tbody>
                        <tr style="text-align: center;">
                            <td>
                                <img src="<?= base_url() ?>assets/plugins/images/klinik.png" alt="klinik" style="height: 100px;">
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="border-bottom: 1px solid ;">
                                <b><span style="font-size: 15px;">No. Ijin: 503/759/DPMPTSPTK/IV/2021</span></b><br>
                                <b><span style="font-size: 18px;">Jl. Pulau Serangan No. 16 Dauhwaru</span></b><br>
                                <b><span style="font-size: 14px;">Jembrana - Bali HP: 081 703 830 386</span></b>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <br>
                <table style="width: 100%; border: 1px solid;">
                    <tbody>
                        <tr style="text-align: center;">
                            <td colspan="2">
                                <u>RINGKASAN HASIL PEMERIKSAAN COVID-19</u><br>
                                <b><i>COVID-19 TEST RESULT SUMMARY</i></b>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td style="border: 1px solid;">
                                <u>Informasi Pasien</u><br>
                                <b><i>Patient Informasition</i></b>
                            </td>
                            <td style="border: 1px solid;">
                                <u>Informasi Spesimen</u><br>
                                <b><i>Specimen Information</i></b>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid; width: 50%;">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Nama</u><br>
                                                <b><i>Name</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_nm_pasien ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Tanggal lahir</u><br>
                                                <b><i>Date of birth</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= indo_date($antigen->fd_tgl_lahir) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Jenis Kelamin</u><br>
                                                <b><i>Sex</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <u><?= $antigen->fs_kd_kelamin == '1' ? 'Laki-laki' : 'Perempuan' ?></u><br>
                                                <b><i><?= $antigen->fs_kd_kelamin == '1' ? 'Male' : 'Female' ?></i></b>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Rekam medis</u><br>
                                                <b><i>Medical Record</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_kd_rm ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>No Identitas</u><br>
                                                <b><i>Identity No.</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_identitas ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Telp./Hp</u><br>
                                                <b><i>Telp./Hp</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_telp ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Alamat</u><br>
                                                <b><i>Address </i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_alamat ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="border: 1px solid; width: 50%;">
                                <table style="width: 100%;">
                                    <tbody>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Tipe Spesimen </u><br>
                                                <b><i>Specimen type</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_tipe_spesimen ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Nomor Spesimen</u><br>
                                                <b><i>Number of Specimen</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fn_no_spesimen ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Tgl Pengambilan </u><br>
                                                <b><i>Date of collected</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fd_tgl_ambil ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Tanggal di proses</u><br>
                                                <b><i>Date of processed</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= indo_date($antigen->fd_tgl_proses) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Tgl Pelaporan</u><br>
                                                <b><i>Date of reported </i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= indo_date($antigen->fd_tgl_lapor) ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="width: 40%;">
                                                <u>Waktu pelaporan</u><br>
                                                <b><i>Time of reported</i></b>
                                            </td>
                                            <td style="width: 5%;">:</td>
                                            <td>
                                                <?= $antigen->fs_jam_lapor ?>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid;" colspan="2">
                                <table style="width: 100%;">
                                    <tr>
                                        <td style="width: 20%;">
                                            <u>Nama Test</u><br>
                                            <b><i>Test name </i></b>
                                        </td>
                                        <td style="width: 5%;">:</td>
                                        <td>
                                            <u><?= $antigen->fs_tipe_spesimen ?></u><br>
                                            <b><i><?= $antigen->fs_tipe_spesimen ?></i></b>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="width: 20%;">
                                            <u>Hasil</u><br>
                                            <b><i>Result</i></b>
                                        </td>
                                        <td style="width: 5%;">:</td>
                                        <td>
                                            <u><?= $antigen->fn_hasil_test == '1' ? 'Positive SARS-CoV2' : 'Negative SARS-CoV2' ?></u><br>
                                            <b><i><?= $antigen->fn_hasil_test == '1' ? 'Positive SARS-CoV2' : 'Negative SARS-CoV2' ?></i></b>
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <?php
                        if ($antigen->fn_hasil_test === '1') {
                        ?>
                            <tr>
                                <td style="border: 1px solid;" colspan="2">
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%; vertical-align: top;">
                                                    <u>Catatan </u> <br>
                                                    <b><i>Comments </i></b>
                                                </td>
                                                <td style="width: 5%; vertical-align: top;">:</td>
                                                <td>
                                                    <li>SARS-CoV2 adalah agen penyebab COVID-19</li>
                                                    <b><i>SARS-CoV2 is the causative agent of COVID-19.</i></b>
                                                    <li>Hasil positif mengindikasikan terdeteksinya RNA dari virus SARS-CoV2.</li>
                                                    <b><i>A positive result indicates detection of RNA from the SARS-CoV2 virus.</i></b>
                                                    <li>Hasil pemeriksaan laboratorium ini harus diinterpretasikan secara komperhensif dengan melakukan konfirmasi terhadap riwayat kontak, data epidemiologi, gejala klinis dan informasi penunjang diagnostic lainnya untuk menentukan derajat infeksi.</li>
                                                    <b><i>The results of this laboratory examination must be interpreted comprehensively by confirming the contact history, epidemiological data, clinical symptoms and other diagnostic supporting information to determine the degree of infection.</i></b>
                                                    <li>Jika anda mengalami gejala ringan COVID-19 atau tanpa gejala (asimptomatik), dapat melakukan isolasi mandiri atau karantina yang disediakan oleh pemerintah dan segera menghubungi pusat layanan kesehasatan terdekat.</li>
                                                    <b><i>If you experience mild symptoms of COVID-19 or without symptoms (asymptomatic), you can carry out self-isolation or quarantine provided by the government and immediately contact the nearest health service center.</i></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php } else { ?>
                            <tr>
                                <td style="border: 1px solid;" colspan="2">
                                    <table style="width: 100%;">
                                        <tbody>
                                            <tr>
                                                <td style="width: 20%; vertical-align: top;">
                                                    <u>Catatan </u> <br>
                                                    <b><i>Comments </i></b>
                                                </td>
                                                <td style="width: 5%; vertical-align: top;">:</td>
                                                <td>
                                                    <li>SARS-CoV2 adalah agen penyebab COVID-19</li>
                                                    <b><i>SARS-CoV2 is the causative agent of COVID-19.</i></b>
                                                    <li>Pemeriksaan konfirmasi dengan pemeriksaan RT-PCR</li>
                                                    <b><i>Confirmatory examination with RT-PCR examination</i></b>
                                                    <li>Lakukan karantina atau isolasi sesuai dengan kriteria.</li>
                                                    <b><i>Do quarantine or isolation according to the criteria.</i></b>
                                                    <li>Menerapkan perilaku hidup bersih dan sehat: mencuci tangan, menerapkan etika batuk, menggunakan masker saat sakit, menjaga stamina dan jaga jarak.</li>
                                                    <b><i>Applying a clean and healthy lifestyle: washing hands, applying cough etiquette, wearing a mask when sick, keeping stamina and physical distancing</i></b>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td style="width: 60%; text-align: center;">
                            <?php
                            $sex = $antigen->fs_kd_kelamin == '1' ? 'Laki-laki' : 'Perempuan';
                            $hasil_test = $antigen->fn_hasil_test == '1' ? 'Positive SARS-CoV2' : 'Negative SARS-CoV2';
                            $tanggal = new DateTime($antigen->fd_tgl_lahir);
                            $today = new DateTime('today');
                            $y = $today->diff($tanggal)->y;
                            $m = $today->diff($tanggal)->m;
                            $d = $today->diff($tanggal)->d;
                            $umur = $y . " tahun " . $m . " bulan " . $d . " hari ";
                            $qrCode = new Endroid\QrCode\QrCode(
                                'Hasil Lab Rapid Antigen Covid-19 / Covid-19 Rapid Antigen Result' . "\n" .
                                    'KLINIK PRATAMA CALEZZA' . "\n" .
                                    'NIK/Identification Number: ' . $antigen->fs_identitas . "\n" .
                                    'Nama/Name : ' . $antigen->fs_nm_pasien .  "\n" .
                                    'Umur/Age : ' . $umur . "\n" .
                                    'JK/Sex : ' . $sex  . "\n" .
                                    'Tipe Spesimen: ' . $antigen->fs_tipe_spesimen . "\n" .
                                    'No. Spesimen: ' . $antigen->fn_no_spesimen . "\n" .
                                    'Tgl. Pengambilan: ' . indo_date($antigen->fd_tgl_ambil) . "\n" .
                                    'Tgl. Diproses: ' . indo_date($antigen->fd_tgl_proses) . "\n" .
                                    'Tgl. Pelaporan: ' . indo_date($antigen->fd_tgl_lapor) . "\n" .
                                    'Waktu Pelaporan: ' . $antigen->fs_jam_lapor . "\n" .
                                    'Pemeriksa/Examiner: dr. Fitria Ayu Suprayitno' . "\n" .
                                    'Jenis Sampling/Examination: ' . $antigen->fs_nm_test . "\n" .
                                    'Hasil/Result: ' . $hasil_test . "\n"

                            );
                            $qrCode->writeFile('assets/qrcode/barcode-' . $antigen->fs_id_trs . '.png');
                            ?>
                            <img src=" <?= base_url('assets/qrcode/barcode-' . $antigen->fs_id_trs . '.png') ?>" style="width:300px">
                            <br>
                        </td>
                        <td style="width: 40%; text-align: center;">
                            Negara, <?= indo_date($antigen->fd_tgl_trs) ?><br>
                            <u>Dokter Pemeriksa</u><br>
                            <b><i>Examiner Doctor</i></b>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <u>(dr. Fitria Ayu Suprayitno)</u><br>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="d-print-none">
            <div class="float-right">
                <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light mr-1"><i class="fa fa-print"></i> Cetak</a>
                <a href="<?= site_url('laboratorium') ?>" class="btn btn-warning btn-flat">
                    <i class="fas fa-undo"></i> Kembali
                </a>
            </div>
        </div>
    </div>
    <div class="col-md-1"></div>
</div>