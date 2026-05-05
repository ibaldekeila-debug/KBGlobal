@extends('layouts.app')

@section('content')
<div class="container" style="padding-top: 40px; padding-bottom: 60px;">
    <div class="section-title">
        <h2>Galerie Photos</h2>
        <p>Découvrez nos réalisations et nos services en images</p>
    </div>

    <div class="services-grid" style="grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));">
        @forelse($mediaImages as $image)
        <div class="service-card gallery-item" onclick="openLightbox('{{ asset('images/' . $image->filename) }}')" style="cursor: pointer;">
            <div class="service-img" style="background-image: url('{{ asset('images/' . $image->filename) }}'); height: 250px;"></div>
        </div>
        @empty
        <p style="text-align: center; grid-column: 1 / -1; color: var(--secondary-color);">Aucune photo publiée pour le moment.</p>
        @endforelse
    </div>
</div>

<!-- Lightbox Modal -->
<div id="lightbox" class="lightbox" onclick="closeLightbox()">
    <span class="close">&times;</span>
    <img class="lightbox-content" id="lightbox-img">
</div>

<style>
    .gallery-item {
        transition: transform 0.3s ease;
    }
    .gallery-item:hover {
        transform: scale(1.05);
    }
    .lightbox {
        display: none;
        position: fixed;
        z-index: 9999;
        padding-top: 50px;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0,0,0,0.9);
    }
    .lightbox-content {
        margin: auto;
        display: block;
        width: 80%;
        max-width: 900px;
        border-radius: 8px;
        animation: zoom 0.6s;
    }
    .close {
        position: absolute;
        top: 20px;
        right: 35px;
        color: #f1f1f1;
        font-size: 40px;
        font-weight: bold;
        cursor: pointer;
    }
    @keyframes zoom {
        from {transform:scale(0)} 
        to {transform:scale(1)}
    }
</style>

<script>
    function openLightbox(src) {
        document.getElementById('lightbox-img').src = src;
        document.getElementById('lightbox').style.display = "block";
    }
    function closeLightbox() {
        document.getElementById('lightbox').style.display = "none";
    }
</script>
@endsection
