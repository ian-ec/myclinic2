<?php
$no = 1;
if ($cart->num_rows() > 0) {
    foreach ($cart->result() as $c => $data) { ?>
        <tr>
            <td><?= $no++ ?>.</td>
            <td><?= $data->fs_nm_komponen ?></td>
            <td><?= indo_currency($data->fn_nilai) ?></td>
            <td>
                <button id="del_cart" data-cartid="<?= $data->fs_id_cart ?>" class="btn btn-sm btn-danger">
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

<tr>
    <td colspan="4" align="right">
        <span><b> Total :</b></span>
        <input type="hidden" id="fn_nilai_tarif" value="<?= $nilai->nilai_tarif ?>">
        <b><span id=""><?= indo_currency($nilai->nilai_tarif) ?></span></b>
    </td>
</tr>