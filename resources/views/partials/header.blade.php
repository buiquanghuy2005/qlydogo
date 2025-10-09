<header>
    <nav class="navbar navbar-expand-lg shadow-sm" style="background-color: #f9f5f0;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="{{ route('home') }}" style="color: #8B4513;">
                🪑 Đồ Gỗ Tỵ Trang
            </a>


            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active fw-semibold' : '' }}"
                            href="{{ route('home') }}" style="color: #5A3E2B;">
                            🏠 Trang chủ
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('products.*') ? 'active fw-semibold' : '' }}"
                            href="{{ route('products.index') }}" style="color: #5A3E2B;">
                            🪵 Sản phẩm
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about" style="color: #5A3E2B;">
                            🏡 Giới thiệu
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/contact" style="color: #5A3E2B;">
                            📞 Liên hệ
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


</header>