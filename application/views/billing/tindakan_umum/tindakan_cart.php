<?php
$no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->fs_kd_tarif ?></td>
            <td><?= $data->fs_nm_tarif ?></td>
            <td><?= $data->fn_qty ?></td>
            <td><?= $data->fn_nilai_tarif ?></td>
            <td><?= $data->fn_diskon ?></td>
            <td id="total_tarif"><?= $data->fn_total ?></td>
            <td align="center">
                <a data-toggle="tooltip" data-placement="top" title="Edit">
                    <button id="update_cart" data-toggle="modal" data-target="#modal-update_cart" data-id_tindakan="<?= $data->fs_id_tindakan_cart ?>" data-kd_tarif="<?= $data->fs_kd_tarif ?>" data-id_tarif="<?= $data->fs_id_tarif ?>" data-nm_tarif="<?= $data->fs_nm_tarif ?>" data-nilai="<?= $data->fn_nilai_tarif ?>" data-qty="<?= $data->fn_qty ?>" data-diskon="<?= $data->fn_diskon ?>" data-total="<?= $data->fn_total ?>" class="btn btn-sm btn-warning">
                        <i class="fas fa-pen"></i>
                    </button>
                </a>
                <button id="del_cart" data-cartid="<?= $data->fs_id_tindakan_cart ?>" data-fs_id_tindakan="<?= $data->fs_id_tindakan ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="top" title="Delete">
                    <i class="fas fa-trash"></i>
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
                <td colspan="8" class="text-center">Tidak ada data</td>
          </tr>';
} ?>