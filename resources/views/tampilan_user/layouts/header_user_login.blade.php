                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <a href="/userLogin" class="btn bg-gradient-success text-gray-100 justify-content-center">
                        <div class="mx-auto d-flex">

                            {{-- d-flex text-gray-100 justify-content-center --}}
                            <div class="fa-pulse">
                                <i class="sidebar-brand-text mx-1 fa-futbol fas"> </i>
                            </div>
                            <div class="sidebar-brand-text mx-2"> Futsal APP</div>

                        </div>
                    </a>
                    {{-- <span>{{ Auth::user()->name }}</span> --}}


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a href="/registration" class="btn btn-user-daftar btn-icon-split">

                                <span class="text">Daftar</span>
                            </a>
                        </li> --}}
                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="modal-footer ">
                            <a href="/order-all" class="btn btn-light btn-icon-split">
                                <span class="text">Riwayat Order</span>
                                <span class="icon text-gray-600">
                                    <i class="fas fa-cart-arrow-down"></i>
                                </span>
                            </a>
                        </div>
                        <div class="modal-footer ">
                            <a href="{{ route('cart.list') }}" class="btn btn-light btn-icon-split">
                                <span class="text">Keranjang</span>
                                <span class="icon text-gray-600">
                                    <i class="fas fa-cart-plus fa-cart-arrow-down"></i>
                                </span>
                            </a>
                        </div>
                    
                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        {{-- <li class="nav-item dropdown no-arrow">
                            <a href="/login" class="btn btn-success">

                                <span class="text">Masuk</span>
                            </a>
                        </li> --}}
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->email }}</span>
                                <img class="img-profile rounded-circle" src="/img/{{ Auth::user()->foto }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="profileuser">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a> --}}
                                {{-- <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a> --}}
                                {{-- <div class="dropdown-divider"></div> --}}
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
