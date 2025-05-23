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
            <td>{{ $item->operator->NamaOperatorDepartemen}}</td>
        </tr>
    @endforeach
    </tbody>
</table>
