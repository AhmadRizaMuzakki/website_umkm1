
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="style.css"> <!-- Menghubungkan CSS eksternal -->
</head>
<body>
  <div class="login-container">
    <h2>Login</h2>
    <form action="proses_login.php" method="post">
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <button type="submit" name="submit">Masuk</button>
    </form>
    <div class="link">
      <a href="#">Lupa password?</a>
    </div>
  </div>
</body>
</html>
