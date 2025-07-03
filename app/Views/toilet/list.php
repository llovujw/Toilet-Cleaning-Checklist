<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Edit Toilet - Lantai <?= esc($lantai) ?></title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 20px;
      background: #fff;
    }

    h1 {
      text-align: center;
      font-size: 24px;
      margin-bottom: 20px;
    }

    .toilet-item {
      border: 1px solid #00A8FF;
      border-radius: 12px;
      padding: 12px 20px;
      margin-bottom: 15px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .btn {
      text-decoration: none;
      padding: 8px 14px;
      border-radius: 10px;
      color: #fff;
      font-weight: bold;
      font-size: 14px;
    }

    .edit-btn {
      background-color: #28a745;
      margin-right: 8px;
    }

    .delete-btn {
      background-color: #dc3545;
    }
  </style>
</head>

<body>

  <h1>Toilet Lantai <?= esc($lantai) ?></h1>

  <?php foreach ($toilets as $toilet): ?>
    <div class="toilet-item">
      <div><?= esc($toilet['nama_toilet']) ?></div>
      <div>
        <a href="<?= base_url('/checklist/mulai/' . $toilet['id']) ?>">Mulai Checklist</a>
        <a href="<?= base_url('/toilet/edit/' . $toilet['id']) ?>" class="btn edit-btn">Edit</a>
        <a href="<?= base_url('/toilet/delete/' . $toilet['id']) ?>" class="btn delete-btn" onclick="return confirm('Yakin hapus toilet ini?')">Delete</a>
      </div>
    </div>
  <?php endforeach; ?>

  <a href="<?= base_url('/dashboard') ?>">← Kembali ke Dashboard</a>

</body>

</html>