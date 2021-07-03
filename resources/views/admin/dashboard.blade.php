@extends('admin.layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <div class="d-flex justify-content-between">
                                    <h3 class="card-title">Algorithm executions</h3>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="position-relative mb-4">
                                    <canvas id="visitors-chart" height="200"></canvas>
                                </div>

                                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Cette semaine
                  </span>

                                    <span>
                    <i class="fas fa-square text-gray"></i> la semaine dernière
                  </span>
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Lignes</h3>
                                <div class="card-tools">
                                    <a href="{{route('admin.lines.index')}}" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="card-body table-responsive p-0">
                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                    <tr>
                                        <th>Ligne</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($lines as $line)
                                        <tr>
                                            <td>{{$line->name}}</td>
                                            <td>
                                                {{$line->type_name}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin.lines.edit',$line->id)}}"
                                                   class="edit-btn text-muted" title="Edit"><i class="fas fa-edit"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>

                    <div class="col-12">
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">Tout les stations</h3>
                                <div id="map" style="width: 100%; height: 350px"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
@endsection
@push('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSLA_wFa72PZ-scFPliuZiXAhAF-VWw8A&callback=initMap&libraries=&v=weekly"
        async
    ></script>

    <script>
        /* global Chart:false */

        $(function () {
            'use strict'

            var ticksStyle = {
                fontColor: '#495057',
                fontStyle: 'bold'
            }

            var mode = 'index'
            var intersect = true


            var $visitorsChart = $('#visitors-chart')
            // eslint-disable-next-line no-unused-vars
            var visitorsChart = new Chart($visitorsChart, {
                data: {
                    labels: [
                        @for($i = 6 ; $i >= 0 ; $i--)
                            '{{$today->subDays($i)->format('d')}}',
                        @php
                        $today->addDays($i)
                        @endphp
                            @endfor
                    ],
                    datasets: [{
                        type: 'line',
                        data: [
                            @for($i = 7 ; $i < 14 ; $i++)
                            {{$dates[$i]}},
                            @endfor
                            ],
                        backgroundColor: 'transparent',
                        borderColor: '#007bff',
                        pointBorderColor: '#007bff',
                        pointBackgroundColor: '#007bff',
                        fill: false
                        // pointHoverBackgroundColor: '#007bff',
                        // pointHoverBorderColor    : '#007bff'
                    },
                        {
                            type: 'line',
                            data: [
                                @for($i = 0 ; $i < 7 ; $i++)
                                {{$dates[$i]}},
                                @endfor
                            ],
                            backgroundColor: 'tansparent',
                            borderColor: '#ced4da',
                            pointBorderColor: '#ced4da',
                            pointBackgroundColor: '#ced4da',
                            fill: false
                            // pointHoverBackgroundColor: '#ced4da',
                            // pointHoverBorderColor    : '#ced4da'
                        }]
                },
                options: {
                    maintainAspectRatio: false,
                    tooltips: {
                        mode: mode,
                        intersect: intersect
                    },
                    hover: {
                        mode: mode,
                        intersect: intersect
                    },
                    legend: {
                        display: false
                    },
                    scales: {
                        yAxes: [{
                            // display: false,
                            gridLines: {
                                display: true,
                                lineWidth: '4px',
                                color: 'rgba(0, 0, 0, .2)',
                                zeroLineColor: 'transparent'
                            },
                            ticks: $.extend({
                                beginAtZero: true,
                                suggestedMax: {{$dates->max() * 1.5}}
                            }, ticksStyle)
                        }],
                        xAxes: [{
                            display: true,
                            gridLines: {
                                display: false
                            },
                            ticks: ticksStyle
                        }]
                    }
                }
            })
        })
    </script>
    <script>
        window.onload = function () {
            initMap();
        };

        // Initialize and add the map
        function initMap() {
            // The location of Uluru
            const constantine = {lat: 36.306471, lng: 6.618513};
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 10,
                center: constantine,
            });
            // // The marker, positioned at Uluru
            // const marker = new google.maps.Marker({
            //     position: constantine,
            //     map: map,
            // });

            @foreach($nodes as $node)
                marker = new google.maps.Marker({
                position: {lat: {{$node->lat}}, lng: {{$node->lon}} },
                map: map,
            });
            msg = '{!! $node->name !!}'
            attachSecretMessage(marker, msg);
            @endforeach


            function attachSecretMessage(marker, secretMessage) {
                const infowindow = new google.maps.InfoWindow({
                    content: secretMessage,
                });
                marker.addListener("click", () => {
                    infowindow.open(marker.get("map"), marker);
                });
            }
        }
    </script>
@endpush
