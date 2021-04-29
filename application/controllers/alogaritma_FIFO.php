<?php
// fifo.php

$conn = mysqli_connect('localhost', 'root', 'password', 'database') or die('Could not connect to mysql server.');

if (isset($_POST['submit'])) {

    $barang = $_POST['barang'];
    $qty    = $_POST['qty'];

    // Jumlahkan keseluruhan Stok barang yg terpilih
    $sql      = "SELECT SUM(stok) AS total FROM barang WHERE nama = '$barang'";
    $result   = mysqli_query($conn, $sql);
    $data     = mysqli_fetch_assoc($result);

    $stok_all = $data['total'];

    // Lihat Daftar Stok Barang yg terpilih urutkan berdasrkan tgl ASC (FIFO)
    // FIFO (V7 Full View Display hahaha \(0_0)/ kog malah promosi) fokus fokus ... (@-@) 

    $sql    = "SELECT * FROM barang WHERE nama = '$barang' AND stok > 0 ORDER by tgl ASC";
    $result = mysqli_query($conn, $sql);

    // ayo mulai mikir , siapkan logikanya yaaa....

    // bandingkan dulu boss qty yg dibeli dg stok brg digudang ...
    if ($qty <= $stok_all) {

        // Lakukan Perulangan pd setiap List Stok Barang
        // hasil ($result): 

        // nama     tgl          stok       step
        //----------------------------
        // beras    2018-02-01    30         1 (++)
        // beras    2018-02-03    50         2 
        // beras    2018-02-03    40         3 

        while ($row = mysqli_fetch_assoc($result)) {

            $tgl  = $row['tgl'];
            $stok = $row['stok'];

            // Selama Qty > 0 (belum habis) artinya => stok pd setiap list akan terus dieksekusi (dikurangi) 
            // logika nya gini :

            // --------loop 1--------
            // qty beli = 50 .... stok (1 feb) = 30 maka 
            // qty - stok => 50 - 30 = 20 (masih kurang maka ambil di stok tgl berikutnya ...)
            // artinya ekseskui lanjut ...

            // --------loop 2--------
            // qty beli = 20 .... stok (3 feb) = 50 maka
            // qty - stok => 20 - 50 = -30 (hasil -minus) artinya $qty > 0 == false ... (tidak terpenuhi)
            // maka pengurangan stok (update data) akan dijalankan sampai disini

            if ($qty > 0) {

                // buat var $temp sbg. pengurang
                $temp = $qty;

                //proses pengurangan
                $qty = $qty - $stok;

                // jika hasil pengurangan > 0 berarti stok pd list pertama kurang  .. jadi update stok jd 0.. 
                // contoh : qty = 50 , stok = 30 .....maka 50 - 30 = 20.. (20 > 0 =>true)
                // dan juga sebaliknya jika stok berikutnya cukup yawess.. $stok - $temp;

                if ($qty > 0) {
                    $stok_update = 0;
                } else {
                    $stok_update = $stok - $temp;
                }

                $sql = "UPDATE barang SET stok = $stok_update WHERE nama = '$barang' AND tgl = '$tgl'";
                echo "<br>$sql<br><br>";
                mysqli_query($conn, $sql);
            }
        }
    } else {

        echo "Stok Barang Tidak Cukup, Stok = $stok_all <br><br>";
    }
}

?>

<form action="" method="post">
    Barang : <input type="text" name="barang" value="beras">
    Keluar : <input type="text" name="qty" placeholder="qty"><br><br>
    <input type="submit" name="submit"><br>
</form>