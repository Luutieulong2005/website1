<?php
// config.php - Cấu hình cơ bản
$site_title = "Website Đơn Giản";
$site_author = "Your Name";
$current_year = date('Y');

// Xác định trang hiện tại
$current_page = basename($_SERVER['PHP_SELF']);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php 
        // Thiết lập tiêu đề trang
        switch($current_page) {
            case 'index.php':
                echo "Trang Chủ - $site_title";
                break;
            case 'about.php':
                echo "Giới Thiệu - $site_title";
                break;
            case 'contact.php':
                echo "Liên Hệ - $site_title";
                break;
            default:
                echo $site_title;
        }
        ?>
    </title>
    <style>
        /* style.css */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            line-height: 1.6;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 1rem 0;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        nav ul {
            list-style: none;
            display: flex;
            justify-content: center;
            gap: 2rem;
        }

        nav ul li a {
            color: #333;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 25px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        nav ul li a:hover,
        nav ul li a.active {
            background: #667eea;
            color: white;
            transform: translateY(-2px);
        }

        main {
            background: rgba(255, 255, 255, 0.95);
            margin: 30px auto;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
            min-height: 60vh;
        }

        h1 {
            color: #333;
            margin-bottom: 30px;
            text-align: center;
            font-size: 2.5rem;
            background: linear-gradient(135deg, #667eea, #764ba2);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        h2 {
            color: #555;
            margin: 25px 0 15px 0;
            border-left: 4px solid #667eea;
            padding-left: 15px;
        }

        .welcome-section {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            border-radius: 10px;
            color: white;
            margin-bottom: 30px;
        }

        .welcome-section h1 {
            color: white;
            -webkit-text-fill-color: white;
            background: none;
        }

        .features-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 20px;
            margin: 30px 0;
        }

        .feature-card {
            background: white;
            padding: 25px;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            text-align: center;
            transition: transform 0.3s ease;
        }

        .feature-card:hover {
            transform: translateY(-5px);
        }

        .feature-card h3 {
            color: #667eea;
            margin-bottom: 15px;
        }

        .info-box {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 10px;
            margin: 20px 0;
            border-left: 4px solid #667eea;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input, textarea {
            width: 100%;
            padding: 12px;
            border: 2px solid #e1e5e9;
            border-radius: 8px;
            font-size: 16px;
            transition: border-color 0.3s ease;
        }

        input:focus, textarea:focus {
            outline: none;
            border-color: #667eea;
        }

        button {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 12px 30px;
            border: none;
            border-radius: 25px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        button:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #28a745;
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
            border-left: 4px solid #dc3545;
        }

        footer {
            background: rgba(0, 0, 0, 0.8);
            color: white;
            text-align: center;
            padding: 20px;
            margin-top: 40px;
        }

        .tech-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin: 20px 0;
        }

        .tech-tag {
            background: #667eea;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                gap: 1rem;
            }
            
            main {
                padding: 20px;
                margin: 20px;
            }
            
            .features-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="nav-container">
            <nav>
                <ul>
                    <li><a href="?page=home" class="<?php echo ($_GET['page'] ?? 'home') == 'home' ? 'active' : ''; ?>">🏠 Trang Chủ</a></li>
                    <li><a href="?page=about" class="<?php echo ($_GET['page'] ?? '') == 'about' ? 'active' : ''; ?>">ℹ️ Giới Thiệu</a></li>
                    <li><a href="?page=contact" class="<?php echo ($_GET['page'] ?? '') == 'contact' ? 'active' : ''; ?>">📞 Liên Hệ</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
        <main>
            <?php
            // Xác định nội dung hiển thị dựa trên tham số page
            $page = $_GET['page'] ?? 'home';

            switch($page) {
                case 'home':
                    echo '<div class="welcome-section">';
                    echo '<h1>Chào Mừng Đến Với Website</h1>';
                    echo '<p>Đây là website PHP đơn giản với thiết kế hiện đại và responsive</p>';
                    echo '</div>';
                    
                    echo '<h2>Tính Năng Nổi Bật</h2>';
                    echo '<div class="features-grid">';
                    
                    $features = [
                        ['title' => '🎨 Thiết Kế Đẹp Mắt', 'desc' => 'Giao diện hiện đại với gradient và hiệu ứng mượt mà'],
                        ['title' => '📱 Responsive', 'desc' => 'Tương thích mọi thiết bị từ desktop đến mobile'],
                        ['title' => '⚡ Hiệu Suất Cao', 'desc' => 'Tối ưu hóa tốc độ tải trang và trải nghiệm người dùng'],
                        ['title' => '🔧 Dễ Dàng Mở Rộng', 'desc' => 'Cấu trúc code rõ ràng, dễ dàng phát triển thêm tính năng']
                    ];
                    
                    foreach($features as $feature) {
                        echo '<div class="feature-card">';
                        echo '<h3>' . $feature['title'] . '</h3>';
                        echo '<p>' . $feature['desc'] . '</p>';
                        echo '</div>';
                    }
                    echo '</div>';
                    
                    // Hiển thị thông tin động
                    echo '<div class="info-box">';
                    echo '<h3>📊 Thông Tin Hệ Thống</h3>';
                    echo '<p><strong>Thời gian hiện tại:</strong> ' . date('H:i:s d/m/Y') . '</p>';
                    echo '<p><strong>Phiên bản PHP:</strong> ' . phpversion() . '</p>';
                    echo '<p><strong>Số lượt truy cập ước tính:</strong> ' . number_format(rand(1000, 5000)) . '</p>';
                    echo '</div>';
                    break;

                case 'about':
                    echo '<h1>Về Chúng Tôi</h1>';
                    echo '<p>Chúng tôi là một đội ngũ phát triển web chuyên nghiệp, tận tâm tạo ra những sản phẩm chất lượng.</p>';
                    
                    echo '<div class="info-box">';
                    echo '<h2>🚀 Công Nghệ Sử Dụng</h2>';
                    echo '<div class="tech-list">';
                    
                    $technologies = ['PHP', 'HTML5', 'CSS3', 'JavaScript', 'MySQL', 'Git', 'Responsive Design', 'REST API'];
                    foreach($technologies as $tech) {
                        echo '<span class="tech-tag">' . $tech . '</span>';
                    }
                    echo '</div>';
                    echo '</div>';
                    
                    echo '<h2>📈 Quy Trình Làm Việc</h2>';
                    echo '<div class="features-grid">';
                    
                    $workflow = [
                        ['title' => 'Phân tích', 'desc' => 'Tìm hiểu yêu cầu và đề xuất giải pháp'],
                        ['title' => 'Thiết kế', 'desc' => 'Tạo wireframe và prototype'],
                        ['title' => 'Phát triển', 'desc' => 'Viết code và tích hợp tính năng'],
                        ['title' => 'Kiểm thử', 'desc' => 'Đảm bảo chất lượng sản phẩm']
                    ];
                    
                    foreach($workflow as $step) {
                        echo '<div class="feature-card">';
                        echo '<h3>' . $step['title'] . '</h3>';
                        echo '<p>' . $step['desc'] . '</p>';
                        echo '</div>';
                    }
                    echo '</div>';
                    break;

                case 'contact':
                    echo '<h1>Liên Hệ Với Chúng Tôi</h1>';
                    echo '<p>Hãy gửi tin nhắn cho chúng tôi, chúng tôi sẽ phản hồi trong thời gian sớm nhất!</p>';
                    
                    // Xử lý form liên hệ
                    $message = '';
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $name = htmlspecialchars($_POST['name'] ?? '');
                        $email = htmlspecialchars($_POST['email'] ?? '');
                        $subject = htmlspecialchars($_POST['subject'] ?? '');
                        $content = htmlspecialchars($_POST['content'] ?? '');
                        
                        if (!empty($name) && !empty($email) && !empty($content)) {
                            $message = "<div class='success'>✅ Cảm ơn $name! Tin nhắn của bạn đã được gửi thành công. Chúng tôi sẽ phản hồi qua email: $email</div>";
                        } else {
                            $message = "<div class='error'>❌ Vui lòng điền đầy đủ thông tin bắt buộc!</div>";
                        }
                    }
                    
                    echo $message;
                    ?>
                    
                    <form method="POST" action="?page=contact">
                        <div class="form-group">
                            <label for="name">Họ tên *</label>
                            <input type="text" id="name" name="name" placeholder="Nhập họ tên của bạn" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="email">Email *</label>
                            <input type="email" id="email" name="email" placeholder="Nhập email của bạn" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="subject">Chủ đề</label>
                            <input type="text" id="subject" name="subject" placeholder="Nhập chủ đề tin nhắn">
                        </div>
                        
                        <div class="form-group">
                            <label for="content">Nội dung *</label>
                            <textarea id="content" name="content" rows="6" placeholder="Nhập nội dung tin nhắn của bạn..." required></textarea>
                        </div>
                        
                        <button type="submit">📤 Gửi Tin Nhắn</button>
                    </form>
                    
                    <div class="info-box" style="margin-top: 30px;">
                        <h3>📞 Thông Tin Liên Hệ Khác</h3>
                        <p><strong>Email:</strong> contact@example.com</p>
                        <p><strong>Điện thoại:</strong> +84 123 456 789</p>
                        <p><strong>Địa chỉ:</strong> 123 Đường ABC, Quận 1, TP.HCM</p>
                    </div>
                    <?php
                    break;

                default:
                    echo '<h1>Trang Không Tồn Tại</h1>';
                    echo '<p>Trang bạn đang tìm kiếm không tồn tại. <a href="?page=home">Quay về trang chủ</a></p>';
            }
            ?>
        </main>
    </div>

    <footer>
        <p>&copy; <?php echo $current_year; ?> <?php echo $site_title; ?>. All rights reserved.</p>
        <p>Được phát triển bởi <?php echo $site_author; ?></p>
    </footer>
</body>
</html>
