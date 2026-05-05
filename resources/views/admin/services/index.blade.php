@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des Services</h2>
            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">+ Ajouter un service</a>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="services-grid">
            @foreach($services as $service)
            <div class="service-card" style="background: white;">
                <div class="service-img" style="background-image: url('{{ asset('images/' . $service->image) }}'); height: 180px;"></div>
                <div class="service-body">
                    <h3 style="margin-bottom: 10px;">{{ $service->title }}</h3>
                    <p style="font-size: 0.85rem; color: var(--secondary-color); margin-bottom: 20px;">{{ Str::limit($service->description, 60) }}</p>
                    <div style="display: flex; gap: 10px;">
                        <a href="{{ route('admin.services.edit', $service->id) }}" class="btn btn-outline" style="flex: 1; text-align: center; padding: 8px;">Modifier</a>
                        <form action="{{ route('admin.services.destroy', $service->id) }}" method="POST" style="flex: 1;" onsubmit="return confirm('Supprimer ce service ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="width: 100%; border-color: #e74a3b; color: #e74a3b; padding: 8px;">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </main>
</div>
@endsection
