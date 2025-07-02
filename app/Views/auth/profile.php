<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500;700&display=swap" rel="stylesheet">
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: #fff;
      display: flex;
      align-items: center;
      justify-content: center;
      min-height: 100vh;
    }

    .container {
      text-align: center;
    }

    .avatar {
      width: 110px;
      height: 110px;
      border-radius: 20px;
      overflow: hidden;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
      margin: 0 auto 25px;
    }

    .avatar img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      display: block;
    }

    h2 {
      font-size: 24px;
      font-weight: 700;
      margin: 0;
      color: #000;
    }

    p {
      font-size: 18px;
      color: #333;
      margin: 5px 0 30px;
    }

    .button {
      background-color: #00A8FF;
      color: white;
      padding: 14px 0;
      width: 260px;
      font-size: 16px;
      font-weight: 600;
      border: none;
      border-radius: 12px;
      cursor: pointer;
      box-shadow: 0 3px 6px rgba(0,0,0,0.15);
      transition: background-color 0.2s ease;
    }

    .button:hover {
      background-color: #0090e0;
    }
  </style>
</head>
<body>

<div class="container">
  <div class="avatar">
    <img src="image/user.png" alt="Avatar">
  </div>
  <h2><?= htmlspecialchars(session()->get('name')); ?></h2>
  <p><?= htmlspecialchars(session()->get('email')); ?></p>

  <form method="POST" action="/logout">
    <button type="submit" class="button">Log Out</button>
  </form>
</div>

</body>
</html>