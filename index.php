<?php
session_start(); 
$page = $_GET['page'] ?? 'trangchu';
$id_danhmuc = $_GET['id'] ?? '';
$idsanpham = $_GET['idsanpham'] ?? '';

if(isset($_GET['timkiem']) && isset($_GET['tukhoa'])) {
    $page = 'timkiem';
    $_SESSION['tukhoa'] = $_GET['tukhoa'];
}

$base_path = './';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NBN Fashion - <?php echo ucfirst($page); ?></title>
   
    <!-- CSS -->
    <link rel="stylesheet" href="<?php echo $base_path; ?>css/menu.css">
    <link rel="stylesheet" href="<?php echo $base_path; ?>css/trangchu.css">
    <link rel="stylesheet" href="<?php echo $base_path; ?>css/sanpham.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
        .footer {
            background: #000000;
            color: white;
            text-align: center;
            padding: 40px 20px;
            margin-bottom: 0px;
            width: 100%;
        }
        .footer p {
            margin: 8px 0;
            font-size: 1rem;
            opacity: 0.8;
            color: #f0f0f0;
        }
        body {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            margin: 0;
            padding: 0;
        }
        .wrapper {
            flex: 1;
        }
        
        /* CSS cho nav */
        .nav {
            background-color: #fff;
            border-bottom: 1px solid #eee;
        }

        .nav .container {
            justify-content: center;
        }

        .nav ul {
            display: flex;
            list-style: none;
            justify-content: center;
            padding: 15px 0;
        }

        .nav li {
            margin: 0 20px;
        }

        .nav a {
            text-decoration: none;
            color: #000;
            font-size: 14px;
            text-transform: uppercase;
            letter-spacing: 1px;
            position: relative;
            transition: color 0.3s ease;
        }

        .nav a:hover {
            color: #666;
        }

        .nav a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 1px;
            bottom: -2px;
            left: 0;
            background-color: #000;
            transition: width 0.3s ease;
        }

        .nav a:hover::after {
            width: 100%;
        }
    </style>
</head>
<body class="<?php echo $page; ?>">
<div class="wrapper">

    <?php 
    // Include kết nối database
    include $base_path . 'admincp/config/connect.php';
    
    // CHỈ HIỆN MENU NẾU KHÔNG PHẢI TRANG ĐĂNG KÝ, ĐĂNG NHẬP VÀ CẢM ƠN
    if($page !== 'dangky' && $page !== 'dangnhap' && $page !== 'camon') {
        include $base_path . 'pages/menu.php'; 
    }
    ?>

    <?php
    // TRANG CHỦ: không hiện nav
    if($page === 'trangchu') {
        include $base_path . 'pages/main.php';
    } 
    // TRANG ĐĂNG NHẬP - KHÔNG CÓ MENU VÀ NAV
    else if($page === 'dangnhap') {
        include $base_path . 'pages/dangnhap.php';
    }
    // TRANG ĐĂNG KÝ - KHÔNG CÓ MENU VÀ NAV
    else if($page === 'dangky') {
        include $base_path . 'pages/dangky.php';
    }
    // TRANG ĐĂNG XUẤT
    else if($page === 'dangxuat') {
        include $base_path . 'pages/dangxuat.php';
    }
    // TRANG DANH MỤC SẢN PHẨM: hiện nav + sản phẩm
    else if($page === 'danhmucsanpham') {
        include $base_path . 'nav/nav.php';   
        include $base_path . 'pages/danhmuc-sanpham.php';
    }
    // TRANG SẢN PHẨM CHI TIẾT
    else if($page === 'sanpham') {
        include $base_path . 'nav/nav.php';   
        include $base_path . 'pages/sanpham.php';
    }
    // TRANG GIỎ HÀNG
    else if($page === 'giohang') {
        include $base_path . 'nav/nav.php';   
        include $base_path . 'pages/giohang.php';
    }
    // TRANG XỬ LÝ THÊM GIỎ HÀNG
    else if($page === 'themgiohang') {
        include $base_path . 'pages/themgiohang.php';
    }
    // TRANG THANH TOÁN - KHÔNG CÓ NAV (QUAN TRỌNG: ĐÃ SỬA)
    else if($page === 'thanhtoan') {
        include $base_path . 'pages/thanhtoan.php';
    }
    // TRANG CẢM ƠN - SAU KHI THANH TOÁN
    else if($page === 'camon') {
        include $base_path . 'nav/nav.php';   
        include $base_path . 'pages/camon.php';
    }
    // TRANG TÌM KIẾM 
    else if($page === 'timkiem') {
        include $base_path . 'nav/nav.php';   
        include $base_path . 'pages/timkiem.php';
    }
    // TRANG KHÁC
    else {
        switch($page) {
            case 'giohang':
                if(file_exists($base_path . 'pages/giohang.php')) {
                    include $base_path . 'nav/nav.php';
                    include $base_path . 'pages/giohang.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'><h3>Trang giỏ hàng đang phát triển</h3></div>";
                }
                break;
            case 'thanhtoan':
                if(file_exists($base_path . 'pages/thanhtoan.php')) {
                    include $base_path . 'pages/thanhtoan.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'><h3>Trang thanh toán đang phát triển</h3></div>";
                }
                break;
            case 'dangnhap':
                if(file_exists($base_path . 'pages/dangnhap.php')) {
                    include $base_path . 'pages/dangnhap.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'><h3>Trang đăng nhập đang phát triển</h3></div>";
                }
                break;
            case 'dangxuat':
                if(file_exists($base_path . 'pages/dangxuat.php')) {
                    include $base_path . 'pages/dangxuat.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'><h3>Trang đăng xuất đang phát triển</h3></div>";
                }
                break;
            case 'timkiem': 
                if(file_exists($base_path . 'pages/timkiem.php')) {
                    include $base_path . 'nav/nav.php';
                    include $base_path . 'pages/timkiem.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'><h3>Trang tìm kiếm đang phát triển</h3></div>";
                }
                break;
            case 'camon':
                if(file_exists($base_path . 'pages/camon.php')) {
                    include $base_path . 'nav/nav.php';
                    include $base_path . 'pages/camon.php';
                } else {
                    echo "<div style='padding: 20px; text-align: center;'>
                            <h1>Cảm ơn bạn đã đặt hàng!</h1>
                            <p>Đơn hàng của bạn đã được tiếp nhận.</p>
                            <a href='index.php?page=trangchu'>Tiếp tục mua sắm</a>
                          </div>";
                }
                break;
            default:
                include $base_path . 'pages/main.php';
        }
    }
    
    // CHỈ HIỆN FOOTER NẾU KHÔNG PHẢI TRANG GIỎ HÀNG, ĐĂNG KÝ, ĐĂNG NHẬP, THANH TOÁN, ĐĂNG XUẤT VÀ CẢM ƠN
    if($page !== 'giohang' && $page !== 'dangky' && $page !== 'dangnhap' && $page !== 'thanhtoan' && $page !== 'dangxuat' && $page !== 'camon') {
        include $base_path . 'pages/footer.php';
    }
    ?>
</div>

<!-- JS -->
<script src="<?php echo $base_path; ?>js/trangchu.js"></script>
</body>
</html>