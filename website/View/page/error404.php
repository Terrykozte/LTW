<!-- View/404.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Không tìm thấy trang | CameraVN</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="/View/css/styles.css">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .error-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 80px 20px;
            text-align: center;
            flex-grow: 1;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .error-code {
            font-size: 120px;
            font-weight: 700;
            color: #dc3545;
            margin-bottom: 0;
            line-height: 1;
        }
        .error-text {
            font-size: 36px;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 30px;
        }
        .error-description {
            font-size: 18px;
            color: #6c757d;
            margin-bottom: 30px;
        }
        .camera-icon {
            font-size: 60px;
            margin-bottom: 20px;
            color: #6c757d;
        }
        footer {
            margin-top: auto;
        }
    </style>
</head>

<body>

<?//include loader.php
include "loader.php"?>

    <?
    //include navbar.php
        include "navbar.php";
    ?>

    <!-- Main Content -->
    <main>
        <div class="error-container">
            <div class="camera-icon">
                <i class="bi bi-camera2"></i>
            </div>
            <h1 class="error-code">404</h1>
            <h2 class="error-text">Không tìm thấy trang</h2>
            <p class="error-description">Trang bạn đang tìm kiếm không tồn tại hoặc đã bị di chuyển.</p>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="d-grid gap-3 d-md-flex justify-content-md-center">
                        <a href="homepage.php" class="btn btn-primary btn-lg">
                            <i class="bi bi-house-door me-2"></i>Trở về trang chủ
                        </a>
                        <a href="/products" class="btn btn-outline-primary btn-lg">
                            <i class="bi bi-camera me-2"></i>Xem sản phẩm
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <?
    //include footer.php
        include "footer.php";
    ?>