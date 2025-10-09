<?php
// config.php - Cấu hình website bán dép
$site_title = "Dép Xinh Shop - Chuyên dép chất lượng cao";
$site_author = "Dép Xinh Team";
$current_year = date('Y');

// Danh sách sản phẩm
$products = [
    [
        'id' => 1,
        'name' => 'Dép Quai Nữ Cao Cấp',
        'price' => 250000,
        'old_price' => 350000,
        'image' => 'https://via.placeholder.com/300x300/FF6B6B/white?text=Dép+Quai+Nữ',
        'category' => 'nu',
        'featured' => true
    ],
    [
        'id' => 2,
        'name' => 'Dép Nam Thể Thao',
        'price' => 180000,
        'old_price' => 220000,
        'image' => 'https://via.placeholder.com/300x300/4ECDC4/white?text=Dép+Nam+TT',
        'category' => 'nam',
        'featured' => true
    ],
    [
        'id' => 3,
        'name' => 'Dép Bé Gái Hồng',
        'price' => 120000,
        'old_price' => 150000,
        'image' => 'https://via.placeholder.com/300x300/FF9FF3/white?text=Dép+Bé+Gái',
        'category' => 'tre-em',
        'featured' => true
    ],
    [
        'id' => 4,
        'name' => 'Dép Lê Dễ Thương',
        'price' => 200000,
        'old_price' => 0,
        'image' => 'https://via.placeholder.com/300x300/F368E0/white?text=Dép+Lê',
        'category' => 'nu',
        'featured' => false
    ],
    [
        'id' => 5,
        'name' => 'Dép Nam Da Thật',
        'price' => 320000,
        'old_price' => 400000,
        'image' => 'https://via.placeholder.com/300x300/EE5A24/white?text=Dép+Nam+Da',
        'category' => 'nam',
        'featured' => false
    ],
    [
        'id' => 6,
        'name' => 'Dép Bé Trai Xanh',
        'price' => 110000,
        'old_price' => 130000,
        'image' => 'https://via.placeholder.com/300x300/00D2D3/white?text=Dép+Bé+Trai',
        'category' => 'tre-em',
        'featured' => false
    ]
];

// Xử lý giỏ hàng
session_start();
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Xử lý thêm vào giỏ hàng
if (isset($_POST['add_to_cart'])) {
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'] ?? 1;
    
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id] += $quantity;
    } else {
        $_SESSION['cart'][$product_id] = $quantity;
    }
    
    $cart_message = "<div class='success'>✅ Đã thêm sản phẩm vào giỏ hàng!</div>";
}

// Xử lý xóa khỏi giỏ hàng
if (isset($_GET['remove_from_cart'])) {
    $product_id = $_GET['remove_from_cart'];
    unset($_SESSION['cart'][$product_id]);
}

// Tính tổng giỏ hàng
$cart_total = 0;
$cart_count = 0;
foreach ($_SESSION['cart'] as $product_id => $quantity) {
    foreach ($products as $product) {
        if ($product['id'] == $product_id) {
            $cart_total += $product['price'] * $quantity;
            $cart_count += $quantity;
            break;
        }
    }
}

// Xác định trang hiện tại
$page = $_GET['page'] ?? 'home';
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        switch($page) {
            case 'home': echo "Trang Chủ - $site_title"; break;
            case 'products': echo "Sản Phẩm - $site_title"; break;
            case 'cart': echo "Giỏ Hàng - $site_title"; break;
            case 'about': echo "Giới Thiệu - $site_title"; break;
            case 'contact': echo "Liên Hệ - $site_title"; break;
            default: echo $site_title;
        }
        ?>
    </title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: #f8f9fa;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Header */
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
        }

        .header-top {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: bold;
        }

        .cart-icon {
            position: relative;
            background: rgba(255,255,255,0.2);
            padding: 8px 15px;
            border-radius: 20px;
            text-decoration: none;
            color: white;
        }

        .cart-count {
            background: #ff4757;
            color: white;
            border-radius: 50%;
            padding: 2px 6px;
            font-size: 0.8rem;
            position: absolute;
            top: -5px;
            right: -5px;
        }

        nav ul {
            list-style: none;
            display: flex;
            gap: 2rem;
        }

        nav ul li a {
            color: white;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 20px;
            transition: background 0.3s;
        }

        nav ul li a:hover,
        nav ul li a.active {
            background: rgba(255,255,255,0.2);
        }

        /* Main Content */
        main {
            min-height: 70vh;
            padding: 40px 0;
        }

        /* Hero Section */
        .hero {
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            color: white;
            padding: 80px 0;
            text-align: center;
            border-radius: 15px;
            margin-bottom: 40px;
        }

        .hero h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero p {
            font-size: 1.2rem;
            margin-bottom: 2rem;
        }

        .btn {
            display: inline-block;
            background: white;
            color: #ff6b6b;
            padding: 12px 30px;
            border-radius: 25px;
            text-decoration: none;
            font-weight: bold;
            transition: transform 0.3s;
        }

        .btn:hover {
            transform: translateY(-2px);
        }

        /* Products Grid */
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: #333;
        }

        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }

        .product-card {
            background: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .product-image {
            width: 100%;
            height: 250px;
            object-fit: cover;
        }

        .product-info {
            padding: 20px;
        }

        .product-name {
            font-size: 1.1rem;
            margin-bottom: 10px;
            color: #333;
        }

        .product-price {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 15px;
        }

        .current-price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #ff6b6b;
        }

        .old-price {
            text-decoration: line-through;
            color: #999;
        }

        .discount {
            background: #ff6b6b;
            color: white;
            padding: 2px 8px;
            border-radius: 10px;
            font-size: 0.8rem;
        }

        .add-to-cart {
            width: 100%;
            background: #667eea;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .add-to-cart:hover {
            background: #5a6fd8;
        }

        /* Cart */
        .cart-items {
            background: white;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
        }

        .cart-item {
            display: flex;
            align-items: center;
            gap: 20px;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item-image {
            width: 80px;
            height: 80px;
            object-fit: cover;
            border-radius: 5px;
        }

        .cart-item-details {
            flex: 1;
        }

        .cart-item-price {
            font-weight: bold;
            color: #ff6b6b;
        }

        .remove-item {
            color: #ff4757;
            text-decoration: none;
        }

        .cart-summary {
            background: white;
            border-radius: 10px;
            padding: 20px;
            text-align: center;
        }

        .total-price {
            font-size: 1.5rem;
            color: #ff6b6b;
            margin: 20px 0;
        }

        .checkout-btn {
            background: #ff6b6b;
            color: white;
            padding: 15px 30px;
            border: none;
            border-radius: 25px;
            font-size: 1.1rem;
            cursor: pointer;
            transition: background 0.3s;
        }

        .checkout-btn:hover {
            background: #ff5252;
        }

        /* Success Message */
        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }

        /* Footer */
        footer {
            background: #333;
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 40px;
        }

        .footer-section h3 {
            margin-bottom: 20px;
            color: #667eea;
        }

        .footer-bottom {
            text-align: center;
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #555;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .header-top {
                flex-direction: column;
                gap: 1rem;
            }

            nav ul {
                flex-wrap: wrap;
                justify-content: center;
            }

            .hero h1 {
                font-size: 2rem;
            }

            .products-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="container">
            <div class="header-top">
                <div class="logo">🩴 Dép Xinh Shop</div>
                <a href="?page=cart" class="cart-icon">
                    🛒 Giỏ Hàng
                    <?php if ($cart_count > 0): ?>
                        <span class="cart-count"><?php echo $cart_count; ?></span>
                    <?php endif; ?>
                </a>
            </div>
            <nav>
                <ul>
                    <li><a href="?page=home" class="<?php echo $page == 'home' ? 'active' : ''; ?>">🏠 Trang Chủ</a></li>
                    <li><a href="?page=products" class="<?php echo $page == 'products' ? 'active' : ''; ?>">🩴 Sản Phẩm</a></li>
                    <li><a href="?page=cart" class="<?php echo $page == 'cart' ? 'active' : ''; ?>">🛒 Giỏ Hàng</a></li>
                    <li><a href="?page=about" class="<?php echo $page == 'about' ? 'active' : ''; ?>">ℹ️ Giới Thiệu</a></li>
                    <li><a href="?page=contact" class="<?php echo $page == 'contact' ? 'active' : ''; ?>">📞 Liên Hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <main class="container">
        <?php
        // Hiển thị thông báo giỏ hàng
        if (isset($cart_message)) {
            echo $cart_message;
        }

        switch($page) {
            case 'home':
                ?>
                <section class="hero">
                    <h1>Dép Chất Lượng - Giá Tốt Nhất</h1>
                    <p>Khám phá bộ sưu tập dép đa dạng với chất lượng cao và giá cả hợp lý</p>
                    <a href="?page=products" class="btn">Mua Ngay</a>
                </section>

                <h2 class="section-title">🔥 Sản Phẩm Nổi Bật</h2>
                <div class="products-grid">
                    <?php foreach ($products as $product): ?>
                        <?php if ($product['featured']): ?>
                            <div class="product-card">
                                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                                <div class="product-info">
                                    <h3 class="product-name"><?php echo $product['name']; ?></h3>
                                    <div class="product-price">
                                        <span class="current-price"><?php echo number_format($product['price']); ?>đ</span>
                                        <?php if ($product['old_price'] > 0): ?>
                                            <span class="old-price"><?php echo number_format($product['old_price']); ?>đ</span>
                                            <span class="discount">-<?php echo number_format(100 - ($product['price'] / $product['old_price'] * 100)); ?>%</span>
                                        <?php endif; ?>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                        <input type="hidden" name="quantity" value="1">
                                        <button type="submit" name="add_to_cart" class="add-to-cart">🛒 Thêm Vào Giỏ</button>
                                    </form>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <?php
                break;

            case 'products':
                ?>
                <h1 class="section-title">🩴 Tất Cả Sản Phẩm</h1>
                <div class="products-grid">
                    <?php foreach ($products as $product): ?>
                        <div class="product-card">
                            <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="product-image">
                            <div class="product-info">
                                <h3 class="product-name"><?php echo $product['name']; ?></h3>
                                <div class="product-price">
                                    <span class="current-price"><?php echo number_format($product['price']); ?>đ</span>
                                    <?php if ($product['old_price'] > 0): ?>
                                        <span class="old-price"><?php echo number_format($product['old_price']); ?>đ</span>
                                        <span class="discount">-<?php echo number_format(100 - ($product['price'] / $product['old_price'] * 100)); ?>%</span>
                                    <?php endif; ?>
                                </div>
                                <form method="POST">
                                    <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" name="add_to_cart" class="add-to-cart">🛒 Thêm Vào Giỏ</button>
                                </form>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <?php
                break;

            case 'cart':
                ?>
                <h1 class="section-title">🛒 Giỏ Hàng Của Bạn</h1>
                
                <?php if (empty($_SESSION['cart'])): ?>
                    <div class="success">
                        <p>Giỏ hàng của bạn đang trống</p>
                        <a href="?page=products" class="btn" style="margin-top: 10px;">🩴 Mua Sắm Ngay</a>
                    </div>
                <?php else: ?>
                    <div class="cart-items">
                        <?php foreach ($_SESSION['cart'] as $product_id => $quantity): ?>
                            <?php 
                            $product = null;
                            foreach ($products as $p) {
                                if ($p['id'] == $product_id) {
                                    $product = $p;
                                    break;
                                }
                            }
                            if ($product): ?>
                                <div class="cart-item">
                                    <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>" class="cart-item-image">
                                    <div class="cart-item-details">
                                        <h3><?php echo $product['name']; ?></h3>
                                        <p>Số lượng: <?php echo $quantity; ?></p>
                                    </div>
                                    <div class="cart-item-price">
                                        <?php echo number_format($product['price'] * $quantity); ?>đ
                                    </div>
                                    <a href="?page=cart&remove_from_cart=<?php echo $product_id; ?>" class="remove-item">🗑️ Xóa</a>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="cart-summary">
                        <h2>Tổng Thanh Toán</h2>
                        <div class="total-price"><?php echo number_format($cart_total); ?>đ</div>
                        <button class="checkout-btn">💳 Thanh Toán Ngay</button>
                    </div>
                <?php endif; ?>
                <?php
                break;

            case 'about':
                ?>
                <h1 class="section-title">ℹ️ Về Dép Xinh Shop</h1>
                <div style="background: white; padding: 30px; border-radius: 10px;">
                    <h2>Chúng Tôi Là Ai?</h2>
                    <p>Dép Xinh Shop là cửa hàng chuyên cung cấp các loại dép chất lượng cao với giá cả hợp lý. Với hơn 5 năm kinh nghiệm trong ngành, chúng tôi tự hào mang đến cho khách hàng những sản phẩm tốt nhất.</p>
                    
                    <h2 style="margin-top: 30px;">Tầm Nhìn</h2>
                    <p>Trở thành địa chỉ mua sắm dép uy tín hàng đầu Việt Nam, mang đến trải nghiệm mua sắm tuyệt vời cho mọi khách hàng.</p>
                    
                    <h2 style="margin-top: 30px;">Cam Kết</h2>
                    <ul style="margin-left: 20px; margin-top: 15px;">
                        <li>✅ Chất lượng sản phẩm đảm bảo</li>
                        <li>✅ Giá cả cạnh tranh nhất thị trường</li>
                        <li>✅ Giao hàng nhanh chóng</li>
                        <li>✅ Đổi trả trong 7 ngày</li>
                    </ul>
                </div>
                <?php
                break;

            case 'contact':
                ?>
                <h1 class="section-title">📞 Liên Hệ Với Chúng Tôi</h1>
                <div style="background: white; padding: 30px; border-radius: 10px;">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 30px;">
                        <div>
                            <h2>Thông Tin Liên Hệ</h2>
                            <p><strong>🏢 Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
                            <p><strong>📞 Điện thoại:</strong> 0900 123 456</p>
                            <p><strong>📧 Email:</strong> contact@depxinhshop.com</p>
                            <p><strong>⏰ Thời gian làm việc:</strong> 8:00 - 22:00 hàng ngày</p>
                        </div>
                        <div>
                            <h2>Gửi Tin Nhắn</h2>
                            <form>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px;">Họ tên *</label>
                                    <input type="text" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px;">Email *</label>
                                    <input type="email" style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px;">
                                </div>
                                <div style="margin-bottom: 15px;">
                                    <label style="display: block; margin-bottom: 5px;">Tin nhắn *</label>
                                    <textarea style="width: 100%; padding: 10px; border: 1px solid #ddd; border-radius: 5px; height: 100px;"></textarea>
                                </div>
                                <button type="submit" class="checkout-btn">📤 Gửi Tin Nhắn</button>
                            </form>
                        </div>
                    </div>
                </div>
                <?php
                break;

            default:
                echo '<h1 class="section-title">Trang Không Tồn Tại</h1>';
                echo '<p style="text-align: center;">Trang bạn đang tìm kiếm không tồn tại. <a href="?page=home">Quay về trang chủ</a></p>';
        }
        ?>
    </main>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-section">
                    <h3>🩴 Dép Xinh Shop</h3>
                    <p>Chuyên cung cấp các loại dép chất lượng cao với giá cả hợp lý. Cam kết mang đến sự hài lòng cho khách hàng.</p>
                </div>
                <div class="footer-section">
                    <h3>🔗 Liên Kết Nhanh</h3>
                    <p><a href="?page=home" style="color: white;">Trang Chủ</a></p>
                    <p><a href="?page=products" style="color: white;">Sản Phẩm</a></p>
                    <p><a href="?page=about" style="color: white;">Giới Thiệu</a></p>
                    <p><a href="?page=contact" style="color: white;">Liên Hệ</a></p>
                </div>
                <div class="footer-section">
                    <h3>📞 Hỗ Trợ Khách Hàng</h3>
                    <p>Hotline: 0900 123 456</p>
                    <p>Email: support@depxinhshop.com</p>
                    <p>Zalo: 0900 123 456</p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; <?php echo $current_year; ?> <?php echo $site_title; ?>. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>
