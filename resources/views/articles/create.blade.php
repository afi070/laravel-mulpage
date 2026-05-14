<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .preview-image {
            max-width: 200px;
            margin-top: 10px;
            border-radius: 5px;
        }
    </style>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="/">MyApp</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto">
                <li class="nav-item"><a href="/" class="nav-link">Home</a></li>
                <li class="nav-item"><a href="/profile" class="nav-link">Profile</a></li>
                <li class="nav-item"><a href="/articles" class="nav-link active">Articles</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">📝 Tambah Artikel Baru</h4>
                </div>
                <div class="card-body">
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
                            <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title') }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="5" required>{{ old('description') }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Pilih Cara Upload Gambar</label>
                            
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="image_type" 
                                       id="type_upload" value="upload" checked>
                                <label class="form-check-label" for="type_upload">
                                    📁 Upload File Gambar (Rekomendasi untuk data baru)
                                </label>
                            </div>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="image_type" 
                                       id="type_url" value="url">
                                <label class="form-check-label" for="type_url">
                                    🔗 Gunakan Link URL (Untuk kompatibilitas data lama)
                                </label>
                            </div>
                            
                            {{-- Upload File Section --}}
                            <div id="upload_section">
                                <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif">
                                <small class="text-muted">Format: JPG, PNG, GIF (Max 2MB)</small>
                                <div id="image_preview"></div>
                            </div>
                            
                            {{-- URL Section --}}
                            <div id="url_section" style="display: none;">
                                <input type="url" name="image_url" class="form-control" 
                                       placeholder="https://example.com/gambar.jpg"
                                       value="{{ old('image_url') }}">
                                <small class="text-muted">Contoh: https://picsum.photos/200/150</small>
                            </div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                            <a href="/articles" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Toggle antara upload dan URL
document.querySelectorAll('input[name="image_type"]').forEach(radio => {
    radio.addEventListener('change', function() {
        const uploadSection = document.getElementById('upload_section');
        const urlSection = document.getElementById('url_section');
        
        if (this.value === 'upload') {
            uploadSection.style.display = 'block';
            urlSection.style.display = 'none';
        } else {
            uploadSection.style.display = 'none';
            urlSection.style.display = 'block';
        }
    });
});

// Preview gambar sebelum upload
document.querySelector('input[name="image"]').addEventListener('change', function(e) {
    const preview = document.getElementById('image_preview');
    preview.innerHTML = '';
    
    if (this.files && this.files[0]) {
        const file = this.files[0];
        
        // Validasi client-side
        if (!file.type.startsWith('image/')) {
            preview.innerHTML = '<div class="alert alert-danger mt-2">❌ File harus berupa gambar!</div>';
            this.value = '';
            return;
        }
        
        if (file.size > 2 * 1024 * 1024) {
            preview.innerHTML = '<div class="alert alert-danger mt-2">❌ Ukuran file maksimal 2MB!</div>';
            this.value = '';
            return;
        }
        
        const reader = new FileReader();
        reader.onload = function(e) {
            preview.innerHTML = `
                <div class="alert alert-success mt-2">
                    <strong>✓ Preview Gambar:</strong><br>
                    <img src="${e.target.result}" class="preview-image">
                </div>
            `;
        };
        reader.readAsDataURL(file);
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>