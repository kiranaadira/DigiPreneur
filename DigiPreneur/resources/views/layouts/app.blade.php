<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiPreneur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Memberikan margin ke konten utama */
        .content-wrapper {
            margin-left: 250px; /* Sesuaikan dengan lebar sidebar */
            padding: 20px;
        }

        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="text-primary mb-4">DigiPreneur</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="/dashboard" class="nav-link text-dark">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/settings" class="nav-link text-dark">
                    <i class="bi bi-gear me-2"></i> Account Settings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/login" class="nav-link text-dark">
                    <i class="bi bi-box-arrow-in-right me-2"></i> Login
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/register" class="nav-link text-dark">
                    <i class="bi bi-person-plus me-2"></i> Register
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/training_programs" class="nav-link text-dark">
                    <i class="bi bi-calendar-event me-2"></i> Training Program
                </a>
            </li>
        </ul>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
</body>
</html>
