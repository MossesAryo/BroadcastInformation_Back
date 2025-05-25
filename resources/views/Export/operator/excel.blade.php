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
