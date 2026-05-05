@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des Abonnés Newsletter</h2>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div class="data-card">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Inscrit le</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($subscribers as $sub)
                        <tr>
                            <td>{{ $sub->email }}</td>
                            <td>{{ $sub->created_at->format('d/m/Y H:i') }}</td>
                            <td>
                                <form action="{{ route('admin.subscribers.destroy', $sub->id) }}" method="POST" onsubmit="return confirm('Supprimer cet abonné ?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="background: none; border: none; color: #e74a3b; cursor: pointer; font-size: 1.1rem;"><i class="fas fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if($subscribers->isEmpty())
                <p style="text-align: center; color: var(--secondary-color); margin-top: 20px;">Aucun abonné pour le moment.</p>
            @endif
        </div>
    </main>
</div>
@endsection
