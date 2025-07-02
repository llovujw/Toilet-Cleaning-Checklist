<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Riwayat Checklist</title>
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
            max-width: 500px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .card {
            border: 1px solid #00A8FF;
            border-radius: 15px;
            padding: 16px 20px;
            margin-bottom: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .info {
            display: flex;
            flex-direction: column;
        }

        .info-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .info-sub {
            display: flex;
            align-items: center;
            color: #666;
            font-size: 15px;
        }

        .tanggal {
            font-weight: 700;
            color: #555;
            font-size: 15px;
            white-space: nowrap;
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
    <div v-if="riwayat.length > 0">
        <div class="card" v-for="(item, index) in riwayat" :key="index">
            <div class="info">
                <div class="info-title">Lantai {{ item.lantai }} - {{ item.nama_toilet }}</div>
                <div class="info-sub">
                    <div class="check-icon">✅</div>
                    <span>Sudah Dibersihkan</span>
                </div>
            </div>
            <div class="tanggal">{{ formatTanggal(item.tanggal_terakhir) }}</div>
        </div>
    </div>
    <p v-else>Tidak ada riwayat checklist ditemukan.</p>
</div>

<script>
    new Vue({
        el: '#app',
        data: {
            riwayat: <?= json_encode($riwayat) ?>
        },
        methods: {
            formatTanggal(tanggal) {
                const bulan = [
                    'Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni',
                    'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'
                ];
                const d = new Date(tanggal);
                return d.getDate() + ' ' + bulan[d.getMonth()] + ' ' + d.getFullYear();
            }
        }
    });
</script>

</body>
</html>