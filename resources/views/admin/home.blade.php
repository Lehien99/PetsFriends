@extends('admin.layout.index')

@section('content')

    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Charts</h1>
        <p class="mb-4">Chart.js is a third party plugin that is used to generate the charts in this theme.
            The charts below have been customized - for further customization options, please visit the <a target="_blank"
                href="https://www.chartjs.org/docs/latest/">official Chart.js
                documentation</a>.</p>

        <!-- Content Row -->
        <div class="row">

            <div class="col-xl-8 col-lg-7">

                <!-- Area Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myAreaChart"></canvas>
                        </div>
                        <hr>
                        Styling for the area chart can be found in the
                        <code>/js/demo/chart-area-demo.js</code> file.
                    </div>
                </div>

                <!-- Bar Chart -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Bar Chart</h6>
                    </div>
                    <div class="card-body">
                        <div class="chart-bar">
                            <canvas id="myBarChart"></canvas>
                            {{-- <input type="hidden" id="health" value="{{$health_count}}">
                        <input type="hidden" id="food" value="{{$food_count}}">
                        <input type="hidden" id="life" value=" {{$life_count}}">
                        <input type="hidden" id="sport" value="{{$sport_count}}"> --}}
                        </div>
                        <hr>
                        Styling for the bar chart can be found in the
                        <code>/js/demo/chart-bar-demo.js</code> file.
                    </div>
                </div>

            </div>

            <!-- Donut Chart -->
            <div class="col-xl-4 col-lg-5">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="chart-pie pt-4">
                            <canvas id="myPieChart"></canvas>
                        </div>
                        <hr>
                        Styling for the donut chart can be found in the
                        <code>/js/demo/chart-pie-demo.js</code> file.
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
@push('dashboard')
{{-- <script src="admin_asset/js/demo/chart-bar-demo.js"></script> --}}
    <script>
        var ctx = document.getElementById("myBarChart");
        var myBarChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Health", "food", "Life", "Sport"],
                datasets: [{
                    label: "Revenue",
                    backgroundColor: "#4e73df",
                    hoverBackgroundColor: "#2e59d9",
                    borderColor: "#4e73df",
                    data: [{{ $health_count }}, {{ $food_count }}, {{ $life_count }},
                        {{ $sport_count }}
                    ],
                }],
            },
            options: {
                maintainAspectRatio: false,
                layout: {
                    padding: {
                        left: 10,
                        right: 25,
                        top: 25,
                        bottom: 0
                    }
                },
                scales: {
                    xAxes: [{
                        time: {
                            unit: 'category'
                        },
                        gridLines: {
                            display: false,
                            drawBorder: false
                        },
                        ticks: {
                            maxTicksLimit: 6
                        },
                        maxBarThickness: 25,
                    }],
                    //   yAxes: [{
                    //     ticks: {
                    //       min: 0,
                    //       max: 15000,
                    //       maxTicksLimit: 5,
                    //       padding: 10,
                    //       // Include a dollar sign in the ticks
                    //       callback: function(value, index, values) {
                    //         return '$' + number_format(value);
                    //       }
                    //     },
                    //     gridLines: {
                    //       color: "rgb(234, 236, 244)",
                    //       zeroLineColor: "rgb(234, 236, 244)",
                    //       drawBorder: false,
                    //       borderDash: [2],
                    //       zeroLineBorderDash: [2]
                    //     }
                    //   }],
                },
                legend: {
                    display: false
                },
                tooltips: {
                    titleMarginBottom: 10,
                    titleFontColor: '#6e707e',
                    titleFontSize: 14,
                    backgroundColor: "rgb(255,255,255)",
                    bodyFontColor: "#858796",
                    borderColor: '#dddfeb',
                    borderWidth: 1,
                    xPadding: 15,
                    yPadding: 15,
                    displayColors: false,
                    caretPadding: 10,
                    callbacks: {
                        label: function(tooltipItem, chart) {
                            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
                            return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
                        }
                    }
                },
            }
        });
    </script>
@endpush
