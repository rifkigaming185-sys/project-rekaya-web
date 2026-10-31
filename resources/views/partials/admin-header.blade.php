<header class="unp-admin-header">
    <a class="unpam-brand" href="{{ route('project.index') }}" aria-label="Universitas Pamulang, Sistem Informasi">
        <img src="{{ asset('images/unpam-logo.png') }}" alt="" class="unpam-brand__logo">
        <span class="unpam-brand__name">
            <span>UNIVERSITAS PAMULANG</span>
            <strong>SISTEM INFORMASI</strong>
        </span>
    </a>

    <nav class="unp-admin-nav" aria-label="Admin navigation">
        <a href="{{ route('project.index') }}">Dashboard</a>
        <span>Logout</span>
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
        background: #ffbf00;
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

    .unp-admin-nav a:hover {
        color: #fff;
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
