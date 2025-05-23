<!DOCTYPE html>
<html>
<head>
    <title>Data Guru</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Guru</h2>
    <table>
        <thead>
            <tr>
                <th>NIP</th>
                <th>Nama Guru</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            @foreach($guru as $item)
                <tr>
                    <td>{{ $item->ID_Guru }}</td>
                    <td>{{ $item->Nama_Guru }}</td>
                    <td>{{ $item->user->email }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
    