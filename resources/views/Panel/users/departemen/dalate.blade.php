@extends('layout.template')

@section('main')
<div class="container">
    <h2>Hapus Departemen</h2>
    <div class="alert alert-danger">
        <p>Apakah kamu yakin ingin menghapus departemen berikut?</p>
    </div>
    
    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Nama:</strong> {{ $departemen->Nama_Departemen }}</li>
        <li class="list-group-item"><strong>Email:</strong> {{ $departemen->Email_Departemen}}</li>
        <li class="list-group-item"><strong>Tanggal:</strong> {{ $departemen->Tanggal_Dibuat}}</li>
    </ul>

    <form action="{{ route('departemen.destroy', $departemen->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <a href="{{ route('departemen.index') }}" class="btn btn-secondary">Batal</a>
        <button type="submit" class="btn btn-danger">Hapus</button>
    </form>
</div>
@endsection
