<!-- View/product/product_detail.php -->
<!-- Page Title -->
<section class="bg-light py-4">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/products">Sản phẩm</a></li>
                <li class="breadcrumb-item"><a href="/products?category=<?php echo strtolower($this->product->category); ?>"><?php echo htmlspecialchars($this->product->category_name); ?></a></li>
                <li class="breadcrumb-item active" aria-current="page"><?php echo htmlspecialchars($this->product->name); ?></li>
            </ol>
        </nav>
    </div>
</section>

<!-- Product Detail Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Product Gallery -->
            <div class="col-lg-6">
                <div class="product-gallery">
                    <!-- Main Image -->
                    <div class="main-image-container mb-3">
                        <div class="swiper product-main-swiper">
                            <div class="swiper-wrapper">
                                <?php 
                                // Si tenemos imágenes en un array
                                $images = json_decode($this->product->images, true);
                                if (empty($images)) {
                                    // Si no hay imágenes adicionales, usar la imagen principal
                                    $images = [$this->product->image_url];
                                }
                                
                                foreach ($images as $image): 
                                ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo htmlspecialchars($image); ?>" data-fancybox="gallery" class="product-zoom-container">
                                        <img src="<?php echo htmlspecialchars($image); ?>" alt="<?php echo htmlspecialchars($this->product->name); ?>" class="img-fluid rounded product-zoom-image">
                                        <div class="zoom-overlay">
                                            <i class="bi bi-zoom-in"></i>
                                        </div>
                                    </a>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="swiper-button-next"></div>
                            <div class="swiper-button-prev"></div>
                        </div>
                    </div>
                    
                    <!-- Thumbnails -->
                    <div class="thumbnails-container">
                        <div class="swiper product-thumbs-swiper">
                            <div class="swiper-wrapper">
                                <?php foreach ($images as $image): ?>
                                <div class="swiper-slide">
                                    <img src="<?php echo htmlspecialchars($image); ?>" alt="Thumbnail" class="img-fluid rounded">
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Product Actions -->
                    <div class="d-flex justify-content-between mt-3">
                        <button class="btn btn-outline-primary" id="addToWishlist" data-product-id="<?php echo $this->product->id; ?>">
                            <i class="bi bi-heart me-2"></i>Thêm vào yêu thích
                        </button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#shareModal">
                            <i class="bi bi-share me-2"></i>Chia sẻ
                        </button>
                        <button class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#compareModal">
                            <i class="bi bi-arrow-left-right me-2"></i>So sánh
                        </button>
                    </div>
                </div>
            </div>
            
            <!-- Product Info -->
            <div class="col-lg-6">
                <div class="product-info">
                    <span class="product-brand badge bg-light text-dark"><?php echo htmlspecialchars($this->product->brand); ?></span>
                    <h1 class="product-title display-6 fw-bold mt-2"><?php echo htmlspecialchars($this->product->name); ?></h1>
                    
                    <div class="d-flex align-items-center mt-3">
                        <div class="product-rating me-3">
                            <?php 
                            // Mostrar estrellas según rating
                            $rating = floatval($this->product->rating);
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
                            
                            <span class="ms-2"><?php echo number_format($rating, 1); ?></span>
                        </div>
                        <span class="text-muted"><?php echo $this->product->reviews_count; ?> đánh giá</span>
                        <span class="mx-3">|</span>
                        <span class="text-muted"><?php echo $this->product->sold_count; ?> đã bán</span>
                    </div>
                    
                    <div class="product-price-block my-4">
                        <?php if (!empty($this->product->old_price) && $this->product->old_price > $this->product->price): 
                            $discount_percent = round(100 - ($this->product->price / $this->product->old_price * 100));
                        ?>
                            <span class="product-price-old text-decoration-line-through fs-5 text-muted me-2"><?php echo number_format($this->product->old_price, 0, ',', '.'); ?>đ</span>
                            <span class="product-price fs-3 fw-bold text-primary"><?php echo number_format($this->product->price, 0, ',', '.'); ?>đ</span>
                            <span class="badge bg-danger ms-2">Giảm <?php echo $discount_percent; ?>%</span>
                        <?php else: ?>
                            <span class="product-price fs-3 fw-bold text-primary"><?php echo number_format($this->product->price, 0, ',', '.'); ?>đ</span>
                        <?php endif; ?>
                    </div>
                    
                    <div class="product-short-description mb-4">
                        <p><?php echo htmlspecialchars($this->product->short_description); ?></p>
                    </div>
                    
                    <!-- Color Options -->
                    <?php 
                    $colors = json_decode($this->product->colors, true);
                    if (!empty($colors)):
                    ?>
                    <div class="product-colors mb-4">
                        <h6>Màu sắc:</h6>
                        <div class="color-options">
                            <?php foreach ($colors as $index => $color): ?>
                                <div class="color-option <?php echo $index === 0 ? 'selected' : ''; ?>" 
                                     style="background-color: <?php echo htmlspecialchars($color['code']); ?>;" 
                                     title="<?php echo htmlspecialchars($color['name']); ?>"
                                     data-color="<?php echo htmlspecialchars($color['name']); ?>"></div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Product Variations -->
                    <?php 
                    $variations = json_decode($this->product->variations, true);
                    if (!empty($variations)):
                    ?>
                    <div class="product-variations mb-4">
                        <h6>Cấu hình:</h6>
                        <div class="btn-group" role="group">
                            <?php foreach ($variations as $index => $variation): ?>
                                <input type="radio" class="btn-check" name="variation" id="variation-<?php echo $index; ?>" value="<?php echo htmlspecialchars($variation['id']); ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                                <label class="btn btn-outline-primary" for="variation-<?php echo $index; ?>"><?php echo htmlspecialchars($variation['name']); ?></label>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    
                    <!-- Quantity -->
                    <div class="product-quantity mb-4">
                        <h6>Số lượng:</h6>
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm btn-outline-secondary rounded-circle" id="decreaseQty">
                                <i class="bi bi-dash"></i>
                            </button>
                            <input type="text" class="form-control text-center mx-2" id="quantity" value="1" style="width: 60px;">
                            <button class="btn btn-sm btn-outline-secondary rounded-circle" id="increaseQty">
                                <i class="bi bi-plus"></i>
                            </button>
                            <span class="text-muted ms-3">Còn <?php echo $this->product->stock; ?> sản phẩm</span>
                        </div>
                    </div>
                    
                    <!-- Add to Cart Button -->
                    <div class="d-grid gap-2 d-md-flex mb-4">
                        <form action="/cart/add" method="post" class="d-flex flex-grow-1 gap-2">
                            <input type="hidden" name="product_id" value="<?php echo $this->product->id; ?>">
                            <input type="hidden" name="quantity" id="cart-quantity" value="1">
                            <?php if ($this->product->stock > 0): ?>
                                <button type="submit" class="btn btn-primary btn-lg flex-grow-1">
                                    <i class="bi bi-cart-plus me-2"></i>Thêm vào giỏ hàng
                                </button>
                                <button type="submit" name="buy_now" value="1" class="btn btn-success btn-lg flex-grow-1">
                                    <i class="bi bi-credit-card me-2"></i>Mua ngay
                                </button>
                            <?php else: ?>
                                <button type="button" class="btn btn-secondary btn-lg flex-grow-1" disabled>
                                    <i class="bi bi-x-circle me-2"></i>Hết hàng
                                </button>
                                <button type="button" class="btn btn-outline-primary btn-lg flex-grow-1" id="notifyButton">
                                    <i class="bi bi-bell me-2"></i>Thông báo khi có hàng
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>
                    
                    <!-- Delivery Info -->
                    <div class="delivery-info p-3 rounded border mb-4">
                        <h6 class="mb-3">Thông tin giao hàng:</h6>
                        <div class="d-flex mb-2">
                            <i class="bi bi-truck text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Miễn phí giao hàng</strong>
                                <p class="mb-0 text-muted">Cho đơn hàng từ 5 triệu đồng</p>
                            </div>
                        </div>
                        <div class="d-flex mb-2">
                            <i class="bi bi-arrow-return-left text-primary me-3 fs-5"></i>
                            <div>
                                <strong>7 ngày đổi trả</strong>
                                <p class="mb-0 text-muted">Nếu sản phẩm có lỗi từ nhà sản xuất</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-shield-check text-primary me-3 fs-5"></i>
                            <div>
                                <strong>Bảo hành chính hãng 24 tháng</strong>
                                <p class="mb-0 text-muted">Tại trung tâm bảo hành <?php echo htmlspecialchars($this->product->brand); ?> toàn quốc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product Description Tabs -->
<section class="py-5 bg-light">
    <div class="container">
        <ul class="nav nav-tabs mb-4" id="productTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Mô tả</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="specifications-tab" data-bs-toggle="tab" data-bs-target="#specifications" type="button" role="tab" aria-controls="specifications" aria-selected="false">Thông số kỹ thuật</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="features-tab" data-bs-toggle="tab" data-bs-target="#features" type="button" role="tab" aria-controls="features" aria-selected="false">Tính năng nổi bật</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">Đánh giá (<?php echo $this->product->reviews_count; ?>)</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">Câu hỏi thường gặp</button>
            </li>
        </ul>
        
        <div class="tab-content p-4 bg-white rounded shadow-sm" id="productTabContent">
            <!-- Description Tab -->
            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                <h3 class="mb-4"><?php echo htmlspecialchars($this->product->name); ?></h3>
                <div class="row">
                    <div class="col-md-8">
                        <?php echo $this->product->description; ?>
                    </div>
                    <div class="col-md-4">
                        <img src="<?php echo htmlspecialchars($this->product->image_url); ?>" alt="<?php echo htmlspecialchars($this->product->name); ?> Detail" class="img-fluid rounded">
                        <div class="mt-4 p-3 bg-light rounded">
                            <h5>Điểm nổi bật:</h5>
                            <ul class="list-unstyled">
                                <?php 
                                $highlights = json_decode($this->product->highlights, true);
                                if (!empty($highlights)):
                                    foreach ($highlights as $highlight):
                                ?>
                                <li><i class="bi bi-check-circle-fill text-success me-2"></i> <?php echo htmlspecialchars($highlight); ?></li>
                                <?php 
                                    endforeach;
                                endif;
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <div class="mt-5">
                    <h5>Thích hợp cho:</h5>
                    <div class="row g-3">
                        <?php 
                        $suitable_for = json_decode($this->product->suitable_for, true);
                        if (!empty($suitable_for)):
                            foreach ($suitable_for as $for):
                        ?>
                        <div class="col-md-4">
                            <div class="card h-100">
                                <div class="card-body text-center">
                                    <i class="bi bi-person-circle fs-1 text-primary mb-3"></i>
                                    <h6><?php echo htmlspecialchars($for['title']); ?></h6>
                                    <p class="text-muted small"><?php echo htmlspecialchars($for['description']); ?></p>
                                </div>
                            </div>
                        </div>
                        <?php 
                            endforeach;
                        endif;
                        ?>
                    </div>
                </div>
            </div>
            
            <!-- Specifications Tab -->
            <div class="tab-pane fade" id="specifications" role="tabpanel" aria-labelledby="specifications-tab">
                <h3 class="mb-4">Thông số kỹ thuật</h3>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                            <?php 
                            $specs = json_decode($this->product->specifications, true);
                            if (!empty($specs)):
                                foreach ($specs as $spec):
                            ?>
                            <tr>
                                <th style="width: 30%"><?php echo htmlspecialchars($spec['name']); ?></th>
                                <td><?php echo htmlspecialchars($spec['value']); ?></td>
                            </tr>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <!-- Features Tab -->
            <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                <h3 class="mb-4">Tính năng nổi bật</h3>
                <div class="row g-4">
                    <?php 
                    $features = json_decode($this->product->features, true);
                    if (!empty($features)):
                        foreach ($features as $feature):
                    ?>
                    <div class="col-md-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-<?php echo htmlspecialchars($feature['icon']); ?> fs-1 text-primary me-3"></i>
                                    <h5 class="card-title mb-0"><?php echo htmlspecialchars($feature['title']); ?></h5>
                                </div>
                                <p class="card-text"><?php echo htmlspecialchars($feature['description']); ?></p>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
            
            <!-- Reviews Tab -->
            <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="mb-0">Đánh giá (<?php echo $this->product->reviews_count; ?>)</h3>
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#reviewModal">
                        <i class="bi bi-pencil me-2"></i>Viết đánh giá
                    </button>
                </div>
                
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="overall-rating text-center p-4 bg-light rounded">
                            <h1 class="display-3 fw-bold text-primary"><?php echo number_format($this->product->rating, 1); ?></h1>
                            <div class="rating-stars mb-3">
                                <?php 
                                // Mostrar estrellas según rating
                                $rating = floatval($this->product->rating);
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
                            </div>
                            <p class="text-muted">Dựa trên <?php echo $this->product->reviews_count; ?> đánh giá</p>
                            
                            <div class="rating-bars mt-4">
                                <?php 
                                $rating_distribution = json_decode($this->product->rating_distribution, true);
                                if (!empty($rating_distribution)):
                                    for ($i = 5; $i >= 1; $i--):
                                        $count = isset($rating_distribution[$i]) ? $rating_distribution[$i] : 0;
                                        $percentage = ($this->product->reviews_count > 0) ? ($count / $this->product->reviews_count * 100) : 0;
                                ?>
                                <div class="d-flex align-items-center mb-1">
                                    <small class="me-2"><?php echo $i; ?></small>
                                    <i class="bi bi-star-fill me-2 small"></i>
                                    <div class="progress flex-grow-1" style="height: 8px;">
                                        <div class="progress-bar <?php echo $i >= 4 ? 'bg-success' : ($i >= 3 ? 'bg-warning' : 'bg-danger'); ?>" role="progressbar" style="width: <?php echo $percentage; ?>%"></div>
                                    </div>
                                    <small class="ms-2"><?php echo $count; ?></small>
                                </div>
                                <?php 
                                    endfor;
                                endif;
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Review Filter options -->
                        <div class="mb-4">
                            <div class="d-flex flex-wrap gap-2">
                                <button class="btn btn-sm btn-outline-primary active" data-filter="all">Tất cả</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="5">5 Sao (<?php echo isset($rating_distribution[5]) ? $rating_distribution[5] : 0; ?>)</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="4">4 Sao (<?php echo isset($rating_distribution[4]) ? $rating_distribution[4] : 0; ?>)</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="3">3 Sao (<?php echo isset($rating_distribution[3]) ? $rating_distribution[3] : 0; ?>)</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="2">2 Sao (<?php echo isset($rating_distribution[2]) ? $rating_distribution[2] : 0; ?>)</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="1">1 Sao (<?php echo isset($rating_distribution[1]) ? $rating_distribution[1] : 0; ?>)</button>
                                <button class="btn btn-sm btn-outline-primary" data-filter="with-images">Có hình ảnh (<?php echo isset($this->product->reviews_with_images) ? $this->product->reviews_with_images : 0; ?>)</button>
                            </div>
                        </div>
                        
                        <!-- Individual Reviews -->
                        <div class="review-list">
                            <?php 
                            // Mostrar reseñas si existen
                            if (!empty($reviews)):
                                foreach ($reviews as $review):
                            ?>
                            <div class="review-item border-bottom pb-4 mb-4" data-rating="<?php echo $review['rating']; ?>" data-has-images="<?php echo !empty($review['images']) ? 'true' : 'false'; ?>">
                                <div class="d-flex justify-content-between mb-2">
                                    <div class="d-flex align-items-center">
                                        <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px;">
                                            <span><?php echo substr($review['author_name'], 0, 2); ?></span>
                                        </div>
                                        <div>
                                            <h6 class="mb-0"><?php echo htmlspecialchars($review['author_name']); ?></h6>
                                            <small class="text-muted">Đã mua hàng tại CameraVN</small>
                                        </div>
                                    </div>
                                    <div class="text-end">
                                        <div class="rating-stars">
                                            <?php for ($i = 1; $i <= 5; $i++): ?>
                                                <i class="bi bi-star<?php echo $i <= $review['rating'] ? '-fill' : ''; ?>"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <small class="text-muted"><?php echo date('d/m/Y', strtotime($review['date'])); ?></small>
                                    </div>
                                </div>
                                <h6><?php echo htmlspecialchars($review['title']); ?></h6>
                                <p><?php echo htmlspecialchars($review['content']); ?></p>
                                
                                <?php if (!empty($review['images'])): ?>
                                <div class="review-images mb-3">
                                    <div class="d-flex gap-2">
                                        <?php foreach ($review['images'] as $index => $image): ?>
                                        <a href="<?php echo htmlspecialchars($image); ?>" data-fancybox="review-<?php echo $review['id']; ?>" class="review-image">
                                            <img src="<?php echo htmlspecialchars($image); ?>" alt="Review Image" class="img-fluid rounded" style="width: 100px; height: 100px; object-fit: cover;">
                                        </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                                
                                <div class="review-feedback">
                                    <div class="d-flex align-items-center">
                                        <button class="btn btn-sm btn-outline-secondary me-2 helpful-btn" data-review-id="<?php echo $review['id']; ?>">
                                            <i class="bi bi-hand-thumbs-up me-1"></i>Hữu ích (<?php echo $review['helpful_count']; ?>)
                                        </button>
                                        <button class="btn btn-sm btn-outline-secondary comment-btn" data-review-id="<?php echo $review['id']; ?>">
                                            <i class="bi bi-chat me-1"></i>Bình luận
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <?php 
                                endforeach;
                            else:
                            ?>
                            <div class="text-center py-4">
                                <p>Chưa có đánh giá nào. Hãy là người đầu tiên đánh giá sản phẩm này!</p>
                            </div>
                            <?php endif; ?>
                        </div>
                        
                        <!-- View More Reviews Button -->
                        <?php if (!empty($reviews) && count($reviews) < $this->product->reviews_count): ?>
                        <div class="text-center mt-4">
                            <button class="btn btn-outline-primary" id="loadMoreReviews">Xem thêm đánh giá</button>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <!-- FAQ Tab -->
            <div class="tab-pane fade" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                <h3 class="mb-4">Câu hỏi thường gặp</h3>
                <div class="accordion" id="faqAccordion">
                    <?php 
                    $faqs = json_decode($this->product->faqs, true);
                    if (!empty($faqs)):
                        foreach ($faqs as $index => $faq):
                    ?>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="faq<?php echo $index; ?>">
                            <button class="accordion-button <?php echo $index > 0 ? 'collapsed' : ''; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#faqCollapse<?php echo $index; ?>" aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-controls="faqCollapse<?php echo $index; ?>">
                                <?php echo htmlspecialchars($faq['question']); ?>
                            </button>
                        </h2>
                        <div id="faqCollapse<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="faq<?php echo $index; ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <?php echo $faq['answer']; ?>
                            </div>
                        </div>
                    </div>
                    <?php 
                        endforeach;
                    endif;
                    ?>
                </div>
                
                <!-- Ask a Question -->
                <div class="mt-4">
                    <h5>Bạn có câu hỏi khác?</h5>
                    <form action="/product/ask-question" method="post" class="d-flex">
                        <input type="hidden" name="product_id" value="<?php echo $this->product->id; ?>">
                        <input type="text" name="question" class="form-control me-2" placeholder="Nhập câu hỏi của bạn..." required>
                        <button type="submit" class="btn btn-primary">Gửi câu hỏi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Products -->
<section class="py-5">
    <div class="container">
        <h2 class="mb-4">Sản phẩm liên quan</h2>
        <div class="row g-4">
            <?php 
            // Mostrar productos relacionados
            if (!empty($related_products)):
                while ($product = $related_products->fetch(PDO::FETCH_ASSOC)):
                    // Calcular el porcentaje de descuento si hay precio anterior
                    $discount_percent = 0;
                    if (!empty($product['old_price']) && $product['old_price'] > $product['price']) {
                        $discount_percent = round(100 - ($product['price'] / $product['old_price'] * 100));
                    }
            ?>
            <div class="col-md-6 col-lg-3">
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
                                
                                <span class="ms-2"><?php echo number_format($rating, 1); ?></span>
                            </div>
                            <div class="product-price-wrapper">
                                <?php if (!empty($product['old_price']) && $product['old_price'] > $product['price']): ?>
                                    <span class="product-price-old"><?php echo number_format($product['old_price'], 0, ',', '.'); ?>đ</span>
                                <?php endif; ?>
                                <span class="product-price"><?php echo number_format($product['price'], 0, ',', '.'); ?>đ</span>
                            </div>
                            <form action="/cart/add" method="post">
                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                <input type="hidden" name="quantity" value="1">
                                <button type="submit" class="btn btn-primary w-100 mt-3 <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>" <?php echo $product['stock'] <= 0 ? 'disabled' : ''; ?>>
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
            endif;
            ?>
        </div>
    </div>
</section>

<!-- Recently Viewed Products -->
<section class="py-5 bg-light">
    <div class="container">
        <h2 class="mb-4">Sản phẩm đã xem gần đây</h2>
        <div class="row g-4" id="recentlyViewedProducts">
            <!-- Se cargará dinámicamente con JavaScript -->
        </div>
    </div>
</section>

<!-- Review Modal -->
<div class="modal fade" id="reviewModal" tabindex="-1" aria-labelledby="reviewModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reviewModalLabel">Viết đánh giá</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="reviewForm" action="/product/review" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="product_id" value="<?php echo $this->product->id; ?>">
                    <div class="mb-3">
                        <label class="form-label">Xếp hạng của bạn</label>
                        <div class="rating-select d-flex align-items-center">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating1" value="1">
                                <label class="form-check-label" for="rating1">1</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating2" value="2">
                                <label class="form-check-label" for="rating2">2</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating3" value="3">
                                <label class="form-check-label" for="rating3">3</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating4" value="4">
                                <label class="form-check-label" for="rating4">4</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="rating" id="rating5" value="5" checked>
                                <label class="form-check-label" for="rating5">5</label>
                            </div>
                            <div class="rating-stars ms-2">
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                                <i class="bi bi-star-fill"></i>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="reviewTitle" class="form-label">Tiêu đề đánh giá</label>
                        <input type="text" class="form-control" id="reviewTitle" name="title" placeholder="Nhập tiêu đề ngắn gọn" required>
                    </div>
                    <div class="mb-3">
                        <label for="reviewContent" class="form-label">Nội dung đánh giá</label>
                        <textarea class="form-control" id="reviewContent" name="content" rows="5" placeholder="Chia sẻ trải nghiệm của bạn với sản phẩm" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Thêm hình ảnh (không bắt buộc)</label>
                        <input type="file" class="form-control" id="reviewImages" name="images[]" multiple accept="image/*">
                        <div class="form-text">Bạn có thể tải lên tối đa 5 hình ảnh</div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="button" class="btn btn-primary" id="submitReview">Gửi đánh giá</button>
            </div>
        </div>
    </div>
</div>

<!-- Share Modal -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="shareModalLabel">Chia sẻ sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex flex-column align-items-center mb-4">
                    <img src="<?php echo htmlspecialchars($this->product->image_url); ?>" alt="<?php echo htmlspecialchars($this->product->name); ?>" class="img-fluid rounded mb-3" style="max-height: 150px;">
                    <h5><?php echo htmlspecialchars($this->product->name); ?></h5>
                </div>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" value="<?php echo htmlspecialchars((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://{$_SERVER['HTTP_HOST']}/product?id={$this->product->id}"); ?>" id="shareLink" readonly>
                    <button class="btn btn-outline-primary" type="button" id="copyLinkBtn">
                        <i class="bi bi-clipboard"></i> Sao chép
                    </button>
                </div>
                <div class="d-flex justify-content-center mt-4">
                    <a href="#" class="btn btn-primary me-2" style="background-color: #3b5998;">
                        <i class="bi bi-facebook me-2"></i>Facebook
                    </a>
                    <a href="#" class="btn btn-info me-2" style="background-color: #1DA1F2; color: white;">
                        <i class="bi bi-twitter me-2"></i>Twitter
                    </a>
                    <a href="#" class="btn btn-danger me-2" style="background-color: #DB4437;">
                        <i class="bi bi-envelope me-2"></i>Email
                    </a>
                    <a href="#" class="btn btn-success">
                        <i class="bi bi-whatsapp me-2"></i>WhatsApp
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Compare Modal -->
<div class="modal fade" id="compareModal" tabindex="-1" aria-labelledby="compareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="compareModalLabel">So sánh sản phẩm</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="compareProduct1" class="form-label">Sản phẩm 1</label>
                            <select class="form-select" id="compareProduct1" disabled>
                                <option value="<?php echo $this->product->id; ?>" selected><?php echo htmlspecialchars($this->product->name); ?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="compareProduct2" class="form-label">Sản phẩm 2</label>
                            <select class="form-select" id="compareProduct2">
                                <option value="">-- Chọn sản phẩm --</option>
                                <?php 
                                // Mostrar productos para comparar
                                if (!empty($comparable_products)):
                                    foreach ($comparable_products as $comp_product):
                                ?>
                                <option value="<?php echo $comp_product['id']; ?>"><?php echo htmlspecialchars($comp_product['name']); ?></option>
                                <?php 
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="compareProduct3" class="form-label">Sản phẩm 3</label>
                            <select class="form-select" id="compareProduct3">
                                <option value="">-- Chọn sản phẩm --</option>
                                <?php 
                                // Mostrar productos para comparar
                                if (!empty($comparable_products)):
                                    foreach ($comparable_products as $comp_product):
                                ?>
                                <option value="<?php echo $comp_product['id']; ?>"><?php echo htmlspecialchars($comp_product['name']); ?></option>
                                <?php 
                                    endforeach;
                                endif;
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table table-bordered comparison-table" id="comparisonTable">
                        <thead>
                            <tr>
                                <th style="width: 20%;">Thông số</th>
                                <th style="width: 26.66%;"><?php echo htmlspecialchars($this->product->name); ?></th>
                                <th style="width: 26.66%;">-- Chọn sản phẩm --</th>
                                <th style="width: 26.66%;">-- Chọn sản phẩm --</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Hình ảnh</td>
                                <td>
                                    <img src="<?php echo htmlspecialchars($this->product->image_url); ?>" alt="<?php echo htmlspecialchars($this->product->name); ?>" class="img-fluid rounded" style="max-height: 150px;">
                                </td>
                                <td class="text-center text-muted">-- Chưa có sản phẩm --</td>
                                <td class="text-center text-muted">-- Chưa có sản phẩm --</td>
                            </tr>
                            <tr>
                                <td>Giá</td>
                                <td><?php echo number_format($this->product->price, 0, ',', '.'); ?>đ</td>
                                <td class="text-center text-muted">--</td>
                                <td class="text-center text-muted">--</td>
                            </tr>
                            <?php 
                            // Mostrar especificaciones para comparación
                            $specs = json_decode($this->product->specifications, true);
                            if (!empty($specs)):
                                foreach ($specs as $spec):
                            ?>
                            <tr>
                                <td><?php echo htmlspecialchars($spec['name']); ?></td>
                                <td><?php echo htmlspecialchars($spec['value']); ?></td>
                                <td class="text-center text-muted">--</td>
                                <td class="text-center text-muted">--</td>
                            </tr>
                            <?php 
                                endforeach;
                            endif;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                <button type="button" class="btn btn-primary" id="updateCompare">Cập nhật so sánh</button>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar la cantidad
        const quantityInput = document.getElementById('quantity');
        const cartQuantityInput = document.getElementById('cart-quantity');
        const decreaseBtn = document.getElementById('decreaseQty');
        const increaseBtn = document.getElementById('increaseQty');
        
        decreaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            if (value > 1) {
                value--;
                quantityInput.value = value;
                cartQuantityInput.value = value;
            }
        });
        
        increaseBtn.addEventListener('click', function() {
            let value = parseInt(quantityInput.value);
            let maxStock = <?php echo $this->product->stock; ?>;
            if (value < maxStock) {
                value++;
                quantityInput.value = value;
                cartQuantityInput.value = value;
            }
        });
        
        quantityInput.addEventListener('change', function() {
            let value = parseInt(this.value);
            let maxStock = <?php echo $this->product->stock; ?>;
            
            if (isNaN(value) || value < 1) {
                value = 1;
            } else if (value > maxStock) {
                value = maxStock;
            }
            
            this.value = value;
            cartQuantityInput.value = value;
        });
        
        // Manejar colores
        const colorOptions = document.querySelectorAll('.color-option');
        colorOptions.forEach(option => {
            option.addEventListener('click', function() {
                colorOptions.forEach(opt => opt.classList.remove('selected'));
                this.classList.add('selected');
            });
        });
        
        // Filtro de reseñas
        const reviewFilterBtns = document.querySelectorAll('[data-filter]');
        const reviewItems = document.querySelectorAll('.review-item');
        
        reviewFilterBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                const filter = this.getAttribute('data-filter');
                
                reviewFilterBtns.forEach(b => b.classList.remove('active'));
                this.classList.add('active');
                
                reviewItems.forEach(item => {
                    const rating = item.getAttribute('data-rating');
                    const hasImages = item.getAttribute('data-has-images');
                    
                    if (filter === 'all') {
                        item.style.display = '';
                    } else if (filter === 'with-images') {
                        item.style.display = hasImages === 'true' ? '' : 'none';
                    } else {
                        item.style.display = rating === filter ? '' : 'none';
                    }
                });
            });
        });
        
        // Copiar enlace para compartir
        const copyLinkBtn = document.getElementById('copyLinkBtn');
        const shareLink = document.getElementById('shareLink');
        
        copyLinkBtn.addEventListener('click', function() {
            shareLink.select();
            document.execCommand('copy');
            
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="bi bi-check"></i> Copiado';
            
            setTimeout(() => {
                this.innerHTML = originalText;
            }, 2000);
        });
        
        // Actualizar comparación
        const updateCompareBtn = document.getElementById('updateCompare');
        const compareProduct2 = document.getElementById('compareProduct2');
        const compareProduct3 = document.getElementById('compareProduct3');
        
        updateCompareBtn.addEventListener('click', function() {
            // Aquí iría la lógica para actualizar la tabla de comparación
            // Generalmente se haría una petición AJAX para obtener los datos de los productos seleccionados
            
            // Este es solo un ejemplo básico
            if (compareProduct2.value) {
                fetch(`/api/product/${compareProduct2.value}`)
                    .then(response => response.json())
                    .then(data => {
                        // Actualizar la segunda columna de la tabla de comparación
                        updateComparisonColumn(2, data);
                    });
            }
            
            if (compareProduct3.value) {
                fetch(`/api/product/${compareProduct3.value}`)
                    .then(response => response.json())
                    .then(data => {
                        // Actualizar la tercera columna de la tabla de comparación
                        updateComparisonColumn(3, data);
                    });
            }
        });
        
        function updateComparisonColumn(columnIndex, productData) {
            const table = document.getElementById('comparisonTable');
            const rows = table.querySelectorAll('tbody tr');
            
            // Actualizar el encabezado
            table.querySelector(`thead tr th:nth-child(${columnIndex + 1})`).textContent = productData.name;
            
            // Actualizar la imagen
            rows[0].querySelector(`td:nth-child(${columnIndex + 1})`).innerHTML = `
                <img src="${productData.image_url}" alt="${productData.name}" class="img-fluid rounded" style="max-height: 150px;">
            `;
            
            // Actualizar el precio
            rows[1].querySelector(`td:nth-child(${columnIndex + 1})`).textContent = new Intl.NumberFormat('vi-VN').format(productData.price) + 'đ';
            
            // Actualizar las especificaciones
            if (productData.specifications) {
                const specs = JSON.parse(productData.specifications);
                for (let i = 0; i < specs.length; i++) {
                    if (rows[i + 2]) {
                        rows[i + 2].querySelector(`td:nth-child(${columnIndex + 1})`).textContent = specs[i].value;
                    }
                }
            }
        }
        
        // Enviar reseña
        const submitReviewBtn = document.getElementById('submitReview');
        const reviewForm = document.getElementById('reviewForm');
        
        submitReviewBtn.addEventListener('click', function() {
            if (reviewForm.checkValidity()) {
                reviewForm.submit();
            } else {
                reviewForm.reportValidity();
            }
        });
        
        // Cargar productos vistos recientemente
        loadRecentlyViewedProducts();
        
        // Agregar producto actual a productos vistos recientemente
        addToRecentlyViewed(<?php echo $this->product->id; ?>);
        
        function loadRecentlyViewedProducts() {
            const recentlyViewed = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
            const currentProductId = <?php echo $this->product->id; ?>;
            
            // Filtrar el producto actual
            const filteredProducts = recentlyViewed.filter(id => id != currentProductId);
            
            if (filteredProducts.length === 0) {
                document.querySelector('#recentlyViewedProducts').innerHTML = '<div class="col-12 text-center"><p>No hay productos vistos recientemente.</p></div>';
                return;
            }
            
            // Limitar a 4 productos
            const productIds = filteredProducts.slice(0, 4);
            
            // Obtener detalles de productos
            fetch(`/api/products/byIds?ids=${productIds.join(',')}`)
                .then(response => response.json())
                .then(data => {
                    if (data.length > 0) {
                        let html = '';
                        
                        data.forEach(product => {
                            html += createProductCard(product);
                        });
                        
                        document.querySelector('#recentlyViewedProducts').innerHTML = html;
                    } else {
                        document.querySelector('#recentlyViewedProducts').innerHTML = '<div class="col-12 text-center"><p>No hay productos vistos recientemente.</p></div>';
                    }
                });
        }
        
        function addToRecentlyViewed(productId) {
            let recentlyViewed = JSON.parse(localStorage.getItem('recentlyViewed')) || [];
            
            // Eliminar si ya existe
            recentlyViewed = recentlyViewed.filter(id => id != productId);
            
            // Agregar al principio
            recentlyViewed.unshift(productId);
            
            // Limitar a 10 productos
            if (recentlyViewed.length > 10) {
                recentlyViewed = recentlyViewed.slice(0, 10);
            }
            
            localStorage.setItem('recentlyViewed', JSON.stringify(recentlyViewed));
        }
        
        function createProductCard(product) {
            const discountPercent = product.old_price && product.old_price > product.price 
                ? Math.round(100 - (product.price / product.old_price * 100)) 
                : 0;
                
            let badgeHtml = '';
            if (discountPercent > 0) {
                badgeHtml = `<span class="product-badge sale">-${discountPercent}%</span>`;
            } else if (product.is_new) {
                badgeHtml = `<span class="product-badge new">Mới</span>`;
            } else if (product.is_hot) {
                badgeHtml = `<span class="product-badge hot">Hot</span>`;
            } else if (product.is_best) {
                badgeHtml = `<span class="product-badge best">Best</span>`;
            }
            
            let oldPriceHtml = '';
            if (product.old_price && product.old_price > product.price) {
                oldPriceHtml = `<span class="product-price-old">${new Intl.NumberFormat('vi-VN').format(product.old_price)}đ</span>`;
            }
            
            return `
                <div class="col-md-6 col-lg-3">
                    <div class="product-card h-100">
                        <div class="product-card-inner">
                            <div class="product-image-container">
                                ${badgeHtml}
                                <button class="product-wishlist-btn" type="button" data-product-id="${product.id}">
                                    <i class="bi bi-heart"></i>
                                    <i class="bi bi-heart-fill"></i>
                                </button>
                                <div class="product-image" style="background-image: url('${product.image_url}')"></div>
                                <div class="product-overlay">
                                    <button class="btn btn-sm btn-light product-quick-view-btn" data-bs-toggle="modal" data-bs-target="#quickViewModal" data-product-id="${product.id}">
                                        <i class="bi bi-eye"></i> Xem nhanh
                                    </button>
                                    <a href="/product?id=${product.id}" class="btn btn-sm btn-primary">
                                        <i class="bi bi-info-circle"></i> Chi tiết
                                    </a>
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="product-brand">${product.brand}</div>
                                <h5 class="product-title">
                                    <a href="/product?id=${product.id}" class="text-dark text-decoration-none">${product.name}</a>
                                </h5>
                                <div class="product-price-wrapper">
                                    ${oldPriceHtml}
                                    <span class="product-price">${new Intl.NumberFormat('vi-VN').format(product.price)}đ</span>
                                </div>
                                <form action="/cart/add" method="post">
                                    <input type="hidden" name="product_id" value="${product.id}">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-primary w-100 mt-3" ${product.stock <= 0 ? 'disabled' : ''}>
                                        ${product.stock > 0 ? '<i class="bi bi-cart-plus"></i> Thêm vào giỏ' : '<i class="bi bi-bell"></i> Thông báo khi có hàng'}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        }
    });
</script>