<div class="sidebar">

    <h3 class="text-center py-3 border-bottom">
        CMS PANEL
    </h3>

    <a href="{{ route('admin.dashboard') }}">
        <i class="bi bi-speedometer2"></i>
        Dashboard
    </a>

    <a href="{{ route('users.index') }}">
        <i class="bi bi-people"></i>
        Users
    </a>

    <a href="{{ route('roles.index')}}">
        <i class="bi bi-shield-lock"></i>
        Roles
    </a>

    <a href="{{ route('posts.index')}}">
        <i class="bi bi-file-earmark-post"></i>
        Posts
    </a>

    <a href="{{ route('categories.index') }}">
        <i class="bi bi-grid"></i>
        Categories
    </a>

     <a href="{{ route('menus.index') }}">
    <i class="bi bi-menu-button"></i>
    Menu Builder
</a>


    <a href="{{ route('settings.index') }}">
        <i class="bi bi-gear"></i>
        Settings
    </a>

</div>