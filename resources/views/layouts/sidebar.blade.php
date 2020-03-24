<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <div class="navbar-brand-box">
            <a href="{{ url('/') }}" class="logo">
                <i class="{{ asset ('assets/images/epakan.png')}}"></i>
                <span>
                    ePakan
                </span>
            </a>
        </div>

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ url('/') }}" class="waves-effect"><i class="feather-airplay"></i><span
                            class="badge badge-pill badge-primary float-right"></span><span>Dashboard</span></a>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-copy"></i><span>Kategori</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/kategori') }}">Master Kategori</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-briefcase"></i><span>Transaksi</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/transaksi') }}">Laporan Transaksi</a></li>
                        <li><a href="{{ url('/pesanan') }}">Pesanan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-dollar-sign"></i><span>Keuangan</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/laporan') }}">Laporan Keuangan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-users"></i><span>Pengguna</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/mitra') }}">Mitra ePakan</a></li>
                        <li><a href="{{ url('/pelanggan') }}">Pelanggan ePakan</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-credit-card"></i><span>Saldo</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/saldo') }}">Saldo Masuk</a></li>
                        <li><a href="{{ url('/pencairan') }}">Pencairan Saldo</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-package"></i><span>Produk</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/produk') }}">Produk</a></li>
                    </ul>
                </li>

                <li class="menu-title">More</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="feather-map"></i><span>Maps</span></a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ url('/maps') }}">Google Maps</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect"><i
                            class="mdi mdi-share-variant"></i><span>User</span></a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ url('/ganti_password') }}">Ganti Password</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>