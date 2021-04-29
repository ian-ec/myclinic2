<?php $no = 1;
if ($cart_racik->num_rows() > 0) {
    foreach ($cart_racik->result() as $rc => $racik) { ?>
        <tr>
            <td class="text-left"><?= $no++ ?>.</td>
            <td class="text-left"><?= $racik->fs_kd_barang ?></td>
            <td class="text-left"><?= $racik->fs_nm_barang ?></td>
            <td class="text-right"><?= $racik->harga_jual_racik ?></td>
            <td class="text-center"><?= $racik->fn_qty ?></td>
            <td class="text-right" id="total_racik"><?= $racik->fn_total ?></td>
            <td class="text-center" hidden id="total_beli_racik"><?= $racik->fn_qty * $racik->harga_beli_racik ?></td>
            <td class="text-center" widht="160px">
                <button id="del_cart_racik" data-cartidracik="<?= $racik->fs_id_cart_racik ?>" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i>
                </button>
            </td>
        </tr>
<?php
    }
} else {
    echo '<tr>
        <td colspan="9" class="text-center">Tidak ada item</td>
         </tr>';
} ?>