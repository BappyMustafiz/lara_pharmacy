<!DOCTYPE html>
<html lang="en">

<head>
    <title>Welcome to admin - Pharmacy Management System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="Phoenixcoded">
    <meta name="keywords" content=", Flat ui, Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="Phoenixcoded">
    <!-- Favicon icon -->
    <link rel="icon" href="{{asset('images/backend_images/favicon.ico')}}" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/bootstrap.min.css')}}">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/themify-icons/themify-icons.css')}}">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/icofont/css/icofont.css')}}">
    <!-- Menu-Search css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/component.css')}}">
    <!-- Horizontal-Timeline css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/dstyle.css')}}">
    <!-- amchart css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/amchart.css')}}">
    <!-- Select 2 css -->
    <link rel="stylesheet" href="{{asset('css/backend_css/select2/dist/css/select2.min.css')}}" />
     <!-- Date-Dropper css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/datedropper/datedropper.min.css')}}" />
    <!-- jquery ui css -->
    <link rel="stylesheet" type="text/css" href="{{asset('js/backend_js/jquery-ui/themes/base/jquery-ui.min.css')}}" />
    <!-- flag icon framework css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/flag-icon/flag-icon.min.css')}}">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/style.css')}}">
    <!-- Data Table Css -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/data-table/css/buttons.dataTables.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/backend_css/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" />
    <script type="text/javascript" src="{{asset('js/backend_js/jquery/dist/jquery.min.js')}}"></script>
    <style>
        .active-class{
            color: #e74c3c !important;
        }
        #medicineList.active {
            background: #fff;
            width: 100%;
            padding: 0 7px;
            max-height: 350px;
            overflow-y: scroll;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.11);
        }
        .list:not(:last-child) {
            border-bottom: 1px solid #eee;
        }

        .list {
            display: block;
            width: 100%;
            text-decoration: none;
            color: #333;
            padding: 10px 5px;
            font-weight: 600;
        }

        .list:hover {
            color: #1abc9c;
        }
    </style>
</head>

<body class="menu-static">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div></div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- Menu header start -->
    @include('layouts.adminLayout.admin_header')
    <!-- Menu header end -->
    <!-- Menu aside start -->
    @include('layouts.adminLayout.admin_sidebar')
    <!-- Menu aside end -->
    <!-- Main-body start-->
    @yield('content')
    <!-- Main-body end-->

    <!-- modal start-->
    @include('admin.customer._modal')
    <!-- modal end-->
    <!-- Required Jqurey -->
   
    <script type="text/javascript" src="{{asset('js/backend_js/tether/dist/js/tether.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/bootstrap/dist/js/bootstrap.min.js')}}"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="{{asset('js/backend_js/jquery-slimscroll/jquery.slimscroll.js')}}"></script>
    <!-- modernizr js -->
    <script type="text/javascript" src="{{asset('js/backend_js/modernizr/modernizr.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/modernizr/feature-detects/css-scrollbars.js')}}"></script>
    <!-- classie js -->
    <script type="text/javascript" src="{{asset('js/backend_js/classie/classie.js')}}"></script>
    <!-- Rickshow Chart js -->
    <script src="{{asset('js/backend_js/d3/d3.js')}}"></script>
    {{--<script src="{{asset('js/backend_js/rickshaw/rickshaw.js')}}"></script>--}}
    <!-- Morris Chart js -->
    <script src="{{asset('js/backend_js/raphael/raphael.min.js')}}"></script>
    <script src="{{asset('js/backend_js/morris.js/morris.js')}}"></script>
    <!-- Horizontal-Timeline js -->
    <script type="text/javascript" src="{{asset('js/backend_js/horizontal-timeline/js/main.js')}}"></script>
    
    <!-- amchart js -->
    <script type="text/javascript" src="{{asset('js/backend_js/amchart/js/amcharts.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/amchart/js/serial.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/amchart/js/light.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/amchart/js/custom-amchart.js')}}"></script>
     
    <!-- i18next.min.js -->
    <script type="text/javascript" src="{{asset('js/backend_js/i18next/i18next.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/i18next-xhr-backend/i18nextXHRBackend.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/i18next-browser-languagedetector/i18nextBrowserLanguageDetector.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/jquery-i18next/jquery-i18next.min.js')}}"></script>

    <!-- Select 2 js -->
    <script type="text/javascript" src="{{asset('css/backend_css/select2/dist/js/select2.full.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/advance-elements/select2-custom.js')}}"></script>
    
    <!-- Bootstrap date-time-picker js -->
    <script type="text/javascript" src="{{asset('js/backend_js/advance-elements/moment-with-locales.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/advance-elements/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Date-range picker js -->
    <script type="text/javascript" src="{{asset('js/backend_js/bootstrap-daterangepicker/daterangepicker.js')}}"></script>

    <!-- Date-dropper js -->
    <script type="text/javascript" src="{{asset('css/backend_css/datedropper/datedropper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/advance-elements/custom-picker.js')}}"></script>
    <!-- Custom js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/custom-dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/script.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/backend_js/bappy-custom.js')}}"></script>
    <script>
        // restrict user typing non numeric in input field
        function numbersOnly(input){
            var regex = /[^1-9]/gi;
            input.value = input.value.replace(regex,'');
        }
        $(document).ready(function(){
            
            // sweetalert 
            $(document).on('click', ".deleteRecord", function(){

                var id = $(this).attr('rel');
                var deleteFunction = $(this).attr('rel1');

                swal({
                    title: "Are you sure?",
                    text: "Not delete data just inactive status",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: "Yes, do it!",
                    cancelButtonText: "No, cancel it!",
                    confirmButtonClass: "btn btn-success",
                    cancelButtonClass: "btn btn-danger",
                    buttonStyling: false,
                    reverseButtons: true
                },
                function(){

                    window.location.href = deleteFunction+"/"+id;
                });
            });
        });
    </script>
</body>

</html>
