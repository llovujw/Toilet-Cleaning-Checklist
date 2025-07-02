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

        .status-card {
            width: 35%;
        }

        .status-card h2 {
            margin-top: 0;
            font-weight: 800;
            font-size: 20px;
        }

        .status-grid {
            display: flex;
            justify-content: space-between;
            gap: 10px;
            margin-top: 10px;
        }

        .status-box {
            flex: 1;
            padding: 15px;
            border-radius: 12px;
            text-align: center;
            box-shadow: 0 2px 5px rgba(0,0,0,0.08);
        }

        .status-box .icon {
            font-size: 24px;
            margin-bottom: 8px;
        }

        .status-box .label {
            font-size: 14px;
            color: #555;
            font-weight: 600;
        }

        .status-box .count {
            font-size: 18px;
            font-weight: bold;
            margin-top: 6px;
            color: #333;
        }

        .status-box.clean {
            background-color: #e1f9ec;
            color: #27ae60;
        }

        .status-box.not-clean {
            background-color: #fde2e2;
            color: #c0392b;
        }

        .status-box.total {
            background-color: #e9f0fb;
            color: #2980b9;
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

<div class="container" id="app">
    <div class="floor">
        <div class="floor-item" v-for="lantai in toilets" :key="lantai.lantai">
            <div class="floor-text">
                Lantai {{ lantai.lantai }}
                <small>{{ lantai.jumlah }} toilet</small>
            </div>
            <div style="display: flex; gap: 8px;">
                <a :href="'<?= base_url('/checklist/mulai/') ?>' + lantai.lantai" class="button">Mulai Checklist</a>
                <a :href="'<?= base_url('/toilet/edit/') ?>' + lantai.lantai" class="button" style="background-color: #28a745;">Edit</a>
                <a :href="'<?= base_url('/toilet/hapusSemuaDiLantai/') ?>' + lantai.lantai" class="button" style="background-color: #dc3545;" onclick="return confirm('Yakin hapus semua toilet di lantai ini?')">Delete</a>
            </div>
        </div>
    </div>

    <div class="status-card">
        <h2>Ringkasan Status</h2>
        <div class="status-grid">
            <div class="status-box clean">
                <div class="icon">✅</div>
                <div class="label">Sudah Dibersihkan</div>
                <div class="count">{{ sudah }}</div>
            </div>
            <div class="status-box not-clean">
                <div class="icon">❌</div>
                <div class="label">Belum Dibersihkan</div>
                <div class="count">{{ belum }}</div>
            </div>
            <div class="status-box total">
                <div class="icon">🗓️</div>
                <div class="label">Total Hari Ini</div>
                <div class="count">{{ total }}</div>
            </div>
        </div>
    </div>
</div>

<a href="<?= base_url('/toilet/tambah') ?>" class="fab">+</a>

<script>
    new Vue({
        el: '#app',
        data: {
            toilets: <?= json_encode($lantaiToilets) ?>,
            sudah: <?= json_encode($sudah) ?>,
            belum: <?= json_encode($belum) ?>,
            total: <?= json_encode($total) ?>
        }
    });
</script>

</body>
</html>