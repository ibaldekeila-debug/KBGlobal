@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des Contenus Textuels</h2>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="data-card">
            <form action="{{ route('admin.contents.update') }}" method="POST">
                @csrf
                <h3 style="margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Page d'Accueil</h3>
                <div class="form-group">
                    <label>Titre principal (Hero)</label>
                    <input type="text" name="hero_title" class="form-control" value="{{ $contents['hero_title'] ?? 'KB GLOBAL' }}">
                </div>
                <div class="form-group">
                    <label>Sous-titre (Hero)</label>
                    <textarea name="hero_subtitle" class="form-control" rows="3">{{ $contents['hero_subtitle'] ?? 'Des solutions fiables pour vos projets et vos déplacements.' }}</textarea>
                </div>

                <h3 style="margin-top: 40px; margin-bottom: 20px; border-bottom: 1px solid #eee; padding-bottom: 10px;">Référencement (SEO)</h3>
                <div class="form-group">
                    <label>Description Meta (Google)</label>
                    <textarea name="seo_description" class="form-control" rows="2">{{ $contents['seo_description'] ?? 'KB Global propose des solutions fiables...' }}</textarea>
                </div>
                <div class="form-group">
                    <label>Mots-clés (Keywords)</label>
                    <input type="text" name="seo_keywords" class="form-control" value="{{ $contents['seo_keywords'] ?? 'consultance, auto-école' }}">
                </div>

                <button type="submit" class="btn btn-primary" style="margin-top: 20px;">Enregistrer les modifications</button>
            </form>
        </div>
    </main>
</div>
@endsection
