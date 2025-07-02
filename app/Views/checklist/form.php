<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Checklist Toilet</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.min.js"></script>
  <style>
    body {
      font-family: 'Inter', sans-serif;
      margin: 0;
      background-color: #fff;
    }

    .header {
      background-color: #00A8FF;
      color: white;
      padding: 12px 20px;
      display: flex;
      align-items: center;
    }

    .header img {
      height: 40px;
      margin-right: 10px;
    }

    .header h1 {
      font-size: 22px;
      margin: 0;
      font-weight: 800;
      display: flex;
      align-items: center;
    }

    .gradient-text {
      background: linear-gradient(90deg, #007BFF, #000);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      font-weight: 800;
      margin-right: 5px;
    }

    .black-text {
      color: #000;
      font-weight: 800;
    }

    .container {
      max-width: 400px;
      margin: 40px auto;
      padding: 0 20px;
    }

    .title {
      text-align: center;
      font-size: 20px;
      font-weight: 600;
      color: #555;
      margin-bottom: 20px;
    }

    .card {
      border: 1px solid #00A8FF;
      border-radius: 15px;
      padding: 20px;
    }

    .card h2 {
      text-align: center;
      margin-top: 0;
      font-size: 20px;
      color: #444;
      font-weight: 700;
    }

    label {
      display: flex;
      align-items: center;
      font-size: 16px;
      margin: 12px 0;
    }

    input[type="checkbox"] {
      width: 20px;
      height: 20px;
      margin-right: 12px;
      accent-color: #00A8FF;
    }

    .button {
      width: 100%;
      background-color: #00A8FF;
      color: white;
      font-weight: bold;
      padding: 12px;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
      margin-top: 15px;
    }

    .success {
      text-align: center;
      color: green;
      font-weight: bold;
      margin-top: 10px;
    }
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

<div id="app" class="container">
  <div class="title">Lantai {{ toilet.lantai }} - {{ toilet.nama_toilet }}</div>

  <div class="card">
    <h2>Checklist Kebersihan</h2>

    <div class="success" v-if="message">{{ message }}</div>

    <form method="POST" :action="'<?= base_url('/checklist/simpan/' . $toilet['id']) ?>'">
      <label v-for="item in checklist_items" :key="item">
        <input type="checkbox" :value="item" name="checklist[]">
        {{ item }}
      </label>

      <button type="submit" class="button">Submit</button>
    </form>
  </div>
</div>

<script>
  new Vue({
    el: '#app',
    data: {
      toilet: <?= json_encode($toilet) ?>,
      checklist_items: <?= json_encode($checklist_items) ?>,
      message: <?= json_encode(session()->getFlashdata('success')) ?>
    }
  });
</script>

</body>
</html>