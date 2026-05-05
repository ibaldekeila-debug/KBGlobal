<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $contents['site_name'] ?? 'KB GLOBAL' }} - Des solutions fiables</title>
    <meta name="description" content="{{ $contents['seo_description'] ?? 'KB GLOBAL propose des solutions fiables pour vos projets et vos déplacements.' }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    @if(!Request::is('admin*'))
    <nav class="navbar container">
        <a href="{{ route('home') }}" class="logo">
            <i class="fas fa-globe"></i> {{ $contents['site_name'] ?? 'KB GLOBAL' }} 
            <img src="https://flagcdn.com/w40/bi.png" alt="Drapeau Burundi" style="height: 20px; border-radius: 3px; margin-left: 10px;">
        </a>
        <ul class="nav-links">
            <li><a href="{{ route('home') }}">Accueil</a></li>
            <li><a href="{{ route('home') }}#services">Services</a></li>
            <li><a href="{{ route('about') }}">À propos</a></li>
            <li><a href="{{ route('gallery') }}">Galerie</a></li>
            <li><a href="{{ route('contact') }}">Contact</a></li>
        </ul>
        <a href="{{ route('registration.index') }}" class="btn" style="background: var(--accent-color); color: white; box-shadow: 0 4px 15px rgba(255, 159, 28, 0.4);">S'inscrire</a>
    </nav>
    @endif

    <main>
        @yield('content')
    </main>

    @if(!Request::is('admin*'))
    <footer class="footer">
        <div class="footer-grid container">
            <div>
                <h3>{{ $contents['site_name'] ?? 'KB GLOBAL' }}</h3>
                <p>{{ $contents['site_slogan'] ?? 'Des solutions fiables pour vos projets et vos déplacements.' }}</p>
                <div class="social-links" style="margin-top: 20px; display: flex; gap: 15px;">
                    <a href="{{ $contents['social_facebook'] ?? '#' }}" style="color: white; font-size: 1.5rem;"><i class="fab fa-facebook"></i></a>
                    <a href="{{ $contents['social_instagram'] ?? '#' }}" style="color: white; font-size: 1.5rem;"><i class="fab fa-instagram"></i></a>
                    <a href="{{ $contents['social_linkedin'] ?? '#' }}" style="color: white; font-size: 1.5rem;"><i class="fab fa-linkedin"></i></a>
                </div>
            </div>
            <div>
                <h4>Navigation</h4>
                <ul style="list-style: none; padding: 0;">
                    <li><a href="{{ route('home') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Accueil</a></li>
                    <li><a href="{{ route('gallery') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">Galerie</a></li>
                    <li><a href="{{ route('about') }}" style="color: rgba(255,255,255,0.7); text-decoration: none;">À propos</a></li>
                </ul>
            </div>
            <div>
                <h4>Contact</h4>
                <p style="margin-bottom: 10px;"><i class="fas fa-map-marker-alt" style="margin-right: 10px;"></i> {{ $contents['contact_address'] ?? 'Kigobe, Bujumbura' }}</p>
                <p style="margin-bottom: 10px;"><i class="fas fa-envelope" style="margin-right: 10px;"></i> {{ $contents['contact_email'] ?? 'contact@kbglobal.com' }}</p>
                <p><i class="fas fa-phone" style="margin-right: 10px;"></i> {{ $contents['contact_phone_1'] ?? '68 31 75 31' }}</p>
            </div>
        </div>
        <div style="text-align: center; margin-top: 50px; padding-top: 30px; border-top: 1px solid rgba(255,255,255,0.1); color: rgba(255,255,255,0.5); font-size: 0.9rem;">
            <p>&copy; {{ date('Y') }} {{ $contents['site_name'] ?? 'KB GLOBAL' }}. Tous droits réservés.</p>
            <p style="margin-top: 10px;"><i class="fas fa-heart" style="color: #e74a3b;"></i> Fièrement basé à Bujumbura, Burundi</p>
        </div>
    </footer>
    @endif
    @if(!Request::is('admin*'))
    <!-- WhatsApp Floating Button -->
    <a href="https://wa.me/{{ str_replace(' ', '', $contents['contact_phone_2'] ?? '79996774') }}" class="whatsapp-float" target="_blank">
        <i class="fab fa-whatsapp"></i>
        <span>Contactez-nous</span>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 30px;
            right: 30px;
            background-color: #25d366;
            color: #fff;
            padding: 15px 25px;
            border-radius: 50px;
            display: flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            font-weight: bold;
            box-shadow: 0 10px 25px rgba(37, 211, 102, 0.3);
            z-index: 10000;
            transition: all 0.3s ease;
        }
        .whatsapp-float:hover {
            transform: translateY(-5px);
            background-color: #128c7e;
        }
        @media (max-width: 768px) {
            .whatsapp-float span { display: none; }
            .whatsapp-float { padding: 15px; border-radius: 50%; bottom: 20px; right: 20px; }
        }
    </style>
    @endif
</body>
</html>
