<?php
require_once('Controllers/Pembina.php');
require_once('Controllers/Umkm.php');
require_once('Controllers/Kabkota.php');
require_once('Controllers/Provinsi.php');

$count = count($pembina->index());
$kabupaten = count($kabkota->index());
$provinsi = count($provinsi->index());
$modal = $umkm->modal();
$pemilik = count($umkm->pemilik());

function formatUang($angka) {
    if ($angka >= 1000000000) {
        return number_format($angka / 1000000000, 3, ',', '.') . " M"; // Miliar
    } elseif ($angka >= 1000000) {
        return number_format($angka / 1000000, 3, ',', '.') . " J"; // Juta
    } elseif ($angka >= 1000) {
        return number_format($angka / 1000, 3, ',', '.') . " K"; // Ribu
    } else {
        return number_format($angka, 3, ',', '.'); // Normal
    }
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- Box: Pembina -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box bg-primary shadow rounded">
                    <div class="inner">
                        <h3><?= $count ?></h3>
                        <p>Jumlah Pembina</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <a href="?url=pembina" class="small-box-footer text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Box: Bounce Rate -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box bg-success shadow rounded">
                    <div class="inner">
                        <h3><?= formatUang($modal) ?></h3>
                        <p>Modal</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <a href="?url=umkm" class="small-box-footer text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Box: Registrasi -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box bg-warning shadow rounded ">
                    <div class="inner">
                        <h3><?=$kabupaten?></h3>
                        <p>Kabupaten</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <a href="?url=kabkota" class="small-box-footer text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <!-- Box: Unique Visitors -->
            <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
                <div class="small-box bg-danger shadow rounded">
                    <div class="inner">
                        <h3><?=$provinsi?></h3>
                        <p>Provinsi</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-map-marked-alt"></i>
                    </div>
                    <a href="?url=provinsi" class="small-box-footer text-white">Lihat Detail <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 mb-4">
    <canvas id="bounceChart"></canvas>
<script>
var ctx = document.getElementById('bounceChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei'],
        datasets: [{
            label: 'Bounce Rate',
            data: [50, 45, 60, 55, 70],
            backgroundColor: 'rgba(75, 192, 192, 0.2)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
        }]
    }
});
</script>


</section>
