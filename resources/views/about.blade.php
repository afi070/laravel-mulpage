<!DOCTYPE html>
<html>
<head>
    <title>About</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Style tambahan untuk auth links */
        .navbar {
            background: #0a1f44 !important;
        }
        
        .nav-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .nav-menu {
            display: flex;
            gap: 10px;
            align-items: center;
        }
        
        .auth-links {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-left: 20px;
        }
        
        .btn-logout {
            background: transparent;
            border: 1px solid rgba(255,255,255,0.5);
            color: white;
            padding: 5px 12px;
            border-radius: 20px;
            cursor: pointer;
            transition: 0.3s;
        }
        
        .btn-logout:hover {
            background: rgba(255,255,255,0.1);
            border-color: white;
        }
        
        .user-name {
            font-size: 0.9rem;
            opacity: 0.9;
            color: white;
        }
        
        .auth-link {
            color: white !important;
            text-decoration: none;
            padding: 5px 12px;
            border-radius: 20px;
            transition: 0.3s;
        }
        
        .auth-link:hover {
            background: rgba(255,255,255,0.1);
        }
        
        .auth-register {
            background: rgba(255,255,255,0.2);
        }
    </style>
</head>
<body>

<!-- 🔥 Navbar dengan Authentication -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container nav-container">
    <a class="navbar-brand" href="/">MyBlog</a>
    
    <div class="nav-menu">
      <a href="/" class="btn btn-outline-light">Home</a>
      <a href="/profile" class="btn btn-outline-light">Profile</a>
      <a href="/articles" class="btn btn-outline-light">Articles</a>
      <a href="/contact" class="btn btn-outline-light">Contact</a>
      
      <!-- 🔥 AUTHENTICATION LINKS (Tambahan) -->
      <div class="auth-links">
        @auth
          <span class="user-name"> {{ Auth::user()->name }}</span>
          <form method="POST" action="/logout" class="d-inline">
            @csrf
            <button type="submit" class="btn-logout">Logout</button>
          </form>
        @else
          <a href="/login" class="auth-link">Login</a>
          <a href="/register" class="auth-link auth-register">Register</a>
        @endauth
      </div>
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