<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-white sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand logo" href="index.html"><i class="bi bi-camera-fill me-2"></i>CameraVN</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto text-center">
                <li class="nav-item">
                    <a class="nav-link" href="#home" onclick="scrollToTop()">Trang chủ</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="productDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Sản phẩm
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="productDropdown">
                        <li><a class="dropdown-item" href="#products">Máy ảnh DSLR</a></li>
                        <li><a class="dropdown-item" href="#products">Máy ảnh mirrorless</a></li>
                        <li><a class="dropdown-item" href="#products">Máy ảnh compact</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#products">Ống kính (Lens)</a></li>
                        <li><a class="dropdown-item" href="#products">Phụ kiện</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="brandDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Loại hãng
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="brandDropdown">
                        <li><a class="dropdown-item" href="#products">Canon</a></li>
                        <li><a class="dropdown-item" href="#products">Sony</a></li>
                        <li><a class="dropdown-item" href="#products">Nikon</a></li>
                        <li><a class="dropdown-item" href="#products">Fujifilm</a></li>
                        <li><a class="dropdown-item" href="#products">Panasonic</a></li>
                        <li><a class="dropdown-item" href="#products">Leica</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#services">Dịch vụ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#blog">Blog nhiếp ảnh</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">Giới thiệu</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Thông tin</a>
                </li>
            </ul>
            
            <div class="d-none d-lg-block">
                <div class="d-flex align-items-center">

                    <!-- Search form - FIXED -->
                    <form class="d-flex me-2 position-relative search-container">
                        <input class="form-control search-input" type="search" placeholder="Tìm kiếm" aria-label="Search">
                        <i class="bi bi-search search-icon"></i>
                    </form>
                    
                    <!-- User section -->
                    <div class="nav-buttons ms-2 d-flex align-items-center">
                        <button type="button" class="theme-toggle me-2" id="themeToggle">
                            <i class="bi bi-sun-fill"></i>
                        </button>
                        <div class="position-relative me-2">
                            <a class="btn btn-outline-primary" href="#cart-modal" data-bs-toggle="modal" id="cartButton">
                                <i class="bi bi-cart"></i>
                            </a>
                            <div class="cart-count">0</div>
                        </div>
                        <a class="btn btn-outline-primary" href="#login-modal" data-bs-toggle="modal" id="loginButton">
                            <span class="d-none d-md-inline">Đăng nhập</span>
                        </a>
                    </div>
                </div>
            </div>
            
            <!-- Mobile buttons - separate rows -->
            <div class="d-lg-none mt-3">
                <!-- Search form - FIXED -->
                <form class="d-flex position-relative search-container mb-2">
                    <input class="form-control search-input" type="search" placeholder="Tìm kiếm" aria-label="Search">
                    <i class="bi bi-search search-icon"></i>
                </form>
                
                <!-- Theme toggle -->
                <div class="d-flex justify-content-center mb-2">
                    <button type="button" class="theme-toggle btn btn-outline-primary w-100" id="mobileThemeToggle">
                        <i class="bi bi-sun-fill me-2"></i>Chế độ tối
                    </button>
                </div>
                
                <!-- Cart button -->
                <div class="d-flex justify-content-center mb-2">
                    <div class="position-relative w-100">
                        <a class="btn btn-outline-primary w-100" href="#cart-modal" data-bs-toggle="modal" id="mobileCartButton">
                            <i class="bi bi-cart me-2"></i>Giỏ hàng
                        </a>
                        <div class="cart-count">0</div>
                    </div>
                </div>
                
                <!-- Login button -->
                <div class="d-flex justify-content-center mb-2">
                    <a class="btn btn-outline-primary w-100" href="#login-modal" data-bs-toggle="modal" id="mobileLoginButton">
                        <i class="bi bi-person me-2"></i>Đăng nhập
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>