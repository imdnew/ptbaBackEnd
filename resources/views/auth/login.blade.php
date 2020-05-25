<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>CORUS-BF-ADMIN</title>

    <!-- Icons -->
        <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
        <link rel="shortcut icon" href="{{ asset('/backend/img/favicon.png') }}">
        <!-- END Icons -->

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

    <!-- Login Full Background -->

    <!-- Login Container -->
    <div id="login-container" class="animation-fadeIn">
        <!-- Login Title -->
        <div class="login-title text-center">
            <h2><strong>Connexion</strong></h2>
            <hr>
            <small>Veuillez saisir votre <strong>Identifiant</strong> et <strong>Mot de passe</strong></small>
        </div>
        <!-- END Login Title -->

        <!-- Login Block -->
        <div class="block push-bit">
            <!-- Login Form -->
            <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-envelope"></i></span>
                                <input type="email" id="login-email" name="email" class="form-control" placeholder="Email" value="{{ old('email') }}" required autofocus>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="col-xs-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="gi gi-asterisk"></i></span>
                                <input type="password" id="login-password" name="password" class="form-control" placeholder="Mot de passe" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group form-actions">
                        <div class="col-xs-4">
                            <label class="switch switch-primary" data-toggle="tooltip" title="Remember Me?">
                                <input type="checkbox" id="login-remember-me" name="remember" {{ old('remember') ? 'checked' : '' }}>
                                <span></span>
                            </label>
                        </div>
                        <div class="col-xs-8 text-right">
                            <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-angle-right"></i> Se connecter</button>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-xs-12 text-center">
                            <a href="javascript:void(0)" id="link-reminder-login"><small>Mot de passe oublié?</small></a>
                        </div>
                    </div>
            </form>
            <!-- END Login Form -->
            
        </div>
        <!-- END Login Block -->

        <!-- Footer -->
        <footer class="text-muted text-center">
            <small><span>2020</span> &copy; <a href="http://www.eburkina.gov.bf" target="_blank">e-Burkina</a></small>
        </footer>
        <!-- END Footer -->
    </div>
    <!-- END Login Container -->

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="{{ asset('/backend/js/vendor/jquery.min.js') }}"></script>
    <script src="{{ asset('/backend/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/backend/js/plugins.js') }}"></script>
    <script src="{{ asset('/backend/js/app.js') }}"></script>

    <!-- Load and execute javascript code used only in this page -->
    <script src="{{ asset('/backend/js/pages/login.js') }}"></script>

    <script type="text/javascript">
        $(function(){ Login.init(); });
    </script>
</body>
</html>
