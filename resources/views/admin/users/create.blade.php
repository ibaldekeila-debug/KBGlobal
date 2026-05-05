@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Ajouter un Administrateur</h2>
            <a href="{{ route('admin.users') }}" class="btn btn-outline">Annuler</a>
        </div>

        <div class="form-container" style="margin: 0; max-width: 600px;">
            <form action="{{ route('admin.users.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nom Complet</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder="Ex: Jean Dupont">
                </div>

                <div class="form-group">
                    <label for="email">Adresse Email</label>
                    <input type="email" name="email" id="email" class="form-control" required placeholder="admin@kbglobal.com">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder="Minimum 8 caractères">
                </div>

                <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">Créer l'administrateur</button>
            </form>
        </div>
    </main>
</div>
@endsection
