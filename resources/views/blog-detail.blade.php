<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $blog->title }} - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body { background: #f8fafc; padding-top: 80px; }

        /* Article Header */
        .article-header {
            max-width: 800px;
            margin: 60px auto 40px;
            text-align: center;
            padding: 0 20px;
        }
        .article-tag {
            font-size: 12px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: #d97706;
            margin-bottom: 20px;
            display: inline-block;
        }
        .article-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 48px;
            font-weight: 600;
            color: #0d1b2a;
            line-height: 1.2;
            margin-bottom: 24px;
        }
        .article-meta {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 24px;
            font-size: 14px;
            color: #64748b;
        }
        .article-meta i { color: #d97706; margin-right: 6px; }

        /* Article Image */
        .article-image-container {
            max-width: 1000px;
            margin: 0 auto 60px;
            padding: 0 20px;
        }
        .article-main-image {
            width: 100%;
            height: 500px;
            object-fit: cover;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
        }

        /* Article Content */
        .article-content {
            max-width: 700px;
            margin: 0 auto 80px;
            padding: 0 20px;
            font-size: 18px;
            line-height: 1.8;
            color: #334155;
        }
        .article-content p { margin-bottom: 24px; }
        .article-content h2, .article-content h3 {
            font-family: 'Cormorant Garamond', serif;
            color: #0d1b2a;
            margin: 40px 0 20px;
            font-weight: 600;
        }
        .article-content h2 { font-size: 32px; }
        .article-content h3 { font-size: 26px; }
        .article-content img {
            width: 100%;
            border-radius: 12px;
            margin: 30px 0;
        }
        .article-content blockquote {
            border-left: 4px solid #d97706;
            padding-left: 20px;
            font-style: italic;
            color: #64748b;
            margin: 30px 0;
            font-size: 20px;
        }

        /* Related Articles */
        .related-section {
            background: white;
            padding: 80px 20px;
            border-top: 1px solid #e2e8f0;
        }
        .related-container {
            max-width: 1100px;
            margin: 0 auto;
        }
        .section-title-sm {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            color: #0d1b2a;
            margin-bottom: 40px;
            font-weight: 600;
            text-align: center;
        }
        .section-title-sm em { font-style: italic; color: #d97706; }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        @media (max-width: 900px) {
            .blogs-grid { grid-template-columns: repeat(2, 1fr); }
            .article-title { font-size: 36px; }
            .article-main-image { height: 350px; }
        }
        @media (max-width: 600px) {
            .blogs-grid { grid-template-columns: 1fr; }
            .article-meta { flex-direction: column; gap: 10px; }
        }

        /* Reused Blog Card Styles */
        .blog-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            border: 1px solid #f1f5f9;
        }
        .blog-card:hover {
            transform: translateY(-6px);
            box-shadow: 0 16px 40px rgba(0,0,0,0.12);
        }
        .blog-card-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            transition: transform 0.4s ease;
        }
        .blog-card:hover .blog-card-img { transform: scale(1.05); }
        .blog-card-img-wrapper { overflow: hidden; }

        .blog-card-body {
            padding: 24px;
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        .blog-card-tag {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.12em;
            text-transform: uppercase;
            color: #d97706;
            margin-bottom: 12px;
        }
        .blog-card-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 22px;
            font-weight: 600;
            color: #0d1b2a;
            line-height: 1.3;
            margin-bottom: 12px;
        }
        .blog-card-excerpt {
            font-size: 14px;
            color: #64748b;
            line-height: 1.6;
            flex: 1;
            margin-bottom: 20px;
        }
        .blog-card-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding-top: 16px;
            border-top: 1px solid #f1f5f9;
        }
        .blog-card-date {
            font-size: 12px;
            color: #94a3b8;
        }
        .blog-card-date i { margin-right: 4px; }
        .btn-read-sm {
            font-size: 13px;
            font-weight: 600;
            color: #0d1b2a;
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: color 0.2s;
        }
        .btn-read-sm:hover { color: #d97706; }
    </style>
</head>
<body>
    <!-- NAVBAR -->
    <nav>
        <a href="{{ url('/') }}" class="nav-logo">Go Jatim <span>Travel</span></a>
        <ul class="nav-links">
            <li><a href="{{ url('/') }}">Beranda</a></li>
            <li><a href="{{ url('/tours') }}">Touring</a></li>
            <li><a href="{{ url('/destinations') }}">Destinasi</a></li>
            <li><a href="{{ url('/blog') }}" class="nav-active">Blog</a></li>
            <li><a href="{{ url('/contact') }}">Kontak</a></li>
        </ul>
        <div class="nav-right">
            <span class="nav-phone"><i class="fas fa-phone"></i> 081249896338</span>
            <div class="nav-icons">
                <a href="{{ url('/login') }}"><i class="far fa-user"></i></a>
            </div>
        </div>
    </nav>

    <!-- ARTICLE HEADER -->
    <div class="article-header">
        <span class="article-tag">{{ $blog->tag }}</span>
        <h1 class="article-title">{{ $blog->title }}</h1>
        <div class="article-meta">
            <span><i class="far fa-user-circle"></i> Ditulis oleh {{ $blog->author ? $blog->author->name : 'Admin GoJatim' }}</span>
            <span><i class="far fa-calendar-alt"></i> {{ $blog->published_at ? $blog->published_at->translatedFormat('d F Y') : '-' }}</span>
            @if($blog->destination)
            <span><i class="fas fa-map-marker-alt"></i> Terkait: {{ $blog->destination->name }}</span>
            @endif
        </div>
    </div>

    <!-- MAIN IMAGE -->
    <div class="article-image-container">
        <img class="article-main-image" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
    </div>

    <!-- ARTICLE CONTENT -->
    <div class="article-content">
        {!! $blog->body !!}
    </div>

    <!-- RELATED ARTICLES -->
    @if($related->count() > 0)
    <div class="related-section">
        <div class="related-container">
            <h2 class="section-title-sm">Baca <em>Juga</em></h2>
            <div class="blogs-grid">
                @foreach($related as $rel)
                <div class="blog-card">
                    <div class="blog-card-img-wrapper">
                        <img class="blog-card-img" src="{{ asset($rel->image) }}" alt="{{ $rel->title }}">
                    </div>
                    <div class="blog-card-body">
                        <p class="blog-card-tag">{{ $rel->tag }}</p>
                        <h3 class="blog-card-title">{{ $rel->title }}</h3>
                        <p class="blog-card-excerpt">{{ $rel->excerpt }}</p>
                        <div class="blog-card-footer">
                            <span class="blog-card-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ $rel->published_at ? $rel->published_at->translatedFormat('d F Y') : '-' }}
                            </span>
                            <a href="{{ url('/blog/' . $rel->slug) }}" class="btn-read-sm">Baca <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif

    <!-- FOOTER -->
    <footer>
        <div class="footer-bottom" style="text-align:center; padding: 30px;">
            <span>© {{ date('Y') }} GoJatim. All rights reserved.</span>
        </div>
    </footer>

    <script src="{{ asset('js/auth.js') }}"></script>
    <script>
        window.addEventListener('scroll', () => {
            const nav = document.querySelector('nav');
            nav.style.boxShadow = window.scrollY > 20
                ? '0 4px 24px rgba(0,0,0,0.08)'
                : 'none';
        });
    </script>
</body>
</html>
