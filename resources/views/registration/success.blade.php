@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <div class="success-card">
            <div class="success-icon"><i class="fas fa-check-circle"></i></div>
            <h2 style="margin-bottom: 20px;">Inscription réussie !</h2>
            <p style="color: var(--secondary-color); margin-bottom: 40px;">Merci pour votre inscription. Nous avons bien enregistré vos informations et nous vous contacterons bientôt.</p>
            <a href="{{ route('home') }}" class="btn btn-outline">Retour à l'accueil</a>
        </div>
    </div>
</div>
@endsection
