<header>
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #edddc9ff;">
        <div class="container">
            <!-- Logo thương hiệu -->
            <a class="navbar-brand fw-bold" href="{{ route('about') }}" style="color: #8B4513;">
                🪑 Đồ Gỗ Tỵ Trang
            </a>

            <!-- Nút toggle cho mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">

                    <!-- Trang Giới thiệu -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'fw-bold' : '' }}"
                            href="{{ route('about') }}" style="color: #5A3E2B;">
                            🏡 Giới thiệu
                        </a>
                    </li>

                    <!-- Trang Sản phẩm -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'fw-bold' : '' }}"
                            href="{{ route('products.index') }}" style="color: #5A3E2B;">
                            🪵 Sản phẩm
                        </a>
                    </li>

                    <!-- Trang Liên hệ -->
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'fw-bold' : '' }}"
                            href="{{ route('contact') }}" style="color: #5A3E2B;">
                            📞 Liên hệ
                        </a>
                    </li>

                    <!-- Mục Quản trị chỉ hiển thị cho admin -->
                    @auth
                    @if(Auth::user()->role === 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('admin.orders.*') ? 'fw-bold' : '' }}"
                            href="{{ route('admin.orders.index') }}" style="color: #B22222;">
                            ⚙️ Quản lý đơn hàng
                        </a>
                    </li>
                    @endif
                    @endauth

                    <!-- Giỏ hàng & Đơn hàng chỉ hiển thị cho user -->
                    @auth
                    @if(Auth::user()->role !== 'admin')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('cart.*') ? 'fw-bold' : '' }}"
                            href="{{ route('cart.index') }}" style="color: #5A3E2B;">
                            🛒 Giỏ hàng
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('orders.*') ? 'fw-bold' : '' }}"
                            href="{{ route('orders.index') }}" style="color: #5A3E2B;">
                            📦 Đơn hàng
                        </a>
                    </li>
                    @endif
                    @endauth

                    <!-- Tài khoản -->
                    @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle fw-semibold" href="#" id="userDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="color: #5A3E2B;">
                            👤 {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                            <li>
                                <a class="dropdown-item" href="{{ route('profile.edit') }}">⚙️ Hồ sơ</a>
                            </li>
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger">🚪 Đăng xuất</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item ms-3">
                        <a class="btn btn-sm" href="{{ route('login') }}"
                            style="background-color: #8B4513; color: white;">🔑 Đăng nhập</a>
                    </li>
                    @if (Route::has('register'))
                    <li class="nav-item ms-2">
                        <a class="btn btn-outline-secondary btn-sm" href="{{ route('register') }}">📝 Đăng ký</a>
                    </li>
                    @endif
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
</header>