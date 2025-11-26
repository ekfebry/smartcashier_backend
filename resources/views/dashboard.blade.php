<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Cashier - Dashboard</title>
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
            --success: #10B981;
            --warning: #F59E0B;
            --info: #06B6D4;
        }

        * {
            font-family: 'Inter', 'Poppins', sans-serif;
        }

        body {
            background: var(--background);
            min-height: 100vh;
            margin: 0;
        }

        .navbar {
            background: linear-gradient(135deg, var(--primary-purple) 0%, var(--primary-blue) 100%);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 16px 0;
        }

        .navbar-brand {
            font-weight: 700;
            font-size: 24px;
            color: white !important;
        }

        .navbar-text {
            color: rgba(255, 255, 255, 0.9) !important;
            font-weight: 500;
        }

        .logout-btn {
            background: var(--accent-orange);
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: #EA580C;
            transform: translateY(-1px);
        }

        .dashboard-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 32px 20px;
        }

        .dashboard-header {
            margin-bottom: 32px;
        }

        .dashboard-title {
            font-size: 36px;
            font-weight: 700;
            color: var(--text-primary);
            margin-bottom: 8px;
        }

        .dashboard-subtitle {
            color: var(--text-secondary);
            font-size: 16px;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: var(--surface);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 16px;
        }

        .stat-categories .stat-icon {
            background: linear-gradient(135deg, var(--primary-purple), var(--primary-blue));
        }

        .stat-products .stat-icon {
            background: linear-gradient(135deg, var(--success), #059669);
        }

        .stat-sales .stat-icon {
            background: linear-gradient(135deg, var(--warning), #D97706);
        }

        .stat-revenue .stat-icon {
            background: linear-gradient(135deg, var(--info), #0891B2);
        }

        .stat-title {
            font-size: 14px;
            font-weight: 500;
            color: var(--text-secondary);
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--text-primary);
            margin: 0;
        }

        .stat-currency {
            font-size: 24px;
            font-weight: 600;
            color: var(--text-primary);
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 24px;
        }

        .action-card {
            background: var(--surface);
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
            border: 1px solid var(--border);
        }

        .action-title {
            font-size: 20px;
            font-weight: 600;
            color: var(--text-primary);
            margin-bottom: 16px;
        }

        .action-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
        }

        .action-btn {
            padding: 12px 20px;
            border-radius: 10px;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
            border: none;
            cursor: pointer;
            font-size: 14px;
        }

        .btn-products {
            background: linear-gradient(135deg, var(--primary-purple), var(--primary-blue));
            color: white;
        }

        .btn-products:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(124, 58, 237, 0.3);
        }

        .btn-sale {
            background: linear-gradient(135deg, var(--success), #059669);
            color: white;
        }

        .btn-sale:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(16, 185, 129, 0.3);
        }

        .btn-reports {
            background: linear-gradient(135deg, var(--info), #0891B2);
            color: white;
        }

        .btn-reports:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 15px rgba(6, 182, 212, 0.3);
        }

        .activity-list {
            list-style: none;
            padding: 0;
            margin: 0;
        }

        .activity-item {
            padding: 12px 0;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 32px;
            height: 32px;
            border-radius: 8px;
            background: var(--primary-purple);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 12px;
            font-size: 16px;
        }

        .activity-text {
            color: var(--text-primary);
            font-size: 14px;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .dashboard-container {
                padding: 20px 16px;
            }

            .dashboard-title {
                font-size: 28px;
            }

            .stats-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .actions-grid {
                grid-template-columns: 1fr;
                gap: 16px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .action-btn {
                text-align: center;
            }
        }

        /* Animation */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in-up {
            animation: fadeInUp 0.5s ease-out;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="container">
            <a class="navbar-brand" href="#">🛒 Smart Cashier</a>
            <div class="d-flex align-items-center">
                <span class="navbar-text me-3">
                    Selamat datang, {{ session('member')['name'] ?? 'User' }}
                </span>
                <form method="POST" action="/logout" class="d-inline">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="dashboard-container">
        <div class="dashboard-header">
            <h1 class="dashboard-title">Dashboard</h1>
            <p class="dashboard-subtitle">Pantau performa penjualan dan kelola toko Anda</p>
        </div>

        <div class="stats-grid">
            <div class="stat-card stat-categories fade-in-up">
                <div class="stat-icon">📂</div>
                <div class="stat-title">Total Kategori</div>
                <div class="stat-value">{{ $stats['total_categories'] ?? 0 }}</div>
            </div>

            <div class="stat-card stat-products fade-in-up">
                <div class="stat-icon">📦</div>
                <div class="stat-title">Total Produk</div>
                <div class="stat-value">{{ $stats['total_products'] ?? 0 }}</div>
            </div>

            <div class="stat-card stat-sales fade-in-up">
                <div class="stat-icon">🛒</div>
                <div class="stat-title">Penjualan Hari Ini</div>
                <div class="stat-value">{{ $stats['sales_today'] ?? 0 }}</div>
            </div>

            <div class="stat-card stat-revenue fade-in-up">
                <div class="stat-icon">💰</div>
                <div class="stat-title">Pendapatan Hari Ini</div>
                <div class="stat-value">
                    <span class="stat-currency">Rp</span> {{ number_format($stats['revenue_today'] ?? 0, 0, ',', '.') }}
                </div>
            </div>
        </div>

        <div class="actions-grid">
            <div class="action-card">
                <h3 class="action-title">Aksi Cepat</h3>
                <div class="action-buttons">
                    <a href="#" class="action-btn btn-products">📦 Lihat Produk</a>
                    <a href="#" class="action-btn btn-sale">➕ Penjualan Baru</a>
                    <a href="#" class="action-btn btn-reports">📊 Laporan</a>
                </div>
            </div>

            <div class="action-card">
                <h3 class="action-title">Aktivitas Terbaru</h3>
                <ul class="activity-list">
                    <li class="activity-item">
                        <div class="activity-icon">✅</div>
                        <div class="activity-text">Dashboard berhasil dimuat</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">🔗</div>
                        <div class="activity-text">Integrasi API berfungsi dengan baik</div>
                    </li>
                    <li class="activity-item">
                        <div class="activity-icon">📱</div>
                        <div class="activity-text">Interface responsif siap digunakan</div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>