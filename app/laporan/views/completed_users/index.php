<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Completed Murid</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f3f4f6;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color: #2d3748;
            margin-bottom: 20px;
        }
        form {
            margin-bottom: 20px;
            text-align: center;
        }
        input[type="text"] {
            padding: 10px;
            width: 300px;
            border: 1px solid #a0aec0;
            border-radius: 5px;
            outline: none;
            transition: border-color 0.3s;
        }
        input[type="text"]:focus {
            border-color: #2b6cb0;
        }
        button {
            background-color: #2b6cb0;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2c5282;
        }
        a {
            display: inline-block;
            margin-bottom: 20px;
            text-decoration: none;
            color: #2b6cb0;
            padding: 10px 15px;
            border: 1px solid #2b6cb0;
            border-radius: 5px;
            transition: background-color 0.3s, color 0.3s;
        }
        a:hover {
            background-color: #2b6cb0;
            color: #fff;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            background-color: #fff;
            border-radius: 10px;
            overflow: hidden;
        }
        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid #e2e8f0;
        }
        th {
            background-color: #2b6cb0;
            color: #fff;
        }
        tr:hover {
            background-color: #edf2f7;
        }
        .button-cetak {
            background-color: #2b6cb0;
            color: #fff;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button-cetak:hover {
            background-color: #2c5282;
        }
    </style>
    <script>
        function printCertificate(nisn, nama, ttl, completedAt) {
            const url = 'print_certificate.php?nisn=' + nisn + '&nama=' + encodeURIComponent(nama) + '&ttl=' + encodeURIComponent(ttl) + '&completed_at=' + encodeURIComponent(completedAt);
            window.open(url, '_blank');
        }
    </script>
</head>
<body>
    <h1>Daftar Murid Lulus</h1>
    <form method="GET" action="">
        <input type="text" name="search" placeholder="Search by name" value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <button type="submit">Search</button>
    </form>
    <a href="index.php">Kembali</a>
    <table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Completed At</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['nisn']; ?></td>
                    <td><?php echo $user['nama_siswa']; ?></td>
                    <td><?php echo $user['ttl']; ?></td>
                    <td><?php echo $user['completed_at']; ?></td>
                    <td>
                        <button class="button-cetak" onclick="printCertificate('<?php echo $user['nisn']; ?>', '<?php echo addslashes($user['nama_siswa']); ?>', '<?php echo addslashes($user['ttl']); ?>', '<?php echo addslashes($user['completed_at']); ?>')">Cetak Raport</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
