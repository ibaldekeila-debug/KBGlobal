<aside class="sidebar">
    <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
        <i class="fas fa-globe"></i> KB GLOBAL Admin
    </a>
    <ul class="sidebar-nav">
        <li>
            <a href="{{ route('admin.dashboard') }}" class="{{ Request::is('admin/dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i> <span>Tableau de bord</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.inscriptions') }}" class="{{ Request::is('admin/inscriptions*') ? 'active' : '' }}">
                <i class="fas fa-users"></i> <span>Inscriptions</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.services') }}" class="{{ Request::is('admin/services*') ? 'active' : '' }}">
                <i class="fas fa-concierge-bell"></i> <span>Services</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.medias') }}" class="{{ Request::is('admin/medias*') ? 'active' : '' }}">
                <i class="fas fa-photo-video"></i> <span>Médias</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.contents') }}" class="{{ Request::is('admin/contenus*') ? 'active' : '' }}">
                <i class="fas fa-file-alt"></i> <span>Contenus</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="{{ Request::is('admin/utilisateurs*') ? 'active' : '' }}">
                <i class="fas fa-user-cog"></i> <span>Utilisateurs</span>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.settings') }}" class="{{ Request::is('admin/parametres*') ? 'active' : '' }}">
                <i class="fas fa-cog"></i> <span>Paramètres</span>
            </a>
        </li>
        <li style="margin-top: 40px;">
            <a href="{{ route('home') }}">
                <i class="fas fa-sign-out-alt"></i> <span>Déconnexion</span>
            </a>
        </li>
    </ul>
</aside>
