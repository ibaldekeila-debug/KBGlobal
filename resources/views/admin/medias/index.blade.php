@extends('layouts.app')

@section('content')
<div class="admin-layout">
    @include('admin.sidebar')

    <main class="admin-main">
        <div class="admin-header">
            <h2>Gestion des médias</h2>
            <button class="btn btn-primary" onclick="document.getElementById('upload-form').style.display='block'">+ Ajouter un média</button>
        </div>

        @if(session('success'))
            <div style="background: var(--success); color: white; padding: 15px; border-radius: 8px; margin-bottom: 20px;">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire d'upload (Masqué par défaut) -->
        <div id="upload-form" class="data-card" style="display: none; margin-bottom: 30px; border: 2px solid var(--primary-color);">
            <h3 style="margin-bottom: 20px;">Télécharger un nouveau fichier</h3>
            <form action="{{ route('admin.medias.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
                    <div class="form-group">
                        <label for="file">Choisir le fichier *</label>
                        <input type="file" name="file" id="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type de média *</label>
                        <select name="type" id="type" class="form-control" required>
                            <option value="image">Image (JPG, PNG...)</option>
                            <option value="video">Vidéo (MP4, AVI...)</option>
                        </select>
                    </div>
                </div>
                <div style="display: flex; gap: 10px; margin-top: 10px;">
                    <button type="submit" class="btn btn-primary" style="flex: 1;">Télécharger</button>
                    <button type="button" class="btn btn-outline" style="flex: 1;" onclick="document.getElementById('upload-form').style.display='none'">Annuler</button>
                </div>
            </form>
        </div>

        <div class="data-card">
            <div style="display: flex; gap: 20px; border-bottom: 2px solid #eee; margin-bottom: 30px;">
                <button id="tab-images" onclick="showTab('images')" style="padding: 10px 20px; border: none; background: none; border-bottom: 2px solid var(--primary-color); font-weight: bold; color: var(--primary-color); cursor: pointer;">Images</button>
                <button id="tab-videos" onclick="showTab('videos')" style="padding: 10px 20px; border: none; background: none; color: var(--secondary-color); cursor: pointer;">Vidéos</button>
            </div>
            
            <!-- Liste des Images -->
            <div id="content-images" class="services-grid" style="grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));">
                @foreach($images as $image)
                <div class="service-card" style="background: white; position: relative;">
                    <div style="height: 150px; background-image: url('{{ asset('images/' . $image->filename) }}'); background-size: cover; background-position: center;"></div>
                    <div class="service-body" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 0.75rem; color: var(--secondary-color);">{{ Str::limit($image->filename, 15) }}</span>
                        <form action="{{ route('admin.medias.destroy', $image->id) }}" method="POST" onsubmit="return confirm('Supprimer cette image ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e74a3b; cursor: pointer;"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
                @if($images->isEmpty())
                    <p style="text-align: center; color: var(--secondary-color); grid-column: 1/-1;">Aucune image disponible.</p>
                @endif
            </div>

            <!-- Liste des Vidéos -->
            <div id="content-videos" class="services-grid" style="display: none; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));">
                @foreach($videos as $video)
                <div class="service-card" style="background: white;">
                    <div style="height: 150px; background: #000; display: flex; align-items: center; justify-content: center;">
                        <video style="width: 100%; height: 100%; object-fit: cover;" controls>
                            <source src="{{ asset('videos/' . $video->filename) }}" type="video/mp4">
                        </video>
                    </div>
                    <div class="service-body" style="padding: 10px; display: flex; justify-content: space-between; align-items: center;">
                        <span style="font-size: 0.75rem; color: var(--secondary-color);">{{ Str::limit($video->filename, 15) }}</span>
                        <form action="{{ route('admin.medias.destroy', $video->id) }}" method="POST" onsubmit="return confirm('Supprimer cette vidéo ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: none; border: none; color: #e74a3b; cursor: pointer;"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
                @endforeach
                @if($videos->isEmpty())
                    <p style="text-align: center; color: var(--secondary-color); grid-column: 1/-1;">Aucune vidéo disponible.</p>
                @endif
            </div>
        </div>
    </main>
</div>

<script>
    function showTab(type) {
        if(type === 'images') {
            document.getElementById('content-images').style.display = 'grid';
            document.getElementById('content-videos').style.display = 'none';
            document.getElementById('tab-images').style.color = 'var(--primary-color)';
            document.getElementById('tab-images').style.borderBottom = '2px solid var(--primary-color)';
            document.getElementById('tab-videos').style.color = 'var(--secondary-color)';
            document.getElementById('tab-videos').style.borderBottom = 'none';
        } else {
            document.getElementById('content-images').style.display = 'none';
            document.getElementById('content-videos').style.display = 'grid';
            document.getElementById('tab-videos').style.color = 'var(--primary-color)';
            document.getElementById('tab-videos').style.borderBottom = '2px solid var(--primary-color)';
            document.getElementById('tab-images').style.color = 'var(--secondary-color)';
            document.getElementById('tab-images').style.borderBottom = 'none';
        }
    }
</script>
@endsection
