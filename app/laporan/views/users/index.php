<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Murid</title>
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
        button {
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .button-selesai {
            background-color: #2b6cb0;
            color: #fff;
        }
        .button-selesai:hover {
            background-color: #2c5282;
        }
        .button-tidak-selesai {
            background-color: #e53e3e;
            color: #fff;
        }
        .button-tidak-selesai:hover {
            background-color: #c53030;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Daftar Konfimasi Kelulusan Murid</h1>
    <a href="completed_user.php">Lihat Daftar Murid Lulus</a>
    <a href="../../index.php">Kembali</a>
    <table>
        <thead>
            <tr>
                <th>NISN</th>
                <th>Nama Siswa</th>
                <th>Tempat Tanggal Lahir</th>
                <th>Persetujuan</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?php echo $user['nisn']; ?></td>
                    <td><?php echo $user['nama_siswa']; ?></td>
                    <td><?php echo $user['ttl']; ?></td>
                    <td>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="nisn" value="<?php echo $user['nisn']; ?>">
                            <button type="submit" name="action" value="selesai" class="button-selesai">Lulus</button>
                        </form>
                        <form method="POST" style="display:inline;">
                            <input type="hidden" name="nisn" value="<?php echo $user['nisn']; ?>">
                            <button type="submit" name="action" value="tidak_selesai" class="button-tidak-selesai">Tidak Lulus</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
