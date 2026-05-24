<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - MyBlog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #e8ecf1 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        /* Card Login */
        .login-card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.1);
            overflow: hidden;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .login-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 25px 50px rgba(0,0,0,0.15);
        }

        /* Header dengan warna navy */
        .card-header-navy {
            background: linear-gradient(135deg, #0a1f44, #162d55);
            padding: 30px 20px;
            text-align: center;
            border-bottom: none;
        }

        .card-header-navy .icon-circle {
            background: rgba(255,255,255,0.15);
            width: 70px;
            height: 70px;
            line-height: 70px;
            border-radius: 50%;
            display: inline-block;
            margin-bottom: 15px;
        }

        .card-header-navy .icon-circle i {
            font-size: 32px;
            color: white;
        }

        .card-header-navy h3 {
            color: white;
            margin: 0;
            font-weight: 700;
            font-size: 24px;
        }

        .card-header-navy p {
            color: rgba(255,255,255,0.7);
            margin: 8px 0 0;
            font-size: 13px;
        }

        /* Input field styling */
        .form-control-navy {
            border: 1px solid #e0e4e8;
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .form-control-navy:focus {
            border-color: #0a1f44;
            box-shadow: 0 0 0 3px rgba(10,31,68,0.1);
            outline: none;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #9aa6b5;
            font-size: 16px;
        }

        .input-icon input {
            padding-left: 45px;
        }

        /* Tombol Login */
        .btn-login {
            background: linear-gradient(135deg, #0a1f44, #162d55);
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            font-size: 16px;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #0d2658, #1b3a6b);
            transform: translateY(-2px);
        }

        /* Tombol Kembali */
        .btn-back {
            background: #6c757d;
            border: none;
            border-radius: 12px;
            padding: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            color: white;
            text-decoration: none;
            display: inline-block;
            text-align: center;
            width: 100%;
        }

        .btn-back:hover {
            background: #5a6268;
            transform: translateY(-2px);
            color: white;
        }

        /* Checkbox styling navy */
        .form-check-input:checked {
            background-color: #0a1f44;
            border-color: #0a1f44;
        }

        .form-check-input:focus {
            box-shadow: 0 0 0 2px rgba(10,31,68,0.2);
        }

        /* Link Register */
        .register-link {
            color: #0a1f44;
            text-decoration: none;
            font-weight: 600;
            transition: 0.3s;
        }

        .register-link:hover {
            color: #162d55;
            text-decoration: underline;
        }

        /* Alert styling */
        .alert-navy {
            border-radius: 12px;
            border-left: 4px solid #dc3545;
            background: #fff5f5;
            border: none;
            border-left: 4px solid #dc3545;
        }

        .divider {
            display: flex;
            align-items: center;
            text-align: center;
            margin: 20px 0;
        }

        .divider::before,
        .divider::after {
            content: '';
            flex: 1;
            border-bottom: 1px solid #e0e4e8;
        }

        .divider span {
            padding: 0 10px;
            color: #9aa6b5;
            font-size: 12px;
        }
    </style>
</head>
<body>

<div class="container mt-5 pt-4">
    <div class="row justify-content-center">
        <div class="col-md-5">
            
            <!-- Card Login -->
            <div class="card login-card">
                
                <!-- Header Navy dengan Icon -->
                <div class="card-header-navy">
                    <div class="icon-circle">
                        <i class="fas fa-lock"></i>
                    </div>
                    <h3>Selamat Datang!</h3>
                    <p>Silakan login untuk melanjutkan</p>
                </div>
                
                <!-- Body Form -->
                <div class="card-body p-4">
                    
                    <!-- Pesan Error -->
                    @if ($errors->any())
                        <div class="alert alert-navy mb-4">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ $errors->first() }}
                        </div>
                    @endif

                    <!-- Form Login -->
                    <form method="POST" action="/login">
                        @csrf
                        
                        <!-- Field Email dengan Icon -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-2">Email</label>
                            <div class="input-icon">
                                <i class="fas fa-envelope"></i>
                                <input type="email" 
                                       name="email" 
                                       class="form-control form-control-navy" 
                                       value="{{ old('email') }}" 
                                       placeholder="Masukkan email Anda"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Field Password dengan Icon -->
                        <div class="mb-3">
                            <label class="form-label fw-semibold mb-2">Password</label>
                            <div class="input-icon">
                                <i class="fas fa-lock"></i>
                                <input type="password" 
                                       name="password" 
                                       class="form-control form-control-navy" 
                                       placeholder="Masukkan password"
                                       required>
                            </div>
                        </div>
                        
                        <!-- Remember Me -->
                        <div class="mb-4 form-check">
                            <input type="checkbox" 
                                   name="remember" 
                                   class="form-check-input" 
                                   id="remember">
                            <label class="form-check-label" for="remember">
                                Ingat Saya
                            </label>
                        </div>
                        
                        <!-- Tombol Login & Kembali (Side by Side) -->
                        <div class="d-flex gap-3 mb-3">
                            <a href="/" class="btn-back">
                                <i class="fas fa-arrow-left me-2"></i>Kembali
                            </a>
                            <button type="submit" class="btn-login">
                                <i class="fas fa-sign-in-alt me-2"></i>Login
                            </button>
                        </div>
                        
                        <!-- Divider -->
                        <div class="divider">
                            <span>atau</span>
                        </div>
                        
                        <!-- Link Register -->
                        <div class="text-center">
                            <p class="mb-0">
                                Belum punya akun? 
                                <a href="/register" class="register-link">
                                    Daftar di sini <i class="fas fa-arrow-right ms-1"></i>
                                </a>
                            </p>
                        </div>
                        
                    </form>
                </div>
            </div>
            
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>