<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Toilet Cleaning Checklist</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/vue@2.7.16/dist/vue.min.js"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
            background: #fff;
        }

        .header {
            background-color: #00A8FF;
            color: #fff;
            padding: 10px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .header h1 {
            display: flex;
            align-items: center;
            font-size: 22px;
            margin: 0;
        }

        .header h1 img {
            width: 40px;
            height: 40px;
            margin-right: 10px;
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

        .header .nav {
            display: flex;
            gap: 25px;
            align-items: center;
        }

        .header .nav a {
            font-weight: bold;
            text-decoration: none;
            font-size: 16px;
        }

        .header .nav a:first-child {
            color: black;
        }

        .header .nav a:last-child {
            color: rgba(0, 0, 0, 0.3);
        }

        .container {
            padding: 30px 20px;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }

        .floor {
            width: 60%;
            margin-bottom: 20px;
        }

        .floor-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .floor-text {
            font-size: 20px;
            font-weight: bold;
        }

        .floor-text small {
            display: block;
            color: #444;
            font-size: 14px;
            font-weight: normal;
        }

        .button {
            background-color: #0094FF;
            color: white;
            font-weight: bold;
            padding: 12px 20px;
            border: none;
            border-radius: 15px;
            cursor: pointer;
            text-decoration: none;
            font-size: 16px;
        }

        .status-card {
            border: 1px solid #00A8FF;
            border-radius: 12px;
            padding: 20px;
            width: 35%;
            background: white;
        }

        .status-card h2 {
            margin-top: 0;
            font-weight: 800;
            font-size: 20px;
        }

        .status-item {
            display: flex;
            align-items: center;
            margin-bottom: 12px;
            font-size: 16px;
            font-weight: 500;
            color: #555;
        }

        .status-icon {
            width: 24px;
            height: 24px;
            margin-right: 10px;
            font-size: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .fab {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background-color: #E3E6EC;
            width: 45px;
            height: 45px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
            cursor: pointer;
            text-decoration: none;
            color: black;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="header">
    <h1>
        <img src="<?= base_url('image/toilet.png') ?>" alt="Icon Toilet">
        <span class="gradient-text">Toilet Cleaning</span>
        <span class="black-text">Checklist</span>
    </h1>
    <div class="nav">
        <a href="<?= base_url('/riwayat') ?>">Riwayat</a>
        <a href="<?= base_url('/profile') ?>">Log Out</a>
    </div>
</div>

<!-- Root Vue -->
<div class="container" id="app">
    <div class="floor">
        <div class="floor-item" v-for="lantai in toilets" :key="lantai.lantai">
            <div class="floor-text">
                Lantai {{ lantai.lantai }}
                <small>{{ lantai.jumlah }} toilet</small>
            </div>
            <a :href="'<?= base_url('/checklist/mulai/') ?>' + lantai.lantai" class="button">Mulai Checklist</a>
        </div>
    </div>

    <div class="status-card">
        <h2>Ringkasan Status</h2>
        <div class="status-item">
            <div class="status-icon">✅</div>
            Sudah Dibersihkan
        </div>
        <div class="status-item">
            <div class="status-icon">❌</div>
            Belum Dibersihkan
        </div>
        <div class="status-item">
            <div class="status-icon">🗓️</div>
            Jadwal Hari Ini
        </div>
        <div style="margin-left: 34px; font-weight: bold; font-size: 18px;">{{ total }}</div>
    </div>
</div>

<a href="<?= base_url('/toilet/tambah') ?>" class="fab">+</a>

<!-- Vue.js binding -->
<script>
    new Vue({
        el: '#app',
        data: {
            toilets: <?= json_encode($lantaiToilets) ?>,
            total: <?= json_encode($total) ?>
        }
    });
</script>

</body>
</html>