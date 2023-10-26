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
<h1>Visualisasi Voting User</h1>
<canvas id="voteCount" width="1600" height="900"></canvas>
<h1>Visualisasi Suap & Gratifikasi</h1>
<canvas id="nominalSuapGratifikasi" width="1600" height="900"></canvas>
<h1>Visualisasi Korupsi</h1>
<canvas id="nominalKasusKorupsi" width="1600" height="900"></canvas>


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
            
            ////////////////////////////////////////////////////

            // Create a bar chart for voteCount
            var ctx = document.getElementById('voteCount').getContext('2d');
            var voteCount = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // x-axis: extracted text or full nama_partai
                    datasets: [{
                        label: 'Count',
                        data: count, // y-axis: count of id_partai
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
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
                    }
                }
            });

            /////////////////////////////////////////////////////////

            // Create a bar chart for nominalSuapGratifikasi
            var ctx = document.getElementById('nominalSuapGratifikasi').getContext('2d');
            var nominalSuapGratifikasi = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // x-axis: extracted text or full nama_partai
                    datasets: [{
                        label: 'Suap & Gratifikasi dalam Miliar Rupiah',
                        data: dataSuapGratifikasi, // y-axis: nominal_suap_gratifikasi from ProfilePartai model
                        backgroundColor: 'rgba(1, 1, 1, 0.5)',
                        borderColor: 'rgba(0, 0, 0, 1)',
                        borderWidth: 1
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
                    }
                }
            });

            

            ///////////////////////////////////////////////////////////////////////


            // Create a bar chart for nominalKasusKorupsi
            var ctx = document.getElementById('nominalKasusKorupsi').getContext('2d');
            var nominalKasusKorupsi = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels, // x-axis: extracted text or full nama_partai
                    datasets: [{
                        label: 'Korupsi dalam Miliar Rupiah',
                        data: dataKasusKorupsi, 
                        backgroundColor: 'rgba(255, 10, 60, 0.4)',
                        borderColor: 'rgba(255, 50, 50, 1)',
                        borderWidth: 1
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
                    }
                }
            });



            
        })
        .catch(function (error) {
            console.log(error);
        });
</script>
@endsection
