<!-- Sidebar -->
<div class="sidebar">
    <h4 class="text-center py-3">Admin Panel</h4>
    <a href="{{ route('dashboard') }}">
        <i class="bx bx-home"></i> Dashboard
    </a>
    <a href="#" class="has-submenu">
        <i class="bx bx-news"></i> Post
        <i class="bx bx-chevron-right arrow"></i>
    </a>
    <div class="submenu">
        <a href="{{ route('post.index') }}"><i class="bx bx-list-ul"></i>Post</a>
        <a href="{{ route('post.create') }}"><i class="bx bx-plus"></i> Create Post</a>
    </div>
    <a href="{{ route('category.index') }}">
        <i class="bx bx-news"></i> Category
    </a>
</div>
