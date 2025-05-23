<!DOCTYPE html>
<html>
<head>
    <title>Data Informasi</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h2 style="text-align: center;">Daftar Informasi Broadcast</h2>
    <table>
        <thead>
            <tr>
                <th>ID Informasi</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Tanggal Mulai</th>
                <th>Tanggal Selesai</th>
                <th>Departemen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($informasi as $item)
            <tr>
                <td>{{ $item->IDInformasi }}</td>
                <td>{{ $item->Judul }}</td>
                <td>{{ $item->kategori->NamaKategori }}</td>
                <td>{{ $item->TanggalMulai }}</td>
                <td>{{ $item->TanggalSelesai }}</td>
                <td>{{ $item->operator->NamaOperatorDepartemen }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
