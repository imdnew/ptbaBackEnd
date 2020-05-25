<body>
<div id="loader-wrapper">
    <div id="loader"></div>
</div>
<!-- header-start -->
<header class="h2-header">
    <div class="h2-header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="h2hta-info">
                      {{--   <span class="icon"><span class="flaticon-newspaper-2"></span></span>
                        <p class="info text-warning">Cas Confirmés</p>
                        <p class="info text-warning">{{$confrimes[0]->sum}}</p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="h2hta-info">
                       {{--  <span class="icon"><span class="flaticon-like-1"></span></span>
                        <p class="info text-success">Guérisons</p>
                        <p class="info text-success">{{$gueris[0]->sum}} </p> --}}
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="h2hta-info">
                        {{-- <span class="icon"><span class="flaticon-piggy-bank"></span></span>
                        <p class="info text-danger">Décès </p>
                        <p class="info text-danger">{{$deces[0]->sum}}</p> --}}
                    </div>
                </div>

                 <div class="col-lg-3 col-sm-6 col-12">
                    <div class="h2hta-info text-right">
                        <span class="iconbig text-success"><i class="fa fa-3x fa-phone"></i></span>
                       {{--  <p class="info">Appeler </p> --}}
                        <span class="info text-danger" style="font-size:3rem;">35 35</span>
                    </div>
                </div>
                </div>
        </div>
    </div>
    <div class="h2-header-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-4 col-sm-6 col-6">
                    <div class="logo">
                        <a href="/"><img src="{{ asset('frontend/img/home2/logocorus.png') }}" alt="" height="50"></a>
                    </div>
                </div>
                <div class="col-lg-10 col-md-8 col-sm-6 col-6">
                    <div class="responsive-menu d-lg-none"></div>
                    <div class="menu d-none d-lg-block">
                        <nav>
                            <ul id="menu">
                            <li><a href="/" class="@yield('active-home-link')">ACCUEIL</a></li>
                               <li><a href="{{ Route('corus') }}" class="@yield('active-corus-link')">CORUS</a></li>
                                <li><a href="{{ Route('covid19') }}" class="@yield('active-covid19-link')">COVID19</a></li>	
                                <li><a href="{{ Route('actualites') }}" class="@yield('active-actualites-link')">INFORMATIONS </a></li>
                                <li><a href="{{ Route('frontend.statistique') }}" class="@yield('active-statistiques-link')">STATISTIQUES </a> </li>
								<li><a href="{{ Route('telechargement') }}" class="@yield('active-telechargement-link')">TELECHARGEMENT </a></li>
								<li><a href="{{ Route('contact') }}" class="@yield('active-contact-link')">CONTACTS </a></li>
                            </ul>
                        </nav>
                        <div class="h2-search-social">
                            <div class="sq-search">
                                <span data-toggle="modal" data-target="#search_modal">
                                    <i class="fa fa-search"></i>
                                </span>
                                <!-- search-modal-start -->
                                <div id="search_modal" class="search-modal modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <!-- Modal content-->
                                        <div class="modal-content">
                                            <h4 class="modal-title">Effectuer une recherche</h4>
                                            <form action="#">
                                                <input type="text" placeholder="Rechercher ici">
                                            </form>
                                            <div class="modal-close">
                                                <button type="button" data-dismiss="modal">Fermer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>