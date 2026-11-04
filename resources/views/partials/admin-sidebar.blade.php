<aside class="admin-sidebar">
    <h2>Admin Menu</h2>
    <nav aria-label="Admin menu">
        <a class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
            Dashboard
        </a>
        <a class="{{ request()->routeIs('project.*') ? 'active' : '' }}" href="{{ route('project.index') }}">
            Data Project
        </a>
    </nav>
</aside>
