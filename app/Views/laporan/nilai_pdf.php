<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>ERP Sekolah</title>
    <style>
        table, td, th {
            border: 1px solid black;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        h1, th {
            text-align : center;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1>Laporan Data Nilai</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Mata Pelajaran</th>
                    <th>Nilai</th>
                    <th>Kelas</th>
                </tr>
            </thead>
            <tbody> 
                <?php $no = 1; foreach($Nilai as $key){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key->nama_siswa ?></td>
                        <td><?= $key->mapel ?></td>
                        <td><?= $key->nilai ?></td>
                        <td><?= $key->kelas ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>