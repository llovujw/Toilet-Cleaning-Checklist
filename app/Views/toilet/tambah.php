<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Toilet</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.min.js"></script>
  <style>
    * { box-sizing: border-box; }
    body {
      margin: 0;
      font-family: 'Inter', sans-serif;
      background-color: white;
    }

    .header {
      background-color: #00A8FF;
      padding: 12px 20px;
      display: flex;
      align-items: center;
    }

    .header img {
      height: 50px;
      margin-right: 10px;
    }

    .header h1 {
      font-size: 22px;
      font-weight: 800;
      margin: 0;
      display: flex;
    }

    .gradient-text {
      background: linear-gradient(to right, #007BFF, #000);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      margin-right: 5px;
    }

    .black-text { color: #000; }

    .form-container {
      max-width: 400px;
      margin: 50px auto;
      padding: 30px 25px;
      border: 1px solid #00A8FF;
      border-radius: 16px;
    }

    h2 {
      text-align: center;
      color: #333;
      font-size: 22px;
      margin-bottom: 25px;
      font-weight: bold;
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    label {
      font-size: 16px;
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 12px;
      border-radius: 12px;
      border: none;
      background-color: #eee;
      font-size: 16px;
    }

    button {
      width: 100%;
      background-color: #00A8FF;
      color: white;
      font-weight: bold;
      padding: 14px;
      font-size: 16px;
      border: none;
      border-radius: 12px;
      cursor: pointer;
    }

    .message {
      text-align: center;
      margin-top: 15px;
      font-size: 14px;
    }

    .success { color: green; }
    .error { color: red; }
  </style>
</head>
<body>

<div class="header">
  <img src="<?= base_url('image/toilet.png') ?>" alt="Toilet Icon">
  <h1>
    <span class="gradient-text">Toilet Cleaning</span>
    <span class="black-text">Checklist</span>
  </h1>
</div>

<div id="app" class="form-container">
  <h2>Tambah Toilet Baru</h2>

  <div v-if="message" :class="'message ' + messageType">{{ message }}</div>

  <form method="POST" action="<?= base_url('/toilet/simpan') ?>">
    <div>
      <label for="lantai">Lantai</label>
      <input type="number" id="lantai" name="lantai" v-model="form.lantai" required>
    </div>

    <div>
      <label for="nama_toilet">Nama/nomor toilet</label>
      <input type="text" id="nama_toilet" name="nama_toilet" v-model="form.nama_toilet" required>
    </div>

    <button type="submit">Create</button>
  </form>
</div>

<script>
  new Vue({
    el: '#app',
    data: {
      form: {
        lantai: '',
        nama_toilet: ''
      },
      message: <?= json_encode(session()->getFlashdata('success') ?? session()->getFlashdata('error')) ?>,
      messageType: <?= session()->getFlashdata('success') ? json_encode('success') : (session()->getFlashdata('error') ? json_encode('error') : 'null') ?>
    }
  });
</script>

</body>
</html>