<?php $no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td class="text-left"><?= $no++ ?>.</td>
            <td class="text-left"><?= $data->fs_kd_barang ?></td>
            <td class="text-left"><?= $data->fs_nm_barang ?></td>
            <td class="text-center"><?= $data->harga_beli ?></td>
            <td class="text-center"><?= $data->fn_stok ?></td>
            <td class="text-center"><?= $data->fn_qty ?></td>
            <td class="text-center"><?= $data->fn_stok_akhir ?></td>
            <td class="text-center" id="total"><?= $data->fn_total ?></td>
            <td class="text-center" widht="160px">
                <button id="update_cart" data-toggle="modal" data-target="#modal-barang-edit" data-cartidbarang="<?= $data->id_barang ?>" data-cartkode="<?= $data->fs_kd_barang ?>" data-cartnama="<?= $data->fs_nm_barang ?>" data-cartharga="<?= $data->harga_beli ?>" data-cartstok="<?= $data->fn_stok ?>" data-cartqty="<?= $data->fn_qty ?>" data-cartstokakhir="<?= $data->fn_stok_akhir ?>" data-carttotal="<?= $data->fn_total ?>" class="btn btn-sm btn-primary">
                    <i class="fas fa-pen"></i>
                </button>
                <button id="del_cart" data-cartid="<?= $data->fs_id_cart_adjustment ?>" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i>
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