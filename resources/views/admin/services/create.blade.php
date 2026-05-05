@extends('layouts.app')

@section('content')
<div class="admin-layout">
    <aside class="sidebar">
        <a href="{{ route('admin.dashboard') }}" class="sidebar-logo">
            <i class="fas fa-globe"></i> KB GLOBAL Admin
        </a>
        <ul class="sidebar-nav">
            <li><a href="{{ route('admin.dashboard') }}" class="active"><i class="fas fa-th-large"></i> Tableau de bord</a></li>
            <li><a href="{{ route('admin.inscriptions') }}"><i class="fas fa-users"></i> Inscriptions</a></li>
            <li><a href="{{ route('admin.services') }}"><i class="fas fa-concierge-bell"></i> Services</a></li>
            <li><a href="{{ route('admin.medias') }}"><i class="fas fa-photo-video"></i> Médias</a></li>
            <li style="margin-top: 40px;"><a href="{{ route('home') }}"><i class="fas fa-sign-out-alt"></i> Déconnexion</a></li>
        </ul>
    </aside>

    <main class="admin-main">
        <div class="admin-header">
            <h2>Ajouter un Service</h2>
            <a href="{{ route('admin.services') }}" class="btn btn-outline">Annuler</a>
        </div>

        <div class="form-container" style="margin: 0; max-width: 800px;">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="title">Titre du service *</label>
                    <input type="text" name="title" id="title" class="form-control" required placeholder="Ex: Auto-école">
                </div>
                
                <div class="form-group">
                    <label for="description">Description détaillée *</label>
                    <textarea name="description" id="description" class="form-control" rows="5" required placeholder="Décrivez le service..."></textarea>
                </div>

                <div class="form-group">
                    <label for="icon">Icône (FontAwesome class)</label>
                    <input type="text" name="icon" id="icon" class="form-control" placeholder="Ex: fas fa-car">
                </div>

                <div class="form-group">
                    <label for="image">Image illustrative</label>
                    <input type="file" name="image" id="image" class="form-control">
                    <p style="font-size: 0.8rem; color: var(--secondary-color); margin-top: 5px;">Format: JPG, PNG. Taille max: 2Mo.</p>
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">Enregistrer le service</button>
            </form>
        </div>
    </main>
</div>
@endsection
