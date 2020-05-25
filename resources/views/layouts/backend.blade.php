<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-163969473-1"></script>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- CSRF Token -->
{{--     <meta name="csrf-token" content="{{ csrf_token() }}">
 --}}
    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('/backend/img/favicon.png') }}">
    <!-- END Icons -->

    <title>CORUS-BF-ADMIN</title>

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

    <!-- Leaflet library -->
    <link rel="stylesheet" href="{{ asset('/frontend/leaflet/leaflet.css') }}">
    <!-- END Stylesheets -->

    <script>
        window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-163969473-1');
    </script>

    <!-- Modernizr (browser feature detection library) -->
    <script src="{{ asset('/backend/js/vendor/modernizr.min.js') }}"></script>
    <style>
        .d-none{ display:none; }
    </style>
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
        <div id="page-container">            

            <!-- Main Container -->
                <div id="main-container">

                    <!-- Page content -->
                    <div id="page-content">

                        <!-- Main menu -->
                            @include('partials/mainmenu')
                        <!-- END Main menu -->
                        
                        <!-- Main Row -->
                        <div class="row">
                            <div class="col-md-3 col-lg-2">
                                <!-- Main sidebar -->
                                    @include('partials/mainsidebar')
                                <!-- END Main sidebar -->
                            </div>
                            <div class="col-md-9 col-lg-10" style="border: 1px solid; width: 82.2%;">
                                @yield('content')
                            </div>
                        </div>
                        <!-- END Main Row -->
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
    <!-- <script src="{{ asset('/backend/js/pages/tablesDatatables.js') }}"></script> -->

    <!-- ckeditor.js, load it only in the page you would like to use CKEditor (it's a heavy plugin to include it with the others!) -->
    <script src="{{ asset('/backend/js/helpers/ckeditor/ckeditor.js') }}"></script>

    <script src="{{ asset('/backend/js/pages/tablesDatatables.js') }}"></script>

    <!-- LEAFTLET -->
    <script type="text/javascript" src="{{ asset('/frontend/leaflet/leaflet.js') }} "></script>

    <script type="text/javascript">

        


        $(function(){
            FormsValidation.init();

            /* Initialize Datatables */
            TablesDatatables.init();

            
        });



            // BEGIN SHOW file 
            function readURL(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function (e) {
                        $('#blah').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }
            // END SHOW PICTURE LOGO

            /************* BEGIN SINGLE ROW DELETE */
            // ATTRIBUTION DE "ID"
                  function supp(id)
                  {
                    var form = document.getElementById("id_table");
                    form.setAttribute("value", id);
                   }

                  // SUPPRESSION PAR LA TABLE
                  function del_row()
                  {
                       var id = document.getElementById('id_table').value;
                     
                    $(function(){
                      var tablesup = $("#val-table").val();
                      var url = "{{ route('delete.item') }}".replace("item", tablesup);
 
                      $.ajax({
                              url: url,
                              type: 'GET',
                              data: {id: id},
                              error:function(data){console.log(data);},
                              success: function (data) {
                                  
                                  location.reload();
                              }
                        });
                    });
                  }
            /************* END SINGLE ROW DELETE */


        /**
         * Creation par ajax des stats
         *
         */
            $.ajaxSetup({
                headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            })

        let o =  new Date();
         let j = o.getDate()-1;
        let mois = o.getMonth();
        let annee = o.getFullYear();
         let date = new Date(Date.UTC(annee, mois, j, 0, 0, 0));
        var dh = date.toLocaleDateString('en-GB');

        $('#dated').val(dh);

        $('#statForm').on('submit',function(event){
            event.preventDefault();
            $('#cssavebtn').html('Envoi...');
            var _form = event.currentTarget;

            let _formData = $(_form).serialize();

            $.ajax({
                url: "{{ route('covidstats.store') }}",
                type:"POST",
                data:_formData,
                success:function(response){
                    let data = response.data;
                    let status = response.status;

                    $('#cssavebtn').html('Enregistrer');
                  //  $('#msg_div').removeClass('d-none');
                    $('#res_message').show();
                    $('#msg_div').show();
                    $('#res_message').html(response.msg);

                    if(status) {

                        let newLine = `
                    <tr>
                        <td class="text-left">${data.dated} # ${data.id}</td>
                        <td><a href="javascript:void(0)">${data.nom}</a></td>
                        <td>${data.sexe}</td>
                        <td>${data.typeenregistrement}</td>
                        <td class="text-center">${data.nombrecas}</td>
                    `;
                        $("#cstbody").prepend(newLine);
                        $(_form)[0].reset();
                     }else{
                        $('#msg_div').removeClass('alert-success');
                        $('#msg_div').addClass('alert-danger');
                    }
                    setTimeout(function () {
                        $('#res_message').hide();
                        $('#msg_div').hide();
                    }, 5000);
                    $('#dated').val(dh);
                    $('#localite').val('').trigger('chosen:updated');
                   // document.getElementById('localite').selectedIndex = 10;
                },
                error: function (response) {
                    $('#cssavebtn').html('Enregistrer');
                    $('#res_message').show();
                    $('#msg_div').show();
                   // $('#res_message').html(response.responseJSON.message);
                    $('#res_message').html("une erreur s'est produite ! Ressayez !");
                    $('#msg_div').addClass('alert-danger');
                    $('#msg_div').removeClass('alert-success');
                   // $('#msg_div').removeClass('d-none');
                },
            });
        });
        /**
         * Fin Creation par ajax des stats
         *
         */
    </script>
</body>
</html>
