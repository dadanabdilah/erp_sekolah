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
        <h1>Laporan Data Siswa</h1>
        <hr>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Siswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>No Hape</th>
                    <th>Nama Orang Tua</th>
                    <th>Pekerjaan Orang Tua</th>
                    <th>Kelas</th>
                    <th>Tahun Akademik</th>
                </tr>
            </thead>
            <tbody> 
                <?php $no = 1; foreach($Siswa as $key){ ?>
                    <tr>
                        <td><?= $no++ ?></td>
                        <td><?= $key->nama_siswa ?></td>
                        <td><?= $key->jk ?></td>
                        <td><?= $key->alamat ?></td>
                        <td><?= $key->no_hp ?></td>
                        <td><?= $key->nama_orang_tua ?></td>
                        <td><?= $key->pekerjaan_orang_tua ?></td>
                        <td><?= $key->kelas ?></td>
                        <td><?= $key->tahun ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>