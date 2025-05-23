<?php
// Ambil data pesanan + join dengan menu & transaksi, disortir dari terbaru
$menu = ambil_data("SELECT 
    pesanan.kode_pesanan, 
    transaksi.nama_pelanggan, 
    pesanan.qty, 
    menu.nama AS nama_menu 
FROM pesanan 
JOIN transaksi ON pesanan.kode_pesanan = transaksi.kode_pesanan 
JOIN menu ON pesanan.kode_menu = menu.kode_menu
ORDER BY transaksi.id_transaksi DESC"); // <-- sortir berdasarkan tanggal terbaru
?>
<table class="table table-bordered table-hover" style="margin-top: 100px;">
    <thead class="text-bg-success">
        <tr>
            <th>No</th>
            <th>Kode Pesanan</th>
            <th>Nama Pelanggan</th>
            <th>Nama Menu</th>
            <th>Qty</th>
        </tr>
    </thead>
    <tbody>
        <?php $i = 1; foreach ($menu as $m): ?>
            <tr style="background-color: white;">
                <td><?= $i++; ?></td>
                <td><?= htmlspecialchars($m["kode_pesanan"]); ?></td>
                <td><?= htmlspecialchars($m["nama_pelanggan"]); ?></td>
                <td><?= htmlspecialchars($m["nama_menu"]); ?></td>
                <td><?= htmlspecialchars($m["qty"]); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
