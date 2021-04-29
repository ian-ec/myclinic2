<?php $no = 1;
foreach ($cart->result() as $c => $data) { ?>
    <tr>
        <td class="text-left"><?= $no++ ?>.</td>
        <td class="text-left"><?= $data->fs_kd_barang ?></td>
        <td class="text-left"><?= $data->fs_nm_barang ?></td>
        <td class="text-left"><?= $data->id_etiket == 0 ? 'Tidak ada' : 'Ada' ?></td>
        <td class="text-right"><?= $data->harga_jual ?></td>
        <td class="text-center"><?= $data->fn_qty ?></td>
        <td class="text-right"><?= $data->fn_diskon ?></td>
        <td class="text-right" id="total"><?= $data->fn_total ?></td>
        <td class="text-center" hidden id="total_beli"><?= $data->fn_qty * $data->fn_harga_beli ?></td>
        <td class="text-center" widht="160px">
            <button id="update_cart" data-toggle="modal" data-target="#modal-barang-edit" data-cartnmetiket="<?= $data->fs_nm_etiket ?>" data-cartidetiket="<?= $data->fs_id_etiket ?>" data-cartidbarang="<?= $data->fs_id_barang ?>" data-cartkode="<?= $data->fs_kd_barang ?>" data-cartbarcode="<?= $data->fs_kd_barcode ?>" data-cartnama="<?= $data->fs_nm_barang ?>" data-cartharga="<?= $data->harga_jual ?>" data-cartqty="<?= $data->fn_qty ?>" data-cartdiskon="<?= $data->fn_diskon ?>" data-carttotal="<?= $data->fn_total ?>" class="btn btn-sm btn-primary">
                <i class="fas fa-pen"></i>
            </button>
            <button id="del_cart" data-cartid="<?= $data->fs_id_cart_penjualan ?>" class="btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
<?php
}
?>

<?php foreach ($racik->result() as $r => $rck) { ?>
    <tr>
        <td class="text-left"><?= $no++ ?>.</td>
        <td class="text-left"><?= $rck->fs_kd_racik ?></td>
        <td class="text-left">
            <?= $rck->fs_nm_racik ?><br>
            <?php
            $id = $rck->fs_id_racik;
            $detail_racik = $this->penjualan_m->get_cart_racik_detail($id)->result();
            foreach ($detail_racik as $dr => $d) { ?>
                - <?= $d->fs_nm_barang ?> x <?= $d->fn_qty ?> <br>
            <?php }
            ?>
        </td>
        <td class="text-left"><?= $rck->fs_id_etiket == 0 ? 'Tidak ada' : 'Ada' ?></td>
        <td class="text-right">0</td>
        <td class="text-center"><?= $rck->fn_qty_racik ?></td>
        <td class="text-right">0</td>
        <td class="text-right" id="total"><?= $rck->fn_nilai_jual_racik ?></td>
        <td class="text-center" hidden id="total_beli"><?= $rck->fn_nilai_beli_racik ?></td>
        <td class="text-center" widht="160px">
            <button id="detail_racik" data-toggle="modal" data-target="#modal-racik-detail" data-id_racik_detail="<?= $rck->fs_id_racik ?>" data-fs_kd_racik_detail="<?= $rck->fs_kd_racik ?>" data-fs_nm_racik_detail="<?= $rck->fs_nm_racik ?>" data-fs_nm_satuan_detail="<?= $rck->fs_nm_satuan ?>" data-fs_nm_etiket_detail="<?= $rck->fs_nm_etiket ?>" data-fn_qty_racik_detail="<?= $rck->fn_qty_racik ?>" data-fn_nilai_jual_racik_detail="<?= $rck->fn_nilai_jual_racik ?>" class="btn btn-sm btn-info">
                <i class="fa fa-eye"></i>
            </button>
            <button id="del_racik" data-id_racik="<?= $rck->fs_id_racik ?>" class=" btn btn-sm btn-danger">
                <i class="fa fa-trash"></i>
            </button>
        </td>
    </tr>
<?php } ?>