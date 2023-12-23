<x-app-layout title="Dashboard">
    <h5>Dashboard</h5>
    <div class="row">
        <div class="col-xxl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body text-center">
                    <div class="d-flex mb-1">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/dxjqoygy.json" trigger="loop"
                                style="width:60px;height:60px">
                            </lord-icon>
                        </div>

                    </div>
                    <h3 class="mb-2"><span class="counter-value" data-target="">{{ $total_user }}</span><small
                            class="text-muted fs-13"></small></h3>
                    <h6 class="text-muted mb-0">Total User </h6>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <div class="col-xxl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body text-center">
                    <div class="d-flex mb-1">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop"
                                style="width:60px;height:60px">
                            </lord-icon>
                        </div>

                    </div>
                    <h3 class="mb-2"><span class="counter-value" data-target="">{{ $total_pemesanans }}</span><small
                            class="text-muted fs-13"></small></h3>
                    <h6 class="text-muted mb-0">Total Order (Pending)</h6>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->

        <!--end col-->
        <div class="col-xxl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body text-center">
                    <div class="d-flex mb-1">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop"
                                style="width:60px;height:60px">
                            </lord-icon>
                        </div>

                    </div>
                    <h3 class="mb-2"><span class="counter-value" data-target="">{{ $total_pemandians }}</span><small
                            class="text-muted fs-13"></small></h3>
                    <h6 class="text-muted mb-0">Total Booking (Pending)</h6>
                </div>
            </div>
            <!--end card-->
        </div>
        <!--end col-->
        <!--end col-->
        <div class="col-xxl-6 col-md-6">
            <div class="card card-animate">
                <div class="card-body text-center">
                    <div class="d-flex mb-1">
                        <div class="flex-grow-1">
                            <lord-icon src="https://cdn.lordicon.com/nocovwne.json" trigger="loop"
                                style="width:60px;height:60px">
                            </lord-icon>
                        </div>

                    </div>
                    <h3 class="mb-2"><span class="counter-value" data-target="">{{ $total_penginapans }}</span><small
                            class="text-muted fs-13"></small></h3>
                    <h6 class="text-muted mb-0">Total Pemesanan (Pending)</h6>
                </div>
            </div>
            <!--end card-->
        </div>

        {{-- <div class="row">
            <div class="col-xl-12 col-md-6">
                <div class="card">
                    <div class="card-header align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">KaruniaSipoholon</h4>
                        <div class="flex-shrink-0">
                            <div class="dropdown card-header-dropdown">
                                <a class="text-reset dropdown-btn" href="#" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <span class="fw-semibold text-uppercase fs-12">Sort by: </span><span
                                        class="text-muted">Nov 2021<i class="mdi mdi-chevron-down ms-1"></i></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="#">Oct 2021</a>
                                    <a class="dropdown-item" href="#">Nov 2021</a>
                                    <a class="dropdown-item" href="#">Dec 2021</a>
                                    <a class="dropdown-item" href="#">Jan 2022</a>
                                </div>
                            </div>
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body pb-0">
                        <div id="sales-forecast-chart" data-colors='["--vz-primary", "--vz-info", "--vz-warning"]'
                            class="apex-charts" dir="ltr"></div>
                    </div>
                </div><!-- end card -->
            </div><!-- end col -->

        </div><!-- end row --> --}}

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header border-0 align-items-center d-flex">
                        <h4 class="card-title mb-0 flex-grow-1">KaruniaSipoholon</h4>
                    </div><!-- end card header -->

                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="9851">{{ $yearpemesanan }}</span></h5>
                                    <p class="text-muted mb-0">Restaurant</p>
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="228.89">{{ $yeartotalpemesanan }}</span></h5>
                                    <p class="text-muted mb-0">Total Per Tahun</p>
                                </div>
                            </div>
                            <!--end col-->
                            {{-- <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value"
                                            data-target="10589"></span>Rp.</h5>
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <!--end col--> --}}
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="mychart"></div>
                        </div>
                    </div><!-- end card body -->
                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="9851">{{ $yearpenginapan }}</span></h5>
                                    <p class="text-muted mb-0">Hotel</p>
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="228.89">{{ $yeartotalpenginapan }}</span></h5>
                                    <p class="text-muted mb-0">Total Per Tahun</p>
                                </div>
                            </div>
                            <!--end col-->
                            {{-- <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value"
                                            data-target="10589"></span>Rp.</h5>
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <!--end col--> --}}
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="mychart1"></div>
                        </div>
                    </div><!-- end card body -->
                    <div class="card-header p-0 border-0 bg-soft-light">
                        <div class="row g-0 text-center">
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="9851">{{ $yearpemandian }}</span></h5>
                                    <p class="text-muted mb-0">Pemandian</p>
                                </div>
                            </div>
                            <!--end col-->
                            <!--end col-->
                            <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0">
                                    <h5 class="mb-1">Rp.<span class="counter-value"
                                            data-target="228.89">{{ $yeartotalpemandian }}</span></h5>
                                    <p class="text-muted mb-0">Total PerTahun</p>
                                </div>
                            </div>
                            <!--end col-->
                            {{-- <div class="col-6 col-sm-3">
                                <div class="p-3 border border-dashed border-start-0 border-end-0">
                                    <h5 class="mb-1 text-success"><span class="counter-value"
                                            data-target="10589"></span>Rp.</h5>
                                    <p class="text-muted mb-0"></p>
                                </div>
                            </div>
                            <!--end col--> --}}
                        </div>
                    </div><!-- end card header -->
                    <div class="card-body p-0 pb-2">
                        <div>
                            <div id="mychart2"></div>
                        </div>
                    </div><!-- end card body -->
                    {{-- <div class="card-body p-0 pb-2">
                        <div>
                            <div id="pie"></div>
                        </div>
                    </div><!-- end card body --> --}}

                </div><!-- end card -->
            </div><!-- end col -->
        </div><!-- end row -->

        <!--end row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="card" id="invoiceList">
                    <div class="card-header border-0">
                        <div class="card-body">
                            <div>
                                <div class="table-responsive text-center container">
                                    <lord-icon src="https://cdn.lordicon.com/eszyyflr.json" trigger="loop"
                                        style="width:130px;height:130px">
                                    </lord-icon>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center">
                            <h2 class="mb-0 flex-grow-1 text-center">Welcome Back {{ Auth::user()->fullname }}!</h2>
                        </div><br>
                        <div class="d-flex align-items-center justify-content-center pb-5">
                            <h4 class="mb-0 flex-grow-1 text-center">KaruniaSipoholon</h4>
                        </div>
                    </div>

                </div>

            </div>
            <!--end col-->
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://code.highcharts.com/highcharts.js"></script>
        <script>
            Highcharts.chart('mychart', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'Monthly Average '
                },
                subtitle: {
                    text: 'Karunia Sipoholon'
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Rainfall (mm)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Restaurant',
                    data: [{{ $januarySum }}, {{ $februarySum }}, {{ $marchSum }},
                        {{ $aprSum }},
                        {{ $maySum }}, {{ $juneSum }}, {{ $julySum }},
                        {{ $augustSum }}, {{ $sepSum }},
                        {{ $octSum }}, {{ $novSum }}, {{ $decSum }}
                    ]
                }]
            });
        </script>
        <script>
            Highcharts.chart('mychart1', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'Monthly Average '
                },
                subtitle: {
                    text: 'Karunia Sipoholon'
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Rainfall (mm)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Hotel',
                    data: [{{ $januariSum }}, {{ $februariSum }}, {{ $maretSum }},
                        {{ $aprilSum }},
                        {{ $meiSum }}, {{ $juniSum }}, {{ $juliSum }},
                        {{ $agustusSum }}, {{ $septemberSum }},
                        {{ $oktoberSum }}, {{ $novemberSum }}, {{ $desemberSum }}
                    ]
                }]
            });
        </script>
        <script>
            Highcharts.chart('mychart2', {
                chart: {
                    type: 'column',
                },
                title: {
                    text: 'Monthly Average '
                },
                subtitle: {
                    text: 'Karunia Sipoholon'
                },
                xAxis: {
                    categories: [
                        'Jan',
                        'Feb',
                        'Mar',
                        'Apr',
                        'May',
                        'Jun',
                        'Jul',
                        'Aug',
                        'Sep',
                        'Oct',
                        'Nov',
                        'Dec'
                    ],
                    crosshair: true
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Rainfall (mm)'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.2,
                        borderWidth: 0
                    }
                },
                series: [{
                    name: 'Pemandian',
                    data: [{{ $januaryeSum }}, {{ $februaryeSum }}, {{ $marcheSum }},
                        {{ $aprieSum }},
                        {{ $mayeSum }}, {{ $junieSum }}, {{ $julyeSum }},
                        {{ $augusteSum }}, {{ $septembereSum }},
                        {{ $octobereSum }}, {{ $novembereSum }}, {{ $desembereSum }}
                    ]
                }]
            });
        </script>
        {{-- <script>
            // Data retrieved from https://netmarketshare.com/
            // Make monochrome colors

            // Build the chart
            // Data retrieved from https://netmarketshare.com/
            // Build the chart
            Highcharts.chart('pie', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Karunia Sipoholon',
                    align: 'left'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.0f}</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: false
                        },
                        showInLegend: true
                    }
                },
                series: [{
                    name: 'Brands',
                    colorByPoint: true,
                    data: [{
                        name: 'TotalPengunjung',
                        y: 74,
                        sliced: true,
                        selected: true
                    }, {
                        name: 'ToalPendapatan',
                        y: 12
                    }, ]
                }]
            });
        </script> --}}
</x-app-layout>
