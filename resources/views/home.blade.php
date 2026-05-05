@extends('layouts.app')

@section('content')
<section class="hero" style="background-image: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)), url('{{ asset('images/hero_building_1777880139024.png') }}');">
    <div class="container">
        <div class="hero-content">
            <h1>{{ $contents['hero_title'] ?? 'KB GLOBAL' }}</h1>
            <p>{{ $contents['hero_subtitle'] ?? 'Des solutions fiables pour vos projets et vos déplacements.' }}</p>
            <div style="display: flex; gap: 20px;">
                <a href="#services" class="btn btn-primary" style="background: linear-gradient(135px, var(--primary-color), var(--primary-dark)); padding: 15px 35px;">Nos Services</a>
                <a href="{{ route('registration.index') }}" class="btn btn-outline" style="color: white; border-color: white; backdrop-filter: blur(5px); padding: 15px 35px;">S'inscrire maintenant</a>
            </div>
        </div>
    </div>
</section>

<section id="services" class="container">
    <div class="section-title">
        <h2>Nos Services</h2>
        <p>Découvrez nos différents services conçus pour vous satisfaire</p>
    </div>

    <div class="services-grid">
        @foreach($services as $service)
        <div class="service-card">
            <div class="service-img" style="background-image: url('{{ asset('images/' . $service->image) }}');"></div>
            <div class="service-body">
                <div class="service-icon"><i class="{{ $service->icon }}"></i></div>
                <h3>{{ $service->title }}</h3>
                <p>{{ $service->description }}</p>
                <a href="{{ route('registration.index', ['service' => $service->id]) }}" class="btn btn-outline" style="width: 100%; display: block; text-align: center;">En savoir plus</a>
            </div>
        </div>
        @endforeach
    </div>
</section>
@endsection
