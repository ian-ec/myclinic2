<?php
$no = 1;
if ($cart_layanan->num_rows() > 0) {
    foreach ($cart_layanan->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->fs_kd_layanan ?></td>
            <td><?= $data->fs_nm_layanan ?></td>
            <td>
                <button id="del_layanan" data-idly="<?= $data->fs_id_tarif_layanan ?>" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
                    <td colspan="4" class="text-center">Tidak ada data</td>
                    </tr>';
} ?>