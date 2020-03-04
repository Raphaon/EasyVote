<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> {{ $title }}EasyVote</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="dashboard_base_url" content="{{ route('dashboard.index') }}">

    <link rel="apple-touch-icon" href="https://i.imgur.com/QRAUqs9.png">
    <link rel="shortcut icon" href="https://i.imgur.com/QRAUqs9.png">

    <link rel="stylesheet" href="{{ asset('manager/css/normalize.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/pe-icon-7-stroke.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/flag-icon.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/cs-skin-elastic.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/lib/datatable/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('manager/css/style.css') }}">
    <script type ="text/javascript" src="{{ asset('manager/js/html5shiv.min.js') }}"></script>
    <link href="{{ asset('manager/css/chartist.min.css') }}" rel="stylesheet">
    <link href="{{ asset('manager/css/jqvmap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('manager/css/weather-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('manager/css/fullcalendar.min.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('manager/css/lib/chosen/chosen.min.css') }}">

    <style type="text/css">
        #weatherWidget .currentDesc {
            color: #ffffff!important;
          }
          .traffic-chart {
            min-height: 335px;
          }
          #flotPie1  {
            height: 150px;
          }
          #flotPie1 td {
            padding:3px;
          }
          #flotPie1 table {
            top: 20px!important;
            right: -10px!important;
          }
          .chart-container {
            display: table;
            min-width: 270px ;
            text-align: left;
            padding-top: 10px;
            padding-bottom: 10px;
          }
          #flotLine5  {
            height: 105px;
          }

          #flotBarChart {
            height: 150px;
          }
          #cellPaiChart{
            height: 160px;
          }
          .action-buttons a {
            margin: 0 3px;
            display: inline-block;
            opacity: .85;
            -webkit-transition: all .1s;
            -o-transition: all .1s;
            transition: all .1s
          }

          .action-buttons a:hover {
            text-decoration: none;
            opacity: 1;
            -moz-transform: scale(1.2);
            -webkit-transform: scale(1.2);
            -o-transform: scale(1.2);
            -ms-transform: scale(1.2);
            transform: scale(1.2)
          }

          .align-center,
          .center {
            text-align: center !important
          }

          .green {
            color: #69AA46 !important
          }

          .bigger-140 {
            font-size: 140% !important
          }

          .ace-icon {
            text-align: center
          }

          tr.detail-row {
            display: none
          }

          tr.detail-row.open {
            display: block;
            display: table-row
          }

          tr.detail-row>td {
            background-color: #f1f6f8;
            border-top: 3px solid #d1e1ea !important
          }

          .table-detail {
            background-color: #fff;
            border: 1px solid #dcebf7;
            width: 100%;
            padding: 12px
          }

          .table-detail td>.profile-user-info {
            width: 100%
          }

          .table-detail td>.profile-user-info {
            width: 100%
          }

          .profile-user-info {
            display: table;
            width: 98%;
            width: calc(100% - 24px);
            margin: 0 auto
          }

          .profile-info-row {
            display: table-row
          }

          .profile-info-name,
          .profile-info-value {
            display: table-cell;
            border-top: 1px dotted #D5E4F1
          }

          .profile-info-name {
            text-align: right;
            padding: 6px 10px 6px 4px;
            font-weight: 400;
            color: #667E99;
            background-color: transparent;
            width: 110px;
            vertical-align: middle
          }

          .profile-info-value {
            padding: 6px 4px 6px 6px
          }

          .profile-info-value>span+span:before {
            display: inline;
            content: ",";
            margin-left: 1px;
            margin-right: 3px;
            color: #666;
            border-bottom: 1px solid #FFF
          }

          .profile-info-value>span+span.editable-container:before {
            display: none
          }

          .profile-info-row:first-child .profile-info-name,
          .profile-info-row:first-child .profile-info-value {
            border-top: none
          }

          .profile-user-info-striped {
            border: 1px solid #DCEBF7
          }

          .profile-user-info-striped .profile-info-name {
            color: #336199;
            background-color: #EDF3F4;
            border-top: 1px solid #F7FBFF
          }

          .profile-user-info-striped .profile-info-value {
            border-top: 1px dotted #DCEBF7;
            padding-left: 12px
          }
          .zoom {
            -webkit-transition: all 0.35s ease-in-out;
            -moz-transition: all 0.35s ease-in-out;
            transition: all 0.35s ease-in-out;
            cursor: -webkit-zoom-in;
            cursor: -moz-zoom-in;
            cursor: zoom-in;
          }

          .zoom:hover,
          .zoom:active,
          .zoom:focus {
        /**adjust scale to desired size, 
        add browser prefixes**/
        -ms-transform: scale(2.5);
        -moz-transform: scale(2.5);
        -webkit-transform: scale(2.5);
        -o-transform: scale(2.5);
        transform: scale(2.5);
        position: relative;
        z-index: 100;
        }
    </style>
</head>

<body class="">
    <!-- Left Panel -->
    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="menu-item-has-children dropdown mb-3">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('dashboard.isc_registrations') }}</a>
                        <ul class="sub-menu children dropdown-menu" style="padding: 0 !important;">
                            <li><a href="{{ route('dashboard.inscriptions.waiting') }}">{{ __('dashboard.isc_waiting') }} @if($nbr_insc_waiting > 0) <span class="count bg-danger">{{ $nbr_insc_waiting }}</span>@endif</a></li>

                            <li><a href="{{ route('dashboard.inscriptions.rejected') }}">{{ __('dashboard.isc_rejected') }} @if($nbr_insc_rejected > 0) <span class="count bg-danger">{{ $nbr_insc_rejected }}</span>@endif</a></li>
                            <li></i><a href="{{ route('dashboard.inscriptions.valide') }}">{{ __('dashboard.isc_validated') }} </a></li>
                        </ul>
                    </li>
                    <li class="mb-3"><a href="ui-cards.html">{{ __('dashboard.car_el_dispo') }}</a></li>
                    <li class="menu-item-has-children dropdown mb-3">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{{ __('dashboard.gest_admins') }}</a>
                        <ul class="sub-menu children dropdown-menu" style="padding: 0 !important;">
                            <li><a href="{{ route('dashboard.gestionnaires.new') }}">{{ __('dashboard.add_admin') }}</a></li>
                            <li><a href="{{ route('dashboard.gestionnaires.all') }}">{{ __('dashboard.all_admins') }}</a></li>
                        </ul>
                    </li>
                    <li class="mb-3"><a href="{{ route('dashboard.profile') }}">{{ __('dashboard.my_profile') }}</a></li>
                    <hr>
                    <li>
                      <a style="width: 8% !important;" href="@if($r_lang==='en') {{ route('lang',['lang'=>$r_lang]) }} @else {{ "#" }} @endif">EN</a> | <a style="width: 8% !important;" href="@if($r_lang==='fr') {{ route('lang',['lang'=>$r_lang]) }} @else {{ "#" }} @endif">FR</a>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </aside>
    <!-- /#left-panel -->
    <!-- Right Panel -->
    <div id="right-panel" class="right-panel">
        <!-- Header-->
        <header id="header" class="header">
            <div class="top-left">
                <div class="navbar-header">
                    <a class="navbar-brand" href="{{ route('dashboard.index') }}"><img src="{{ asset('manager/images/logo.png') }}" alt="Logo"></a>
                    <a class="navbar-brand hidden" href="{{ route('dashboard.index') }}"><img src="{{ asset('manager/images/logo2.png') }}" alt="Logo"></a>
                    <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
                </div>
            </div>
            <div class="top-right">
                <div class="header-menu">
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">3</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-check"></i>
                                    <p>Server #1 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-info"></i>
                                    <p>Server #2 overloaded.</p>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <i class="fa fa-warning"></i>
                                    <p>Server #3 overloaded.</p>
                                </a>
                            </div>
                        </div>

                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-envelope"></i>
                                <span class="count bg-primary">4</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="{{ asset('manager/images/avatar/1.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jonathan Smith</span>
                                        <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="{{ asset('manager/images/avatar/2.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Jack Sanders</span>
                                        <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="{{ asset('manager/images/avatar/3.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Cheryl Wheeler</span>
                                        <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                    </div>
                                </a>
                                <a class="dropdown-item media" href="#">
                                    <span class="photo media-left"><img alt="avatar" src="{{ asset('manager/images/avatar/4.jpg') }}"></span>
                                    <div class="message media-body">
                                        <span class="name float-left">Rachel Santos</span>
                                        <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="{{ $admin->profile }}" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                            <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                            <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                            <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fa fa-power -off"></i>Logout
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>
        <!-- /#header -->
        <!-- Content -->
        @yield('content')
        <div class="modal fade" id="staticModal" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <img src="" alt="" id="showImg">
                   </div>
                </div>
            </div>
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>
        <!-- Footer -->
        <footer class="site-footer">
            <div class="footer-inner bg-white">
                <div class="row">
                    <div class="col-sm-6">
                        Copyright &copy; {{ date('Y') }} EasyVote
                    </div>
                    <div class="col-sm-6 text-right">
                        {{-- Designed by <a href="https://colorlib.com">Colorlib</a> --}}
                    </div>
                </div>
            </div>
        </footer>
        <!-- /.site-footer -->
    </div>
    <!-- /#right-panel -->

    <!-- Scripts -->
    <script src="{{ asset('manager/js/jquery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('manager/js/popper.min.js') }}"></script>
    <script src="{{ asset('manager/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/js/jquery.matchHeight.min.js') }}"></script>
    <script src="{{ asset('manager/js/main.js') }}"></script>
    <!--  Chart js -->
    <script src="{{ asset('manager/js/Chart.bundle.min.js') }}"></script>
    <!--Chartist Chart-->
    <script src="{{ asset('manager/js/chartist.min.js') }}"></script>
    <script src="{{ asset('manager/js/chartist-plugin-legend.min.js') }}"></script>
    <script src="{{ asset('manager/js/jquery.flot.min.js') }}"></script>
    <script src="{{ asset('manager/js/jquery.flot.pie.min.js') }}"></script>
    <script src="{{ asset('manager/js/jquery.flot.spline.min.js') }}"></script>
    <script src="{{ asset('manager/js/jquery.simpleWeather.min.js') }}"></script>
    <script src="{{ asset('manager/js/init/weather-init.js') }}"></script>
    <script src="{{ asset('manager/js/moment.min.js') }}"></script>
    <script src="{{ asset('manager/js/fullcalendar.min.js') }}"></script>
    <script src="{{ asset('manager/js/init/fullcalendar-init.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/datatables.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/buttons.bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/jszip.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/vfs_fonts.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/buttons.print.min.js') }}"></script>
    <script src="{{ asset('manager/js/lib/data-table/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('manager/js/init/datatables-init.js') }}"></script>
    <script src="{{ asset('manager/js/lib/chosen/chosen.jquery.min.js') }}"></script>

    <script>
        jQuery(document).ready(function() {
            jQuery(".standardSelect").chosen({
                disable_search_threshold: 10,
                no_results_text: "Oops, nothing found!",
                width: "100%"
            });
        });
    </script>


    <script type="text/javascript">
        
        $(document).ready(function() {
          $('#bootstrap-data-table-export').DataTable();
      } );
    </script>

    <!--Local Stuff-->
    <script>
        jQuery(document).ready(function($) {
            "use strict";

            // Pie chart flotPie1
            var piedata = [
                { label: "Desktop visits", data: [[1,32]], color: '#5c6bc0'},
                { label: "Tab visits", data: [[1,33]], color: '#ef5350'},
                { label: "Mobile visits", data: [[1,35]], color: '#66bb6a'}
            ];

            $.plot('#flotPie1', piedata, {
                series: {
                    pie: {
                        show: true,
                        radius: 1,
                        innerRadius: 0.65,
                        label: {
                            show: true,
                            radius: 2/3,
                            threshold: 1
                        },
                        stroke: {
                            width: 0
                        }
                    }
                },
                grid: {
                    hoverable: true,
                    clickable: true
                }
            });
            // Pie chart flotPie1  End
            // cellPaiChart
            var cellPaiChart = [
                { label: "Direct Sell", data: [[1,65]], color: '#5b83de'},
                { label: "Channel Sell", data: [[1,35]], color: '#00bfa5'}
            ];
            $.plot('#cellPaiChart', cellPaiChart, {
                series: {
                    pie: {
                        show: true,
                        stroke: {
                            width: 0
                        }
                    }
                },
                legend: {
                    show: false
                },grid: {
                    hoverable: true,
                    clickable: true
                }

            });
            // cellPaiChart End
            // Line Chart  #flotLine5
            var newCust = [[0, 3], [1, 5], [2,4], [3, 7], [4, 9], [5, 3], [6, 6], [7, 4], [8, 10]];

            var plot = $.plot($('#flotLine5'),[{
                data: newCust,
                label: 'New Data Flow',
                color: '#fff'
            }],
            {
                series: {
                    lines: {
                        show: true,
                        lineColor: '#fff',
                        lineWidth: 2
                    },
                    points: {
                        show: true,
                        fill: true,
                        fillColor: "#ffffff",
                        symbol: "circle",
                        radius: 3
                    },
                    shadowSize: 0
                },
                points: {
                    show: true,
                },
                legend: {
                    show: false
                },
                grid: {
                    show: false
                }
            });
            // Line Chart  #flotLine5 End
            // Traffic Chart using chartist
            if ($('#traffic-chart').length) {
                var chart = new Chartist.Line('#traffic-chart', {
                  labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                  series: [
                  [0, 18000, 35000,  25000,  22000,  0],
                  [0, 33000, 15000,  20000,  15000,  300],
                  [0, 15000, 28000,  15000,  30000,  5000]
                  ]
              }, {
                  low: 0,
                  showArea: true,
                  showLine: false,
                  showPoint: false,
                  fullWidth: true,
                  axisX: {
                    showGrid: true
                }
            });

                chart.on('draw', function(data) {
                    if(data.type === 'line' || data.type === 'area') {
                        data.element.animate({
                            d: {
                                begin: 2000 * data.index,
                                dur: 2000,
                                from: data.path.clone().scale(1, 0).translate(0, data.chartRect.height()).stringify(),
                                to: data.path.clone().stringify(),
                                easing: Chartist.Svg.Easing.easeOutQuint
                            }
                        });
                    }
                });
            }
            // Traffic Chart using chartist End
            //Traffic chart chart-js
            if ($('#TrafficChart').length) {
                var ctx = document.getElementById( "TrafficChart" );
                ctx.height = 150;
                var myChart = new Chart( ctx, {
                    type: 'line',
                    data: {
                        labels: [ "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul" ],
                        datasets: [
                        {
                            label: "Visit",
                            borderColor: "rgba(4, 73, 203,.09)",
                            borderWidth: "1",
                            backgroundColor: "rgba(4, 73, 203,.5)",
                            data: [ 0, 2900, 5000, 3300, 6000, 3250, 0 ]
                        },
                        {
                            label: "Bounce",
                            borderColor: "rgba(245, 23, 66, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(245, 23, 66,.5)",
                            pointHighlightStroke: "rgba(245, 23, 66,.5)",
                            data: [ 0, 4200, 4500, 1600, 4200, 1500, 4000 ]
                        },
                        {
                            label: "Targeted",
                            borderColor: "rgba(40, 169, 46, 0.9)",
                            borderWidth: "1",
                            backgroundColor: "rgba(40, 169, 46, .5)",
                            pointHighlightStroke: "rgba(40, 169, 46,.5)",
                            data: [1000, 5200, 3600, 2600, 4200, 5300, 0 ]
                        }
                        ]
                    },
                    options: {
                        responsive: true,
                        tooltips: {
                            mode: 'index',
                            intersect: false
                        },
                        hover: {
                            mode: 'nearest',
                            intersect: true
                        }

                    }
                } );
            }
            //Traffic chart chart-js  End
            // Bar Chart #flotBarChart
            $.plot("#flotBarChart", [{
                data: [[0, 18], [2, 8], [4, 5], [6, 13],[8,5], [10,7],[12,4], [14,6],[16,15], [18, 9],[20,17], [22,7],[24,4], [26,9],[28,11]],
                bars: {
                    show: true,
                    lineWidth: 0,
                    fillColor: '#ffffff8a'
                }
            }], {
                grid: {
                    show: false
                }
            });
            // Bar Chart #flotBarChart End
        });

    $('.monForm').submit(function(e){
        e.preventDefault();
        var form_data = new FormData($(this)[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: $(this).attr('action'),
            type: 'post' ,
            data: form_data,
            dataType: 'json',
            cache: false,
            processData: false,
            contentType: false,
            success: function(response) {
                if(response.status){
                    $('#oper').html('<small class=" text-'+response.status+'">'+response.mesg+'</small>');
                    $('#oper').fadeIn().delay(2000).fadeOut();
                    var trObj = $(this).closest("tr");
                    trObj.find(".remo").css('display', 'none');

                    // Petite fonction pour mettre une pause
                    function sleep (time) {
                        return new Promise((resolve) => setTimeout(resolve, time));
                    }

                    // J'appelle la fonction et je recharge la page après la pause
                    sleep(5000).then(() => {
                        window.location.reload(); // Je recharge la page actuelle
                    });
                }else{
                    $('#oper').html('<small class=" text-danger">'+response.mesg+'</small>');
                    $('#oper').fadeIn().delay(2000).fadeOut();

                    $('#alert').attr('class', 'alert '+response.type);
                    $('#alert').html(response.mesg);
                    $(this)[0].reset();
                }
            }
        });
    });

    $('.reseau').submit(function(e){

        e.preventDefault();
        var fa = $(this);
        $(this).find('#rep2').html('<span class="text-info">...</span>');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: fa.attr('action'),
            type: 'post' ,
            data: fa.serialize(),
            dataType: 'json',
            success: function(response) {
                if(response.success == true) {
                    fa.find('#rep2').html("<i class='fa fa-check text-success'></i>");
                    fa.find('#rep2').fadeIn().delay(2000).fadeOut();
                } else {
                    fa.find('#rep2').html("<i class='fa fa-times text-danger'></i>");
                }
            }
        });

    });

    $('.status').on('change', function () {
        var trObj = $(this).closest("tr");
        var ni=0;
        var trid=$(this).closest("tr").attr('id');
        var trcl=$('.'+trid)
        trcl.find('form input[type="radio"]').each(function(){
           if ($(this).prop('checked')==true){ 
                ni++;  
            } 
        });        

        if(ni>0){
            trObj.find(".remo").css('display', '');
            trObj.find("#oper").html('')
        }else{
            trObj.find("#oper").html('<span class="text-info">check if the documents are correct</span>');
        }
    });

    $(".showImgModal").on('click', function(){
        var image = $(this).attr("data-image");
        $("#showImg").attr('src', image);
    });


    $("#order_by").on('change', function(){
        var ord_by_type = $(this).val(); // Nom du champ qui permettra d'ordonner les dossiers
        if(ord_by_type != "" && ['nom','date_inscription'].includes(ord_by_type)){ // du genre inArray. Le tri ne s'effectue que pour le nom et date_inscription
            $("#orderByForm").submit();
        }
    });

    $(document).on('change', '#filter_by1', function(){ // on récupère le type de filtrage et on charge le <select> suivant
        var filter_type = $(this).val();
        var dashboard_base_url = $('meta[name="dashboard_base_url"]').attr('content'); // on récupère le base_url du dashboard
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: dashboard_base_url+"/load_values",
            type: 'post' ,
            data: "filter_type="+filter_type,
            dataType: 'json',
            success: function(response) {
                if(response.statut) {
                    $(".pourquoi").removeClass('d-none');

                    var dom = "<select name='value_filter' id='value_filter' required='' class='standardSelect2'><option value=''>Choisir la valeur de filtre</option>";

                    // insertion des valeurs du select
                    for (var i = 0; i < response.values.length; i++) {
                        dom += "<option value='"+response.values[i].id+"'>"+response.values[i].nom+"</option>";
                    }
                    dom += "</select>";

                    $(".pourquoi").html(dom);

                    jQuery(".standardSelect2").chosen({
                        disable_search_threshold: 10,
                        no_results_text: "Oops, nothing found!",
                        width: "100%"
                    });
                }
            }
        });
    });

    // ici
    $(document).on('change', '#value_filter', function(){
        // On récupère les 2 valeurs, on s'assure que nobody is null et on balance le form
        var type_filter = $("#filter_by1").val();
        var value_filter = $("#value_filter").val();

        console.log(type_filter);
        console.log(value_filter);

        // On envoie le fomr ssi les 2 var sont non nulles
        if(type_filter != "" && value_filter != ""){
            $("#filterByForm").submit();
        }
    });

    // Sauvegarder les images et afficher un aperçu

    $(document).on('change', "#featured_recto,#featured_verso", function(){
      var params = new FormData();
      var clickedEl = $(this).attr('id');
      var fileField = document.querySelector("#"+clickedEl);

      params.append('img', fileField.files[0]);
      event.preventDefault();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
      $.ajax({
        url: "{{ asset('dashboard/load-image') }}",
        method:'POST',
        type: 'POST',
        data: params,
        dataType : 'JSON',
        contentType: false,
        processData: false,
        success: function(response) {

          if(clickedEl == 'featured_recto'){
            var searchedClass = "view_r";
          }else if(clickedEl == 'featured_verso'){
            var searchedClass = "view_v";
          }

          var imglinkresponse = document.querySelector('.'+searchedClass);
          var content = "<img src='"+response.image+"' alt=''>";
          imglinkresponse.innerHTML = content;
        }
      });
    });
    </script>
</body>
</html>