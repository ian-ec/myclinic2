<?php
$no = 1;
if ($cart_layanan->num_rows() > 0) {
    foreach ($cart_layanan->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->fs_kd_layanan ?></td>
            <td><?= $data->fs_nm_layanan ?></td>
            <td>
                <button id="del_cart_layanan" data-cartidly="<?= $data->fs_id_cart_layanan ?>" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
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