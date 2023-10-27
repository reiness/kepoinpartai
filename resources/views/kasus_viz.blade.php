<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('images/icon.png') }}" type="image">
    <title>Visualisasi kasus</title>
    <style>
        .container-card {
            text-align: center;
            margin: 20px 0;
            margin-bottom: 30px;
            padding: 20px;
            border: 1px solid #5038bc;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(80, 56, 188, 0.3); /* Soft shadow */
        }
    </style>
    <title>Page Title</title>
</head>
<body>
    <!-- Your HTML content here -->

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kasus Viz') }}</div>
                    <div class="card-body">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container-card">
            <h1>Visualisasi Voting User</h1>
            <canvas id="voteCount" width="1600" height="900"></canvas>
        </div>
    </section>

    <section>
        <div class="container-card">
            <h1>Visualisasi Suap & Gratifikasi</h1>
            <canvas id="nominalSuapGratifikasi" width="1600" height="900"></canvas>
        </div>
    </section>

    <section>
        <div class="container-card">
            <h1>Visualisasi Korupsi</h1>
            <canvas id="nominalKasusKorupsi" width="1600" height="900"></canvas>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Fetch data from the server using Axios
        axios.get('{{ route('chart.data') }}')
            .then(function (response) {
                var data = response.data;

                var labels = data.map(function (item) {
                    var matches = item.nama_partai.match(/\(([^)]+)\)/);
                    return matches ? matches[1] : item.nama_partai;
                });

                var count = data.map(function (item) {
                    return item.count;
                });

                var dataSuapGratifikasi = data.map(function (dataPoint) {
                    return dataPoint.nominal_suap_gratifikasi; // Extract nominal_suap_gratifikasi
                });

                var dataKasusKorupsi = data.map(function (dataPoint) {
                    return dataPoint.nominal_kasus_korupsi; // Extract nominal_kasus_korupsi
                });

                // Create a bar chart for voteCount
                var ctx = document.getElementById('voteCount').getContext('2d');
                var voteCount = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels, // x-axis: extracted text or full nama_partai
                        datasets: [{
                            label: 'Count',
                            data: count, // y-axis: count of id_partai
                            backgroundColor: [
                                'rgba(80, 56, 188, 0.2)',
                                'rgba(80, 56, 188, 0.4)',
                                'rgba(80, 56, 188, 0.6)',
                                'rgba(80, 56, 188, 0.8)',
                                'rgba(80, 56, 188, 1)',
                            ],
                            borderColor: 'rgba(80, 56, 188, 1)',
                            borderWidth: 1,
                            borderRadius: 5, // Add this property for rounded bars
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                maxRotation: 0, // Prevent label rotation
                                minRotation: 0,
                                autoSkip: true, // Enable auto-skipping of labels
                                maxTicksLimit: 10, // Maximum number of labels to display without skipping
                            },
                            y: {
                                beginAtZero: true,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false, // Hide the legend
                            }
                        }
                    }
                });

                // Create a bar chart for nominalSuapGratifikasi
                var ctxSuapGratifikasi = document.getElementById('nominalSuapGratifikasi').getContext('2d');
                var nominalSuapGratifikasi = new Chart(ctxSuapGratifikasi, {
                    type: 'bar',
                    data: {
                        labels: labels, // x-axis: extracted text or full nama_partai
                        datasets: [{
                            label: 'Suap & Gratifikasi dalam Miliar Rupiah',
                            data: dataSuapGratifikasi, // y-axis: nominal_suap_gratifikasi from ProfilePartai model
                            backgroundColor: [
                                'rgba(0, 0, 0, 0.2)',
                                'rgba(0, 0, 0, 0.4)',
                                'rgba(0, 0, 0, 0.6)',
                                'rgba(0, 0, 0, 0.8)',
                                'rgba(0, 0, 0, 1)',

                            ],
                            borderColor: 'rgba(0, 0, 0, 1)',
                            borderWidth: 1,
                            borderRadius: 5 , // Add this property for rounded bars
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                maxRotation: 0, // Prevent label rotation
                                minRotation: 0,
                                autoSkip: true, // Enable auto-skipping of labels
                                maxTicksLimit: 5, // Maximum number of labels to display without skipping
                            },
                            y: {
                                beginAtZero: true,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false, // Hide the legend
                            }
                        }
                    }
                });

                // Create a bar chart for nominalKasusKorupsi
                var ctxKasusKorupsi = document.getElementById('nominalKasusKorupsi').getContext('2d');
                var nominalKasusKorupsi = new Chart(ctxKasusKorupsi, {
                    type: 'bar',
                    data: {
                        labels: labels, // x-axis: extracted text or full nama_partai
                        datasets: [{
                            label: 'Korupsi dalam Miliar Rupiah',
                            data: dataKasusKorupsi, 
                            backgroundColor: [
                                'rgba(128, 0, 0, 0.2)',
                                'rgba(128, 0, 0, 0.4)',
                                'rgba(128, 0, 0, 0.6)',
                                'rgba(128, 0, 0, 0.8)',
                                'rgba(128, 0, 0, 1)',


                            ],
                            borderColor: 'rgba(128, 0, 0, 1)',
                            borderWidth: 1,
                            borderRadius: 5, // Add this property for rounded bars
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                maxRotation: 0, // Prevent label rotation
                                minRotation: 0,
                                autoSkip: true, // Enable auto-skipping of labels
                                maxTicksLimit: 10, // Maximum number of labels to display without skipping
                            },
                            y: {
                                beginAtZero: true,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false, // Hide the legend
                            }
                        }
                    }
                });
            })
            .catch(function (error) {
                console.log(error);
            });
    </script>
    @endsection

</body>
</html>
