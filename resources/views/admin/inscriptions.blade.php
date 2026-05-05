@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Liste des Inscriptions</h2>
            <div style="display: flex; gap: 15px;">
                <form action="{{ route('admin.inscriptions') }}" method="GET" style="display: flex; gap: 5px;">
                    <input type="text" name="search" placeholder="Chercher un client..." value="{{ request('search') }}" class="form-control" style="padding: 8px 15px; width: 250px;">
                    <button type="submit" class="btn btn-primary" style="padding: 8px 15px;"><i class="fas fa-search"></i></button>
                </form>
                <a href="{{ route('admin.inscriptions.export') }}" class="btn btn-outline" style="padding: 8px 15px; border-color: #00ac69; color: #00ac69;"><i class="fas fa-file-excel"></i> Export CSV</a>
            </div>
        </div>

        <div class="data-card">
            <div class="table-responsive">
                <table class="data-table">
                <thead>
                    <tr>
                        <th>Nom Complet</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Service</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($registrations as $reg)
                    <tr>
                        <td>{{ $reg->first_name }} {{ $reg->last_name }}</td>
                        <td>{{ $reg->email }}</td>
                        <td>{{ $reg->phone }}</td>
                        <td>{{ $reg->service->title ?? 'N/A' }}</td>
                        <td>{{ $reg->created_at->format('d/m/Y') }}</td>
                        <td>
                            <form action="{{ route('admin.inscriptions.destroy', $reg->id) }}" method="POST" onsubmit="return confirm('Supprimer cette inscription ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" style="background: none; border: none; color: #e74a3b; cursor: pointer; font-size: 1.1rem;"><i class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="margin-top: 20px;">
                {{ $registrations->links() }}
            </div>
        </div>
    </main>
</div>
@endsection
