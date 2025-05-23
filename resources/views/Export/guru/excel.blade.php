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
