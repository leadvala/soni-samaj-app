<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel - @yield('title', 'Dashboard')</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS & Icons -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  <style>
    body { background-color: #f8f9fa; }

    .sidebar {
      background-color: #343a40;
      color: white;
      min-height: 100vh;
      padding-top: 1rem;
    }

    .sidebar .nav-link {
      color: #fff;
      font-weight: 500;
    }

    .sidebar .nav-link.active,
    .sidebar .nav-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
    }

    .sidebar .nav-link i {
      margin-right: 8px;
    }

    @media (min-width: 768px) {
      .sidebar {
        width: 240px;
        position: fixed;
        top: 0;
        left: 0;
        z-index: 1030;
      }

      .main-content {
        margin-left: 240px;
        padding: 1.5rem;
      }
    }

    @media (max-width: 767.98px) {
      .sidebar { display: none; }
      .main-content { padding: 1rem; }
    }

    .top-navbar {
      z-index: 1045;
    }
  </style>
</head>
<body>

<!-- 🔝 Top Navbar -->
<nav class="navbar navbar-dark bg-dark px-3 top-navbar">
  <button class="btn btn-outline-light d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar" aria-controls="mobileSidebar">
    <i class="bi bi-list"></i>
  </button>
  <span class="navbar-brand ms-2">Admin Panel</span>
  <a href="{{ route('admin.logout') }}" class="btn btn-danger ms-auto">Logout</a>
</nav>

<!-- 🖥️ Desktop Sidebar -->
<div class="sidebar d-none d-md-block">
  <ul class="nav flex-column px-2">
    <li><a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
    <li><a href="{{ route('admin.members.index') }}" class="nav-link {{ request()->routeIs('admin.members.*') ? 'active' : '' }}"><i class="bi bi-people-fill"></i> Members</a></li>
    <li><a href="{{ route('admin.badhai.index') }}" class="nav-link {{ request()->routeIs('admin.badhai.*') ? 'active' : '' }}"><i class="bi bi-award-fill"></i> Badhai</a></li>
    <li><a href="{{ route('admin.blogs.index') }}" class="nav-link {{ request()->routeIs('admin.blogs.*') ? 'active' : '' }}"><i class="bi bi-journal-text"></i> Blogs</a></li>
    <li><a href="{{ route('admin.sliders.index') }}" class="nav-link {{ request()->routeIs('admin.sliders.*') ? 'active' : '' }}"><i class="bi bi-sliders"></i> Sliders</a></li>
    <li><a href="{{ route('admin.register-sections.index') }}" class="nav-link {{ request()->routeIs('admin.register-sections.*') ? 'active' : '' }}"><i class="bi bi-card-list"></i> Register</a></li>
    <li><a href="{{ route('admin.about-sections.index') }}" class="nav-link {{ request()->routeIs('admin.about-sections.*') ? 'active' : '' }}"><i class="bi bi-info-circle-fill"></i> About</a></li>
    <li><a href="{{ route('admin.pages.index') }}" class="nav-link {{ request()->routeIs('admin.pages.*') ? 'active' : '' }}"><i class="bi bi-files"></i> Pages</a></li>
    <li><a href="{{ route('admin.service-sections.index') }}" class="nav-link {{ request()->routeIs('admin.service-sections.*') ? 'active' : '' }}"><i class="bi bi-briefcase-fill"></i> Services</a></li>
    <li><a href="{{ route('admin.case-studies.index') }}" class="nav-link {{ request()->routeIs('admin.case-studies.*') ? 'active' : '' }}"><i class="bi bi-folder-check"></i> Case Studies</a></li>
    <li><a href="{{ route('admin.testimonials.index') }}" class="nav-link {{ request()->routeIs('admin.testimonials.*') ? 'active' : '' }}"><i class="bi bi-chat-quote-fill"></i> Testimonials</a></li>
    <li><a href="{{ route('admin.home-settings.index') }}" class="nav-link {{ request()->routeIs('admin.home-settings.*') ? 'active' : '' }}"><i class="bi bi-gear-fill"></i> Home Settings</a></li>
    <li><a href="{{ route('admin.donations.index') }}" class="nav-link {{ request()->routeIs('admin.donations.*') ? 'active' : '' }}"><i class="bi bi-heart-fill"></i> Donations</a></li>
  </ul>
</div>

<!-- 📱 Offcanvas Sidebar for Mobile -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="mobileSidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Admin Menu</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
  </div>
  <div class="offcanvas-body p-0">
    <ul class="nav flex-column px-2">
      <li><a href="{{ route('admin.dashboard') }}" class="nav-link text-white"><i class="bi bi-house-door-fill"></i> Dashboard</a></li>
      <li><a href="{{ route('admin.members.index') }}" class="nav-link text-white"><i class="bi bi-people-fill"></i> Members</a></li>
      <li><a href="{{ route('admin.badhai.index') }}" class="nav-link text-white"><i class="bi bi-award-fill"></i> Badhai</a></li>
      <li><a href="{{ route('admin.blogs.index') }}" class="nav-link text-white"><i class="bi bi-journal-text"></i> Blogs</a></li>
      <li><a href="{{ route('admin.sliders.index') }}" class="nav-link text-white"><i class="bi bi-sliders"></i> Sliders</a></li>
      <li><a href="{{ route('admin.register-sections.index') }}" class="nav-link text-white"><i class="bi bi-card-list"></i> Register</a></li>
      <li><a href="{{ route('admin.about-sections.index') }}" class="nav-link text-white"><i class="bi bi-info-circle-fill"></i> About</a></li>
      <li><a href="{{ route('admin.pages.index') }}" class="nav-link text-white"><i class="bi bi-files"></i> Pages</a></li>
      <li><a href="{{ route('admin.service-sections.index') }}" class="nav-link text-white"><i class="bi bi-briefcase-fill"></i> Services</a></li>
      <li><a href="{{ route('admin.case-studies.index') }}" class="nav-link text-white"><i class="bi bi-folder-check"></i> Case Studies</a></li>
      <li><a href="{{ route('admin.testimonials.index') }}" class="nav-link text-white"><i class="bi bi-chat-quote-fill"></i> Testimonials</a></li>
      <li><a href="{{ route('admin.home-settings.index') }}" class="nav-link text-white"><i class="bi bi-gear-fill"></i> Home Settings</a></li>
      <li><a href="{{ route('admin.donations.index') }}" class="nav-link text-white"><i class="bi bi-heart-fill"></i> Donations</a></li>
    </ul>
  </div>
</div>

<!-- Main Content Area -->
<div class="main-content">
  @yield('content')
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
