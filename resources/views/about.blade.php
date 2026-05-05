@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 60px; padding-bottom: 80px;">
    <div class="section-title">
        <h2>À propos de KB GLOBAL</h2>
        <p>Votre partenaire de confiance pour des solutions multiservices d'excellence</p>
    </div>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(350px, 1fr)); gap: 50px; align-items: center; margin-top: 40px;">
        <div>
            <img src="{{ asset('images/hero_building_1777880139024.png') }}" alt="KB Global Office" style="width: 100%; border-radius: var(--border-radius); box-shadow: var(--shadow);">
        </div>
        <div>
            <h3 style="margin-bottom: 20px; color: var(--primary-color);">{{ $contents['about_title'] ?? 'Qui sommes-nous ?' }}</h3>
            <p style="margin-bottom: 20px; color: var(--secondary-color); font-size: 1.1rem;">
                {{ $contents['about_text'] ?? 'KB GLOBAL est une entreprise dynamique spécialisée dans la fourniture de services de haute qualité. Que ce soit pour la gestion de projets, la formation à la conduite, la location de véhicules ou l\'immobilier, nous nous engageons à offrir des solutions fiables et adaptées aux besoins de nos clients.' }}
            </p>
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                <div class="stat-card" style="padding: 20px;">
                    <div class="stat-info">
                        <h4 style="color: var(--primary-color);">Mission</h4>
                        <p style="font-size: 0.85rem;">Offrir des services d'excellence accessibles à tous.</p>
                    </div>
                </div>
                <div class="stat-card" style="padding: 20px;">
                    <div class="stat-info">
                        <h4 style="color: var(--primary-color);">Vision</h4>
                        <p style="font-size: 0.85rem;">Devenir le leader régional des solutions multiservices.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div style="margin-top: 80px; background: var(--light-bg); padding: 60px; border-radius: var(--border-radius);">
        <h3 style="text-align: center; margin-bottom: 40px;">Nos Valeurs Fondamentales</h3>
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 30px; text-align: center;">
            <div>
                <i class="fas fa-check-circle" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 15px;"></i>
                <h4>Qualité</h4>
                <p style="color: var(--secondary-color);">Nous ne faisons aucun compromis sur la qualité de nos services.</p>
            </div>
            <div>
                <i class="fas fa-shield-alt" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 15px;"></i>
                <h4>Fiabilité</h4>
                <p style="color: var(--secondary-color);">Nos clients savent qu'ils peuvent compter sur nous en tout temps.</p>
            </div>
            <div>
                <i class="fas fa-heart" style="font-size: 2.5rem; color: var(--primary-color); margin-bottom: 15px;"></i>
                <h4>Satisfaction</h4>
                <p style="color: var(--secondary-color);">La satisfaction de nos clients est notre priorité absolue.</p>
            </div>
        </div>
    </div>
</div>
@endsection
