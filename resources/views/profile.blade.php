<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Khurin Nafiah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            /* Warna latar belakang solid sesuai gambar */
            background-color: #071a33;
            color: white;
            font-family: Arial, sans-serif;
            margin: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Navbar Sesuai Referensi */
        .navbar {
            padding: 20px 0;
        }

        .navbar-brand {
            font-size: 1.1rem;
            color: white !important;
        }

        .nav-link-custom {
            color: rgba(255, 255, 255, 0.8) !important;
            font-size: 0.9rem;
            margin-left: 20px;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .nav-link-custom:hover {
            color: white !important;
        }

        /* Teks "Profile" yang menyala putih */
        .nav-link-custom.active {
            color: white !important;
            font-weight: bold;
        }

        /* Wrapper untuk memposisikan kartu di tengah */
        .main-wrapper {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        /* Kartu Profil Sesuai Referensi */
        .profile-card {
            width: 100%;
            max-width: 420px;
            background-color: rgba(255, 255, 255, 0.05); /* Sedikit transparan */
            border-radius: 20px;
            padding: 40px;
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
            text-align: center;
        }

        /* Foto Profil Lingkaran dengan border biru */
        .profile-img {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #3b82f6; /* Warna biru sesuai referensi */
            margin-bottom: 20px;
        }

        .name {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .role {
            font-size: 12px;
            color: rgba(255, 255, 255, 0.8);
            margin-bottom: 30px;
        }

        /* List Informasi dengan Flexbox agar rapi */
        .info-list {
            text-align: left;
            font-size: 13px;
            line-height: 1.8;
            color: rgba(255, 255, 255, 0.9);
        }

        .info-item {
            display: flex;
            margin-bottom: 8px;
        }

        .info-label {
            width: 110px;
            font-weight: bold;
        }

        .info-divider {
            margin-right: 10px;
        }

        .info-value {
            flex: 1;
        }

        /* Link Email Berwarna Putih */
        .info-value a {
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
        }
        
        .info-value a:hover {
            text-decoration: underline;
        }

        /* Bagian Icon Sosial Media (Tambahan Baru) */
        .social-links {
            margin-top: 35px;
            padding-top: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: center;
            gap: 20px;
        }

        .social-icon {
            color: rgba(255, 255, 255, 0.8);
            font-size: 1.1rem;
            transition: color 0.3s ease, transform 0.3s ease;
            text-decoration: none;
        }

        .social-icon:hover {
            color: #3b82f6; /* Berubah menjadi biru saat hover */
            transform: translateY(-3px);
        }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            font-size: 11px;
            color: rgba(255, 255, 255, 0.7);
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-lg">
        <div class="container d-flex justify-content-between align-items-center">
            <a class="navbar-brand fw-bold" href="#">MyBlog</a>
            
            <div class="d-flex align-items-center">
                <a href="/" class="nav-link-custom">Home</a>
                <a href="/profile" class="nav-link-custom active">Profile</a>
                <a href="/articles" class="nav-link-custom">Articles</a>
                <a href="/contact" class="nav-link-custom">Contact</a>
            </div>
        </div>
    </nav>

    <div class="main-wrapper">
        <div class="profile-card">
            <img src="{{ asset('images/foto.jpg') }}" alt="Foto Khurin Nafiah" class="profile-img">

            <div class="name">Khurin Nafiah</div>
            <div class="role">Mahasiswa Teknologi Informasi</div>

            <div class="info-list">
                <div class="info-item">
                    <span class="info-label">Alamat</span>
                    <span class="info-divider">:</span>
                    <span class="info-value">Blora, Jawa Tengah</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Universitas</span>
                    <span class="info-divider">:</span>
                    <span class="info-value">UIN Salatiga</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Skill</span>
                    <span class="info-divider">:</span>
                    <span class="info-value">Bootstrap, Laravel</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email</span>
                    <span class="info-divider">:</span>
                    <span class="info-value"><a href="mailto:khurinnafiahh@gmail.com">khurinnafiahh@gmail.com</a></span>
                </div>
            </div>

            <div class="social-links">
                <a href="#" class="social-icon" target="_blank"><i class="fab fa-github"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="fab fa-linkedin"></i></a>
                <a href="#" class="social-icon" target="_blank"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </div>

    <footer>
        © 2026 Khurin Nafiah
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>