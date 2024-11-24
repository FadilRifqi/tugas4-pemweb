<?php
session_start();
if (!isset($_SESSION['data'])) {
    die('Tidak ada data yang ditemukan');
}

$data = $_SESSION['data'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Roboto+Mono:ital,wght@0,100..700;1,100..700&family=Space+Grotesk:wght@300..700&display=swap"
        rel="stylesheet">
    <title>Hasil Pendaftaran</title>
    <style>
        /* CSS untuk styling hasil dengan gaya retro */
        body {
            font-family: "Chakra Petch", sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            background-color: #fff;
            border: 2px solid #000;
            padding: 30px;
            box-shadow: 5px 5px 0 #000;
            max-width: 800px;
            width: 100%;
        }

        h1 {
            text-align: center;
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 10px;
            border: 2px solid #000;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Hasil Pendaftaran</h1>
        <table>
            <tr>
                <th>Nama</th>
                <td><?php echo htmlspecialchars($data['name']); ?></td>
            </tr>
            <tr>
                <th>Email</th>
                <td><?php echo htmlspecialchars($data['email']); ?></td>
            </tr>
            <tr>
                <th>Password</th>
                <td><?php echo htmlspecialchars($data['password']); ?></td>
            </tr>
            <tr>
                <th>Umur</th>
                <td><?php echo htmlspecialchars($data['age']); ?></td>
            </tr>
            <tr>
                <th>Isi File</th>
                <td>
                    <table>
                        <?php foreach ($data['fileContent'] as $line): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($line); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </td>
            </tr>
            <tr>
                <th>Browser/OS</th>
                <td><?php echo htmlspecialchars($data['userAgent']); ?></td>
            </tr>
        </table>
    </div>
</body>

</html>
