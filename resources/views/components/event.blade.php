<section class="page-section bg-light" id="portfolio">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Berita</h2>
            <h3 class="section-subheading text-muted">Berita di desa dalisodo</h3>
        </div>
        <div class="row">
            @if(!empty($berita))
            @foreach ($berita as $item)
            <div class="col-lg-4 col-sm-6 mb-4">
                <div class="portfolio-item">
                    <div class="portfolio-link">
                        <img class="img-fluid" src="{{ asset($item->gambar) }}" alt={{ $item->judul }} />
                        <button class="btn-show">
                            <a href="{{ route('detail', ['type' => 'berita', 'slug' => $item->slug]) }}">See more</a>
                        </button>
                    </div>
                    <div class="">
                        <div class="text-judul my-2">{{ $item->judul }}</div>
                        <div class="text-deskripsi">{{ $item->isi }}</div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="text-center">
                Berita tidak tersedia
            </div>
            @endif
        </div>
        <nav aria-label="page navigation" class="d-flex justify-content-start my-3">
            @if(!empty($berita))
                {{ $berita->links('pagination::bootstrap-4') }}
            @endif
        </nav>
    </div>
</section>