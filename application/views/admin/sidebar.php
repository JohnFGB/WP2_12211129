<!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
<!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-book"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Pustaka Booking</div>
        </a>
        <hr class="sidebar-divider">
        <div class="sidebar-heading">
            Home
        </div>
        <li class="nav-item">
            <a href="<?= base_url('admin'); ?>">
                <i class="fa fa-fw fa book"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <div class="sidebar-heading">Master Data</div>
        <li class="nav-item active">
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?=base_url('buku/kategori'); ?>"><i class="fa fa-fw fa book"></i><span>Kategori Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?=base_url('buku'); ?>"><i class="fa fa-fw fa book"></i><span>Data Buku</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?=
                base_url('user/anggota'); ?>"><i class="fa fa-fw fa book"></i><span>Data Anggota</span></a>
            </li>
        </li>
        <hr class="sidebar-divider mt-3">
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0"id="sidebarToggle"></button>
        </div>
    </ul>
<!-- End of Sidebar -- >