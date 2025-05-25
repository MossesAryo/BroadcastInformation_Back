<!DOCTYPE html>
<html>

<head>
    <title>Data Informasi</title>
    <style>
        body {
            font-family: DejaVu Sans, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #000;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h2 style="text-align: center;">Daftar Operator Departemen</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Departemen</th>
                <th>Nama Operator</th>
                <th>Email</th>
                <th>Dibuat Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($operator as $item)
                <tr>
                    <td>{{ $item->IDOperator }}</td>
                    <td>{{ $item->departemen->Nama_Departemen }}</td>
                    <td>{{ $item->NamaOperatorDepartemen }}</td>
                    <td>{{ $item->user->email }}</td>
                    <td>{{ $item->created_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
