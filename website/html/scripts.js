// Đảm bảo DOM đã tải xong trước khi chạy script
document.addEventListener('DOMContentLoaded', function() {
    const loader = document.querySelector('.loader-wrapper');
    if (loader) {
        // Đảm bảo trang đã tải xong
        window.addEventListener('load', function() {
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                }, 500);
            }, 1000);
        });
    }
    // Khởi tạo AOS (Animate On Scroll) với kiểm tra
    if (typeof AOS !== 'undefined') {
        AOS.init({
            duration: 800,
            easing: 'ease-in-out',
            once: true
        });
    }
    
    // Dark Mode Toggle - Kiểm tra tồn tại trước khi thêm event listener
    const themeToggle = document.getElementById('themeToggle');
    const mobileThemeToggle = document.getElementById('mobileThemeToggle');
    const savedTheme = localStorage.getItem('theme') || 'light';
    
    // Hàm cập nhật trạng thái theme
    function updateThemeState(isDark) {
        const tables = document.querySelectorAll('.table');
        
        if (isDark) {
            document.body.classList.add('dark-theme');
            localStorage.setItem('theme', 'dark');
            
            // Cập nhật nút toggle desktop
            if (themeToggle) {
                themeToggle.innerHTML = '<i class="bi bi-moon-fill"></i>';
                themeToggle.setAttribute('title', 'Chuyển sang chế độ sáng');
            }
            
            // Cập nhật nút toggle mobile
            if (mobileThemeToggle) {
                mobileThemeToggle.innerHTML = '<i class="bi bi-sun-fill me-2"></i>Chế độ sáng';
            }
            
            tables.forEach(table => table.classList.add('table-dark'));
        } else {
            document.body.classList.remove('dark-theme');
            localStorage.setItem('theme', 'light');
            
            // Cập nhật nút toggle desktop
            if (themeToggle) {
                themeToggle.innerHTML = '<i class="bi bi-sun-fill"></i>';
                themeToggle.setAttribute('title', 'Chuyển sang chế độ tối');
            }
            
            // Cập nhật nút toggle mobile
            if (mobileThemeToggle) {
                mobileThemeToggle.innerHTML = '<i class="bi bi-moon-fill me-2"></i>Chế độ tối';
            }
            
            tables.forEach(table => table.classList.remove('table-dark'));
        }
    }
    
    // Thiết lập trạng thái ban đầu
    updateThemeState(savedTheme === 'dark');
    
    // Xử lý click trên nút toggle desktop
    if (themeToggle) {
        themeToggle.addEventListener('click', function() {
            const isDarkNow = document.body.classList.contains('dark-theme');
            updateThemeState(!isDarkNow);
        });
    }
    
    // Xử lý click trên nút toggle mobile
    if (mobileThemeToggle) {
        mobileThemeToggle.addEventListener('click', function() {
            const isDarkNow = document.body.classList.contains('dark-theme');
            updateThemeState(!isDarkNow);
        });
    }
    
    // FancyBox Initialization - kiểm tra tồn tại trước khi khởi tạo
    if (typeof Fancybox !== 'undefined') {
        Fancybox.bind('[data-fancybox]', {
            // Your custom options
        });
    }
    
    // Swiper Initialization - kiểm tra từng swiper trước khi khởi tạo
    
    // Hero Swiper
    const heroSwiperElement = document.querySelector('.hero-swiper');
    if (heroSwiperElement && typeof Swiper !== 'undefined') {
        const heroSwiper = new Swiper('.hero-swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            effect: 'fade',
            fadeEffect: {
                crossFade: true
            },
            pagination: {
                el: '.hero-swiper .swiper-pagination',
                clickable: true,
            },
            navigation: {
                nextEl: '.hero-swiper .swiper-button-next',
                prevEl: '.hero-swiper .swiper-button-prev',
            },
        });
    }
    
    // Testimonial Swiper
    const testimonialSwiperElement = document.querySelector('.testimonial-swiper');
    if (testimonialSwiperElement && typeof Swiper !== 'undefined') {
        const testimonialSwiper = new Swiper('.testimonial-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimonial-swiper .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    }
    
    // Testimonial Service Swiper
    const testimonialServiceSwiperElement = document.querySelector('.testimonial-service-swiper');
    if (testimonialServiceSwiperElement && typeof Swiper !== 'undefined') {
        const testimonialServiceSwiper = new Swiper('.testimonial-service-swiper', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.testimonial-service-swiper .swiper-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    }
// Countdown Timer Functionality
function updateCountdown() {
    // Set end date (example: 15 days from now)
    const endDate = new Date();
    endDate.setDate(endDate.getDate() + 15);
    
    function update() {
        const now = new Date();
        const diff = endDate - now;
        
        if (diff <= 0) {
            document.getElementById('days').textContent = '00';
            document.getElementById('hours').textContent = '00';
            document.getElementById('minutes').textContent = '00';
            document.getElementById('seconds').textContent = '00';
            return;
        }
        
        const days = Math.floor(diff / (1000 * 60 * 60 * 24));
        const hours = Math.floor((diff % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((diff % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((diff % (1000 * 60)) / 1000);
        
        document.getElementById('days').textContent = days < 10 ? `0${days}` : days;
        document.getElementById('hours').textContent = hours < 10 ? `0${hours}` : hours;
        document.getElementById('minutes').textContent = minutes < 10 ? `0${minutes}` : minutes;
        document.getElementById('seconds').textContent = seconds < 10 ? `0${seconds}` : seconds;
    }
    
    update();
    setInterval(update, 1000);
}

// Run countdown when page loads
document.addEventListener('DOMContentLoaded', updateCountdown);

// Add number animation when hovering countdown boxes
document.querySelectorAll('.countdown-box').forEach(box => {
    box.addEventListener('mouseenter', function() {
        const number = this.querySelector('.countdown-number');
        number.style.transform = 'scale(1.2)';
        setTimeout(() => {
            number.style.transform = 'scale(1)';
        }, 300);
    });
});
    // Product Main Swiper
    const productMainSwiperElement = document.querySelector('.product-main-swiper');
    if (productMainSwiperElement && typeof Swiper !== 'undefined') {
        var productMainSwiper = new Swiper('.product-main-swiper', {
            slidesPerView: 1,
            spaceBetween: 0,
            navigation: {
                nextEl: '.product-main-swiper .swiper-button-next',
                prevEl: '.product-main-swiper .swiper-button-prev',
            },
            thumbs: {
                swiper: productThumbsSwiper
            }
        });
    }
    
    // Product Thumbs Swiper
    const productThumbsSwiperElement = document.querySelector('.product-thumbs-swiper');
    if (productThumbsSwiperElement && typeof Swiper !== 'undefined') {
        var productThumbsSwiper = new Swiper('.product-thumbs-swiper', {
            slidesPerView: 4,
            spaceBetween: 10,
            freeMode: true,
            watchSlidesProgress: true
        });
    }
    
    // Back to Top Button
    const backToTopButton = document.getElementById('backToTop');
    if (backToTopButton) {
        window.addEventListener('scroll', function() {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('active');
            } else {
                backToTopButton.classList.remove('active');
            }
        });
        
        backToTopButton.addEventListener('click', function(e) {
            e.preventDefault();
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }
    
    // Scroll to Top Function
    window.scrollToTop = function() {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    };
    
    // Xử lý dropdown menu cho desktop và mobile
    function setupNavigationBehavior() {
        const isDesktop = window.innerWidth >= 992;
        const dropdownToggles = document.querySelectorAll('.dropdown-toggle');
        
        // Nếu không có dropdown toggle, không cần thực hiện hàm
        if (dropdownToggles.length === 0) return;
        
        // Xóa tất cả event listeners hiện tại trên dropdown toggles
        dropdownToggles.forEach(toggle => {
            try {
                const newToggle = toggle.cloneNode(true);
                if (toggle.parentNode) {
                    toggle.parentNode.replaceChild(newToggle, toggle);
                }
            } catch (error) {
                console.log('Lỗi khi clone dropdown toggle: ', error);
            }
        });
        
        // Lấy lại danh sách toggles sau khi clone
        const refreshedToggles = document.querySelectorAll('.dropdown-toggle');
        
        if (isDesktop) {
            // DESKTOP BEHAVIOR
            // Ngăn chặn hành vi mặc định của Bootstrap khi click trên desktop
            refreshedToggles.forEach(toggle => {
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                });
                
                // Parent là phần tử li chứa dropdown
                const parent = toggle.closest('.dropdown');
                if (!parent) return; // Kiểm tra parent tồn tại
                
                // Sự kiện hover
                parent.addEventListener('mouseenter', function() {
                    const dropdownMenu = this.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.classList.add('show');
                        toggle.setAttribute('aria-expanded', 'true');
                    }
                });
                
                parent.addEventListener('mouseleave', function() {
                    const dropdownMenu = this.querySelector('.dropdown-menu');
                    if (dropdownMenu) {
                        dropdownMenu.classList.remove('show');
                        toggle.setAttribute('aria-expanded', 'false');
                    }
                });
            });
            
            // Ngăn click bên ngoài đóng dropdown trên desktop
            document.addEventListener('click', function(e) {
                if (e.target.closest('.dropdown-menu')) {
                    e.stopPropagation();
                }
            });
        } else {
            // MOBILE BEHAVIOR
            refreshedToggles.forEach(toggle => {
                // Thêm ID để theo dõi dropdown đang mở
                const dropdownMenu = toggle.nextElementSibling;
                if (!dropdownMenu) return; // Kiểm tra menu tồn tại
                
                const uniqueId = toggle.id || `dropdown-${Math.random().toString(36).substr(2, 9)}`;
                toggle.id = uniqueId;
                dropdownMenu.setAttribute('data-parent', uniqueId);
                
                // Thêm style cho rõ ràng trên mobile
                dropdownMenu.style.transition = 'max-height 0.3s ease-in-out, opacity 0.3s ease-in-out';
                dropdownMenu.style.maxHeight = '0';
                dropdownMenu.style.overflow = 'hidden';
                dropdownMenu.style.display = 'block';
                dropdownMenu.style.opacity = '0';
                
                // Tạo icon mũi tên phụ (nếu chưa có)
                if (!toggle.querySelector('.mobile-arrow')) {
                    const arrow = document.createElement('span');
                    arrow.className = 'mobile-arrow ms-2';
                    arrow.innerHTML = '<i class="bi bi-chevron-down"></i>';
                    arrow.style.transition = 'transform 0.3s ease';
                    toggle.appendChild(arrow);
                }
                
                // Xử lý click trên mobile
                toggle.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    const menu = this.nextElementSibling;
                    if (!menu) return; // Kiểm tra menu tồn tại
                    
                    const isOpen = menu.style.maxHeight !== '0px' && menu.style.maxHeight !== '';
                    const arrow = this.querySelector('.mobile-arrow');
                    
                    // Đóng tất cả các dropdown khác
                    document.querySelectorAll('.dropdown-menu').forEach(otherMenu => {
                        if (otherMenu !== menu && otherMenu.style.maxHeight !== '0px') {
                            otherMenu.style.maxHeight = '0';
                            otherMenu.style.opacity = '0';
                            
                            // Reset mũi tên của dropdown khác
                            const otherToggle = document.getElementById(otherMenu.getAttribute('data-parent'));
                            if (otherToggle) {
                                const otherArrow = otherToggle.querySelector('.mobile-arrow');
                                if (otherArrow) otherArrow.style.transform = 'rotate(0deg)';
                                otherToggle.setAttribute('aria-expanded', 'false');
                            }
                        }
                    });
                    
                    // Toggle dropdown hiện tại
                    if (isOpen) {
                        menu.style.maxHeight = '0';
                        menu.style.opacity = '0';
                        if (arrow) arrow.style.transform = 'rotate(0deg)';
                        this.setAttribute('aria-expanded', 'false');
                    } else {
                        // Tính toán chiều cao thực tế của menu
                        menu.style.maxHeight = 'none'; // Tạm thời bỏ giới hạn để đo
                        const height = menu.scrollHeight;
                        menu.style.maxHeight = '0'; // Reset lại trước khi animate
                        
                        // Trigger reflow để animation hoạt động
                        menu.offsetHeight;
                        
                        // Mở menu với animation
                        menu.style.maxHeight = `${height}px`;
                        menu.style.opacity = '1';
                        if (arrow) arrow.style.transform = 'rotate(180deg)';
                        this.setAttribute('aria-expanded', 'true');
                    }
                });
            });
        }
    }
    
    // Thiết lập hành vi ban đầu và khi thay đổi kích thước
    setupNavigationBehavior();
    window.addEventListener('resize', function() {
        setupNavigationBehavior();
        
        // Reset các dropdown khi chuyển đổi giữa desktop và mobile
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.style = '';
            menu.classList.remove('show');
        });
        
        document.querySelectorAll('.dropdown-toggle').forEach(toggle => {
            toggle.setAttribute('aria-expanded', 'false');
        });
    });
    
    // Countdown Timer
    function updateCountdown() {
        // Kiểm tra xem có các phần tử đếm ngược không
        const daysElement = document.getElementById("days");
        const hoursElement = document.getElementById("hours");
        const minutesElement = document.getElementById("minutes");
        const secondsElement = document.getElementById("seconds");
        
        if (!daysElement || !hoursElement || !minutesElement || !secondsElement) return;
        
        // Set the date we're counting down to (16 days from now)
        const countDownDate = new Date();
        countDownDate.setDate(countDownDate.getDate() + 16);
        
        // Update the count down every 1 second
        const x = setInterval(function() {
            // Get today's date and time
            const now = new Date().getTime();
            
            // Find the distance between now and the count down date
            const distance = countDownDate - now;
            
            // Time calculations for days, hours, minutes and seconds
            const days = Math.floor(distance / (1000 * 60 * 60 * 24));
            const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            const seconds = Math.floor((distance % (1000 * 60)) / 1000);
            
            // Display the result
            daysElement.innerHTML = days.toString().padStart(2, '0');
            hoursElement.innerHTML = hours.toString().padStart(2, '0');
            minutesElement.innerHTML = minutes.toString().padStart(2, '0');
            secondsElement.innerHTML = seconds.toString().padStart(2, '0');
            
            if (distance < 0) {
                clearInterval(x);
                daysElement.innerHTML = "00";
                hoursElement.innerHTML = "00";
                minutesElement.innerHTML = "00";
                secondsElement.innerHTML = "00";
            }
        }, 1000);
    }
    
    // Khởi tạo đếm ngược nếu có phần tử đếm ngược trên trang
    if (document.getElementById("days")) {
        updateCountdown();
    }
    
    // Cart Logic - với kiểm tra đầy đủ
    let cart = [];
    const cartItemsContainer = document.getElementById('cart-items');
    const totalPriceElement = document.getElementById('total-price');
    const checkoutButton = document.getElementById('checkout');
    const cartCountElements = document.querySelectorAll('.cart-count');
    let isLoggedIn = false; // Biến kiểm tra trạng thái đăng nhập
    
    // Sản phẩm mẫu
    const products = [
        {
            id: 1,
            name: "Canon EOS 850D",
            description: "Máy ảnh DSLR Canon EOS 850D kèm Lens Kit 18-55mm, 24.1MP, 4K, Wi-Fi, Bluetooth.",
            price: 19490000,
            oldPrice: 22990000,
            image: "figmaframe/hero.jpg",
            rating: 4.8,
            sold: 76,
            brand: "canon"
        },
        {
            id: 2,
            name: "Sony Alpha A7 IV",
            description: "Máy ảnh Sony Alpha A7 IV Mirrorless Full-frame, 33MP, 4K60p, 10fps, Eye-AF.",
            price: 55990000,
            image: "figmaframe/hero.jpg",
            rating: 4.9,
            sold: 42,
            brand: "sony"
        },
        {
            id: 3,
            name: "Nikon Z6 II",
            description: "Máy ảnh Nikon Z6 II Mirrorless Full-frame, 24.5MP, 4K, Wi-Fi, IBIS.",
            price: 38990000,
            oldPrice: 48990000,
            image: "figmaframe/hero.jpg",
            rating: 4.7,
            sold: 38,
            brand: "nikon"
        },
        {
            id: 4,
            name: "Fujifilm X-T4",
            description: "Máy ảnh Fujifilm X-T4 Mirrorless, 26.1MP, 4K60p, chống rung IBIS 5 trục.",
            price: 42990000,
            image: "figmaframe/hero.jpg",
            rating: 4.9,
            sold: 56,
            brand: "fuji"
        },
        {
            id: 5,
            name: "Canon RF 24-70mm f/2.8L",
            description: "Ống kính Canon RF 24-70mm f/2.8L IS USM cho máy ảnh mirrorless full-frame.",
            price: 59990000,
            image: "figmaframe/hero.jpg",
            rating: 4.8,
            sold: 32,
            brand: "canon"
        },
        {
            id: 6,
            name: "Sony ZV-E10",
            description: "Máy ảnh Sony ZV-E10 dành cho Vlog, APS-C, 24.2MP, 4K, màn hình xoay.",
            price: 17990000,
            oldPrice: 19990000,
            image: "figmaframe/hero.jpg",
            rating: 4.7,
            sold: 87,
            brand: "sony"
        }
    ];
    
    // Cập nhật số lượng hiển thị trên icon giỏ hàng
    function updateCartCount() {
        const totalItems = cart.reduce((total, item) => total + item.quantity, 0);
        cartCountElements.forEach(element => {
            element.textContent = totalItems;
        });
    }
    
    // Cập nhật hiển thị giỏ hàng
    function updateCart() {
        if (!cartItemsContainer) return;
        
        cartItemsContainer.innerHTML = '';
        let totalPrice = 0;
        
        if (cart.length === 0) {
            cartItemsContainer.innerHTML = '<tr id="empty-cart"><td colspan="5" class="text-center">Giỏ hàng của bạn đang trống.</td></tr>';
            if (checkoutButton) checkoutButton.disabled = true;
        } else {
            cart.forEach((item, index) => {
                const row = document.createElement('tr');
                row.innerHTML = `
                    <td>
                        <div class="d-flex align-items-center">
                            <div class="cart-thumbnail me-3" style="background-image: url('${item.image}');"></div>
                            <div>
                                <h6 class="cart-product-title">${item.name}</h6>
                                <small class="text-muted">${item.description.substring(0, 50)}...</small>
                            </div>
                        </div>
                    </td>
                    <td class="text-end cart-product-price">${item.price.toLocaleString()}đ</td>
                    <td class="text-center">
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                            <input type="text" class="form-control cart-quantity-input" value="${item.quantity}" readonly>
                            <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                        </div>
                    </td>
                    <td class="text-end cart-product-price">${(item.price * item.quantity).toLocaleString()}đ</td>
                    <td class="text-center">
                        <button class="cart-remove-btn" onclick="removeItem(${index})">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                `;
                cartItemsContainer.appendChild(row);
                totalPrice += item.price * item.quantity;
            });
            if (checkoutButton) checkoutButton.disabled = false;
        }
        
        if (totalPriceElement) totalPriceElement.textContent = totalPrice.toLocaleString() + 'đ';
        updateCartCount();
    }
    
    // Cập nhật số lượng sản phẩm trong giỏ hàng
    window.updateQuantity = function(index, change) {
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }
        
        if (index >= 0 && index < cart.length) {
            cart[index].quantity += change;
            
            if (cart[index].quantity <= 0) {
                removeItem(index);
            } else {
                updateCart();
            }
        }
    };
    
    // Xóa sản phẩm khỏi giỏ hàng
    window.removeItem = function(index) {
        if (!isLoggedIn) {
            showLoginModal();
            return;
        }
        
        if (index >= 0 && index < cart.length) {
            cart.splice(index, 1);
            updateCart();
        }
    };
    
    // Xử lý nút xóa giỏ hàng
    const clearCartButton = document.getElementById('clear-cart');
    if (clearCartButton) {
        clearCartButton.addEventListener('click', function() {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }
            
            if (cart.length > 0) {
                if (confirm('Bạn có chắc chắn muốn xóa tất cả sản phẩm khỏi giỏ hàng?')) {
                    cart = [];
                    updateCart();
                }
            }
        });
    }
    
    // Xử lý nút thanh toán
    if (checkoutButton) {
        checkoutButton.addEventListener('click', function() {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }
            
            if (cart.length > 0) {
                window.location.href = 'checkout.html';
            }
        });
    }
    
    // Hiển thị modal đăng nhập
    function showLoginModal() {
        // Đóng cart modal trước
        const cartModalElement = document.getElementById('cart-modal');
        if (cartModalElement) {
            const cartModal = bootstrap.Modal.getInstance(cartModalElement);
            if (cartModal) {
                cartModal.hide();
            }
        }
        
        // Sau đó mở login modal
        const loginModalElement = document.getElementById('login-modal');
        if (loginModalElement) {
            const loginModal = new bootstrap.Modal(loginModalElement);
            loginModal.show();
        }
    }
    
    // Product filtering
    const filterButtons = document.querySelectorAll('.product-filter-btn');
    const productItems = document.querySelectorAll('.product-item');

    if (filterButtons.length > 0 && productItems.length > 0) {
        filterButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Remove active class from all buttons
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Get filter value
                const filterValue = this.getAttribute('data-filter');
                
                // Filter products
                productItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                        // Add fade-in animation
                        item.classList.add('fade-in');
                        setTimeout(() => {
                            item.classList.remove('fade-in');
                        }, 500);
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
    }
    
    // Product wishlist functionality
    document.querySelectorAll('.product-wishlist-btn').forEach(button => {
        button.addEventListener('click', function() {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }
            
            this.classList.toggle('active');
            
            // Không cần thay đổi innerHTML nữa vì đã có sẵn cả hai icon trong HTML
            const heartFill = this.querySelector('.bi-heart-fill');
            
            // Thêm hiệu ứng nhịp đập khi được kích hoạt
            if (this.classList.contains('active') && heartFill) {
                heartFill.style.animation = 'none';
                setTimeout(() => {
                    heartFill.style.animation = '';
                }, 10);
            }
        });
    });
    
    // Add to cart functionality
    document.querySelectorAll('.product-add-to-cart-btn').forEach(button => {
        button.addEventListener('click', function() {
            if (!isLoggedIn) {
                showLoginModal();
                return;
            }
            
            const productId = parseInt(this.getAttribute('data-product'));
            const product = products.find(p => p.id === productId);
            
            if (product) {
                // Thêm hiệu ứng khi thêm vào giỏ hàng
                this.innerHTML = '<i class="bi bi-check"></i> Đã thêm';
                this.classList.add('btn-success');
                
                // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                const existingItemIndex = cart.findIndex(item => item.id === productId);
                
                if (existingItemIndex !== -1) {
                    // Tăng số lượng nếu đã có
                    cart[existingItemIndex].quantity += 1;
                } else {
                    // Thêm mới nếu chưa có
                    cart.push({
                        id: product.id,
                        name: product.name,
                        description: product.description,
                        price: product.price,
                        quantity: 1,
                        image: product.image
                    });
                }
                
                updateCart();
                
                // Sau 2 giây, khôi phục lại nút
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-cart-plus"></i> Thêm vào giỏ';
                    this.classList.remove('btn-success');
                }, 1500);
            }
        });
    });
    
    // Quick View Functionality
    document.querySelectorAll('.product-quick-view-btn').forEach(button => {
        button.addEventListener('click', function() {
            const productId = parseInt(this.getAttribute('data-product'));
            const product = products.find(p => p.id === productId);
            
            if (product) {
                // Cập nhật thông tin sản phẩm trong modal
                const quickViewTitleElement = document.getElementById('quickViewTitle');
                const quickViewPriceElement = document.getElementById('quickViewPrice');
                const quickViewDescriptionElement = document.getElementById('quickViewDescription');
                const quickViewImageElement = document.getElementById('quickViewImage');
                const quantityInputElement = document.getElementById('quantityInput');
                
                if (quickViewTitleElement) quickViewTitleElement.textContent = product.name;
                if (quickViewPriceElement) quickViewPriceElement.textContent = product.price.toLocaleString() + 'đ';
                if (quickViewDescriptionElement) quickViewDescriptionElement.textContent = product.description;
                if (quickViewImageElement) quickViewImageElement.style.backgroundImage = `url('${product.image}')`;
                
                // Reset số lượng về 1
                if (quantityInputElement) quantityInputElement.value = 1;
                
                // Cập nhật các nút trong modal
                const quickViewAddToCartElement = document.getElementById('quickViewAddToCart');
                const quickViewWishlistElement = document.getElementById('quickViewWishlist');
                
                if (quickViewAddToCartElement) quickViewAddToCartElement.setAttribute('data-product', productId);
                if (quickViewWishlistElement) quickViewWishlistElement.setAttribute('data-product', productId);
            }
        });
    });
    
    // Xử lý tăng giảm số lượng trong Quick View
    const decreaseQuantityBtn = document.getElementById('decreaseQuantity');
    const increaseQuantityBtn = document.getElementById('increaseQuantity');
    
    if (decreaseQuantityBtn) {
        decreaseQuantityBtn.addEventListener('click', function() {
            const input = document.getElementById('quantityInput');
            if (input) {
                let value = parseInt(input.value);
                if (value > 1) {
                    input.value = value - 1;
                }
            }
        });
    }
    
    if (increaseQuantityBtn) {
        increaseQuantityBtn.addEventListener('click', function() {
            const input = document.getElementById('quantityInput');
            if (input) {
                let value = parseInt(input.value);
                input.value = value + 1;
            }
        });
    }
    
    // Quick View Add to Cart Button
    const quickViewAddToCartBtn = document.getElementById('quickViewAddToCart');
    if (quickViewAddToCartBtn) {
        quickViewAddToCartBtn.addEventListener('click', function() {
            if (!isLoggedIn) {
                const quickViewModal = bootstrap.Modal.getInstance(document.getElementById('quickViewModal'));
                if (quickViewModal) quickViewModal.hide();
                showLoginModal();
                return;
            }
            
            const productId = parseInt(this.getAttribute('data-product'));
            const product = products.find(p => p.id === productId);
            
            if (product) {
                const quantityInput = document.getElementById('quantityInput');
                const quantity = quantityInput ? parseInt(quantityInput.value) : 1;
                
                // Thêm hiệu ứng khi thêm vào giỏ hàng
                this.innerHTML = '<i class="bi bi-check"></i> Đã thêm';
                this.classList.add('btn-success');
                
                // Kiểm tra sản phẩm đã có trong giỏ hàng chưa
                const existingItemIndex = cart.findIndex(item => item.id === productId);
                
                if (existingItemIndex !== -1) {
                    // Tăng số lượng nếu đã có
                    cart[existingItemIndex].quantity += quantity;
                } else {
                    // Thêm mới nếu chưa có
                    cart.push({
                        id: product.id,
                        name: product.name,
                        description: product.description,
                        price: product.price,
                        quantity: quantity,
                        image: product.image
                    });
                }
                
                updateCart();
                
                // Sau 1.5 giây, khôi phục lại nút và đóng modal
                setTimeout(() => {
                    this.innerHTML = '<i class="bi bi-cart-plus me-1"></i>Thêm vào giỏ hàng';
                    this.classList.remove('btn-success');
                    
                    const quickViewModal = bootstrap.Modal.getInstance(document.getElementById('quickViewModal'));
                    if (quickViewModal) quickViewModal.hide();
                }, 1500);
            }
        });
    }
    
    // Quick View Wishlist Button
    const quickViewWishlistBtn = document.getElementById('quickViewWishlist');
    if (quickViewWishlistBtn) {
        quickViewWishlistBtn.addEventListener('click', function() {
            if (!isLoggedIn) {
                const quickViewModal = bootstrap.Modal.getInstance(document.getElementById('quickViewModal'));
                if (quickViewModal) quickViewModal.hide();
                showLoginModal();
                return;
            }
            
            // Toggle active state
            this.classList.toggle('active');
            
            if (this.classList.contains('active')) {
                this.innerHTML = '<i class="bi bi-heart-fill me-1"></i>Đã thêm vào yêu thích';
            } else {
                this.innerHTML = '<i class="bi bi-heart me-1"></i>Thêm vào yêu thích';
            }
        });
    }
    
    // Login Form Submit Handler
    const loginForm = document.getElementById('login-form');
    if (loginForm) {
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Simulate successful login
            isLoggedIn = true;
            
            // Close login modal
            const loginModalElement = document.getElementById('login-modal');
            if (loginModalElement) {
                const loginModal = bootstrap.Modal.getInstance(loginModalElement);
                if (loginModal) loginModal.hide();
            }
            
            // Change login button to user profile
            const loginButton = document.getElementById('loginButton');
            const mobileLoginButton = document.getElementById('mobileLoginButton');
            const loginEmailField = document.getElementById('login-email');
            
            let username = 'User';
            let avatar = 'U';
            
            if (loginEmailField && loginEmailField.value) {
                username = loginEmailField.value.split('@')[0];
                avatar = username.charAt(0).toUpperCase();
            }
            
            if (loginButton) {
                loginButton.innerHTML = `
                    <div class="d-flex align-items-center">
                        <span class="d-none d-md-inline me-2">Xin chào!</span>
                        <span class="badge bg-primary rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">${avatar}</span>
                    </div>
                `;
                
                loginButton.href = "#user-profile";
                loginButton.removeAttribute('data-bs-toggle');
            }
            
            if (mobileLoginButton) {
                mobileLoginButton.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2">Xin chào!</span>
                        <span class="badge bg-primary rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">${avatar}</span>
                    </div>
                `;
                
                mobileLoginButton.href = "#user-profile";
                mobileLoginButton.removeAttribute('data-bs-toggle');
            }
        });
    }
    
    // Register Form Submit Handler
    const registerForm = document.getElementById('register-form');
    if (registerForm) {
        registerForm.addEventListener('submit', function(event) {
            event.preventDefault();
            
            // Validate password match
            const passwordField = document.getElementById('register-password');
            const confirmPasswordField = document.getElementById('register-confirm-password');
            
            if (passwordField && confirmPasswordField && passwordField.value !== confirmPasswordField.value) {
                alert('Mật khẩu xác nhận không khớp!');
                return;
            }
            
            // Simulate successful registration
            isLoggedIn = true;
            
            // Close register modal
            const registerModalElement = document.getElementById('register-modal');
            if (registerModalElement) {
                const registerModal = bootstrap.Modal.getInstance(registerModalElement);
                if (registerModal) registerModal.hide();
            }
            
            // Change login button to user profile
            const loginButton = document.getElementById('loginButton');
            const mobileLoginButton = document.getElementById('mobileLoginButton');
            const nameField = document.getElementById('register-name');
            
            let username = 'User';
            let avatar = 'U';
            
            if (nameField && nameField.value) {
                username = nameField.value;
                avatar = username.charAt(0).toUpperCase();
            }
            
            if (loginButton) {
                loginButton.innerHTML = `
                    <div class="d-flex align-items-center">
                        <span class="d-none d-md-inline me-2">Xin chào!</span>
                        <span class="badge bg-primary rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">${avatar}</span>
                    </div>
                `;
                
                loginButton.href = "#user-profile";
                loginButton.removeAttribute('data-bs-toggle');
            }
            
            if (mobileLoginButton) {
                mobileLoginButton.innerHTML = `
                    <div class="d-flex align-items-center justify-content-center">
                        <span class="me-2">Xin chào!</span>
                        <span class="badge bg-primary rounded-circle" style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">${avatar}</span>
                    </div>
                `;
                
                mobileLoginButton.href = "#user-profile";
                mobileLoginButton.removeAttribute('data-bs-toggle');
            }
        });
    }
    
    // Hiệu ứng Navbar khi scroll
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (navbar) {
            if (window.scrollY > 50) {
                navbar.classList.add('shadow');
            } else {
                navbar.classList.remove('shadow');
            }
        }
    });
    
    // Smooth Scroll cho các links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            if (this.getAttribute('href') !== '#' && 
                this.getAttribute('href') !== '#!' && 
                !this.getAttribute('href').includes('modal') &&
                document.querySelector(this.getAttribute('href'))) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetElement = document.querySelector(targetId);
                
                if (targetElement) {
                    window.scrollTo({
                        top: targetElement.offsetTop - 80, // Trừ chiều cao của navbar
                        behavior: 'smooth'
                    });
                }
            }
        });
    });
    
    // Khởi tạo giỏ hàng
    updateCart();
});