<nav class="navbar navbar-expand-lg navbar-dark main-nav mb-4">
    <div class="container">
        <a class="navbar-brand fw-semibold" href="{{ url('/') }}">UNPAM - Prodi SI</a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNavigation"
            aria-controls="mainNavigation" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="mainNavigation">
            <div class="navbar-nav ms-auto">
                <a class="nav-link {{ request()->is('/') ? 'active' : '' }}" href="{{ url('/') }}">Home</a>
                <a class="nav-link {{ request()->is('profile') ? 'active' : '' }}" href="{{ url('/profile') }}">Profile</a>
                <a class="nav-link {{ request()->is('about') ? 'active' : '' }}" href="{{ url('/about') }}">About</a>
                <a class="nav-link {{ request()->is('project*') ? 'active' : '' }}" href="{{ url('/project') }}">Project</a>
            </div>
        </div>
    </div>
</nav>

<style>
    .main-nav {
        min-height: 64px;
        background: linear-gradient(90deg, #0d6efd 0%, #0878e8 55%, #1686f5 100%);
        box-shadow: 0 4px 14px rgba(13, 110, 253, 0.18);
    }

    .main-nav .navbar-brand {
        font-size: 1rem;
        letter-spacing: 0.01em;
    }

    .main-nav .nav-link {
        margin-left: 0.25rem;
        padding: 0.55rem 0.9rem;
        border-radius: 0.5rem;
        color: rgba(255, 255, 255, 0.88);
        transition: background-color 0.2s ease, color 0.2s ease;
    }

    .main-nav .nav-link:hover,
    .main-nav .nav-link.active {
        color: #fff;
        background: rgba(255, 255, 255, 0.14);
    }

    @media (max-width: 991.98px) {
        .main-nav .navbar-collapse {
            padding-top: 0.5rem;
        }

        .main-nav .nav-link {
            margin-left: 0;
        }
    }
</style>
