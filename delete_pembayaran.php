<?php

include './_includes/config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if (deleteDataPembayaran($id)) {
        // Jika penghapusan berhasil, lakukan tindakan sesuai kebutuhan (misalnya, redirect ke halaman lain)
        header('Location: pembayaran.php');
        exit;
    } else {
        // Jika penghapusan gagal, lakukan tindakan sesuai kebutuhan (misalnya, tampilkan pesan error)
        echo 'Gagal menghapus data pembayaran.';
    }
} else {
    // Jika parameter ID tidak ditemukan, lakukan tindakan sesuai kebutuhan (misalnya, tampilkan pesan error)
    echo 'ID tidak ditemukan.';
}
