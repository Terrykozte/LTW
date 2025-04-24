<!-- View/cart.php -->
<!-- Page Title -->
<section class="bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-2">Giỏ hàng</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Cart Section -->
<section class="py-5">
    <div class="container">
        <div class="row">
            <!-- Shopping Cart -->
            <div class="col-lg-8">
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Sản phẩm trong giỏ hàng (<?php echo count($cart_items); ?>)</h5>
                        
                        <?php if (empty($cart_items)): ?>
                            <div class="text-center py-5">
                                <i class="bi bi-cart-x fs-1 text-muted mb-3"></i>
                                <h4>Giỏ hàng của bạn đang trống</h4>
                                <p class="text-muted mb-4">Hãy thêm sản phẩm vào giỏ hàng để tiếp tục.</p>
                                <a href="/products" class="btn btn-primary">
                                    <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                                </a>
                            </div>
                        <?php else: ?>
                            <!-- Cart Items Table -->
                            <div class="table-responsive">
                                <table class="table align-middle cart-table">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="width: 50%;">Sản phẩm</th>
                                            <th scope="col" class="text-center">Giá</th>
                                            <th scope="col" class="text-center">Số lượng</th>
                                            <th scope="col" class="text-end">Tổng</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody id="cart-items">
                                        <?php foreach ($cart_items as $item): ?>
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <a href="/product?id=<?php echo $item['id']; ?>" class="me-3 cart-product-image">
                                                            <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="img-fluid rounded" style="width: 80px; height: 80px; object-fit: cover;">
                                                        </a>
                                                        <div>
                                                            <h6 class="mb-1"><a href="/product?id=<?php echo $item['id']; ?>" class="text-decoration-none text-dark"><?php echo htmlspecialchars($item['name']); ?></a></h6>
                                                            <div class="d-flex flex-wrap">
                                                                <?php if (!empty($item['category'])): ?>
                                                                    <span class="badge bg-light text-dark me-2 mb-1"><?php echo htmlspecialchars($item['category']); ?></span>
                                                                <?php endif; ?>
                                                                <?php if (!empty($item['color'])): ?>
                                                                    <span class="badge bg-light text-dark mb-1">Màu: <?php echo htmlspecialchars($item['color']); ?></span>
                                                                <?php endif; ?>
                                                            </div>
                                                            <div class="small text-success mt-1">
                                                                <i class="bi bi-check-circle-fill"></i> Còn hàng
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-center">
                                                    <div class="fw-bold text-primary"><?php echo number_format($item['price'], 0, ',', '.'); ?>đ</div>
                                                    <?php if (!empty($item['old_price']) && $item['old_price'] > $item['price']): ?>
                                                        <div class="small text-decoration-line-through text-muted"><?php echo number_format($item['old_price'], 0, ',', '.'); ?>đ</div>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-center">
                                                    <form action="/cart/update" method="post" class="cart-item-form">
                                                        <input type="hidden" name="cart_items[<?php echo $item['id']; ?>]" class="item-quantity-input" value="<?php echo $item['quantity']; ?>">
                                                        <div class="d-flex justify-content-center align-items-center">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle quantity-btn decrease">
                                                                <i class="bi bi-dash"></i>
                                                            </button>
                                                            <input type="text" class="form-control text-center mx-2 quantity-display" value="<?php echo $item['quantity']; ?>" style="width: 50px;">
                                                            <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle quantity-btn increase">
                                                                <i class="bi bi-plus"></i>
                                                            </button>
                                                        </div>
                                                    </form>
                                                </td>
                                                <td class="text-end fw-bold"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>đ</td>
                                                <td>
                                                    <form action="/cart/remove" method="post">
                                                        <input type="hidden" name="product_id" value="<?php echo $item['id']; ?>">
                                                        <button type="submit" class="btn btn-sm btn-outline-danger rounded-circle">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            
                            <!-- Cart Actions -->
                            <div class="d-flex justify-content-between mt-4">
                                <a href="/products" class="btn btn-outline-primary">
                                    <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                                </a>
                                <form action="/cart/clear" method="post">
                                    <button type="submit" class="btn btn-outline-danger" id="clearCart">
                                        <i class="bi bi-trash me-2"></i>Xóa giỏ hàng
                                    </button>
                                </form>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Recommended Products -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Có thể bạn cũng thích</h5>
                        <div class="row g-4">
                            <?php foreach ($recommended_products as $product): ?>
                                <div class="col-md-6">
                                    <div class="d-flex align-items-center">
                                        <a href="/product?id=<?php echo $product['id']; ?>" class="me-3">
                                            <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="img-fluid rounded" style="width: 70px; height: 70px; object-fit: cover;">
                                        </a>
                                        <div>
                                            <h6 class="mb-1"><a href="/product?id=<?php echo $product['id']; ?>" class="text-decoration-none text-dark"><?php echo htmlspecialchars($product['name']); ?></a></h6>
                                            <div class="product-price mb-2"><?php echo number_format($product['price'], 0, ',', '.'); ?>đ</div>
                                            <form action="/cart/add" method="post">
                                                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                                <input type="hidden" name="quantity" value="1">
                                                <button type="submit" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-cart-plus me-1"></i>Thêm vào giỏ
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 100px; z-index: 1;">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Tóm tắt đơn hàng</h5>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span>Tạm tính (<?php echo count($cart_items); ?> sản phẩm):</span>
                            <span><?php echo number_format($cart_total, 0, ',', '.'); ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Giảm giá:</span>
                            <span class="text-danger"><?php echo number_format($discount, 0, ',', '.'); ?>đ</span>
                        </div>
                        <div class="d-flex justify-content-between mb-2">
                            <span>Phí giao hàng:</span>
                            <span><?php echo $shipping_fee > 0 ? number_format($shipping_fee, 0, ',', '.') . 'đ' : 'Miễn phí'; ?></span>
                        </div>
                        
                        <hr>
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fw-bold">Tổng cộng:</span>
                            <span class="fw-bold text-primary fs-5"><?php echo number_format($cart_total - $discount + $shipping_fee, 0, ',', '.'); ?>đ</span>
                        </div>
                        
                        <div class="d-grid gap-2">
                            <?php if (!empty($cart_items)): ?>
                                <a href="/checkout" class="btn btn-primary btn-lg">
                                    <i class="bi bi-credit-card me-2"></i>Tiến hành thanh toán
                                </a>
                            <?php else: ?>
                                <button class="btn btn-primary btn-lg" disabled>
                                    <i class="bi bi-credit-card me-2"></i>Tiến hành thanh toán
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Coupon Card -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3">Mã giảm giá</h5>
                        <form action="/cart/apply-coupon" method="post" class="input-group mb-3">
                            <input type="text" name="coupon_code" class="form-control" placeholder="Nhập mã giảm giá">
                            <button class="btn btn-outline-primary" type="submit">Áp dụng</button>
                        </form>
                        <?php if (!empty($applied_coupon)): ?>
                            <div class="applied-coupon">
                                <div class="d-flex justify-content-between align-items-center p-2 bg-light rounded">
                                    <div>
                                        <strong><?php echo htmlspecialchars($applied_coupon['code']); ?></strong>
                                        <p class="mb-0 small text-muted"><?php echo htmlspecialchars($applied_coupon['description']); ?></p>
                                    </div>
                                    <form action="/cart/remove-coupon" method="post">
                                        <button type="submit" class="btn btn-sm btn-link text-danger">
                                            <i class="bi bi-x-circle"></i>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                
                <!-- Shipping Info -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-3">Thông tin vận chuyển</h5>
                        <div class="d-flex mb-3">
                            <i class="bi bi-truck text-primary me-3 fs-4"></i>
                            <div>
                                <strong>Miễn phí giao hàng</strong>
                                <p class="mb-0 text-muted small">Đơn hàng trên 5 triệu được miễn phí giao hàng toàn quốc</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="bi bi-clock-history text-primary me-3 fs-4"></i>
                            <div>
                                <strong>Thời gian giao hàng</strong>
                                <p class="mb-0 text-muted small">Giao hàng trong 1-3 ngày làm việc</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Manejar la actualización de cantidades en el carrito
        const quantityButtons = document.querySelectorAll('.quantity-btn');
        const cartItemForms = document.querySelectorAll('.cart-item-form');
        
        quantityButtons.forEach(button => {
            button.addEventListener('click', function() {
                const form = this.closest('.cart-item-form');
                const quantityInput = form.querySelector('.item-quantity-input');
                const quantityDisplay = form.querySelector('.quantity-display');
                let quantity = parseInt(quantityInput.value);
                
                if (this.classList.contains('decrease') && quantity > 1) {
                    quantity--;
                } else if (this.classList.contains('increase')) {
                    quantity++;
                }
                
                quantityInput.value = quantity;
                quantityDisplay.value = quantity;
                
                // Actualizar el carrito automáticamente
                form.submit();
            });
        });
        
        const quantityDisplays = document.querySelectorAll('.quantity-display');
        quantityDisplays.forEach(display => {
            display.addEventListener('change', function() {
                const form = this.closest('.cart-item-form');
                const quantityInput = form.querySelector('.item-quantity-input');
                let quantity = parseInt(this.value);
                
                if (isNaN(quantity) || quantity < 1) {
                    quantity = 1;
                    this.value = 1;
                }
                
                quantityInput.value = quantity;
                
                // Actualizar el carrito automáticamente
                form.submit();
            });
        });
    });
</script>