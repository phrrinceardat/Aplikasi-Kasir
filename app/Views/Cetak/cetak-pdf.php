<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Stok</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <!-- <style>
        .page-break {
            page-break-after: always;
        }
    </style> -->
</head>

<body>
    <h1 style="text-align: center;">Laporan Stok Produk</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Stok</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php foreach ($listProduk as $baris) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $baris['nama_produk']; ?></td>
                    <td><?= $baris['stok']; ?></td>
                    <!-- <div class="page-break"></div> -->
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>

</html>