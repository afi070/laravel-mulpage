<!DOCTYPE html>
<html>
<head>
    <title>Contact</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f5f7fa;
        }

        .navbar {
            background: #0a1f44;
        }

        .contact-card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        }

        .btn-navy {
            background: #0a1f44;
            border: none;
            border-radius: 25px;
            color: white;
            transition: 0.3s;
        }

        .btn-navy:hover {
            background: #071a33;
            transform: scale(1.03);
            color: white;
        }
    </style>
</head>

<body>

<nav class="navbar navbar-dark">
  <div class="container">
    <a class="navbar-brand text-white" href="/">MyBlog</a>

    <div>
      <a href="/" class="text-white me-3">Home</a>
      <a href="/profile" class="text-white me-3">Profile</a>
      <a href="/articles" class="text-white me-3">Articles</a>
      <a href="/contact" class="text-white">Contact</a>
    </div>
  </div>
</nav>

<div class="container mt-5">

    <h2 class="text-center fw-bold mb-4">Contact Me</h2>

    <div class="row justify-content-center">

        <div class="col-md-6">

            <div class="card contact-card p-4">

                <p class="text-muted text-center mb-4">
                    Jika kamu ingin menghubungi saya, silakan isi form di bawah ini
                </p>

                <form>

                    <div class="mb-3">
                        <label class="form-label">Nama</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama kamu">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" placeholder="Masukkan email kamu">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Pesan</label>
                        <textarea class="form-control" rows="4" placeholder="Tulis pesan kamu..."></textarea>
                    </div>

                    <button type="submit" class="btn btn-navy w-100">
                        Kirim Pesan
                    </button>

                </form>

                <hr>

                <div class="text-center text-muted">
                    <p>📧 Email: <b>khurinnafiahh@gmail.com</b></p>
                    <p>📱 WhatsApp: 0877-8196-9334</p>
                    <p>📍 Blora, Jawa Tengah</p>
                </div>

            </div>

        </div>

    </div>

</div>

<footer class="text-center mt-5 p-3 text-white" style="background:#0a1f44;">
    © 2026 Khurin Nafiah
</footer>

</body>
</html>