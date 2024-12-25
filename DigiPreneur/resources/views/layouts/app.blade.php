<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DigiPreneur</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        /* Sidebar Styling */
        .sidebar {
            width: 250px;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            background-color: #f8f9fa;
            box-shadow: 2px 0 5px rgba(0, 0, 0, 0.1);
        }

        .sidebar h4 {
            font-weight: 600;
            color: #0FBAB4; /* Teal color for title */
        }

        .nav-link {
            font-size: 1rem;
            font-weight: 500;
            color: #6c757d; /* Default: Gray */
            transition: all 0.3s;
        }

        .nav-link:hover {
            color: #0FBAB4; /* Teal on hover */
        }

        .nav-link.active {
            color: #0FBAB4; /* Teal for active link */
            font-weight: 600;
        }

        .content-wrapper {
            margin-left: 250px;
            padding: 20px;
        }

        body {
            font-family: 'Poppins', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-weight: 600;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <nav class="sidebar p-3">
        <h4 class="text-primary mb-4" style="color: #0FBAB4;">DigiPreneur</h4>
        <ul class="nav flex-column">
            <li class="nav-item mb-2">
                <a href="/dashboard" class="nav-link active">
                    <i class="bi bi-house-door me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/settings" class="nav-link">
                    <i class="bi bi-gear me-2"></i> Account Settings
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/digitalization_modules" class="nav-link">
                    <i class="bi bi-laptop me-2"></i> Modules
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/training_programs" class="nav-link">
                    <i class="bi bi-calendar-event me-2"></i> Training Programs
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/customer_service" class="nav-link">
                    <i class="bi bi-people me-2"></i> Customer Service
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="/articles" class="nav-link">
                    <i class="bi bi-newspaper me-2"></i> Article
                </a>
            </li>
            <li class="nav-item mb-2">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-link nav-link text-dark" type="submit">
                        <i class="bi bi-box-arrow-right me-2"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>

    <!-- Content Wrapper -->
    <div class="content-wrapper">
        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
