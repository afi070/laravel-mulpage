<!DOCTYPE html>
<html>
<head>
    <title>Edit Artikel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .preview-image {
            max-width: 200px;
            margin-top: 10px;
            border-radius: 5px;
        }
        .current-image {
            max-width: 200px;
            border-radius: 5px;
            border: 2px solid #ddd;
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
                <div class="card-header bg-warning">
                    <h4 class="mb-0">✏️ Edit Artikel</h4>
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

                    <form action="/articles/{{ $article->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Judul <span class="text-danger">*</span></label>
                            <input type="text" name="title" class="form-control" value="{{ old('title', $article->title) }}" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Deskripsi <span class="text-danger">*</span></label>
                            <textarea name="description" class="form-control" rows="5" required>{{ old('description', $article->description) }}</textarea>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Gambar Saat Ini</label>
                            @if($article->image_path)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $article->image_path) }}" class="current-image">
                                    <p class="text-success mt-2 mb-0">
                                        <i class="fas fa-check-circle"></i> File lokal (upload)
                                    </p>
                                </div>
                            @elseif($article->image_url)
                                <div class="mb-2">
                                    <img src="{{ $article->image_url }}" class="current-image">
                                    <p class="text-info mt-2 mb-0">
                                        <i class="fas fa-link"></i> Link eksternal
                                    </p>
                                </div>
                            @else
                                <p class="text-muted">Tidak ada gambar</p>
                            @endif
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-bold">Ganti Gambar (Opsional)</label>
                            <input type="file" name="image" class="form-control" accept="image/jpeg,image/png,image/gif">
                            <small class="text-muted">Upload file baru untuk mengganti gambar saat ini (Max 2MB)</small>
                            <div id="image_preview"></div>
                        </div>
                        
                        <div class="d-flex justify-content-between">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Update
                            </button>
                            <a href="/articles" class="btn btn-secondary">
                                <i class="fas fa-arrow-left"></i> Kembali
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Preview gambar baru
document.querySelector('input[name="image"]').addEventListener('change', function(e) {
    const preview = document.getElementById('image_preview');
    preview.innerHTML = '';
    
    if (this.files && this.files[0]) {
        const file = this.files[0];
        
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
                    <strong>✓ Preview Gambar Baru:</strong><br>
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