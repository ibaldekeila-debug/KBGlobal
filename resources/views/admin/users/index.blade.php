@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des Utilisateurs</h2>
            <a href="{{ route('admin.users.create') }}" class="btn btn-primary">+ Ajouter un administrateur</a>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div style="background: #e74a3b; color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('error') }}
            </div>
        @endif

        <div class="data-card">
            <div class="table-responsive">
                <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Email</th>
                        <th>Rôle</th>
                        <th>Créé le</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td><span style="background: #e1f5fe; color: #01579b; padding: 4px 8px; border-radius: 4px; font-size: 0.8rem;">Admin</span></td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            <div style="display: flex; gap: 10px;">
                                <a href="{{ route('admin.users.edit', $user->id) }}" style="color: var(--primary-color);"><i class="fas fa-edit"></i></a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Supprimer cet administrateur ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: #e74a3b; cursor: pointer;"><i class="fas fa-trash"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="data-card" style="margin-top: 40px;">
            <h3 style="margin-bottom: 20px;"><i class="fas fa-history"></i> Journal d'activité</h3>
            <table class="data-table">
                <thead>
                    <tr>
                        <th>Utilisateur</th>
                        <th>Action</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Admin</td>
                        <td>Connexion réussie</td>
                        <td>Aujourd'hui, 09:30</td>
                    </tr>
                    <tr>
                        <td>Admin</td>
                        <td>Modification du service "Auto-école"</td>
                        <td>Hier, 16:45</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection
