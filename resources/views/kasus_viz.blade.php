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

    @extends('layouts.app')

    @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Kasus Viz') }}</div>
                    <div class="card-body">
                        <!-- Your card body content here -->
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

    <section>
        <div class="container-card">
            <h1>Where do our voters come from?</h1>
            <label for="provinceDropdown">Select Province:</label>
            {{-- <select id="provinceDropdown" onchange="updateLocationVisualization()"> --}}
            <select id ='provinceDropdown'>
               
                <option value="All Provinces" selected>All Provinces</option>
                
            </select>
            <canvas id="locationChart" width="1600" height="900"></canvas>
        </div>
    </section>

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

                // LOCATION HERE
                // Fetch province data for the dropdown
                axios.get('{{ route('chart.location-data') }}')
                    .then(function (response) {
                        var provinces = response.data.map(function (item) {
                            return item.province;
                        });

                        // Remove duplicates
                        provinces = [...new Set(provinces)];
                        
                        // Find the index of the first province and replace it with 'All Provinces'
                        var firstProvinceIndex = provinces.findIndex(function(province) {
                            return province !== 'All Provinces';
                        });

                        if (firstProvinceIndex !== -1) {
                            provinces[firstProvinceIndex] = 'All Provinces';
                        }

                        console.log(provinces);

                        // Populate dropdown options
                        var dropdown = document.getElementById('provinceDropdown');
                        dropdown.innerHTML = ''; // Clear existing options
                        provinces.forEach(function (province) {
                            var option = document.createElement('option');
                            option.value = province;
                            option.text = province;
                            dropdown.add(option);
                        });
                    })
                    .catch(function (error) {
                        console.log(error);
                    });

            })
            .catch(function (error) {
                console.log(error);
            });

        // Function for updating location visualization
        var iter = 0;
        var locationChart;

        // Use a flag to ensure the block of code runs only once
        var codeExecuted = false;

        function updateLocationVisualization() {
            var selectedProvince = document.getElementById('provinceDropdown').value;
            // console.log(selectedProvince.type);

            axios.get('{{ route('chart.location-data') }}', {
                params: {
                    province: selectedProvince
                }
            })
            .then(function (response) {
                var locationData = response.data;

                var labels, count;
                // console.log(selectedProvince)
                if (selectedProvince === 'All Provinces' || selectedProvince === ' ') {
                    // If 'All Provinces' is selected, group counts by province
                    console.log('ALL PROVINCES SELECTED !!!')
                    var groupedData = {};
                    locationData.forEach(function (item) {
                        var key = item.province || 'Unknown';

                        if (!groupedData[key]) {
                            groupedData[key] = 0;
                        }
                        groupedData[key] += item.count;
                    });

                    labels = Object.keys(groupedData);
                    count = Object.values(groupedData);
                    console.log(selectedProvince);
                    console.log('debug1')
                } else if (selectedProvince !== 'All Provinces' && selectedProvince !== ' ') {
                    // If a specific province is selected, use cities as labels
                    // console.log('debug1')
                    labels = locationData.map(function (item) {
                        return item.city;
                    });
                    count = locationData.map(function (item) {
                        return item.count;
                    });
                }

                var ctxLocation = document.getElementById('locationChart').getContext('2d');

                // Destroy existing chart from the second time onward
                if (iter > 0 && codeExecuted) {
                    locationChart.destroy();
                }

                // Create a new chart instance
                locationChart = new Chart(ctxLocation, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'User Count',
                            data: count,
                            backgroundColor: [
                                'rgba(0, 123, 255, 0.2)',
                                'rgba(0, 123, 255, 0.4)',
                                'rgba(0, 123, 255, 0.6)',
                                'rgba(0, 123, 255, 0.8)',
                                'rgba(0, 123, 255, 1)',
                            ],
                            borderColor: 'rgba(0, 123, 255, 1)',
                            borderWidth: 1,
                            borderRadius: 5,
                        }]
                    },
                    options: {
                        scales: {
                            x: {
                                maxRotation: 0,
                                minRotation: 0,
                                autoSkip: true,
                                maxTicksLimit: 10,
                            },
                            y: {
                                beginAtZero: true,
                            }
                        },
                        plugins: {
                            legend: {
                                display: false,
                            }
                        }
                    }
                });

                iter += 1;
                codeExecuted = true;

            })
            .catch(function (error) {
                console.log(error);
            });
        }





        document.addEventListener("DOMContentLoaded", function () {
    // Add an event listener to the dropdown
    var provinceDropdown = document.getElementById('provinceDropdown');

    provinceDropdown.addEventListener('change', function () {
        // Call the function when the dropdown changes
        updateLocationVisualization();
    });

    // Call the function once the document is loaded
    updateLocationVisualization();

    // Check if the selected value is empty and set it to the default value if needed
    if (!provinceDropdown.value) {
        provinceDropdown.value = 'All Available Cities';
        // You may want to trigger the visualization update here if needed
        updateLocationVisualization();
    }
});

</script>
@endsection

</body>
</html>