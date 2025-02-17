<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
    <link rel="stylesheet" href="/clb/app/public/css/style.css">
</head>

<body>
    <div class="container">
        <h2>Đăng nhập</h2>
        <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
        <?php endif; ?>
        <form method="POST" action="/clb/index.php?action=login">
            <label for="username">Tên đăng nhập:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Đăng nhập</button>
        </form>
    </div>
</body>

</html>