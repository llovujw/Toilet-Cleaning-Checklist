<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Toilet</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      padding: 40px 20px;
      background: #fff;
    }
    .form-container {
      max-width: 400px;
      margin: 0 auto;
      border: 1px solid #00A8FF;
      border-radius: 15px;
      padding: 30px;
    }
    h2 {
      text-align: center;
      margin-bottom: 25px;
    }
    label {
      font-weight: bold;
    }
    input {
      width: 100%;
      padding: 10px;
      border-radius: 10px;
      border: 1px solid #ccc;
      margin-top: 8px;
      margin-bottom: 18px;
    }
    button {
      width: 100%;
      padding: 12px;
      background: #00A8FF;
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: bold;
      cursor: pointer;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Edit Toilet</h2>
  <form method="POST" action="<?= base_url('/toilet/update/' . $toilet['id']) ?>">
    <label for="lantai">Lantai</label>
    <input type="number" name="lantai" id="lantai" value="<?= esc($toilet['lantai']) ?>" required>

    <label for="nama_toilet">Nama Toilet</label>
    <input type="text" name="nama_toilet" id="nama_toilet" value="<?= esc($toilet['nama_toilet']) ?>" required>

    <button type="submit">Update</button>
  </form>
</div>

</body>
</html>