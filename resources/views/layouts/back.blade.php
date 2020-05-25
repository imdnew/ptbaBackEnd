<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Icons -->
    <link rel="shortcut icon" href="img/favicon.png">
    <!-- END Icons -->

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Stylesheets -->
    <!-- Bootstrap is included in its original form, unaltered -->
    <link rel="stylesheet" href="{{ asset('/backend/css/bootstrap.min.css') }}">

    <!-- Related styles of various icon packs and plugins -->
    <link rel="stylesheet" href="{{ asset('/backend/css/plugins.css') }}">

    <!-- The main stylesheet of this template. All Bootstrap overwrites are defined in here -->
    <link rel="stylesheet" href="{{ asset('/backend/css/main.css') }}">

    <!-- Include a specific file here from css/themes/ folder to alter the default theme of the template -->

    <!-- The themes stylesheet of this template (for using specific theme color in individual elements - must included last) -->
    <link rel="stylesheet" href="{{ asset('/backend/css/themes.css') }}">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('/backend/js/vendor/modernizr.min.js') }}"></script>
</head>
<body>
    <!-- Page Wrapper -->
    <div id="page-wrapper">
        <!-- Preloader -->
        <div class="preloader themed-background">
            <h1 class="push-top-bottom text-light text-center"><strong>Pro</strong>UI</h1>
            <div class="inner">
                <h3 class="text-light visible-lt-ie10"><strong>Loading..</strong></h3>
                <div class="preloader-spinner hidden-lt-ie10"></div>
            </div>
        </div>
        <!-- END Preloader -->

        <!-- Page Container -->
        <div id="page-container" class="sidebar-partial sidebar-visible-lg sidebar-no-animations">
            <!-- Alternative sidebar -->
                @include('partials/altsidebar')
            <!-- END Alternative sidebar -->

            <!-- Main sidebar -->
                @include('partials/mainsidebar')
            <!-- END Main sidebar -->

            <!-- Main Container -->
                <div id="main-container">

                    <!-- Page content -->
                    <div id="page-content">
                        @yield('content')
                    </div>
                    <!-- END Page content -->

                    <!-- Footer -->
                        @include('partials/footer')
                    <!-- END Footer -->
                </div>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->
    </div>
    <!-- END Page Wrapper -->

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="{{ asset('/backend/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('/backend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/backend/js/plugins.js') }}"></script>
    <script src="{{ asset('/backend/js/app.js') }}"></script>

    <!-- Google Maps API Key (you will have to obtain a Google Maps API key to use Google Maps) -->
    <!-- For more info please have a look at https://developers.google.com/maps/documentation/javascript/get-api-key#key -->
    <script src="https://maps.googleapis.com/maps/api/js?key="></script>
    <script src="{{ asset('/backend/js/helpers/gmaps.min.js') }}"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="{{ asset('/backend/js/pages/formsValidation.js') }}"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="{{ asset('/backend/js/pages/tablesDatatables.js') }}"></script>

    <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
    <script src="{{ asset('/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>

    <script type="text/javascript">
        $(function(){
            FormsValidation.init();

            /* Initialize Datatables */
            TablesDatatables.init();
            });

            // BEGIN SHOW PICTURE LOGO
            function readURL(input) {
                alert(0);
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            // END SHOW PICTURE LOGO
    </script>
</body>
</html>
