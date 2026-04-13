<!DOCTYPE html>
<html>
<head>
    <title>About</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- 🔥 Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="/">MyBlog</a>
    <div>
      <a href="/" class="btn btn-outline-light">Home</a>
      <a href="/profile" class="btn btn-outline-light">Profile</a>
      <a href="/articles" class="btn btn-outline-light">Articles</a>
      <a href="/contact" class="btn btn-outline-light">Contact</a>
    </div>
  </div>
</nav>

<!-- 🔥 Content -->
<div class="container mt-5">

    <div class="card shadow">
        <div class="card-body text-center">

            <img src="https://via.placeholder.com/150" class="rounded-circle mb-3">

            <h2>About Me</h2>

            <p><strong>Nama:</strong> {{ $data['name'] }}</p>
            <p><strong>Alamat:</strong> {{ $data['address'] }}</p>
            <p><strong>Email:</strong> {{ $data['email'] }}</p>
            <p><strong>Kampus:</strong> {{ $data['univ'] }}</p>

        </div>
    </div>

</div>

<!-- 🔥 Footer -->
<footer class="text-center mt-5 mb-3">
    <p>© 2026 Khurin Nafiah</p>
</footer>

</body>
</html>