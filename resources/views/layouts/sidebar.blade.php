        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar bg-gradient-info sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon fa-pulse">
                    <i class="fa fa-futbol"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Futsal APP <sup>Admin {{ Auth::user()->name }}</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->

            <!-- Heading -->
            

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/lapangan">
                    <i class="fa-cog fa-fw  fas"></i>
                    <span>Lapangan</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/orderdetail">
                    <i class="fa-cog fa-fw  fas"></i>
                    <span>Laporan Order</span></a>
            </li>
            <?php if (Auth::user()->role_id == 1)
            { ?>
    
                <li class="nav-item">
                    <a class="nav-link" href="/owner">
                        <i class="fas fa-fw fa-address-book"></i>
                        <span>Owner</span></a>
                </li>
        
            <?php } ?>
            
            {{-- <li class="nav-item">
                <a class="nav-link" href="/typelapangan">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Type Lapangan</span></a>
            </li> --}}
        
            <li class="nav-item">
                <a class="nav-link" href="/price/create">
                    <i class="fas fa-dollar-sign fa-2x"></i>
                    <span>Harga</span></a>
            </li>
            <?php if (Auth::user()->role_id == 1)
            { ?>
                <hr class="sidebar-divider my-0">
                <li class="nav-item">
                    <a class="nav-link" href="/day">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Hari</span></a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/hour">
                        <i class="fas fa-fw fa-cog"></i>
                        <span>Jam</span></a>
                </li>
            <?php } ?>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <hr class="sidebar-divider my-0">
            {{-- <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-dollar-sign fa-2x"></i>
                    <span>Price</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Price:</h6>
                        <a class="collapse-item active" href="/day">Hari</a>
                        <a class="collapse-item active" href="/hour">Jam</a>
                        <a class="collapse-item active" href="/price/create">Harga</a>
                    </div>
                </div>
            </li> --}}

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            {{-- <div class="sidebar-heading">
                Addons
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Pages</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Login Screens:</h6>
                        <a class="collapse-item" href="login.html">Login</a>
                        <a class="collapse-item" href="register.html">Register</a>
                        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="charts.html">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Charts</span></a>
            </li>

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                    and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                    Pro!</a>
            </div> --}}

        </ul>
        <!-- End of Sidebar -->
