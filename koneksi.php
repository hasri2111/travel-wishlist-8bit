<?php
$koneksi = new mysqli("localhost", "root", "", "travel_8bit");
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>
