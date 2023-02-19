                <!-- Topbar -->

                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <div class="btn bg-gradient-success text-gray-100 justify-content-center">
                        <div class="mx-auto d-flex">

                            {{-- d-flex text-gray-100 justify-content-center --}}
                            <div class="fa-pulse">
                                <i class="sidebar-brand-text mx-1 fa-futbol fas"> </i>
                            </div>
                            <div class="sidebar-brand-text mx-2"> Futsal APP</div>

                        </div>
                    </div>

                    {{-- <span>{{ Auth::user()->name }}</span> --}}

                    <!-- Topbar Search -->


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a href="/registration" class="btn btn-user-daftar btn-icon-split">

                                <span class="text">Daftar</span>
                            </a>
                        </li>
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
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a href="/login" class="btn btn-success">

                                <span class="text">Masuk</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->
