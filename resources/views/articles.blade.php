<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Navbar Custom */
        .navbar {
            background: #0a1f44;
            padding: 1rem 0;
        }
        .nav-link {
            transition: 0.3s;
            opacity: 0.8;
        }
        .nav-link:hover, .nav-link.active {
            opacity: 1;
            color: #fff !important;
        }

        /* Card Custom */
        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }

        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 12px 24px rgba(0,0,0,0.15);
        }

        .card img {
            height: 200px;
            object-fit: cover;
        }

        .card-body {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
            padding: 1.5rem;
        }

        .card-title {
            color: #0a1f44;
            margin-bottom: 1rem;
        }

        .card-text {
            line-height: 1.6;
            margin-bottom: 1.5rem;
        }

        /* Tombol Navy */
        .btn-navy {
            background: #0a1f44;
            border: none;
            border-radius: 25px;
            transition: 0.3s;
            color: white;
            padding: 10px 20px;
            margin-top: auto; 
        }

        .btn-navy:hover {
            background: #162d55;
            transform: scale(1.02);
            color: white;
        }

        footer {
            background: #0a1f44;
            color: rgba(255,255,255,0.7);
        }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="/">MyBlog</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-nav ms-auto">
                <a href="/" class="nav-link">Home</a>
                <a href="/profile" class="nav-link">Profile</a>
                <a href="/articles" class="nav-link active">Articles</a>
                <a href="/contact" class="nav-link">Contact</a>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h2 class="text-center mb-5 fw-bold" style="color: #0a1f44;">Articles</h2>

    {{-- Definisi Data Cukup Sekali Saja --}}
    @php
    $defaultTitles = [
        "Belajar HTML & CSS Dasar",
        "Mengenal Laravel untuk Pemula",
        "Tips Membuat Website Responsif",
        "Panduan Bootstrap Modern",
        "Trend Teknologi Web 2026",
        "Cara Membuat Blog Sederhana"
    ];

    $defaultDescs = [
        "Pelajari dasar HTML dan CSS untuk membuat tampilan website yang rapi dan terstruktur.",
        "Panduan lengkap Laravel untuk pemula agar bisa membuat web lebih cepat dan efisien.",
        "Tips membuat website yang tampilannya fleksibel di semua ukuran layar.",
        "Belajar Bootstrap untuk mempercepat pembuatan UI modern dan responsif.",
        "Update perkembangan teknologi web terbaru yang wajib kamu ketahui.",
        "Langkah mudah membuat blog sederhana menggunakan HTML, CSS, dan Laravel dasar."
    ];

    $images = [
        "https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop",
        "https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=400&h=300&fit=crop",
        "https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=300&fit=crop",
        "https://images.unsplash.com/photo-1526378722484-bd91ca387e72?w=400&h=300&fit=crop",
        "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=400&h=300&fit=crop",
        "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=300&fit=crop"
    ];
    @endphp

    <div class="row g-4">

    {{-- 1. TAMPILKAN 6 ARTIKEL DEFAULT --}}
    @for ($i = 0; $i < 6; $i++)
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <img src="{{ $images[$i] }}" alt="article">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $defaultTitles[$i] }}</h5>
                <p class="card-text text-muted small">{{ $defaultDescs[$i] }}</p>
                
                <a href="#" class="btn btn-navy w-100 mb-2">Read More</a>
                
                {{-- Tombol Hapus Statik agar tampilan sama --}}
                <button class="btn btn-danger w-100" onclick="return confirm('Artikel bawaan tidak bisa dihapus.')">
                    Hapus
                </button>
            </div>
        </div>
    </div>
    @endfor

    {{-- 2. TAMPILKAN ARTIKEL DARI DATABASE --}}
    @foreach ($articles as $a)
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <img src="{{ $a->image ?? $images[0] }}" alt="{{ $a->title }}">
            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $a->title }}</h5>
                <p class="card-text text-muted small">{{ $a->description }}</p>

                <a href="#" class="btn btn-navy w-100 mb-2">Read More</a>

                <form action="/articles/{{ $a->id }}" method="POST" onsubmit="return confirm('Yakin mau hapus artikel ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger w-100">Hapus</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    </div> {{-- End Row --}}

    <hr class="my-5">

    {{-- FORM TAMBAH ARTIKEL --}}
    <div class="p-4 bg-white rounded-4 shadow-sm mb-5">
        <div class="p-3 rounded-3 text-white mb-4" style="background: linear-gradient(135deg, #0a1f44, #162d55);">
            <h4 class="mb-0 fw-bold">Tambah Artikel</h4>
            <small style="opacity:0.8;">Buat artikel baru di blog kamu</small>
        </div>

        <form action="/articles" method="POST">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul</label>
                <input type="text" name="title" class="form-control rounded-3 border-0 shadow-sm" placeholder="Masukkan judul artikel" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="description" class="form-control rounded-3 border-0 shadow-sm" rows="3" placeholder="Tulis isi artikel..." required></textarea>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Image URL (opsional)</label>
                <input type="text" name="image" class="form-control rounded-3 border-0 shadow-sm" placeholder="https://...">
            </div>
            <button class="btn w-100 text-white fw-semibold rounded-3 shadow-sm" style="background: linear-gradient(135deg, #0a1f44, #1b3a6b); padding:12px;">
                + Tambah Artikel
            </button>
        </form>
    </div>

</div> {{-- End Container --}}

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>