@extends('layouts.app')

@section('content')
<div class="container">
    <div class="form-container">
        <h2 style="margin-bottom: 20px; text-align: center;">Inscription à un service</h2>
        <p style="text-align: center; color: var(--secondary-color); margin-bottom: 40px;">Remplissez le formulaire ci-dessous pour vous inscrire</p>

        <form action="{{ route('registration.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="first_name">Nom *</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Votre nom" required>
            </div>
            <div class="form-group">
                <label for="last_name">Prénom *</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Votre prénom" required>
            </div>
            <div class="form-group">
                <label for="email">Email *</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="votre@email.com" required>
            </div>
            <div class="form-group">
                <label for="phone">Téléphone *</label>
                <input type="text" name="phone" id="phone" class="form-control" placeholder="68 31 75 31 / 79 996 774" required>
            </div>
            <div class="form-group">
                <label for="service_id">Service choisi *</label>
                <select name="service_id" id="service_id" class="form-control" required>
                    <option value="">Sélectionnez un service</option>
                    @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ request('service') == $service->id ? 'selected' : '' }}>
                        {{ $service->title }}
                    </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary" style="width: 100%; margin-top: 20px;">S'inscrire</button>
        </form>
    </div>
</div>
@endsection
