<!-- Cart Modal -->
<div class="modal fade" id="cart-modal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cartModalLabel">Giỏ hàng của bạn</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive" id="cart-table">
                    <table class="table align-middle table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Sản phẩm</th>
                                <th scope="col" class="text-end">Giá</th>
                                <th scope="col" class="text-center">Số lượng</th>
                                <th scope="col" class="text-end">Tổng</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody id="cart-items">
                            <tr id="empty-cart">
                                <td colspan="5" class="text-center">Giỏ hàng của bạn đang trống.</td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-4">
                    <button class="btn btn-outline-secondary" data-bs-dismiss="modal">
                        <i class="bi bi-arrow-left me-2"></i>Tiếp tục mua sắm
                    </button>
                    <div class="text-end">
                        <h5>Tổng cộng: <span class="text-primary" id="total-price">0đ</span></h5>
                        <small class="text-muted">Đã bao gồm VAT</small>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" id="clear-cart">Xóa giỏ hàng</button>
                <button class="btn btn-primary" id="checkout" disabled>Thanh toán</button>
            </div>
        </div>
    </div>
</div>

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
                        <div class="quick-view-thumbs">
                            <div class="quick-view-thumb active" style="background-image: url('figmaframe/hero.jpg'); height: 70px; width: 70px; background-size: cover; cursor: pointer; border-radius: 5px;"></div>
                            <div class="quick-view-thumb" style="background-image: url('figmaframe/hero.jpg'); height: 70px; width: 70px; background-size: cover; cursor: pointer; border-radius: 5px;"></div>
                            <div class="quick-view-thumb" style="background-image: url('figmaframe/hero.jpg'); height: 70px; width: 70px; background-size: cover; cursor: pointer; border-radius: 5px;"></div>
                            <div class="quick-view-thumb" style="background-image: url('figmaframe/hero.jpg'); height: 70px; width: 70px; background-size: cover; cursor: pointer; border-radius: 5px;"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <h3 class="quick-view-title" id="quickViewTitle">Canon EOS 850D</h3>
                        <div class="product-rating mb-3">
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-fill"></i>
                            <i class="bi bi-star-half"></i>
                            <span>(4.8 - 76 đánh giá)</span>
                        </div>
                        <h4 class="quick-view-price" id="quickViewPrice">19.490.000đ</h4>
                        <p class="quick-view-description" id="quickViewDescription">Máy ảnh DSLR Canon EOS 850D kèm Lens Kit 18-55mm, 24.1MP, 4K, Wi-Fi, Bluetooth.</p>
                        <div class="quick-view-meta">
                            <div class="quick-view-meta-item">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>Còn hàng</span>
                            </div>
                            <div class="quick-view-meta-item">
                                <i class="bi bi-truck"></i>
                                <span>Giao hàng miễn phí</span>
                            </div>
                            <div class="quick-view-meta-item">
                                <i class="bi bi-shield-check"></i>
                                <span>Bảo hành 24 tháng</span>
                            </div>
                        </div>
                        
                        <!-- Thêm bộ chọn màu sắc -->
                        <div class="mb-3">
                            <h6 class="mb-2">Màu sắc:</h6>
                            <div class="color-options">
                                <div class="color-option selected" style="background-color: #000000;" title="Đen"></div>
                                <div class="color-option" style="background-color: #c0c0c0;" title="Bạc"></div>
                                <div class="color-option" style="background-color: #FFFFFF; border: 1px solid #ddd;" title="Trắng"></div>
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
                            <button class="btn btn-primary" id="quickViewAddToCart">
                                <i class="bi bi-cart-plus me-1"></i>Thêm vào giỏ hàng
                            </button>
                        </div>
                        
                        <!-- Thêm tab thông tin chi tiết -->
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
                                    <ul class="list-unstyled">
                                        <li><strong>Cảm biến:</strong> 24.1MP APS-C CMOS</li>
                                        <li><strong>Bộ xử lý:</strong> DIGIC 8</li>
                                        <li><strong>Hệ thống lấy nét:</strong> 45 điểm AF chữ thập</li>
                                        <li><strong>ISO:</strong> 100-25600 (mở rộng đến 51200)</li>
                                        <li><strong>Tốc độ chụp:</strong> 7fps</li>
                                    </ul>
                                </div>
                                <div class="tab-pane fade" id="features" role="tabpanel" aria-labelledby="features-tab">
                                    <ul class="list-unstyled">
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Quay video 4K 24p</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Dual Pixel CMOS AF</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Kết nối Wi-Fi và Bluetooth</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Màn hình cảm ứng LCD 3.0"</li>
                                        <li><i class="bi bi-check-circle-fill text-success me-2"></i> Eye Detection AF</li>
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