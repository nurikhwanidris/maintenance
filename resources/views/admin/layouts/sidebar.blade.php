<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin')) ? 'active' : '' }}" aria-current="page" href="/admin">
                    <span data-feather="home"></span>
                    Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/notice/add')) ? 'active' : '' }}" href="/admin/notice/add">
                    <span data-feather="plus-circle"></span>
                    Add New Notice
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/notice/list')) ? 'active' : '' }}"
                    href="/admin/notice/list">
                    <span data-feather="list"></span>
                    List of Previous Notice
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/service/add')) ? 'active' : '' }}"
                    href="/admin/service/add">
                    <span data-feather="file-plus"></span>
                    Add New Service
                </a>
            </li>
        </ul>
    </div>
</nav>