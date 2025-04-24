<!-- View/product/all_products.php -->
<!-- Page Title -->
<section class="bg-light py-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <h1 class="fw-bold">Sản phẩm</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Sản phẩm</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-6 text-md-end">
                <div class="d-inline-flex align-items-center">
                    <span class="me-2">Sắp xếp theo:</span>
                    <select class="form-select form-select-sm" id="sortOrder" style="width: auto;">
                        <option value="popular" <?php echo $sort == 'popular' ? 'selected' : ''; ?>>Phổ biến nhất</option>
                        <option value="newest" <?php echo $sort == 'newest' ? 'selected' : ''; ?>>Mới nhất</option>
                        <option value="price-asc" <?php echo $sort == 'price-asc' ? 'selected' : ''; ?>>Giá: Thấp đến cao</option>
                        <option value="price-desc" <?php echo $sort == 'price-desc' ? 'selected' : ''; ?>>Giá: Cao đến thấp</option>
                        <option value="rating" <?php echo $sort == 'rating' ? 'selected' : ''; ?>>Đánh giá</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Products Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Filter Sidebar -->
            <div class="col-lg-3">
                <div class="product-filter-advanced sticky-top" style="top: 100px;">
                    <h4 class="mb-4">Bộ lọc sản phẩm</h4>
                    
                    <!-- Categories -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title" data-bs-toggle="collapse" data-bs-target="#categoryFilter">
                            Danh mục sản phẩm <i class="bi bi-chevron-down"></i>
                        </h5>
                        <div class="collapse show" id="categoryFilter">
                            <div class="filter-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="dslr" <?php echo $category == 'dslr' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="dslr">Máy ảnh DSLR</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="mirrorless" <?php echo $category == 'mirrorless' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="mirrorless">Máy ảnh Mirrorless</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="compact" <?php echo $category == 'compact' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="compact">Máy ảnh Compact</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="lens" <?php echo $category == 'lens' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="lens">Ống kính (Lens)</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="accessories" <?php echo $category == 'accessories' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="accessories">Phụ kiện</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Brands -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title" data-bs-toggle="collapse" data-bs-target="#brandFilter">
                            Thương hiệu <i class="bi bi-chevron-down"></i>
                        </h5>
                        <div class="collapse show" id="brandFilter">
                            <div class="filter-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="canon" <?php echo $brand == 'canon' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="canon">Canon</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="sony" <?php echo $brand == 'sony' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="sony">Sony</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="nikon" <?php echo $brand == 'nikon' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="nikon">Nikon</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="fujifilm" <?php echo $brand == 'fujifilm' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="fujifilm">Fujifilm</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="panasonic" <?php echo $brand == 'panasonic' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="panasonic">Panasonic</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="leica" <?php echo $brand == 'leica' ? 'checked' : ''; ?>>
                                    <label class="form-check-label" for="leica">Leica</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Price Range -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title" data-bs-toggle="collapse" data-bs-target="#priceFilter">
                            Khoảng giá <i class="bi bi-chevron-down"></i>
                        </h5>
                        <div class="collapse show" id="priceFilter">
                            <div class="filter-body">
                                <div class="range-slider mt-3">
                                    <input type="range" class="form-range" min="0" max="100000000" step="1000000" id="priceRange">
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₫</span>
                                        <input type="text" class="form-control" id="minPrice" value="0">
                                    </div>
                                    <div class="mx-2 d-flex align-items-center">-</div>
                                    <div class="input-group input-group-sm">
                                        <span class="input-group-text">₫</span>
                                        <input type="text" class="form-control" id="maxPrice" value="100000000">
                                    </div>
                                </div>
                                <button class="btn btn-sm btn-primary w-100 mt-3">Áp dụng</button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Features -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title" data-bs-toggle="collapse" data-bs-target="#featureFilter">
                            Tính năng <i class="bi bi-chevron-down"></i>
                        </h5>
                        <div class="collapse show" id="featureFilter">
                            <div class="filter-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="wifi">
                                    <label class="form-check-label" for="wifi">Kết nối Wi-Fi</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="bluetooth">
                                    <label class="form-check-label" for="bluetooth">Bluetooth</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="4k">
                                    <label class="form-check-label" for="4k">Quay video 4K</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="touchscreen">
                                    <label class="form-check-label" for="touchscreen">Màn hình cảm ứng</label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="checkbox" id="stabilization">
                                    <label class="form-check-label" for="stabilization">Chống rung</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Ratings -->
                    <div class="filter-section mb-4">
                        <h5 class="filter-title" data-bs-toggle="collapse" data-bs-target="#ratingFilter">
                            Đánh giá <i class="bi bi-chevron-down"></i>
                        </h5>
                        <div class="collapse show" id="ratingFilter">
                            <div class="filter-body">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="rating" id="rating5">
                                    <label class="form-check-label" for="rating5">
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="rating" id="rating4">
                                    <label class="form-check-label" for="rating4">
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <span>& trở lên</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="rating" id="rating3">
                                    <label class="form-check-label" for="rating3">
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <span>& trở lên</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="rating" id="rating2">
                                    <label class="form-check-label" for="rating2">
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <span>& trở lên</span>
                                        </div>
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="rating" id="rating1">
                                    <label class="form-check-label" for="rating1">
                                        <div class="product-rating">
                                            <i class="bi bi-star-fill"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <i class="bi bi-star"></i>
                                            <span>& trở lên</span>
                                        </div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <button class="btn btn-secondary w-100" id="clearFilters">Xóa bộ lọc</button>
                </div>
            </div>
            
            <!-- Products Grid -->
            <div class="col-lg-9">
                <div class="row g-4 products-container">
                    <?php 
                    // Revisar si tenemos productos
                    if ($products && $products->rowCount() > 0):
                        // Obtener productos como array asociativo
                        while ($product = $products->fetch(PDO::FETCH_ASSOC)):
                            // Calcular el porcentaje de descuento si hay precio anterior
                            $discount_percent = 0;
                            if (!empty($product['old_price']) && $product['old_price'] > $product['price']) {
                                $discount_percent = round(100 - ($product['price'] / $product['old_price'] * 100));
                            }
                    ?>
                    <div class="col-md-6 col-lg-4 product-item" data-category="<?php echo strtolower($product['category']); ?>" data-brand="<?php echo strtolower($product['brand']); ?>">
                        <div class="product-card h-100">
                            <div class="product-card-inner">
                                <div class="product-image-container">
                                    <?php if ($discount_percent > 0): ?>
                                        <span class="product-badge sale">-<?php echo $discount_percent; ?>%</span>
                                    <?php elseif ($product['is_new']): ?>
                                        <span class="product-badge new">Mới</span>
                                    <?php elseif ($product['is_hot']): ?>
                                        <span class="product-badge hot">Hot</span>
                                    <?php elseif ($product['is_best']): ?>
                                        <span class="product-badge best">Best</span>
                                    <?php endif; ?>
                                    
                                    <button class="product-wishlist-btn" type="button" data-product-id="<?php echo $product['id']; ?>">
                                        <i class="bi bi-heart"></i>
                                        <i class="bi bi-heart-fill"></i>
                                    </button>
                                    <div class="product-image" style="background-image: url('<?php echo htmlspecialchars($product['image_url']); ?>')"></div>
                                    <div class="product-overlay">
                                        <button class="btn btn-sm btn-light product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="<?php echo $product['id']; ?>">
                                            <i class="bi bi-eye"></i> Xem nhanh
                                        </button>
                                        <a href="/product?id=<?php echo $product['id']; ?>" class="btn btn-sm btn-primary">
                                            <i class="bi bi-info-circle"></i> Chi tiết
                                        </a>
                                    </div>
                                </div>
                                <div class="product-info">
                                    <div class="product-brand"><?php echo htmlspecialchars($product['brand']); ?></div>
                                    <h5 class="product-title">
                                        <a href="/product?id=<?php echo $product['id']; ?>" class="text-dark text-decoration-none"><?php echo htmlspecialchars($product['name']); ?></a>
                                    </h5>
                                    <div class="product-rating">
                                        <?php 
                                        // Mostrar estrellas según rating
                                        $rating = floatval($product['rating']);
                                        $whole_stars = floor($rating);
                                        $half_star = ($rating - $whole_stars) >= 0.5;
                                        $empty_stars = 5 - $whole_stars - ($half_star ? 1 : 0);
                                        
                                        for ($i = 0; $i < $whole_stars; $i++): ?>
                                            <i class="bi bi-star-fill"></i>
                                        <?php endfor; ?>
                                        
                                        <?php if ($half_star): ?>
                                            <i class="bi bi-star-half"></i>
                                        <?php endif; ?>
                                        
                                        <?php for ($i = 0; $i < $empty_stars; $i++): ?>
                                            <i class="bi bi-star"></i>
                                        <?php endfor; ?>
                                        
                                        <span class="ms-2"><?php echo number_format($rating, 1); ?> (<?php echo $product['reviews_count']; ?> đánh giá)</span>
                                    </div>
                                    <div class="product-description">
                                        <?php echo htmlspecialchars($product['short_description']); ?>
                                    </div>
                                    <div class="product-price-wrapper">
                                        <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): ?>
                                            <span class="product-price-old"><?php echo number_format($product['old_price'], 0, ',', '.'); ?>đ</span>
                                        <?php endif; ?>
                                        <span class="product-price"><?php echo number_format($product['price'], 0, ',', '.'); ?>đ</span>
                                    </div>
                                    <div class="product-meta">
                                        <?php if ($product['stock'] > 10): ?>
                                            <span class="product-stock in-stock">
                                                <i class="bi bi-check-circle-fill"></i> Còn hàng
                                            </span>
                                        <?php elseif ($product['stock'] > 0): ?>
                                            <span class="product-stock limited">
                                                <i class="bi bi-exclamation-triangle-fill"></i> Sắp hết hàng
                                            </span>
                                        <?php else: ?>
                                            <span class="product-stock out-of-stock">
                                                <i class="bi bi-x-circle-fill"></i> Hết hàng
                                            </span>
                                        <?php endif; ?>
                                        <span class="product-sold">
                                            <i class="bi bi-bag-check"></i> Đã bán: <?php echo $product['sold_count']; ?>
                                        </span>
                                    </div>
                                    <form action="/cart/add" method="post" class="mt-3">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" class="btn btn-primary w-100 <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>" <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>>
                                            <?php if ($product['stock'] > 0): ?>
                                                <i class="bi bi-cart-plus"></i> Thêm vào giỏ
                                            <?php else: ?>
                                                <i class="bi bi-bell"></i> Thông báo khi có hàng
                                            <?php endif; ?>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endwhile;
                    else:
                    ?>
                    <div class="col-12 text-center">
                        <p>Không có sản phẩm nào để hiển thị.</p>
                    </div>
                    <?php endif; ?>
                </div>
                
                <!-- Pagination -->
                <nav class="mt-5">
                    <ul class="pagination justify-content-center">
                        <?php 
                        // Asumiendo que tienes variables para la paginación
                        $current_page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
                        $total_pages = 5; // Este valor debería calcularse en base al número total de productos
                        
                        // Link para la página anterior
                        if ($current_page > 1): 
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $current_page - 1; ?><?php echo !empty($category) ? '&category='.$category : ''; ?><?php echo !empty($brand) ? '&brand='.$brand : ''; ?><?php echo !empty($sort) ? '&sort='.$sort : ''; ?>" tabindex="-1">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="bi bi-chevron-left"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                        
                        <?php 
                        // Generar links para las páginas
                        for ($i = 1; $i <= $total_pages; $i++): 
                        ?>
                        <li class="page-item <?php echo $current_page == $i ? 'active' : ''; ?>">
                            <a class="page-link" href="?page=<?php echo $i; ?><?php echo !empty($category) ? '&category='.$category : ''; ?><?php echo !empty($brand) ? '&brand='.$brand : ''; ?><?php echo !empty($sort) ? '&sort='.$sort : ''; ?>">
                                <?php echo $i; ?>
                            </a>
                        </li>
                        <?php endfor; ?>
                        
                        <?php 
                        // Link para la página siguiente
                        if ($current_page < $total_pages): 
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="?page=<?php echo $current_page + 1; ?><?php echo !empty($category) ? '&category='.$category : ''; ?><?php echo !empty($brand) ? '&brand='.$brand : ''; ?><?php echo !empty($sort) ? '&sort='.$sort : ''; ?>">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                        <?php else: ?>
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="bi bi-chevron-right"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section" data-aos="fade-up">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h2 class="section-title">Đăng ký nhận thông tin</h2>
                <p class="lead mb-4">Cập nhật tin tức về sản phẩm mới, khuyến mãi và các bài viết hướng dẫn nhiếp ảnh.</p>
                <div class="newsletter-form">
                    <form action="/subscribe" method="post">
                        <input type="email" name="email" class="form-control newsletter-input" placeholder="Email của bạn" required>
                        <button type="submit" class="btn btn-light newsletter-btn">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Quick View Modal -->
<div class="modal fade" id="quickViewModal" tabindex="-1" aria-labelledby="quickViewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered quick-view-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="quickViewModalLabel">Chi tiết sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="product-zoom-container">
                            <div class="quick-view-image product-zoom-image" id="quickViewImage"></div>
                        </div>
                        <div class="quick-view-thumbs" id="quickViewThumbs">
                            <!-- Las miniaturas se cargarán dinámicamente con JavaScript -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="quick-view-title" id="quickViewTitle"></h3>
                        <div class="product-rating mb-3" id="quickViewRating">
                            <!-- Las estrellas se cargarán dinámicamente con JavaScript -->
                        </div>
                        <h4 class="quick-view-price" id="quickViewPrice"></h4>
                        <p class="quick-view-description" id="quickViewDescription"></p>
                        <div class="quick-view-meta" id="quickViewMeta">
                            <!-- Información del producto se cargará dinámicamente con JavaScript -->
                        </div>
                        
                        <!-- Selector de color -->
                        <div class="mb-3" id="quickViewColorSection">
                            <h6 class="mb-2">Màu sắc:</h6>
                            <div class="color-options" id="quickViewColors">
                                <!-- Las opciones de color se cargarán dinámicamente con JavaScript -->
                            </div>
                        </div>
                        
                        <div class="quick-view-quantity">
                            <span>Số lượng:</span>
                            <button class="quantity-btn" id="decreaseQuantity">-</button>
                            <input type="text" class="form-control quantity-input" id="quantityInput" value="1">
                            <button class="quantity-btn" id="increaseQuantity">+</button>
                        </div>
                        <div class="quick-view-actions">
                            <button class="btn btn-outline-primary" id="quickViewWishlist">
                                <i class="bi bi-heart me-1"></i>Thêm vào yêu thích
                            </button>
                            <form action="/cart/add" method="post" class="d-inline-block">
                                <input type="hidden" name="product_id" id="quickViewProductId" value="">
                                <input type="hidden" name="quantity" id="quickViewQuantity" value="1">
                                <button type="submit" class="btn btn-primary" id="quickViewAddToCart">
                                    <i class="bi bi-cart-plus me-1"></i>Thêm vào giỏ hàng
                                </button>
                            </form>
                        </div>
                        
                        <!-- Tabs con información detallada -->
                        <div class="mt-4">
                            <ul class="nav nav-tabs" id="productDetailTabs" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link active" id="specs-tab" data-bs-toggle="tab" data-bs-target="#specs" type="button" role="tab" aria-controls="specs" aria-selected="true">Thông số</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab" aria-controls="features" aria-selected="false">Tính năng</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="shipping-tab" data-bs-toggle="tab" data-bs-target="#shipping" type="button" role="tab" aria-controls="shipping" aria-selected="false">Vận chuyển</button>
                                </li>
                            </ul>
                            <div class="tab-content pt-3" id="productDetailTabsContent">
                                <div class="tab-pane fade show active" id="specs" role="tabpanel" aria-labelledby="specs-tab">
                                    <ul class="list-unstyled" id="quickViewSpecs">
                                        <!-- Las especificaciones se cargarán dinámicamente con JavaScript -->
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                    <ul class="list-unstyled" id="quickViewFeatures">
                                        <!-- Las características se cargarán dinámicamente con JavaScript -->
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="shipping" role="tabpanel" aria-labelledby="shipping-tab">
                                    <p>Miễn phí giao hàng toàn quốc cho đơn hàng từ 5 triệu đồng.</p>
                                    <p>Thời gian giao hàng: 1-3 ngày làm việc tùy khu vực.</p>
                                    <p>Đổi trả miễn phí trong vòng 7 ngày nếu sản phẩm có lỗi từ nhà sản xuất.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar el cambio en el orden de clasificación
        const sortOrder = document.getElementById('sortOrder');
        if (sortOrder) {
            sortOrder.addEventListener('change', function() {
                // Obtener los parámetros actuales de la URL
                const urlParams = new URLSearchParams(window.location.search);
                
                // Actualizar el parámetro 'sort'
                urlParams.set('sort', this.value);
                
                // Mantener la página actual si existe
                if (urlParams.has('page')) {
                    urlParams.set('page', '1'); // Volver a la primera página al cambiar la ordenación
                }
                
                // Redirigir a la misma página con los nuevos parámetros
                window.location.href = window.location.pathname + '?' + urlParams.toString();
            });
        }
        
        // Manejar los filtros de categoría
        const categoryCheckboxes = document.querySelectorAll('#categoryFilter .form-check-input');
        categoryCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Desmarcar otros checkboxes
                    categoryCheckboxes.forEach(cb => {
                        if (cb !== this) cb.checked = false;
                    });
                    
                    // Redirigir con el nuevo filtro
                    applyFilter('category', this.id);
                } else {
                    // Si no hay ninguno marcado, redirigir sin filtro de categoría
                    removeFilter('category');
                }
            });
        });
        
        // Manejar los filtros de marca
        const brandCheckboxes = document.querySelectorAll('#brandFilter .form-check-input');
        brandCheckboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    // Desmarcar otros checkboxes
                    brandCheckboxes.forEach(cb => {
                        if (cb !== this) cb.checked = false;
                    });
                    
                    // Redirigir con el nuevo filtro
                    applyFilter('brand', this.id);
                } else {
                    // Si no hay ninguno marcado, redirigir sin filtro de marca
                    removeFilter('brand');
                }
            });
        });
        
        // Botón para limpiar todos los filtros
        const clearFiltersBtn = document.getElementById('clearFilters');
        if (clearFiltersBtn) {
            clearFiltersBtn.addEventListener('click', function() {
                window.location.href = window.location.pathname;
            });
        }
        
        // Función para aplicar un filtro
        function applyFilter(filterType, value) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.set(filterType, value);
            urlParams.delete('page'); // Volver a la primera página al aplicar un filtro
            window.location.href = window.location.pathname + '?' + urlParams.toString();
        }
        
        // Función para eliminar un filtro
        function removeFilter(filterType) {
            const urlParams = new URLSearchParams(window.location.search);
            urlParams.delete(filterType);
            urlParams.delete('page'); // Volver a la primera página al quitar un filtro
            window.location.href = window.location.pathname + '?' + urlParams.toString();
        }
    });
</script>