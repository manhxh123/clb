<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
</head>

<body>
    <h1>Chào mừng <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>
    <p>Đây là trang chủ sau khi đăng nhập thành công.</p>
    <a href="index.php?action=logout">Đăng xuất</a>
</body>

</html>