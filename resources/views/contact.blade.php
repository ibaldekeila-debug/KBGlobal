@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 60px; padding-bottom: 80px;">
    <div class="section-title">
        <h2>Contactez-nous</h2>
        <p>Nous sommes à votre écoute pour toute question ou demande de projet</p>
    </div>

    <div style="display: flex; justify-content: center; margin-top: 40px;">
        <!-- Informations de contact -->
        <div class="data-card" style="padding: 40px; max-width: 600px; width: 100%;">
            <h3 style="margin-bottom: 30px; color: var(--primary-color); text-align: center;">Nos Coordonnées</h3>
            
            <div style="margin-bottom: 25px; display: flex; gap: 15px; align-items: flex-start;">
                <div class="service-icon" style="font-size: 1.5rem;"><i class="fas fa-map-marker-alt"></i></div>
                <div>
                    <h4 style="margin-bottom: 5px;">Adresse</h4>
                    <p style="color: var(--secondary-color);">{{ $contents['contact_address'] ?? 'Kigobe, Av. des Etats-Unis n°2, à côté du bar "CHEZ GÉRARD"' }}</p>
                </div>
            </div>

            <div style="margin-bottom: 25px; display: flex; gap: 15px; align-items: flex-start;">
                <div class="service-icon" style="font-size: 1.5rem;"><i class="fas fa-envelope"></i></div>
                <div>
                    <h4 style="margin-bottom: 5px;">Email</h4>
                    <p style="color: var(--secondary-color);"><a href="mailto:anicetkwizera@gmail.com" style="color: var(--primary-color);">anicetkwizera@gmail.com</a></p>
                </div>
            </div>

            <div style="margin-bottom: 25px; display: flex; gap: 15px; align-items: flex-start;">
                <div class="service-icon" style="font-size: 1.5rem;"><i class="fas fa-phone"></i></div>
                <div>
                    <h4 style="margin-bottom: 5px;">Téléphone</h4>
                    <p style="color: var(--secondary-color);">{{ $contents['contact_phone_1'] ?? '68 31 75 31' }} / {{ $contents['contact_phone_2'] ?? '79 996 774' }}</p>
                </div>
            </div>

            <div style="margin-bottom: 25px; display: flex; gap: 15px; align-items: flex-start;">
                <div class="service-icon" style="font-size: 1.5rem;"><i class="fab fa-whatsapp"></i></div>
                <div>
                    <h4 style="margin-bottom: 5px;">WhatsApp</h4>
                    <p style="color: var(--secondary-color);">{{ $contents['contact_phone_2'] ?? '79 996 774' }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
