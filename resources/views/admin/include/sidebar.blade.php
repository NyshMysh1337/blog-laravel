<aside class="main-sidebar sidebar-dark-primary elevation-4">

    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="nav nav-pills nav-sidebar flex-column">
            <ul class="pt-3 nav nav-pills nav-sidebar flex-column" data-widget="treeview">
                 <li class="nav-item">
                     <a href="{{ route('admin.users.index') }}">
                         <p>Пользователи</p>
                     </a>
                     <a href="{{ route('admin.post.index') }}">
                         <p>Посты</p>
                     </a>
                     <a href="{{ route('admin.category.index') }}">
                         <p>Категории</p>
                     </a>
                     <a href="{{ route('admin.tag.index') }}">
                         <p>Теги</p>
                     </a>
                 </li>
            </ul>
        </nav>
    </div>
    <!-- /.sidebar -->
</aside>
