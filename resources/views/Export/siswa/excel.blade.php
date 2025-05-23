<table>
    <thead>
    <tr>
        <th>NIS</th>
        <th>Nama Siswa</th>
        <th>Email</th>
        
    </tr>
    </thead>
    <tbody>
    @foreach($siswa as $item)
        <tr>
            <td>{{ $item->ID_Siswa }}</td>
            <td>{{ $item->Nama_Siswa }}</td>
            <td>{{ $item->user->email }}</td>
        </tr>
    @endforeach
    </tbody>
</table>