@extends('dashboard.layout.main')

@section('isiDashboard')
<main>
    <h1 class="poppins pt-3">Dashboard Admin</h1>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body-chart">
                        <!-- Transaksi -->
                        <h5 class="card-title poppins">Admin Harian Transaksi Preview Per Hari</h5>
                        <canvas id="chart" class="small-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body-chart">
                        <!-- Kolaborasi -->
                        <h5 class="card-title poppins">Admin Kolaborasi Pengajuan Preview Per Bulan</h5>
                        <canvas id="chart2" class="small-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body-chart">
                        <!-- Reservasi -->
                        <h5 class="card-title poppins">Admin Reservasi Tempat Preview Per Hari</h5>
                        <canvas id="chart3" class="small-chart"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body-chart poppins">
                        <h5 class="card-title">Admin Data Pelamar Preview Per Bulan</h5>
                        <canvas id="chart4" class="small-chart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        Chart.register(ChartDataLabels);
        const pbi59 = @json($pbi59s);
        const pbi60 = @json($pbi60s);
        const pbi61 = @json($pbi61s);
        const pbi62 = @json($pbi62s);

        // Function to create a chart
        const createChart = (ctx, labels, data, type) => {
            return new Chart(ctx, {
                type: type,
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.7)', 
                            'rgba(75, 192, 192, 0.7)', 
                            'rgba(255, 206, 86, 0.7)', 
                            'rgba(153, 102, 255, 0.7)', 
                            'rgba(54, 162, 235, 0.7)'
                        ],
                        hoverOffset: 4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        datalabels: {
                            color: '#ffffff'
                        }
                    }
                }
            });
        };

        // Creating the charts
        const ctx1 = document.getElementById('chart').getContext('2d');
        createChart(ctx1, pbi59.map(data => data.dayname), pbi59.map(data => data.count), 'doughnut');

        const ctx2 = document.getElementById('chart2').getContext('2d');
        createChart(ctx2, pbi60.map(data => data.month), pbi60.map(data => data.count), 'pie');

        const ctx3 = document.getElementById('chart3').getContext('2d');
        createChart(ctx3, pbi61.map(data => data.dayname), pbi61.map(data => data.count), 'pie');

        const ctx4 = document.getElementById('chart4').getContext('2d');
        createChart(ctx4, pbi62.map(data => data.month), pbi62.map(data => data.count), 'pie');
    });
</script>
@endsection
