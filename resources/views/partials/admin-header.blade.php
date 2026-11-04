<header class="unp-admin-header">
    <a class="unpam-brand" href="{{ route('admin.dashboard') }}" aria-label="Universitas Pamulang, Sistem Informasi">
        <img src="{{ asset('images/unpam-logo.png') }}" alt="" class="unpam-brand__logo">
        <span class="unpam-brand__name">
            <span>UNIVERSITAS PAMULANG</span>
            <strong>SISTEM INFORMASI</strong>
        </span>
    </a>

    <nav class="unp-admin-nav" aria-label="Admin navigation">
        <a href="{{ route('admin.dashboard') }}">Dashboard</a>
        <span class="unp-admin-nav__user">{{ auth()->user()->name }}</span>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit">Logout</button>
        </form>
    </nav>
</header>

<style>
    .unp-admin-header {
        box-sizing: border-box;
        display: flex;
        align-items: center;
        justify-content: space-between;
        width: 100%;
        height: 40px;
        padding: 0 14px;
        background: var(--admin-yellow);
        font-family: Arial, sans-serif;
    }

    .unpam-brand {
        display: inline-flex;
        align-items: center;
        gap: 4px;
        color: #173c88;
        text-decoration: none;
    }

    .unpam-brand__logo {
        display: block;
        width: 27px;
        height: 27px;
        object-fit: contain;
    }

    .unpam-brand__name {
        display: flex;
        flex-direction: column;
        line-height: 1.05;
        font-size: 7px;
        letter-spacing: -0.02em;
    }

    .unpam-brand__name strong {
        font-size: 10px;
        font-weight: 800;
        letter-spacing: -0.03em;
    }

    .unp-admin-nav {
        display: flex;
        align-items: center;
        gap: 14px;
        color: rgba(255, 255, 255, 0.58);
        font-size: 9px;
    }

    .unp-admin-nav a {
        color: inherit;
        text-decoration: none;
    }

    .unp-admin-nav a:hover,
    .unp-admin-nav button:hover {
        color: #fff;
    }

    .unp-admin-nav form {
        margin: 0;
    }

    .unp-admin-nav button {
        padding: 0;
        border: 0;
        background: transparent;
        color: inherit;
        font: inherit;
    }

    @media (max-width: 480px) {
        .unp-admin-header {
            padding-right: 10px;
            padding-left: 10px;
        }

        .unp-admin-nav {
            gap: 10px;
        }
    }
</style>
