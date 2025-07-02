<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      background-color: #fff;
    }
    .container {
      max-width: 400px;
      margin: 70px auto;
      text-align: center;
    }
    img {
      width: 80px;
      margin-bottom: 20px;
    }
    h1 {
      margin-top: 0;
      font-size: 28px;
      font-weight: 900;
      color: #333;
    }
    h1 span {
      color: #000;
    }
    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 14px;
      margin-top: 20px;
      border: 1px solid #00A8FF;
      border-radius: 10px;
      font-size: 18px;
      background-color: #f7f7f7;
      color: #333;
      font-weight: 500;
    }
    input::placeholder {
      color: #bbb;
      font-weight: 600;
    }
    .forgot {
      text-align: right;
      margin-top: 10px;
    }
    .forgot a {
      color: #00A8FF;
      font-size: 14px;
      text-decoration: none;
      font-weight: 500;
    }
    .button {
      margin-top: 30px;
      width: 100%;
      padding: 14px;
      font-size: 18px;
      font-weight: 700;
      background-color: #00A8FF;
      color: #fff;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      box-shadow: 0 4px 8px rgba(0, 168, 255, 0.3);
      transition: background-color 0.3s ease;
    }
    .button:hover {
      background-color: #0090e0;
    }
    .error {
      margin-top: 15px;
      color: red;
      font-weight: 500;
    }
  </style>
</head>
<body>
  <div class="container">
    <img src="<?= base_url('image/toilet.png') ?>" alt="Toilet Icon">
    <h1><span>Toilet Cleaning</span> Checklist</h1>

    <?php if (!empty($error)): ?>
      <div class="error"><?= $error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
      <input type="text" name="username" placeholder="Username" required>
      <input type="password" name="password" placeholder="Password" required>

      <div class="forgot">
        <a href="#">Forgot Password ?</a>
      </div>

      <button class="button" type="submit">Login</button>
    </form>
  </div>
</body>
</html>