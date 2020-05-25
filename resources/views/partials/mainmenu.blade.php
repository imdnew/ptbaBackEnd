<!-- Dashboard Header -->
<div class="row" style="margin-left: 0; margin-right: 0;margin-bottom: 15px; color: #FFF; padding: 1.5rem; background-image: url('{{ asset('/backend/img/bg-banniere.jpg') }}'); background-repeat: no-repeat; background-size: cover;">
    <!-- Main Title (hidden on small devices for the statistics to fit) -->
    <div class="col-md-4 col-lg-6 hidden-xs hidden-sm">
        <a href="{{ route('home') }}" style="color: #FFFF;">
            <div class="row" style="margin-top: 0.8rem;">
                <div class="col-md-2">
                   <img src="{{ asset('/backend/img/logoImage.jpeg') }}" style="height: 3.5rem;"> 
                </div>
                <div class="col-md-2" style="text-align: center;">
                    <strong>COVID19</strong>
                    <hr style="margin-top: 0; margin-bottom: 0;">
                    <strong style="font-size: 10px;">Burkina-Faso</strong>
                </div>
            </div>
        </a>
        
    </div>
    <!-- END Main Title -->

    <!-- Top Stats -->
    <div class="col-md-8 col-lg-6">
        <!-- Horizontal Menu + Search -->
        <div id="horizontal-menu-collapse" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active">
                    <a href="javascript:void(0)" style="color: #FFF;">Accueil</a>
                </li>
                <li>
                    <a href="javascript:void(0)" style="color: #FFF;">FAQ</a>
                </li>
                <li class="dropdown">
                    <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" style="color: #FFF;">Paramètres <i class="fa fa-angle-down"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="javascript:void(0)"><i class="fa fa-asterisk fa-fw pull-right"></i> General</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-lock fa-fw pull-right"></i> Securité</a></li>
                        <li><a href="javascript:void(0)"><i class="fa fa-user fa-fw pull-right"></i> Compte</a></li>
                         <li class="divider"></li>
                        <li class="dropdown-submenu">
                            <a href="javascript:void(0)" tabindex="-1"><i class="fa fa-chevron-right fa-fw pull-right"></i> Configurations  avancées</a>
                            <ul class="dropdown-menu">
                                <li><a href="javascript:void(0)" tabindex="-1">Second level</a></li>
                                <li><a href="javascript:void(0)">Second level</a></li>
                                <li><a href="javascript:void(0)">Second level</a></li>
                                <li class="divider"></li>
                                <!--<li class="dropdown-submenu">
                                    <a href="javascript:void(0)" tabindex="-1"><i class="fa fa-chevron-right fa-fw pull-right"></i> More Settings</a>
                                    <ul class="dropdown-menu">
                                        <li><a href="javascript:void(0)">Third level</a></li>
                                        <li><a href="javascript:void(0)">Third level</a></li>
                                        <li><a href="javascript:void(0)">Third level</a></li>
                                    </ul>
                                </li>-->
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="javascript:void(0)" style="color: #FFF;">Contact</a>
                </li>
            </ul>
            
            <form action="page_ready_search_results.html" class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Rechercher..">
                </div>
            </form>
        </div>
        <!-- END Horizontal Menu + Search -->
    </div>
    <!-- END Top Stats -->
</div>
<!-- END Dashboard Header -->