<!-- Navigation Block -->
<div id="mainsidebar" class="block full" style="border-radius: 4px 4px 0 0;">
    <!-- Navigation Title -->
    <div class="block-title" style="background: -webkit-gradient(linear, left top, right top, from(#a94442), to(#c45c1d)); background: linear-gradient(90deg, #a94442 0%, #c45c1d 100%); border-radius: 4px 4px 0 0; border: 0; color: #fff;">
        <h2>Contenu</h2>
    </div>
    <!-- END Navigation Title -->

    <!-- Filter by Type links -->
    <ul class="nav nav-pills nav-stacked nav-icons media-filter">
        <li class="@yield('home')">
            <a href="{{ route('home') }}" data-category="covid" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Accueil</strong>
            </a>
        </li> <li class="@yield('Declarations')">
            <a href="{{ route('covidstats.index') }}" data-category="covid" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Déclarations</strong>
            </a>
        </li>
        <li class="@yield('article')">
            <a href="{{ route('articles.index')}}" data-category="aricle" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Articles</strong>
            </a>
        </li>
        <li class="@yield('categorie')">
            <a href="{{ route('categories.index')}}" data-category="categorie" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Catégories Articles</strong>
            </a>
        </li>
        <li class="@yield('localite')">
            <a href="{{ route('localites.index')}}" data-category="localite" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Localités</strong>
            </a>
        </li>
    </ul>
    <!-- END Filter by Type links -->

    <!-- Upload Title -->
    <div class="block-title" style="background-image: -webkit-gradient(linear, left top, right top, from(#a94442), to(#c45c1d)); background-image: linear-gradient(90deg, #a94442 0%, #c45c1d 100%); border: 0; color: #fff; margin-top: 3rem;">
        <h2> Administration</h2>
    </div>

    <ul class="nav nav-pills nav-stacked nav-icons media-filter">
     <!--   <li class="@yield('groupe')">
            <a href="{{ route('groupes.index') }}" data-category="groupe" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Groupes</strong>
            </a>
        </li>
        <li class="@yield('utilisateur')">
            <a href="javascript:void(0)" data-category="user" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Users</strong>
            </a>
        </li>
        <li class="@yield('profile')">
            <a href="javascript:void(0)" data-category="profile" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Profile</strong>
            </a>
        </li>-->
        <li>
            <a href="{{ route('logout') }}"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" data-category="deconnexion" class="text-success">
                <i class="fa fa-fw fa-caret-right icon-push"></i> <strong>Se déconnecter</strong>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
        </li>
    </ul>
</div>
<!-- END Navigation Block -->