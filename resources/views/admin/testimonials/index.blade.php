@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des Témoignages</h2>
            <button class="btn btn-primary" onclick="document.getElementById('testimonial-form').style.display='block'">+ Ajouter un avis</button>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <div id="testimonial-form" class="data-card" style="display: none; margin-bottom: 30px; border: 2px solid var(--primary-color);">
            <h3 style="margin-bottom: 20px;">Nouvel avis client</h3>
            <form action="{{ route('admin.testimonials.store') }}" method="POST">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                    <div class="form-group">
                        <label>Nom du client</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Profession/Titre (ex: Entrepreneur)</label>
                        <input type="text" name="profession" class="form-control">
                    </div>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Message</label>
                    <textarea name="content" class="form-control" rows="4" required></textarea>
                </div>
                <div class="form-group" style="margin-bottom: 20px;">
                    <label>Note (1 à 5 étoiles)</label>
                    <select name="rating" class="form-control">
                        <option value="5">5 Étoiles</option>
                        <option value="4">4 Étoiles</option>
                        <option value="3">3 Étoiles</option>
                        <option value="2">2 Étoiles</option>
                        <option value="1">1 Étoile</option>
                    </select>
                </div>
                <div style="display: flex; gap: 10px;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Publier</button>
                    <button type="button" class="btn btn-outline" style="flex: 1;" onclick="document.getElementById('testimonial-form').style.display='none'">Annuler</button>
                </div>
            </form>
        </div>

        <div class="data-card">
            <div class="table-responsive">
                <table class="data-table">
                    <thead>
                        <tr>
                            <th>Client</th>
                            <th>Avis</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($testimonials as $test)
                        <tr>
                            <td>
                                <strong>{{ $test->name }}</strong><br>
                                <small style="color: var(--secondary-color);">{{ $test->profession }}</small>
                            </td>
                            <td style="max-width: 300px;">{{ Str::limit($test->content, 100) }}</td>
                            <td style="color: #ff9f1c;">
                                @for($i=0; $i<$test->rating; $i++)
                                    <i class="fas fa-star"></i>
                                @endfor
                            </td>
                            <td>
                                <form action="{{ route('admin.testimonials.destroy', $test->id) }}" method="POST" onsubmit="return confirm('Supprimer ce témoignage ?')">
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
        </div>
    </main>
</div>
@endsection
