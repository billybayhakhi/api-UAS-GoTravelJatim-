<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog & Tips Wisata - GoJatim Travel</title>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,600;1,300;1,400&family=DM+Sans:wght@300;400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <style>
        body { background: #f8fafc; padding-top: 80px; }

        /* Page Hero */
        .page-hero {
            background: linear-gradient(135deg, #0d1b2a 0%, #1a3a5c 100%);
            padding: 80px 40px 60px;
            text-align: center;
            color: white;
        }
        .page-hero .label {
            font-size: 12px;
            letter-spacing: 0.2em;
            text-transform: uppercase;
            color: #d97706;
            font-weight: 600;
            margin-bottom: 16px;
        }
        .page-hero h1 {
            font-family: 'Cormorant Garamond', serif;
            font-size: 56px;
            font-weight: 600;
            line-height: 1.1;
            margin-bottom: 16px;
        }
        .page-hero h1 em { font-style: italic; color: #d97706; }
        .page-hero p {
            font-size: 16px;
            color: rgba(255,255,255,0.7);
            max-width: 500px;
            margin: 0 auto;
        }

        /* Blog Container */
        .blog-container {
            max-width: 1100px;
            margin: 0 auto;
            padding: 60px 24px;
        }

        /* Featured Blog */
        .featured-card {
            display: grid;
            grid-template-columns: 1.2fr 1fr;
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 8px 30px rgba(0,0,0,0.08);
            margin-bottom: 60px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .featured-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.12);
        }
        .featured-img {
            width: 100%;
            height: 400px;
            object-fit: cover;
        }
        .featured-body {
            padding: 50px 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .featured-label {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 0.15em;
            text-transform: uppercase;
            color: white;
            background: #d97706;
            display: inline-block;
            padding: 5px 12px;
            border-radius: 20px;
            margin-bottom: 20px;
            width: fit-content;
        }
        .featured-title {
            font-family: 'Cormorant Garamond', serif;
            font-size: 34px;
            font-weight: 600;
            line-height: 1.2;
            color: #0d1b2a;
            margin-bottom: 16px;
        }
        .featured-excerpt {
            font-size: 15px;
            color: #64748b;
            line-height: 1.7;
            margin-bottom: 30px;
        }
        .featured-meta {
            display: flex;
            align-items: center;
            gap: 16px;
            font-size: 13px;
            color: #94a3b8;
            margin-bottom: 30px;
        }
        .featured-meta i { color: #d97706; }
        .btn-read {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            background: #0d1b2a;
            color: white;
            padding: 14px 28px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.2s;
            width: fit-content;
        }
        .btn-read:hover {
            background: #d97706;
            transform: translateX(4px);
        }

        /* Blog Grid */
        .section-title-sm {
            font-family: 'Cormorant Garamond', serif;
            font-size: 32px;
            color: #0d1b2a;
            margin-bottom: 30px;
            font-weight: 600;
        }
        .section-title-sm em { font-style: italic; color: #d97706; }

        .blogs-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 28px;
        }
        @media (max-width: 900px) {
            .blogs-grid { grid-template-columns: repeat(2, 1fr); }
            .featured-card { grid-template-columns: 1fr; }
            .featured-img { height: 250px; }
        }
        @media (max-width: 600px) {
            .blogs-grid { grid-template-columns: 1fr; }
            .page-hero h1 { font-size: 36px; }
        }

        .blog-card {
            background: white;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 2px 12px rgba(0,0,0,0.06);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
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

        /* Empty state */
        .empty-state {
            text-align: center;
            padding: 80px 20px;
            color: #94a3b8;
        }
        .empty-state i { font-size: 48px; margin-bottom: 16px; display: block; }
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

    <!-- PAGE HERO -->
    <div class="page-hero">
        <p class="label">Stories & Tips</p>
        <h1>Blog <em>Wisata</em> Kami</h1>
        <p>Inspirasi perjalanan, tips, dan cerita seru dari destinasi-destinasi terbaik Jawa Timur.</p>
    </div>

    <div class="blog-container">

        @if($blogs->count() > 0)
            @php $featured = $blogs->first(); $rest = $blogs->skip(1); @endphp

            <!-- Featured Blog -->
            <a href="{{ url('/blog/' . $featured->slug) }}" style="text-decoration:none;">
                <div class="featured-card">
                    <img class="featured-img" src="{{ asset($featured->image) }}" alt="{{ $featured->title }}">
                    <div class="featured-body">
                        <span class="featured-label">{{ $featured->tag }}</span>
                        <h2 class="featured-title">{{ $featured->title }}</h2>
                        <p class="featured-excerpt">{{ $featured->excerpt }}</p>
                        <div class="featured-meta">
                            <span><i class="far fa-calendar-alt"></i> {{ $featured->published_at ? $featured->published_at->translatedFormat('d F Y') : '-' }}</span>
                            @if($featured->destination)
                            <span><i class="fas fa-map-marker-alt"></i> {{ $featured->destination->name }}</span>
                            @endif
                        </div>
                        <div class="btn-read">Baca Selengkapnya <i class="fas fa-arrow-right"></i></div>
                    </div>
                </div>
            </a>

            <!-- Other Blogs -->
            @if($rest->count() > 0)
            <h2 class="section-title-sm">Artikel <em>Lainnya</em></h2>
            <div class="blogs-grid">
                @foreach($rest as $blog)
                <div class="blog-card">
                    <div class="blog-card-img-wrapper">
                        <img class="blog-card-img" src="{{ asset($blog->image) }}" alt="{{ $blog->title }}">
                    </div>
                    <div class="blog-card-body">
                        <p class="blog-card-tag">{{ $blog->tag }}</p>
                        <h3 class="blog-card-title">{{ $blog->title }}</h3>
                        <p class="blog-card-excerpt">{{ $blog->excerpt }}</p>
                        <div class="blog-card-footer">
                            <span class="blog-card-date">
                                <i class="far fa-calendar-alt"></i>
                                {{ $blog->published_at ? $blog->published_at->translatedFormat('d F Y') : '-' }}
                            </span>
                            <a href="{{ url('/blog/' . $blog->slug) }}" class="btn-read-sm">Baca <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            @endif

        @else
            <div class="empty-state">
                <i class="fas fa-newspaper"></i>
                <h3 style="color:#0d1b2a; margin-bottom: 8px;">Belum ada artikel</h3>
                <p>Artikel blog akan segera hadir. Pantau terus!</p>
            </div>
        @endif

    </div>

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
