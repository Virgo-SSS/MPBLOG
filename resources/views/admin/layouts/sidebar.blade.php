<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-3">Admin Panel</h4>
    <a href="{{ route('dashboard') }}">
        <i class="bx bx-home"></i> Dashboard
    </a>
    <a href="#">
        <i class="bx bx-news"></i> Article
    </a>
    <a href="{{ route('category.index') }}">
        <i class="bx bx-news"></i> Category
    </a>
    <a href="{{ route('tag.index') }}">
        <i class="bx bx-news"></i> Tag
    </a>
    <a href="#" class="has-submenu">
        <i class="bx bx-category"></i> Sub Menu
        <i class="bx bx-chevron-right arrow"></i>
    </a>
    <div class="submenu">
        <a href="#"><i class="bx bx-plus"></i> Create Category</a>
        <a href="#"><i class="bx bx-list-ul"></i> List Category</a>
    </div>
</div>
