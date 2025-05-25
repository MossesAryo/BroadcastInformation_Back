<!DOCTYPE html>
<html>
<head>
    <title>Data Departemen</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f0f0f0; }
        h2 { text-align: center; }
    </style>
</head>
<body>
    <h2>Daftar Departemen</h2>
    <table>
        <thead>
            <tr>
                <th>ID Departemen</th>
                <th>Nama Departemen</th>
            </tr>
        </thead>
        <tbody>
            @foreach($departemen as $item)
                <tr>
                    <td>{{ $item->ID_Departemen }}</td>
                    <td>{{ $item->Nama_Departemen }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
    