<section class="page-section" id="services">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Potensi</h2>
            <h3 class="section-subheading text-muted">Potensi desa dalisodo</h3>
        </div>
        <div class="row text-center">
            @if($potensi->count())
            @foreach ($potensi as $item)
            <div class="col-md-4">
                <div class="image-container">
                    <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid" />
                    <button class="btn-show" onclick="window.location.href='{{ route('detail', ['type' => 'potensi', 'slug' => $item->slug]) }}'">
                        <a href="#">See more</a>
                    </button>
                </div>
                <h4 class="my-3 text-judul">{{ $item->judul }}</h4>
                <p class="text-deskripsi">{{ $item->deskripsi }}</p>
                
            </div>
            @endforeach
            @else
            <div class="text-center">
                Potensi desa tidak tersedia
            </div>
            @endif
        </div>

        <nav aria-label="page navigation" class="d-flex justify-content-start my-3">
            @if($potensi->count())
                {{ $potensi->links('pagination::bootstrap-4') }}
            @endif
        </nav>
    </div>
</section>