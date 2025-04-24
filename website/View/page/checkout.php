<!-- View/checkout.php -->
<!-- Page Title -->
<section class="bg-light py-5">
    <div class="container">
        <h1 class="fw-bold mb-2">Thanh toán</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/">Trang chủ</a></li>
                <li class="breadcrumb-item"><a href="/cart">Giỏ hàng</a></li>
                <li class="breadcrumb-item active" aria-current="page">Thanh toán</li>
            </ol>
        </nav>
    </div>
</section>

<!-- Checkout Section -->
<section class="py-5">
    <div class="container">
        <div class="row g-5">
            <!-- Checkout Form -->
            <div class="col-md-7 col-lg-8">
                <form class="checkout-form" action="/checkout/process" method="post">
                    <!-- Customer Info -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Thông tin khách hàng</h5>
                            
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="firstName" class="form-label">Họ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" required value="<?php echo isset($user_info['first_name']) ? htmlspecialchars($user_info['first_name']) : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="lastName" class="form-label">Tên <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" required value="<?php echo isset($user_info['last_name']) ? htmlspecialchars($user_info['last_name']) : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="email" name="email" required value="<?php echo isset($user_info['email']) ? htmlspecialchars($user_info['email']) : ''; ?>">
                                </div>
                                <div class="col-md-6">
                                    <label for="phone" class="form-label">Điện thoại <span class="text-danger">*</span></label>
                                    <input type="tel" class="form-control" id="phone" name="phone" required value="<?php echo isset($user_info['phone']) ? htmlspecialchars($user_info['phone']) : ''; ?>">
                                </div>
                            </div>
                            
                            <?php if (!isset($_SESSION['user_id'])): ?>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="createAccount" name="create_account">
                                <label class="form-check-label" for="createAccount">
                                    Tạo tài khoản mới
                                </label>
                            </div>
                            
                            <div class="create-account-fields mt-3" style="display: none;">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="password" class="form-label">Mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="confirmPassword" class="form-label">Xác nhận mật khẩu <span class="text-danger">*</span></label>
                                        <input type="password" class="form-control" id="confirmPassword" name="confirm_password">
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Shipping Address -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Địa chỉ giao hàng</h5>
                            
                            <div class="row g-3">
                                <div class="col-12">
                                    <label for="address" class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address" placeholder="Số nhà, đường, phường/xã" required value="<?php echo isset($user_info['address']) ? htmlspecialchars($user_info['address']) : ''; ?>">
                                </div>
                                <div class="col-md-4">
                                    <label for="province" class="form-label">Tỉnh/Thành phố <span class="text-danger">*</span></label>
                                    <select class="form-select" id="province" name="province" required>
                                        <option value="">Chọn tỉnh/thành phố</option>
                                        <?php foreach ($provinces as $code => $name): ?>
                                            <option value="<?php echo $code; ?>" <?php echo (isset($user_info['province']) && $user_info['province'] == $code) ? 'selected' : ''; ?>>
                                                <?php echo htmlspecialchars($name); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="district" class="form-label">Quận/Huyện <span class="text-danger">*</span></label>
                                    <select class="form-select" id="district" name="district" required>
                                        <option value="">Chọn quận/huyện</option>
                                        <?php if (isset($districts)): ?>
                                            <?php foreach ($districts as $code => $name): ?>
                                                <option value="<?php echo $code; ?>" <?php echo (isset($user_info['district']) && $user_info['district'] == $code) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-4">
                                    <label for="ward" class="form-label">Phường/Xã <span class="text-danger">*</span></label>
                                    <select class="form-select" id="ward" name="ward" required>
                                        <option value="">Chọn phường/xã</option>
                                        <?php if (isset($wards)): ?>
                                            <?php foreach ($wards as $code => $name): ?>
                                                <option value="<?php echo $code; ?>" <?php echo (isset($user_info['ward']) && $user_info['ward'] == $code) ? 'selected' : ''; ?>>
                                                    <?php echo htmlspecialchars($name); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <?php if (isset($_SESSION['user_id'])): ?>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" id="saveAddress" name="save_address">
                                <label class="form-check-label" for="saveAddress">
                                    Lưu địa chỉ này cho lần sau
                                </label>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    
                    <!-- Shipping Method -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Phương thức vận chuyển</h5>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="shipping_method" id="standardShipping" value="standard" checked>
                                <label class="form-check-label d-flex justify-content-between" for="standardShipping">
                                    <div>
                                        <strong>Giao hàng tiêu chuẩn</strong>
                                        <p class="text-muted mb-0 small">Nhận hàng trong 3-5 ngày</p>
                                    </div>
                                    <span>Miễn phí</span>
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="shipping_method" id="expressShipping" value="express">
                                <label class="form-check-label d-flex justify-content-between" for="expressShipping">
                                    <div>
                                        <strong>Giao hàng nhanh</strong>
                                        <p class="text-muted mb-0 small">Nhận hàng trong 1-2 ngày</p>
                                    </div>
                                    <span>50.000đ</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="shipping_method" id="sameDay" value="same_day">
                                <label class="form-check-label d-flex justify-content-between" for="sameDay">
                                    <div>
                                        <strong>Giao hàng trong ngày</strong>
                                        <p class="text-muted mb-0 small">Chỉ áp dụng cho nội thành TP.HCM, Hà Nội</p>
                                    </div>
                                    <span>100.000đ</span>
                                </label>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Payment Method -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Phương thức thanh toán</h5>
                            
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                                <label class="form-check-label" for="cod">
                                    <strong>Thanh toán khi nhận hàng (COD)</strong>
                                    <p class="text-muted mb-0 small">Thanh toán bằng tiền mặt khi nhận hàng</p>
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="bankTransfer" value="bank_transfer">
                                <label class="form-check-label" for="bankTransfer">
                                    <strong>Chuyển khoản ngân hàng</strong>
                                    <p class="text-muted mb-0 small">Chuyển khoản đến tài khoản ngân hàng của chúng tôi</p>
                                </label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" name="payment_method" id="creditCard" value="credit_card">
                                <label class="form-check-label" for="creditCard">
                                    <strong>Thẻ tín dụng / Ghi nợ</strong>
                                    <p class="text-muted mb-0 small">Thanh toán an toàn qua cổng thanh toán</p>
                                </label>
                                <div class="mt-2 payment-logos">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5e/Visa_Inc._logo.svg/2560px-Visa_Inc._logo.svg.png" alt="Visa" height="30">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/1280px-Mastercard-logo.svg.png" alt="Mastercard" height="30">
                                    <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fa/American_Express_logo_%282018%29.svg/1200px-American_Express_logo_%282018%29.svg.png" alt="American Express" height="30">
                                </div>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="payment_method" id="momo" value="momo">
                                <label class="form-check-label" for="momo">
                                    <strong>Ví điện tử (MoMo, ZaloPay, VNPay)</strong>
                                    <p class="text-muted mb-0 small">Thanh toán qua ví điện tử</p>
                                </label>
                            </div>
                            
                            <!-- Credit Card Form -->
                            <div id="creditCardForm" class="mt-4 p-3 border rounded" style="display: none;">
                                <div class="row g-3">
                                    <div class="col-12">
                                        <label for="cardName" class="form-label">Tên chủ thẻ</label>
                                        <input type="text" class="form-control" id="cardName" name="card_name">
                                    </div>
                                    <div class="col-12">
                                        <label for="cardNumber" class="form-label">Số thẻ</label>
                                        <input type="text" class="form-control" id="cardNumber" name="card_number" placeholder="XXXX XXXX XXXX XXXX">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="expiryDate" class="form-label">Ngày hết hạn</label>
                                        <input type="text" class="form-control" id="expiryDate" name="card_expiry" placeholder="MM/YY">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="cvv" class="form-label">CVV</label>
                                        <input type="text" class="form-control" id="cvv" name="card_cvv" placeholder="XXX">
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Bank Transfer Info -->
                            <div id="bankTransferInfo" class="mt-4 p-3 border rounded" style="display: none;">
                                <h6>Thông tin tài khoản</h6>
                                <p class="mb-1"><strong>Ngân hàng:</strong> Vietcombank</p>
                                <p class="mb-1"><strong>Số tài khoản:</strong> 1234567890</p>
                                <p class="mb-1"><strong>Chủ tài khoản:</strong> CÔNG TY TNHH CAMERAVN</p>
                                <p class="mb-1"><strong>Nội dung chuyển khoản:</strong> [Mã đơn hàng] - [Họ tên]</p>
                                <div class="alert alert-info mt-3 mb-0 small">
                                    <i class="bi bi-info-circle me-2"></i>Vui lòng chuyển khoản trong vòng 24 giờ. Đơn hàng sẽ được xử lý sau khi chúng tôi nhận được thanh toán.
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Order Notes -->
                    <div class="card border-0 shadow-sm mb-4">
                        <div class="card-body p-4">
                            <h5 class="card-title mb-4">Ghi chú đơn hàng</h5>
                            <textarea class="form-control" name="order_notes" rows="3" placeholder="Ghi chú về đơn hàng, ví dụ: thời gian nhận hàng, địa điểm cụ thể..."></textarea>
                        </div>
                    </div>
                    
                    <!-- Policy Agreement -->
                    <div class="form-check mb-3">
                        <input class="form-check-input" type="checkbox" id="termsAgree" name="terms_agree" required>
                        <label class="form-check-label" for="termsAgree">
                            Tôi đã đọc và đồng ý với <a href="/terms">điều khoản và điều kiện</a> và <a href="/privacy">chính sách bảo mật</a>
                        </label>
                    </div>
                    
                    <!-- Checkout Button -->
                    <div class="d-grid mb-4">
                        <button type="submit" class="btn btn-primary btn-lg" id="placeOrderBtn">
                            <i class="bi bi-lock me-2"></i>Đặt hàng
                        </button>
                    </div>
                </form>
            </div>
            
            <!-- Order Summary -->
            <div class="col-md-5 col-lg-4">
                <div class="card border-0 shadow-sm mb-4 sticky-top" style="top: 100px; z-index: 1;">
                    <div class="card-body p-4">
                        <h5 class="card-title mb-4">Đơn hàng của bạn</h5>
                        
                        <div class="order-summary">
                            <!-- Product Items -->
                            <?php foreach ($cart_items as $item): ?>
                                <div class="order-product-item d-flex mb-3">
                                    <img src="<?php echo htmlspecialchars($item['image_url']); ?>" alt="<?php echo htmlspecialchars($item['name']); ?>" class="rounded" style="width: 60px; height: 60px; object-fit: cover;">
                                    <div class="ms-3">
                                        <h6 class="mb-1"><?php echo htmlspecialchars($item['name']); ?></h6>
                                        <div class="d-flex justify-content-between">
                                            <span class="text-muted small"><?php echo $item['quantity']; ?> x <?php echo number_format($item['price'], 0, ',', '.'); ?>đ</span>
                                            <span class="fw-bold"><?php echo number_format($item['price'] * $item['quantity'], 0, ',', '.'); ?>đ</span>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            
                            <hr>
                            
                            <!-- Order Totals -->
                            <div class="d-flex justify-content-between mb-2">
                                <span>Tạm tính:</span>
                                <span><?php echo number_format($cart_total, 0, ',', '.'); ?>đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Giảm giá:</span>
                                <span class="text-danger"><?php echo number_format($discount, 0, ',', '.'); ?>đ</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Phí giao hàng:</span>
                                <span id="shippingFee"><?php echo $shipping_fee > 0 ? number_format($shipping_fee, 0, ',', '.') . 'đ' : 'Miễn phí'; ?></span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Thuế VAT (10%):</span>
                                <span><?php echo number_format($tax, 0, ',', '.'); ?>đ</span>
                            </div>
                            
                            <hr>
                            
                            <div class="d-flex justify-content-between mb-4">
                                <span class="fw-bold">Tổng cộng:</span>
                                <span class="fw-bold text-primary fs-5" id="orderTotal"><?php echo number_format($total, 0, ',', '.'); ?>đ</span>
                            </div>
                            
                            <!-- Secure Checkout Badge -->
                            <div class="text-center mt-3">
                                <div class="d-flex justify-content-center align-items-center gap-2 small text-muted">
                                    <i class="bi bi-shield-lock"></i>
                                    <span>Thanh toán an toàn & bảo mật</span>
                                </div>
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
        // Toggle Create Account fields
        const createAccountCheckbox = document.getElementById('createAccount');
        const createAccountFields = document.querySelector('.create-account-fields');
        
        if (createAccountCheckbox) {
            createAccountCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    createAccountFields.style.display = 'block';
                    
                    // Hacer que los campos sean obligatorios
                    const passwordFields = createAccountFields.querySelectorAll('input[type="password"]');
                    passwordFields.forEach(field => field.required = true);
                } else {
                    createAccountFields.style.display = 'none';
                    
                    // Hacer que los campos no sean obligatorios
                    const passwordFields = createAccountFields.querySelectorAll('input[type="password"]');
                    passwordFields.forEach(field => field.required = false);
                }
            });
        }
        
        // Toggle Payment Method additional info
        const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
        const creditCardForm = document.getElementById('creditCardForm');
        const bankTransferInfo = document.getElementById('bankTransferInfo');
        
        paymentMethods.forEach(method => {
            method.addEventListener('change', function() {
                // Hide all payment specific forms first
                creditCardForm.style.display = 'none';
                bankTransferInfo.style.display = 'none';
                
                // Show specific form based on selection
                if (this.id === 'creditCard') {
                    creditCardForm.style.display = 'block';
                    
                    // Hacer que los campos de tarjeta sean obligatorios
                    const cardFields = creditCardForm.querySelectorAll('input');
                    cardFields.forEach(field => field.required = true);
                } else if (this.id === 'bankTransfer') {
                    bankTransferInfo.style.display = 'block';
                    
                    // Hacer que los campos de tarjeta no sean obligatorios
                    if (creditCardForm) {
                        const cardFields = creditCardForm.querySelectorAll('input');
                        cardFields.forEach(field => field.required = false);
                    }
                } else {
                    // Hacer que los campos de tarjeta no sean obligatorios
                    if (creditCardForm) {
                        const cardFields = creditCardForm.querySelectorAll('input');
                        cardFields.forEach(field => field.required = false);
                    }
                }
            });
        });
        
        // Update shipping fee and total based on shipping method
        const shippingMethods = document.querySelectorAll('input[name="shipping_method"]');
        const shippingFeeElement = document.getElementById('shippingFee');
        const orderTotalElement = document.getElementById('orderTotal');
        const baseTotal = <?php echo $cart_total - $discount + $tax; ?>; // Subtotal - Discount + Tax
        
        shippingMethods.forEach(method => {
            method.addEventListener('change', function() {
                let shippingFee = 0;
                let newTotal = baseTotal;
                
                if (this.id === 'expressShipping') {
                    shippingFee = 50000;
                    shippingFeeElement.textContent = '50.000đ';
                } else if (this.id === 'sameDay') {
                    shippingFee = 100000;
                    shippingFeeElement.textContent = '100.000đ';
                } else {
                    shippingFeeElement.textContent = 'Miễn phí';
                }
                
                newTotal += shippingFee;
                orderTotalElement.textContent = new Intl.NumberFormat('vi-VN').format(newTotal) + 'đ';
            });
        });
        
        // Province, District, Ward selectors
        const provinceSelect = document.getElementById('province');
        const districtSelect = document.getElementById('district');
        const wardSelect = document.getElementById('ward');
        
        if (provinceSelect) {
            provinceSelect.addEventListener('change', function() {
                const provinceCode = this.value;
                
                // Limpiar distritos y barrios
                districtSelect.innerHTML = '<option value="">Chọn quận/huyện</option>';
                wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';
                
                if (provinceCode) {
                    // Obtener distritos para la provincia seleccionada
                    fetch(`/api/address/districts?province=${provinceCode}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                for (const [code, name] of Object.entries(data)) {
                                    const option = new Option(name, code);
                                    districtSelect.add(option);
                                }
                            }
                        });
                }
            });
        }
        
        if (districtSelect) {
            districtSelect.addEventListener('change', function() {
                const districtCode = this.value;
                
                // Limpiar barrios
                wardSelect.innerHTML = '<option value="">Chọn phường/xã</option>';
                
                if (districtCode) {
                    // Obtener barrios para el distrito seleccionado
                    fetch(`/api/address/wards?district=${districtCode}`)
                        .then(response => response.json())
                        .then(data => {
                            if (data) {
                                for (const [code, name] of Object.entries(data)) {
                                    const option = new Option(name, code);
                                    wardSelect.add(option);
                                }
                            }
                        });
                }
            });
        }
    });
</script>