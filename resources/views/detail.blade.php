@extends('layouts.app')

@section('title', $item->judul)

@section('meta')
    
    <meta name="description" content="{{ Str::limit($type == 'berita' ? $item->isi : $item->deskripsi, 150) }}">
    <meta name="author" content="Your Site Name">
    
    <meta property="og:title" content="{{ $item->judul }}" />
    <meta property="og:description" content="{{ Str::limit($type == 'berita' ? $item->isi : $item->deskripsi, 150) }}" />
    <meta property="og:image" content="{{ asset($item->gambar) }}" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:type" content="article" />
    <meta property="og:site_name" content="Your Site Name" />
    
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $item->judul }}">
    <meta name="twitter:description" content="{{ Str::limit($type == 'berita' ? $item->isi : $item->deskripsi, 150) }}">
    <meta name="twitter:image" content="{{ asset($item->gambar) }}">
@endsection

@section('content')
    <style>
        .news-detail {
            padding: 40px 0;
        }
        
        .news-header {
            position: relative;
            margin-bottom: 30px;
        }
        
        .news-image {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
        }
        
        .news-meta {
            margin: 20px 0;
            color: #6c757d;
            font-size: 0.9rem;
        }
        
        .news-title {
            font-size: 2.5rem;
            font-weight: 700;
            margin: 20px 0;
            color: #2c3e50;
        }
        
        .news-content {
            font-size: 1.1rem;
            line-height: 1.8;
            color: #34495e;
            text-align: justify;
        }
        
        .share-buttons {
            margin: 30px 0;
            padding: 20px 0;
            border-top: 1px solid #eee;
            border-bottom: 1px solid #eee;
        }
        
        .share-buttons a {
            margin-right: 15px;
            color: #2c3e50;
            transition: color 0.3s;
        }
        
        .share-buttons a:hover {
            color: #3498db;
        }
        
        .back-button {
            padding: 10px 25px;
            border-radius: 25px;
            transition: all 0.3s;
            background: #3498db;
            border: none;
            box-shadow: 0 4px 15px rgba(52, 152, 219, 0.2);
        }
        
        .back-button:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(52, 152, 219, 0.3);
            background: #2980b9;
        }

        .date-badge {
            position: absolute;
            top: 20px;
            left: 20px;
            background: rgba(255, 255, 255, 0.9);
            padding: 10px 20px;
            border-radius: 25px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .reading-time {
            display: inline-block;
            padding: 5px 15px;
            background: #f8f9fa;
            border-radius: 15px;
            font-size: 0.9rem;
            margin-left: 15px;
        }

        .copy-url {
            margin-right: 15px;
            color: #2c3e50;
            cursor: pointer;
            transition: color 0.3s;
        }

        .copy-url:hover {
            color: #3498db;
        }
    </style>
    <div class="news-detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2">
                    <article>
                        <div class="news-header">
                            <img src="{{ asset($item->gambar) }}" class="news-image" alt="{{ $item->judul }}">
                            <div class="date-badge">
                                <i class="far fa-calendar-alt"></i>
                                {{ $item->created_at->format('d M Y') }}
                            </div>
                        </div>

                        <div class="news-meta">
                            <i class="far fa-user"></i> By Admin
                            <span class="reading-time">
                                <i class="far fa-clock"></i> 
                                {{ ceil(str_word_count($item->isi) / 200) }} min read
                            </span>
                        </div>

                        <h1 class="news-title">{{ $item->judul }}</h1>

                        <div class="news-content">
                            {{ $type == 'berita' ? $item->isi : $item->deskripsi }}
                        </div>

                        <div class="share-buttons">
                            <strong class="mr-3">Share this article:</strong>
                            <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" target="_blank" title="Share on Facebook"><i class="fab fa-facebook-f fa-lg"></i></a>
                            <a href="https://twitter.com/intent/tweet?url={{ urlencode(url()->current()) }}" target="_blank" title="Share on Twitter"><i class="fab fa-twitter fa-lg"></i></a>
                            <a href="https://www.linkedin.com/shareArticle?mini=true&url={{ urlencode(url()->current()) }}" target="_blank" title="Share on LinkedIn"><i class="fab fa-linkedin-in fa-lg"></i></a>
                            <a href="https://api.whatsapp.com/send?text={{ urlencode(url()->current()) }}" target="_blank" title="Share on WhatsApp"><i class="fab fa-whatsapp fa-lg"></i></a>
                            <span class="copy-url" onclick="copyToClipboard('{{ url()->current() }}')" title="Copy URL"><i class="fas fa-link fa-lg"></i></span>
                        </div>

                        <a href="{{ url()->previous() }}" class="btn back-button">
                            <i class="fas fa-arrow-left mr-2"></i> Back to Articles
                        </a>
                    </article>
                </div>
            </div>
        </div>
    </div>
    <script>
        function copyToClipboard(url) {
            navigator.clipboard.writeText(url).then(function() {
                alert('URL copied to clipboard');
            }, function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
@endsection