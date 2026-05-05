@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Paramètres Généraux</h2>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 30px;">
            <!-- Identité du Site -->
            <div class="data-card">
                <h3 style="margin-bottom: 20px;">Identité du Site</h3>
                <form action="{{ route('admin.contents.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Nom de l'entreprise</label>
                        <input type="text" name="site_name" class="form-control" value="{{ $contents['site_name'] ?? 'KB GLOBAL' }}">
                    </div>
                    <div class="form-group">
                        <label>Slogan</label>
                        <input type="text" name="site_slogan" class="form-control" value="{{ $contents['site_slogan'] ?? 'Des solutions fiables pour vos projets' }}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Enregistrer l'identité</button>
                </form>
            </div>

            <!-- Coordonnées Officielles -->
            <div class="data-card">
                <h3 style="margin-bottom: 20px;">Coordonnées Officielles</h3>
                <form action="{{ route('admin.contents.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Email de contact</label>
                        <input type="email" name="contact_email" class="form-control" value="{{ $contents['contact_email'] ?? 'contact@kbglobal.com' }}">
                    </div>
                    <div class="form-group">
                        <label>Téléphone 1</label>
                        <input type="text" name="contact_phone_1" class="form-control" value="{{ $contents['contact_phone_1'] ?? '68 31 75 31' }}">
                    </div>
                    <div class="form-group">
                        <label>Téléphone 2 (WhatsApp)</label>
                        <input type="text" name="contact_phone_2" class="form-control" value="{{ $contents['contact_phone_2'] ?? '79 996 774' }}">
                    </div>
                    <div class="form-group">
                        <label>Adresse physique</label>
                        <textarea name="contact_address" class="form-control" rows="2">{{ $contents['contact_address'] ?? 'Kigobe, Av. des Etats-Unis n°2, Bujumbura' }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Mettre à jour les infos</button>
                </form>
            </div>

            <!-- Réseaux Sociaux -->
            <div class="data-card">
                <h3 style="margin-bottom: 20px;">Réseaux Sociaux</h3>
                <form action="{{ route('admin.contents.update') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label><i class="fab fa-facebook" style="color: #1877f2;"></i> Facebook</label>
                        <input type="text" name="social_facebook" class="form-control" value="{{ $contents['social_facebook'] ?? 'https://facebook.com/kbglobal' }}">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-instagram" style="color: #e4405f;"></i> Instagram</label>
                        <input type="text" name="social_instagram" class="form-control" value="{{ $contents['social_instagram'] ?? 'https://instagram.com/kbglobal' }}">
                    </div>
                    <div class="form-group">
                        <label><i class="fab fa-linkedin" style="color: #0a66c2;"></i> LinkedIn</label>
                        <input type="text" name="social_linkedin" class="form-control" value="{{ $contents['social_linkedin'] ?? 'https://linkedin.com/company/kbglobal' }}">
                    </div>
                    <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Enregistrer les liens</button>
                </form>
            </div>
        </div>

        <div class="data-card" style="margin-top: 30px; border: 1px solid #ffc107;">
            <h3 style="color: #856404; margin-bottom: 15px;"><i class="fas fa-exclamation-triangle"></i> Zone de Danger</h3>
            <p style="margin-bottom: 20px;">Ces actions sont irréversibles.</p>
            <button class="btn btn-outline" style="border-color: #e74a3b; color: #e74a3b;">Réinitialiser la base de données</button>
        </div>
    </main>
</div>
@endsection
