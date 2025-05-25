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
