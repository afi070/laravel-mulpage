<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Articles - MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <style>
        body {
            background: #f5f7fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .navbar { background: #0a1f44; padding: 1rem 0; }
        .nav-link { transition: 0.3s; opacity: 0.8; }
        .nav-link:hover, .nav-link.active { opacity: 1; color: #fff !important; }

        .card {
            border: none;
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05);
            display: flex;
            flex-direction: column;
        }
        .card:hover { transform: translateY(-8px); box-shadow: 0 12px 24px rgba(0,0,0,0.15); }
        .card img { height: 200px; object-fit: cover; }
        .card-body { display: flex; flex-direction: column; flex-grow: 1; padding: 1.5rem; }

        .btn-navy {
            background: #0a1f44;
            border: none;
            border-radius: 25px;
            transition: 0.3s;
            color: white;
            padding: 10px 20px;
            margin-top: auto; 
        }
        .btn-navy:hover { background: #162d55; transform: scale(1.02); color: white; }

        /* Styling Icon Aksi */
        .icon-btn {
            background: none;
            border: none;
            padding: 5px 10px;
            font-size: 1.5rem; /* Ukuran Besar */
            transition: 0.2s;
            cursor: pointer;
        }
        
        /* Warna Icon */
        .color-edit { color: #ffc107; } /* Kuning */
        .color-delete { color: #dc3545; } /* Merah */
        
        .icon-btn:hover { transform: scale(1.2); filter: brightness(1.1); }
    </style>
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold fs-4" href="/">MyBlog</a>
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

    @php
    $defaultTitles = ["Belajar HTML & CSS Dasar", "Mengenal Laravel untuk Pemula", "Tips Membuat Website Responsif", "Panduan Bootstrap Modern", "Trend Teknologi Web 2026", "Cara Membuat Blog Sederhana"];
    $defaultDescs = ["Pelajari dasar HTML dan CSS untuk membuat tampilan website yang rapi dan terstruktur.", "Panduan lengkap Laravel untuk pemula agar bisa membuat web lebih cepat dan efisien.", "Tips membuat website yang tampilannya fleksibel di semua ukuran layar.", "Belajar Bootstrap untuk mempercepat pembuatan UI modern dan responsif.", "Update perkembangan teknologi web terbaru yang wajib kamu ketahui.", "Langkah mudah membuat blog sederhana menggunakan HTML, CSS, dan Laravel dasar."];
    $images = ["https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=400&h=300&fit=crop", "https://images.unsplash.com/photo-1504639725590-34d0984388bd?w=400&h=300&fit=crop", "https://images.unsplash.com/photo-1518770660439-4636190af475?w=400&h=300&fit=crop", "https://images.unsplash.com/photo-1526378722484-bd91ca387e72?w=400&h=300&fit=crop", "https://images.unsplash.com/photo-1504384308090-c894fdcc538d?w=400&h=300&fit=crop", "https://images.unsplash.com/photo-1555066931-4365d14bab8c?w=400&h=300&fit=crop"];
    @endphp

    <div class="row g-4">

    {{-- 1. ARTIKEL DEFAULT DENGAN PESAN ALERT --}}
    @for ($i = 0; $i < 6; $i++)
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            <img src="{{ $images[$i] }}" alt="article">
            <div class="card-body">
                <h5 class="card-title fw-bold" style="color: #0a1f44;">{{ $defaultTitles[$i] }}</h5>
                <p class="card-text text-muted small">{{ $defaultDescs[$i] }}</p>
                
                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <a href="#" class="btn btn-navy px-4">Read More</a>
                    <div style="opacity: 0.8;" class="d-flex align-items-center">
                        {{-- Tombol Edit Dummy --}}
                        <button class="icon-btn color-edit" onclick="alert('Data default tidak bisa diubah')">
                            <i class="fa-solid fa-pencil"></i>
                        </button>
                        {{-- Tombol Hapus Dummy --}}
                        <button class="icon-btn color-delete" onclick="alert('Data default tidak bisa dihapus')">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endfor

    {{-- 2. ARTIKEL DATABASE (FUNGSI ASLI) --}}
    @foreach ($articles as $a)
    <div class="col-lg-4 col-md-6">
        <div class="card h-100">
            {{-- TAMPILAN GAMBAR - Support image_path (upload) dan image_url (link) --}}
            @if($a->image_path)
                <img src="{{ asset('storage/' . $a->image_path) }}" alt="{{ $a->title }}">
            @elseif($a->image_url)
                <img src="{{ $a->image_url }}" alt="{{ $a->title }}">
            @else
                <img src="{{ $images[0] }}" alt="{{ $a->title }}">
            @endif
            <div class="card-body">
                <h5 class="card-title fw-bold" style="color: #0a1f44;">{{ $a->title }}</h5>
                <p class="card-text text-muted small">{{ $a->description }}</p>

                <div class="d-flex justify-content-between align-items-center mt-auto">
                    <a href="#" class="btn btn-navy px-4">Read More</a>
                    
                    <div class="d-flex align-items-center">
                        <button class="icon-btn color-edit" data-bs-toggle="modal" data-bs-target="#editModal{{ $a->id }}">
                            <i class="fa-solid fa-pencil"></i>
                        </button>

                        <form action="/articles/{{ $a->id }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')" class="m-0">
                            @csrf @method('DELETE')
                            <button type="submit" class="icon-btn color-delete">
                                <i class="fa-solid fa-trash-can"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- MODAL EDIT ASLI (DENGAN UPLOAD FILE) -->
    <div class="modal fade" id="editModal{{ $a->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background: #0a1f44;">
                    <h5 class="modal-title fw-bold">Edit Artikel</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="/articles/{{ $a->id }}" method="POST" enctype="multipart/form-data">
                    @csrf @method('PUT')
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul</label>
                            <input type="text" name="title" class="form-control" value="{{ $a->title }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="4" required>{{ $a->description }}</textarea>
                        </div>
                        
                        {{-- Gambar Saat Ini --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Gambar Saat Ini</label>
                            @if($a->image_path)
                                <div>
                                    <img src="{{ asset('storage/' . $a->image_path) }}" style="max-width: 150px; border-radius: 5px;">
                                    <p class="text-success mt-1"><small>✓ File upload</small></p>
                                </div>
                            @elseif($a->image_url)
                                <div>
                                    <img src="{{ $a->image_url }}" style="max-width: 150px; border-radius: 5px;">
                                    <p class="text-info mt-1"><small>✓ Link URL</small></p>
                                </div>
                            @else
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>
                        
                        {{-- Ganti Gambar --}}
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif">
                            <small class="text-muted">Upload file baru untuk mengganti gambar (Max 2MB)</small>
                            <div id="preview_edit_{{ $a->id }}" class="mt-2"></div>
                        </div>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-navy rounded-pill px-4">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach

    </div>

    <hr class="my-5">

    {{-- FORM TAMBAH ARTIKEL DENGAN UPLOAD FILE --}}
    <div class="p-4 bg-white rounded-4 shadow-sm mb-5">
        <div class="p-3 rounded-3 text-white mb-4" style="background: linear-gradient(135deg, #0a1f44, #162d55);">
            <h4 class="mb-0 fw-bold">Tambah Artikel</h4>
        </div>
        
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/articles" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label fw-semibold">Judul <span class="text-danger">*</span></label>
                <input type="text" name="title" class="form-control border-0 shadow-sm" placeholder="Masukkan judul" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi <span class="text-danger">*</span></label>
                <textarea name="description" class="form-control border-0 shadow-sm" rows="3" placeholder="Tulis isi..." required></textarea>
            </div>
            
            {{-- Pilihan Gambar --}}
            <div class="mb-3">
                <label class="form-label fw-semibold">Gambar Artikel</label>
                
                <div class="d-flex gap-3 mb-2">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="image_type" id="type_upload" value="upload" checked>
                        <label class="form-check-label" for="type_upload">📁 Upload File</label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="image_type" id="type_url" value="url">
                        <label class="form-check-label" for="type_url">🔗 Link URL</label>
                    </div>
                </div>
                
                {{-- Upload file --}}
                <div id="upload_section">
                    <input type="file" name="image" class="form-control border-0 shadow-sm" accept="image/*">
                    <small class="text-muted">Format JPG, PNG (Max 2MB)</small>
                    <div id="preview_tambah" class="mt-2"></div>
                </div>
                
                {{-- Link URL (tetap dipertahankan) --}}
                <div id="url_section" style="display: none;">
                    <input type="text" name="image_url" class="form-control border-0 shadow-sm" placeholder="https://...">
                    <small class="text-muted">Masukkan URL gambar</small>
                </div>
            </div>
            
            <button type="submit" class="btn w-100 text-white fw-semibold rounded-3 shadow-sm" style="background: linear-gradient(135deg, #0a1f44, #1b3a6b); padding:12px;">
                + Tambah Artikel
            </button>
        </form>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// Toggle upload vs URL untuk form tambah
const uploadSection = document.getElementById('upload_section');
const urlSection = document.getElementById('url_section');
const radioUpload = document.getElementById('type_upload');
const radioUrl = document.getElementById('type_url');

if (radioUpload && radioUrl) {
    radioUpload.addEventListener('change', function() {
        uploadSection.style.display = 'block';
        urlSection.style.display = 'none';
    });
    
    radioUrl.addEventListener('change', function() {
        uploadSection.style.display = 'none';
        urlSection.style.display = 'block';
    });
}

const imageInput = document.querySelector('input[name="image"]');
const previewTambah = document.getElementById('preview_tambah');

if (imageInput) {
    imageInput.addEventListener('change', function() {
        previewTambah.innerHTML = '';
        if (this.files && this.files[0]) {
            const file = this.files[0];
            if (file.type.startsWith('image/') && file.size <= 2 * 1024 * 1024) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    previewTambah.innerHTML = `<img src="${e.target.result}" style="max-width: 150px; border-radius: 5px; margin-top: 10px;">`;
                };
                reader.readAsDataURL(file);
            } else {
                previewTambah.innerHTML = '<div class="alert alert-danger mt-2">File harus gambar dan maksimal 2MB</div>';
                this.value = '';
            }
        }
    });
}


@foreach ($articles as $a)
document.querySelector('#editModal{{ $a->id }} input[name="image"]')?.addEventListener('change', function(e) {
    const previewDiv = document.getElementById('preview_edit_{{ $a->id }}');
    previewDiv.innerHTML = '';
    if (this.files && this.files[0]) {
        const reader = new FileReader();
        reader.onload = function(e) {
            previewDiv.innerHTML = `<img src="${e.target.result}" style="max-width: 150px; border-radius: 5px; margin-top: 10px;">`;
        };
        reader.readAsDataURL(this.files[0]);
    }
});
@endforeach
</script>

</body>
</html>