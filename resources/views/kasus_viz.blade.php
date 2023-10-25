@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Kasus Viz') }}</div>

                <div class="card-body">
                    <h1>Visualisasi</h1>
                    <canvas id="myChart" width="800" height="400"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Fetch data from the server using Axios
    axios.get('{{ route('chart.data') }}')
        .then(function (response) {
            var data = response.data;

            var idPartai = data.map(function(item) {
                return item.id_partai;
            });
            var count = data.map(function(item) {
                return item.count;
            });

            // Create a bar chart
            var ctx = document.getElementById('myChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: idPartai, // x-axis: id_partai
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
