<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">

    <style>
        body { margin: 0; }
        .sidebar {
            height: 100vh;
            width: 240px;
            position: fixed;
            top: 56px;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
            box-shadow: 2px 0 6px rgba(0, 0, 0, 0.05);
            padding: 20px 15px;
        }

        .sidebar .nav-link {
            font-weight: 500;
            color: #333;
            border-radius: 4px;
            padding: 8px 12px;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #0d6efd;
            color: #fff !important;
        }

        .sidebar .nav-link i {
            margin-right: 8px;
        }

        .content {
            margin-left: 240px;
            margin-top: 56px;
            padding: 25px;
            background-color: #f8f9fa;
            min-height: calc(100vh - 56px);
        }
    </style>
</head>
<body>

    {{-- Top Navbar --}}
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <span class="navbar-brand">Admin Panel</span>
            <div class="ms-auto">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    {{-- Sidebar --}}
    <div class="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <i class="fas fa-home"></i> Dashboard
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('users.*') ? 'active' : '' }}" href="{{ route('users.index') }}">
                    <i class="fas fa-users-cog"></i> Users
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('roles.*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
                    <i class="fas fa-user-shield"></i> Roles
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('permissions.*') ? 'active' : '' }}" href="{{ route('permissions.index') }}">
                    <i class="fas fa-key"></i> Permissions
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('user-role.*') ? 'active' : '' }}" href="{{ route('user-role.index') }}">
                    <i class="fas fa-users-cog"></i>User Role
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('product.*') ? 'active' : '' }}" href="{{ route('product.index') }}">
                    <i class="fas fa-box"></i> Products
                </a>
            </li>

            <!-- Orders -->
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('orders.*') ? 'active' : '' }}" href="{{ route('orders.index') }}">
                    <i class="fas fa-shopping-cart"></i> Orders
                </a>
            </li>
            

        </ul>
    </div>

    {{-- Main Content --}}
    <div class="content">
        @yield('content')
    </div>

</body>
</html>
