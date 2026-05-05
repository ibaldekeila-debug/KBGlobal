@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Tableau de bord</h2>
            <div class="user-profile">
                <span><i class="fas fa-user-circle"></i> Administrateur</span>
            </div>
        </div>

        <!-- Statistiques Cards -->
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-info">
                    <h3>{{ $totalInscriptions }}</h3>
                    <p>Total Inscriptions</p>
                </div>
                <div class="stat-icon"><i class="fas fa-users"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info" style="color: var(--success);">
                    <h3>+{{ $todayInscriptions }}</h3>
                    <p>Aujourd'hui</p>
                </div>
                <div class="stat-icon"><i class="fas fa-user-plus"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>{{ $totalServices }}</h3>
                    <p>Services Actifs</p>
                </div>
                <div class="stat-icon"><i class="fas fa-concierge-bell"></i></div>
            </div>
            <div class="stat-card">
                <div class="stat-info">
                    <h3>{{ $totalMedia }}</h3>
                    <p>Fichiers Médias</p>
                </div>
                <div class="stat-icon"><i class="fas fa-photo-video"></i></div>
            </div>
        </div>

        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
            <!-- Inscriptions Récentes -->
            <div class="data-card">
                <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 20px;">
                    <h3><i class="fas fa-history" style="color: var(--primary-color); margin-right: 10px;"></i> Inscriptions récentes</h3>
                    <a href="{{ route('admin.inscriptions') }}" class="btn btn-outline" style="padding: 5px 15px; font-size: 0.8rem;">Voir tout</a>
                </div>
                <div class="table-responsive">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Client</th>
                                <th>Service</th>
                                <th>Date</th>
                                <th>Statut</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentInscriptions as $reg)
                            <tr>
                                <td>{{ $reg->first_name }} {{ $reg->last_name }}</td>
                                <td>{{ $reg->service->title ?? 'N/A' }}</td>
                                <td>{{ $reg->created_at->diffForHumans() }}</td>
                                <td>
                                    <span style="background: #fff3cd; color: #856404; padding: 4px 8px; border-radius: 4px; font-size: 0.75rem;">{{ $reg->status ?? 'En attente' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Accès Rapide -->
            <div>
                <div class="data-card" style="margin-bottom: 30px;">
                    <h3 style="margin-bottom: 20px;"><i class="fas fa-bolt" style="color: var(--accent-color); margin-right: 10px;"></i> Actions Rapides</h3>
                    <div style="display: grid; gap: 10px;">
                        <a href="{{ route('admin.services.create') }}" class="btn btn-outline" style="text-align: left; padding: 15px;"><i class="fas fa-plus"></i> Nouveau Service</a>
                        <a href="{{ route('admin.medias') }}" class="btn btn-outline" style="text-align: left; padding: 15px;"><i class="fas fa-upload"></i> Ajouter un Média</a>
                        <a href="{{ route('admin.settings') }}" class="btn btn-outline" style="text-align: left; padding: 15px;"><i class="fas fa-cog"></i> Paramètres</a>
                    </div>
                </div>

                <div class="data-card" style="background: var(--primary-color); color: white;">
                    <h3>Info KB Global</h3>
                    <p style="opacity: 0.8; font-size: 0.9rem; margin-top: 10px;">Gérez vos clients et vos services en toute simplicité depuis cette interface centralisée.</p>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
