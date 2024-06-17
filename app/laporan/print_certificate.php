<?php
// Simpan data yang diterima dari URL
$nisn = $_GET['nisn'];
$nama = $_GET['nama'];
$ttl = $_GET['ttl'];
$completed_at = $_GET['completed_at'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sertifikat Nilai</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        .certificate {
            border: 15px solid #4a5568;
            padding: 20px;
            text-align: center;
            width: 700px;
            margin: 50px auto;
            background-color: #fff;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
        }
        .certificate h1 {
            font-size: 36px;
            color: #2d3748;
            margin-bottom: 20px;
        }
        .certificate p {
            font-size: 20px;
            color: #4a5568;
        }
        .certificate .details {
            margin-top: 30px;
        }
        .details p {
            margin: 15px 0;
        }
        .details strong {
            color: #2b6cb0;
        }
        .signature {
            margin-top: 50px;
        }
        .signature p {
            margin: 0;
            font-size: 18px;
            color: #2d3748;
        }
        .signature .line {
            margin-top: 10px;
            border-top: 1px solid #2d3748;
            width: 250px;
            margin-left: auto;
            margin-right: auto;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <img src="https://smklenterabangsa.sch.id/wp-content/uploads/2018/10/cropped-cropped-logo-SMK-Lensa-copy-2.png" alt="logo" width="200" height="200">
        <h1>E-Raport</h1>
        <p>Dengan ini menyatakan bahwa:</p>
        <div class="details">
            
            <p><strong>Nama:</strong> <?php echo $nama; ?></p>
            
            <p><strong>Telah Menyelesaikan:</strong> Pendidikan dengan nilai baik</p>
            <p><strong>Tanggal Penyelesaian:</strong> <?php echo $completed_at; ?></p>
        </div>
        <div class="signature">
            
        </div>
    </div>
    <div class="certificate">
        

        <div class="details">
        <!DOCTYPE html>
<html lang="en">
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 20px;
        }
        h1, h2 {
            text-align: center;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        .details-table {
            width: 100%;
            margin-bottom: 20px;
        }
        .details-table td {
            padding: 5px;
            border: none;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>DAFTAR NILAI</h1>
    <h2>(RAPORT SEMENTARA)</h2>
    <table class="details-table">
        <tr>
            <td>Nama Sekolah</td>
            <td>: SMK Lentera Bangsa</td>
            <td>Nama Siswa</td>
            <td>: <?php echo $nama; ?></td>
        </tr>
        <tr>
            <td>Alamat</td>
            <td>: Tunggakjati, Karawang, Jawa Barat 41352</td>
            <td>Nomor Induk/NISN</td>
            <td>: <?php echo $nisn; ?></td>
        </tr>
        <tr>


        </tr>
        <tr>
        </tr>
    </table>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Mata Pelajaran</th>
                <th>KKM</th>
                <th>Nilai Angka</th>
                <th>Nilai Huruf</th>
                <th>Deskripsi Kemajuan Belajar</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td rowspan="4">1</td>
                <td>Pendidikan Agama Islam</td>
                <td rowspan="4">7,50</td>
                <td rowspan="4"></td>
                <td rowspan="4"></td>
                <td rowspan="4"></td>
            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>

            </tr>
            <tr>
                <td>2</td>
                <td>Pendidikan Kewarganegaraan</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>3</td>
                <td>Bahasa Indonesia</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>4</td>
                <td>Bahasa Arab</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>5</td>
                <td>Bahasa Inggris</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>6</td>
                <td>Matematika</td>
                <td>7,30</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>7</td>
                <td>Ilmu Pengetahuan Alam</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>8</td>
                <td>Ilmu Pengetahuan Sosial</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>9</td>
                <td>Seni Budaya</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>10</td>
                <td>Pend. Jasmani Olahraga dan Kesehatan</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td>11</td>
                <td>Teknologi Informasi dan Komunikasi</td>
                <td>7,50</td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td rowspan="4">12</td>
                <td>Bahasa Sunda</td>
                <td rowspan="4">7,50</td>
                <td rowspan="4"></td>
                <td rowspan="4"></td>
                <td rowspan="4"></td>

            <tr>
            </tr>
        </tbody>
    </table>
    <br>
    <table>
        <tr>
            <td>Jumlah Nilai</td>
            <td></td>
        </tr>
        <tr>
            <td>Rata-rata</td>
            <td></td>
        </tr>
        <tr>
            <td>Peringkat Kelas ke</td>
            <td>Dari Siswa</td>
        </tr>
    </table>
</body>
</html>

        </div>
        <div class="signature">
            <p><img src="https://i.ibb.co.com/P6gmk1f/Screenshot-2024-06-09-142647.png" alt="tanda tangan"  width="100" height="100"></p>
            <div class="line"></div>
    </div>
    </div>
    <script>
        window.print();
    </script>
</body>
</html>
