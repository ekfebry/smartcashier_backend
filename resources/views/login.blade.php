<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Cashier - Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --primary-blue: #2563EB;
            --primary-purple: #7C3AED;
            --accent-orange: #F97316;
            --background: #F8FAFC;
            --surface: #FFFFFF;
            --text-primary: #1E293B;
            --text-secondary: #64748B;
            --border: #E2E8F0;
            --error: #EF4444;
            --success: #10B981;
        }

        * {
            font-family: 'Inter', 'Poppins', sans-serif;
        }

        body {
            background: linear-gradient(135deg, var(--primary-blue) 0%, var(--primary-purple) 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .login-container {
            background: var(--surface);
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 1000px;
            width: 100%;
            margin: 20px;
        }

        .illustration-section {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--primary-blue) 100%);
            padding: 60px 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .illustration-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 300"><circle cx="200" cy="150" r="80" fill="rgba(249,115,22,0.1)"/><circle cx="150" cy="100" r="40" fill="rgba(249,115,22,0.15)"/><circle cx="250" cy="200" r="60" fill="rgba(249,115,22,0.1)"/></svg>') no-repeat center;
            background-size: cover;
        }

        .checkout-illustration {
            position: relative;
            z-index: 1;
            text-align: center;
            color: white;
        }

        .checkout-icon {
            font-size: 120px;
            margin-bottom: 20px;
            filter: drop-shadow(0 4px 8px rgba(0,0,0,0.2));
        }

        .form-section {
            padding: 60px 50px;
        }

        .logo-section {
            text-align: center;
            margin-bottom: 40px;
        }

        .logo {
            font-size: 32px;
            font-weight: 700;
            color: var(--primary-purple);
            margin-bottom: 8px;
        }

        .tagline {
            color: var(--text-secondary);
            font-size: 16px;
        }

        .form-group {
            position: relative;
            margin-bottom: 24px;
        }

        .form-input {
            width: 100%;
            padding: 16px 20px;
            border: 2px solid var(--border);
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s ease;
            background: var(--background);
        }

        .form-input:focus {
            outline: none;
            border-color: var(--primary-purple);
            box-shadow: 0 0 0 3px rgba(124, 58, 237, 0.1);
            background: var(--surface);
        }

        .form-label {
            position: absolute;
            left: 20px;
            top: 16px;
            color: var(--text-secondary);
            transition: all 0.3s ease;
            pointer-events: none;
            background: var(--background);
            padding: 0 4px;
        }

        .form-input:focus + .form-label,
        .form-input:not(:placeholder-shown) + .form-label {
            top: -8px;
            font-size: 12px;
            color: var(--primary-purple);
            background: var(--surface);
        }

        .password-toggle {
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-secondary);
            cursor: pointer;
            padding: 4px;
        }

        .login-btn {
            width: 100%;
            padding: 16px;
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--accent-orange) 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .login-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(124, 58, 237, 0.3);
        }

        .login-btn:active {
            transform: translateY(0);
        }

        .login-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: left 0.5s;
        }

        .login-btn:hover::before {
            left: 100%;
        }

        .forgot-password {
            text-align: center;
            margin-top: 16px;
        }

        .forgot-link {
            color: var(--text-secondary);
            text-decoration: none;
            font-size: 14px;
            transition: color 0.3s ease;
        }

        .forgot-link:hover {
            color: var(--primary-purple);
        }

        .error-message {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid var(--error);
            color: var(--error);
            padding: 12px 16px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .login-container {
                margin: 10px;
                max-width: none;
            }

            .illustration-section {
                display: none;
            }

            .form-section {
                padding: 40px 30px;
            }

            .logo {
                font-size: 28px;
            }

            .checkout-icon {
                font-size: 80px;
            }
        }

        /* Animation keyframes */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body>
    <div class="login-container fade-in-up">
        <!-- Desktop Illustration Section -->
        <div class="illustration-section d-none d-md-flex">
            <div class="checkout-illustration">
                <div class="checkout-icon">
                    <img src="{{asset('images/logo_restaurant.png')}}" alt="Logo" style="width:150px; filter:drop-shadow(0 4px 8px rgba(0,0,0,0.2));">
                </div>
                <h3 style="margin-bottom: 10px;">Smart Cashier</h3>
                <p>Kelola penjualan dengan mudah dan cepat</p>
            </div>
        </div>

        <!-- Login Form Section -->
        <div class="form-section">
            <div class="logo-section">
                <div class="logo">Smart Cashier</div>
                <div class="tagline">Masuk ke akun Anda untuk melanjutkan</div>
            </div>

            @if($errors->any())
                <div class="error-message">
                    @foreach($errors->all() as $error)
                        {{ $error }}<br>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                    <input type="email" class="form-input" id="email" name="email" placeholder=" " required>
                    <label for="email" class="form-label">Email</label>
                </div>

                <div class="form-group">
                    <input type="password" class="form-input" id="password" name="password" placeholder=" " required>
                    <label for="password" class="form-label">Password</label>
                    <button type="button" class="password-toggle" onclick="togglePassword()">
                        👁️
                    </button>
                </div>

                <button type="submit" class="login-btn">
                    Login
                </button>
            </form>

            <div class="forgot-password">
                <a href="#" class="forgot-link">Lupa password? Hubungi admin untuk reset</a>
            </div>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const toggleBtn = document.querySelector('.password-toggle');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleBtn.textContent = '🙈';
            } else {
                passwordInput.type = 'password';
                toggleBtn.textContent = '👁️';
            }
        }

        // Add loading animation to button on submit
        document.querySelector('form').addEventListener('submit', function() {
            const button = document.querySelector('.login-btn');
            button.innerHTML = '🔄 Login...';
            button.disabled = true;
        });
    </script>
</body>
</html>